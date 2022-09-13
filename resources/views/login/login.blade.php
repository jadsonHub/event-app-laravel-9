{{-- Importar main tamplates com css/js --}}
@extends('tamplates.main')
{{-- Colocar o titulo --}}
@section('title','Login')

{{-- Colocar o header--}}
@section('header')
@include('home.partial.header')
@endsection

{{-- Conteudo da pagina --}}
@section('content')
<div class=" container d-flex align-items-center justify-content-center" style="margin-top: 200px; margin-bottom:100px;">
    
    <div class="card">
        <div class="card-body">
            <h4 class="text-center">Login</h4>
            <hr>


            <form class="row g-3" action="{{ route('login.store')}}" method="post">
                @if(Session::has('msg'))
                <span id="msg" class="alert alert-danger mb-3">{!! Session::get('msg') !!} </span>  
               @endif
                @csrf 
                @method('POST')
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="informe sua email" name="email" value="{{ old('email')}}" autofocus>
                    @error('email')
                    <span class="danger text-danger">{{ $message }}</span>
                    @enderror    
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="password" placeholder="informe sua senha" value="{{ old('password')}}">
                    @error('password')
                    <span class="danger text-danger">{{ $message }}</span>
                    @enderror

                </div>
                <div class="d-grid gap-2 col-6 mx-auto" style="margin-top: 30px;">
                    <button type="submit" class="btn btn-color btn-block  btn-outline-whith btn-lg">Entrar</button>
                    <br>
                    <a class="text-center" href="{{ route('client.create') }}">Não tem conta? crie agora mesmo agora mesmo.</a>
                    <a class="text-center" href="{{ route('frm.reset') }}">Esqueceu a senha?</a>
                </div>
            </form>
            <br>
        </div>
    </div>

</div>
@endsection