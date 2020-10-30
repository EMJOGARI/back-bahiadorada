@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Log in
@endsection

@section('content')
<body class="hold-transition login-page">
    <div id="app" v-cloak>
        <div class="login-box">
            <div class="login-logo">
                <a href="{{ url('/home') }}"><img src="{{ url('/img/logoportal.png') }}" alt="Bahia Dorada"></a>
            </div><!-- /.login-logo -->

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="login-box-body">
            <p class="login-box-msg">Iniciar Sesión</p>
            {{-- <p class="login-box-msg"> {{ trans('adminlte_lang::message.siginsession') }} </p> --}}

        <login-form name="{{ config('auth.providers.users.field','email') }}"
                    domain="{{ config('auth.defaults.domain','') }}"></login-form>

        {{-- @include('adminlte::auth.partials.social_login') --}}

        {{--<a href="{{ url('/password/reset') }}">¿Olvidaste tu contraseña?</a><br>
        <a href="{{ url('/register') }}" class="text-center">Regístrate</a>--}}

    </div>

    </div>
    </div>
    @include('adminlte::layouts.partials.scripts_auth')
</body>

@endsection
