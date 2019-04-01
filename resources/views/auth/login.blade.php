@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="login-box ptb--100">
            <form method="post" action="{{route('login')}}">
                @csrf
                <div class="login-form-head">
                    <h4>{{__('Sign In')}}</h4>
                    <p>{{__('Hello there, Sign in and start managing your Documents')}}</p>
                </div>
                <div class="login-form-body">
                    <div class="form-group">
                        <label for="email">{{__('Email Address')}}</label>
                        <input id="email" type="email"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                               value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">{{__('Password')}}</label>
                        <input id="password" type="password"
                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                               value="{{ old('password') }}" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row mb-4 rmber-area">
                        <div class="col-6">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" name="remember_me" class="custom-control-input" id="customControlAutosizing">
                                <label class="custom-control-label"
                                       for="customControlAutosizing">{{__('Remember Me')}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="submit-btn-area">
                        <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
