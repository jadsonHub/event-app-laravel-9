{{-- Importar main tamplates com css/js --}}
@extends('tamplates.main')
{{-- Colocar o titulo --}}
@section('title','Recupear Senha')

{{-- Colocar o header--}}
@section('header')
@include('home.partial.header')
@endsection

{{-- Conteudo da pagina --}}
@section('content')
<div class="d-flex align-items-center justify-content-center" style="margin-top: 100px; margin-bottom: 100px;">

    <div class="card mb-3 w-75">
        <div class="card-body">
            <h4 class="text-center">Recupear Conta</h4>
            <hr>
            <form class="row g-3" action="{{ route('verify.email') }}" method="post">
                @csrf
                @method('POST')
                <div class="d-grid gap-2 col-6 mx-auto">
                    @if(Session::has('msg'))
                    <div class="alert alert-danger mb-3" id="msg">
                    <span>{!! Session::get('msg') !!} </span>  
                    </div>
                   @endif
                    <div class="mb-5">
                        <p>Para prosseguir informe seu email</p>
                    </div>
                    <div class="mb-5">
                        <div class="form-floating">
                            <div class="col-md-12">
                                <label for="email" class="form-label">Recupear conta</label>
                                <input type="text" class="form-control" id="password_email"
                                    aria-describedby="password_email" name="password_email"
                                    value="{{ old('password_email') }}" autofocus>
                                @error('password_email')
                                    <span class="danger text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Enviar</button>

                    <br>
                    <a onclick="voltar('{{ route('login') }}');" class="btn btn-danger   btn-block">Cancelar</a>
                    {{-- <div class="form-text">Atenção!! Ao clicar em "Deletar" sua conta será excluida assim como
                        todos os seus eventos cadastrados!.</div> --}}
                </div>
            </form>
            <br>
        </div>
    </div>
</div>

@endsection