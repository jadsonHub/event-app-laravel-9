{{-- Importar main tamplates com css/js --}}
@extends('tamplates.main')
{{-- Colocar o titulo --}}
@section('title','Criar conta')

{{-- Colocar o header--}}
@section('header')
@include('home.partial.header')
@endsection

{{-- Conteudo da pagina --}}
@section('content')
<div class="container container-fluid ">

    <div class="d-flex align-items-center justify-content-center" style="margin-top: 100px; margin-bottom:100px;">

        <div class="card">
            <div class="card-body">
                <h4 class="text-center">Criar conta</h4>
                <hr>
                <form class="row g-3" action="{{ route('client.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="col-md-4">
                        <label for="email" class="form-label">Nome da empresa/instituição</label>
                        <input type="text" class="form-control" id="empnome" aria-describedby="empnome" name="emp_name" value="{{ old('emp_name') }}" autofocus>
                        @error('emp_name')
                        <span class="danger text-danger">{{ $message }}</span>
                        @enderror  
                        <div  class="form-text">Se  não for empresa/instituiçao, coloque seu nome,apelido...</div>
                    </div>
                    <div class="col-md-4">
                        <label for="email" class="form-label">Primeiro Nome</label>
                        <input type="text" class="form-control" id="fnome" aria-describedby="fnome" name="first_name" value="{{ old('first_name')}}" autofocus>
                        @error('first_name')
                        <span class="danger text-danger">{{ $message }}</span>
                        @enderror  
                    </div>
                    <div class="col-md-4">
                        <label for="email" class="form-label">Sobrenome Nome</label>
                        <input type="text" class="form-control" id="snome" aria-describedby="last_name" name="last_name" value="{{ old('last_name') }}">
                        @error('last_name')
                        <span class="danger text-danger">{{ $message }}</span>
                        @enderror  
                    </div>
                    <div class="col-md-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="{{ old('email')}}">
                        @error('email')
                        <span class="danger text-danger">{{ $message }}</span>
                        @enderror  
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputPassword1" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="{{ old('password') }}">
                        @error('password')
                        <span class="danger text-danger">{{ $message }}</span>
                        @enderror  
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputPassword1" class="form-label">Confirmar senha</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation" value="{{ old('password_confirmation')}}">
                        @error('password_confirmation')
                        <span class="danger text-danger">{{ $message }}</span>
                        @enderror  
                    </div>

                    <div class="d-grid gap-2 col-6 mx-auto" style="margin-top: 30px;">
                        <button type="submit" class="btn btn-color btn-block  btn-outline-whith btn-lg">Cadastrar</button>
                        <br>
                        <a  onclick="voltar('{{route('login')}}');" type="submit" class="btn btn-danger btn-block  btn-outline-whith btn-lg">Cancelar</a>
                        <a class="text-center" href="{{route('login')}}">Já tem conta? conect-se agora mesmo.</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection