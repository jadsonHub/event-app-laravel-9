{{-- Importar main tamplates com css/js --}}
@extends('tamplates.main')
{{-- Colocar o titulo --}}
@php
$name = 'Exibindo dados de ' . Auth::user()->first_name;
@endphp

@section('title', $name)

{{-- Colocar o header --}}
@section('header')
    @include('client.partial.header')
@endsection

@section('content')
    <div class="container container-fluid">
        <div class="text-center" style="margin-top: 100px;">
            <h1>Perfil</h1>
            @if(Session::has('msg'))
            <div class="alert alert-danger mb-3" id="msg">
            <span>{!! Session::get('msg') !!} </span>  
            </div>
           @endif
        </div>
        <div class="d-flex align-items-center justify-content-center" style="margin-top: 100px; margin-bottom: 100px;">
            <div class="card mb-3 w-75">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('/img/perfil02.png') }} " class="img rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2 class="card-title">Meus dados</h2>
                            <p class="card-text">Empresa/instituição : {{ Auth::user()->emp_name }} </p>
                            <p class="card-text">Nome : {{ Auth::user()->first_name }} </p>
                            <p class="card-text">Sobrenome : {{ Auth::user()->last_name }}</p>
                            <p class="card-text">Email : {{ Auth::user()->email }}</p>
                            <p class="card-text">Membro desde : {{ date('d M Y', strtotime(Auth::user()->created_at)) }}
                            </p>
                            <div class="row">
                                <a href="{{ route('client.edit',Auth::user()->id)}}" class="btn btn-primary">Atualizar Dados</a>
                            </div>
                            <br>
                            <div class="row">
                                <a href="{{ route('client.delete',Auth::user()->id)}}" class="btn btn-danger">Deletar Conta</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
