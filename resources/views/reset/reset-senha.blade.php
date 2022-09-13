{{-- Importar main tamplates com css/js --}}
@extends('tamplates.main')
{{-- Colocar o titulo --}}
@section('title', 'Recupear Senha')

{{-- Colocar o header --}}
@section('header')
    @include('home.partial.header')
@endsection

@section('content')
    <div class="d-flex align-items-center justify-content-center" style="margin-top: 100px; margin-bottom: 100px;">

        <div class="card mb-3 w-75">
            <div class="card-body">
                <h4 class="text-center">Recupear Conta</h4>
                <hr>
                <form class="row g-3" action="{{ route('reset.password') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="d-grid gap-2 col-6 mx-auto">
                        @if (Session::has('msg'))
                            <div class="alert alert-danger mb-3" id="msg">
                                <span>{!! Session::get('msg') !!} </span>
                            </div>
                        @endif
                        <div class="mb-5">
                            <p>Insira sua nova Senha</p>
                        </div>

                        <div class="mb-5">
                            <div class="col-md-12">
                                <label for="email" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="password"
                                    aria-describedby="password" name="password"
                                    value="{{ old('password') }}" autofocus>
                                @error('password')
                                    <span class="danger text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-5">
                            <div class="col-md-12">
                                <label for="email" class="form-label">Comfirmar Senha</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    aria-describedby="password_email" name="password_confirmation"
                                    value="{{ old('password_confirmation') }}" autofocus>
                                @error('password_confirmation')
                                    <span class="danger text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <input type="hidden" name="email" value="{{ $client->email }}">
                        <input type="hidden" name="hash" value="{{ $client->hash_reset }}">

                        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                        <br>
                    </div>
                </form>
                <br>
            </div>
        </div>
    </div>
@endsection
