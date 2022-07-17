@extends('layouts.frontend.default')

@section('main_content')
<div class="row">
    <div class="col-lg-12">
      <div class="ts-intro">
          <h3 class="into-sub-title">Reset Password</h3>
      </div><!-- Intro box end -->

      <div class="gap-20"></div>

      <div class="row">
			  @if(Session::has('message'))

	         <div class="col-lg-7">
	               <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
	                     <button type="button" class="close" data-dismiss="alert"></button>
	                     {!! Session::get('message') !!}
	               </div>
	          </div>
	      @endif


	      <div class="col-6">

		      <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </div>
        </form>
	      </div>
      </div><!-- Content row 1 end -->
    </div><!-- Col end -->
</div><!-- Row end -->
@stop