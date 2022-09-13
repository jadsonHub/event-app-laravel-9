<?php

namespace App\Http\Controllers\Reset;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reset\ResetRequest;
use Illuminate\Http\Request;
use App\Models\Client\Client;
use App\Mail\MailNotify;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ResetEmailController extends Controller
{
    protected $client;
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function sendEmail($link, $to)
    {
        $data = [
            'subject' => 'Seu  link de recuperação',
            'body'    => $link
        ];
        try {
            Mail::to($to)->send(new MailNotify($data));
            return redirect()->to('/reset-password')->with('msg', 'Email enviado, verifique a caixa de entrada');
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->to('/reset-password')->with('msg', 'Falha ao enviar email');
        }
    }

    public function reset_password()
    {
        return view('reset.reset');
    }

    public function verificed_email($hash, $email)
    {
        $data = ['email' => $email, 'hash_reset' => $hash];
        $client = $this->client->whereIn($data);
        if (!$client) {
            return redirect()->to('/login')->with('msg', 'Falha acesso expirado!');
        }
        return view('reset.reset-senha', ["client" => $client]);
    }

    public function rest_password_valid(ResetRequest $req)
    {
        $data = $req->input();
       
        if ($this->client->resetPasswordAndLogin($data)) {
          return redirect()->to('/client/index')->with('msg','Conta recuperada com sucesso!');
        }
        return redirect()->to('/login')->with('msg','Error ao recuperar conta, contate o ADM!');
    }

    public function verify_email(Request $req)
    {
        // dd(url('login'));
        $email = $req->input('password_email');

        if (DB::table('clients')->where('email', $email)->get('email')->first()) {
            $hash = $this->client->updateInEmailVerify($email);
            $url = url("reset/{$hash}/{$email}");
            return $this->sendEmail($url, $email);
        };
        return redirect()->to('/reset-password')->with('msg', 'Falha email não existe!');
    }
}
