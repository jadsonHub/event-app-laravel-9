<?php

namespace App\Models\Login;

use App\Models\Client\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class Login extends  Model
{
    use HasFactory;
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'client_id'
    ];

    protected $casts = [
        'login_verified_at' => 'datetime',

    ];

    public function users()
    {
        return $this->hasMany(Client::class, 'client_id');
    }

    public function registerLogin(object $data)
    {
        return $this->create(['client_id' => $data->id]);
    }

    public function loginIn(array $data)
    {
        return Auth::attempt(['email' => $data['email'], 'password' => $data['password']]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('/login')->with('msg', 'Deslogado com sucesso!');
    }

    public function verifyFindByEmail($data)
    {

        if (DB::table('clients')->where('email', $data)->get('email')->first()) {
            return true;
        };
        return false;
    }
}
