@extends('layout.index')
@section('content')
    <section class="content">
        <div class="card card-success">
            <div class="card-header">

                <h3 class="card-title">Alterar senha</h3>
            </div>
            <form method="POST" action="{{ route('user-password.update') }}">
                        @csrf
                        @method('PUT')
                <div class="card-body">
                    @if (session('status') == "password-updated")
                        <div class="alert alert-success">
                            Password updated successfully.
                        </div>
                    @endif
                    <div class="form-group">
                        <label>Senha atual</label>
                        <input id="current_password" type="password" class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" name="current_password" required autofocus>

                        @error('current_password', 'updatePassword')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>


                    <div class="form-group">
                            <label>{{ __('Senha nova') }}</label>
                                <input id="password" type="password" class="form-control @error('password', 'updatePassword') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password', 'updatePassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                            <label>{{ __('Confirmação de senha') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class="card-footer" style=" text-align: center">
                        <button type="submit" class="btn btn-success">Atualizar</button>
                    </div>
                            </div>
                    </form>
        </div>
    </section>
@endsection
