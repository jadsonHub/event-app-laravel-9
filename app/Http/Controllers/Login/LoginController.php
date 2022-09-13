<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login\LoginRequest;
use App\Models\Login\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    protected $login;

    public function __construct(Login $login)
    {
        $this->login = $login;
    }

    public function login()
    {

        return view('login.login');
    }

    public function store(LoginRequest $req)
    {

        if (!$this->login->loginIn($req->all())) {
            return redirect('/login')->with('msg', 'Ocorreu um erro ao logar');
        }
        $data = Auth::user();
        $this->login->registerLogin($data);
        return redirect('/client/index')->with('msg', 'Logado com sucesso');
    }




    public function logout()
    {
        return $this->login->logout();
    }
}
