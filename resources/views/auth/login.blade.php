@extends('layouts.frontend.default')

@section('main_content')
<div class="row">
    <div class="col-lg-12">
      <div class="ts-intro">
          <h3 class="into-sub-title">LOGIN</h3>
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

		      <form method="POST"  clas="col-md-12" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
	            @csrf

	            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
								<label>{{ __('E-Mail Address') }}</label>
								{!! Form::email('email', null, ['class' => 'form-control form-control-subject', 'id' => 'email', 'placeholder' => ' ', 'required' => true, 'autocomplete' => 'off']) !!}

								{!! $errors->first('email', '<span class="help-inline">:message</span>') !!}
							</div>


	            <div class="form-group">
	                <label for="password">{{ __('Password') }}</label>
	                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

	                    @if ($errors->has('password'))
	                        <span class="invalid-feedback" role="alert">
	                            <strong>{{ $errors->first('password') }}</strong>
	                        </span>
	                    @endif
	            </div>

	            <div class="form-group row mb-0">
	                <div class="col-md-8 offset-md-4">
	                    <button type="submit" class="btn btn-primary">
	                        {{ __('Login') }}
	                    </button>

	                    <a class="btn btn-link" href="{{ route('password.request') }}">
	                        {{ __('Forgot Your Password?') }}
	                    </a>
	                </div>
	            </div>
	        </form>
	      </div>
      </div><!-- Content row 1 end -->
    </div><!-- Col end -->
</div><!-- Row end -->
@stop