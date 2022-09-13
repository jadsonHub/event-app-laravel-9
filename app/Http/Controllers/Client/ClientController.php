<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ClientRequest;
use App\Models\Client\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    //lista de clientes GET
    public function index()
    {
        return view('client.index');
    }
    //formulario de criar usuario GET
    public function createFmr()
    {
        return view('client.create');
    }
    //formulario de update Atualizacao GET
    public function edit()
    {
        return view('client.edit');
    }
    // exibir detalhes do cliente GET
    public function show()
    {
        return view('client.show');
    }

    // criar cliente POST
    public function store(ClientRequest $req)
    {
        $data = $req->all();
        $password = $data['password'];
        $data['password'] = bcrypt($password);
        if ($this->client->create($data)) {
            Auth::attempt(['email' => $data['email'], 'password' => $password]);
            return view('client.index');
        }
    }

    public function delete()
    {
        return view('client.delete');
    }
    //Deletar cliente DELETE
    public function destroy(Request $req)
    {
       
        if($this->client->deleteIn($req->all())){
           return redirect()->to('/login')->with('msg','Conta deletada com sucesso!');
        }
        return redirect()->to('/client/delete/'.Auth::user()->id)->with('msg','Falha ao deletar conta, senha incorreta!');
    }

    //formulario de atualizacao PUT
    public function update(ClientRequest $req)
    {
        $data = $req->all();

        if ($this->client->updateIn($data)) {
            return redirect()->to('/client/show')->with('msg', 'Atualizado com sucesso');
        }
        return redirect()->to('/client/edit/' . Auth::user()->id)->with('msg', 'Atualizado com sucesso');
    }
}
