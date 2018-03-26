@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="mt-xl-5 col-4">
            <div class="text-center">
                <img class="mb-4 text-center" src="{{ Voyager::image('settings/March2018/OS7GU4v8ldYQi1TRGDCE.png') }}" alt="" width="88">
                <h1 class="h3 mb-4 font-weight-normal">Please sign in</h1>
            </div>
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
                    <div class="col-7 mb-4 float-left">
                        <a class="btn btn-link" style="margin-top:-8px" href="{{ route('password.request') }}">忘记密码？</a>
                    </div>

                    <div class="custom-control custom-checkbox float-left">
                        <input type="checkbox" name="remember" class="custom-control-input" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label" style="vertical-align:1px;line-height:0" for="remember">
                            记住我
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
                </div>

                <p class="text-center mt-5 text-muted">圆一工作室 © 2012-<?php echo date('Y'); ?></p>
            </form>
        </div>
    </div>
</div>
@endsection
