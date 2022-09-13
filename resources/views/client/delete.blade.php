{{-- Importar main tamplates com css/js --}}
@extends('tamplates.main')
{{-- Colocar o titulo --}}
@php
$name = 'Deletar conta de ' . Auth::user()->first_name;
@endphp
@section('title', $name)
{{-- Colocar o header --}}
@section('header')
    @include('client.partial.header')
@endsection

@section('content')

    <div class="d-flex align-items-center justify-content-center" style="margin-top: 100px; margin-bottom: 100px;">

        <div class="card mb-3 w-75">
            <div class="card-body">
                <h4 class="text-center">Deletar Conta de {{ Auth::user()->first_name }}</h4>
                <hr>
                <form class="row g-3" action="{{ route('client.destroy') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="d-grid gap-2 col-6 mx-auto">
                        @if(Session::has('msg'))
                        <div class="alert alert-danger mb-3" id="msg">
                        <span>{!! Session::get('msg') !!} </span>  
                        </div>
                       @endif
                        <div class="mb-5">
                            <p>Para prosseguir informe a sua senha</p>
                        </div>
                        <div class="mb-5">
                            <div class="form-floating">
                                <div class="col-md-12">
                                    <label for="email" class="form-label">Deletar conta</label>
                                    <input type="text" class="form-control" id="password_delete"
                                        aria-describedby="password_delete" name="password_delete"
                                        value="{{ old('password_delete') }}" autofocus>
                                    @error('password_delete')
                                        <span class="danger text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Deletar</button>

                        <br>
                        <a onclick="voltar('{{ route('client.show') }}');" class="btn btn-danger   btn-block">Cancelar</a>
                        <div class="form-text">Atenção!! Ao clicar em "Deletar" sua conta será excluida assim como
                            todos os seus eventos cadastrados!.</div>
                    </div>
                </form>
                <br>
            </div>
        </div>
    </div>
@endsection
