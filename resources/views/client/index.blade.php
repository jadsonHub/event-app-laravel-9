{{-- Importar main tamplates com css/js --}}
@extends('tamplates.main')
{{-- Colocar o titulo --}}
@section('title','Index')

{{-- Colocar o header--}}
@section('header')
@include('client.partial.header')
@endsection

{{-- Conteudo da pagina --}}
@section('content')

@if(Session::has('msg'))
<span id="msg" class="alert alert-danger mb-3">{!! Session::get('msg') !!} </span>  
@endif

<h1>User Logado {{ Auth::user()->first_name }}</h1>

@endsection