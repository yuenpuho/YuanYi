@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="text-center mt-xl-5 col-4">
            <img class="mb-4" src="{{ Voyager::image('settings/March2018/OS7GU4v8ldYQi1TRGDCE.png') }}" alt="" width="88">
            <h1 class="h3 mb-4 font-weight-normal">Please sign in</h1>
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group mb-4 {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required
                           autofocus placeholder="Email address">

                    @if ($errors->has('email'))
                    <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                    @endif
                </div>

                <div class="form-group  mb-4 {{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" class="form-control" name="password" required placeholder="Password">

                    @if ($errors->has('password'))
                    <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                    @endif
                </div>

                <div class="form-group">
                    <a class="btn btn-link" href="{{ route('password.request') }}">忘记密码？</a>
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 记住我
                    </label>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
                </div>

                <p class="mt-5 mb-3 text-muted">圆一工作室 © 2012-<?php echo date('Y'); ?></>
            </form>
        </div>
    </div>
</div>
@endsection
