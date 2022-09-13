<?php

namespace App\Models\Client;

use App\Models\Login\Login;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;


class Client extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    //   protected $table = 'clients';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'emp_name'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    public function login()
    {
        return $this->belongsTo(Login::class, 'client_id', 'id');
    }

    public function updateIn(array $data)
    {

        if (isset($data['password']) || !empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            $data['id'] = Auth::user()->id;
            $data['password'] = Auth::user()->password;
            if ($this->findOrFail($data['id'])->update($data)) {
                Auth::attempt(['email' => $data['email'], 'password' => Auth::user()->password]);
                return true;
            }
        }
        return false;
    }

    public function updateInEmailVerify($email)
    {
        $hash = str_replace(
            "/",
            "",
            stripslashes(Hash::make(uniqid()))
        );

        $this->where('email', $email)
            ->update([
                'email_verified_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'), 'hash_reset' => $hash
            ]);
        return $hash;
    }

    public function deleteIn(array $data)
    {
        if ($this->verifyPassword($data['password_delete'], Auth::user()->password)) {

            $this->findOrFail(Auth::user()->id)->delete();
            return true;
        }

        return false;
    }

    public function whereIn($data)
    {

       return DB::table('clients')->where($data)->first();

    }

    protected function verifyPassword($check, $hashedPassword)
    {

        if (Hash::check($check, $hashedPassword)) {
            return true;
        }
        return false;
    }

    public function resetPasswordAndLogin($data){
        
        $password = $data['password'];
        $data['password'] = bcrypt($data['password']);
        $updateSenha = $this->where(['email' => $data['email'],'hash_reset'=>$data['hash']])
        ->update(['password' => $data['password'],'hash_reset'=> '',
        'updated_at' => date('Y-m-d H:i:s')]);

        if(isset($updateSenha)){
            Auth::attempt(['email' => $data['email'], 'password' => $password]);
            return true;
        }
        return false;
    }
}
