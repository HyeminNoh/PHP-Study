@extends('layouts.app')

@section('content')
    <form action="{{ route('sessions.store') }}" method="POST" class="form__auth">
        {!! csrf_field() !!}

        @if ($return = request('return'))
            <input type="hidden" name="return" value="{{ $return }}">
        @endif

        <div class="page-header">
            <h4>로그인</h4>
            <p class="text-muted">
                깃허브 계정으로 로그인하세요. . {{ config('app.name') }}. 계정으로 로그인할 수도 있습니다.
            </p>
        </div>

        <div class="form-group">
            <a class="btn btn-default btn-lg btn-block" href="{{ route('social.login', ['github']) }}">
                <strong>
                    <i class="fa fa-github"></i>
                    Github 계정으로 로그인하기
                </strong>
            </a>
        </div>

        <div class="login-or">
            <hr class="hr-or">
            <span class="span-or">or</span>
        </div>

        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <input type="email" name="email" class="form-control" placeholder="이메일" value="{{ old('email') }}"/>
            {!! $errors->first('email', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <input type="password" name="password" class="form-control" placeholder="비밀번호"/>
            {!! $errors->first('password', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" value="{{ old('remember', 1) }}" checked>
                    로그인 기억하기
                    <span class="text-danger">(공용 컴퓨터에서는 사용하지 마세요!)</span>
                </label>
            </div>
        </div>

        <div class="form-group">
            <button class="btn btn-primary btn-lg btn-block" type="submit">
                로그인
            </button>
        </div>

        <div>
            <p class="text-center">회원이 아니라면?
                <a href="{{ route('users.create') }}">
                    가입하세요.
                </a>
            </p>
            <p class="text-center">
                <a href="{{ route('users.create') }}">
                    비밀번호를 잊으셨나요?
                </a>
            </p>
        </div>
    </form>
@stop
