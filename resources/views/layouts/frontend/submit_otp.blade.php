@extends('layouts.frontend.default')

@section('main_content')
<div class="row">
    <div class="col-lg-12">
      <div class="ts-intro">
          <h3 class="into-sub-title">ENTER THE OTP YOU HAVE RECEIVED IN YOUR MOBILE and EMAIL</h3>
      </div><!-- Intro box end -->

      <div class="gap-20"></div>

      <div class="row">
      		@if(Session::has('message'))

		         <div class="col-lg-12">
		               <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
		                     <button type="button" class="close" data-dismiss="alert"></button>
		                     {!! Session::get('message') !!}
		               </div>
		          </div>
		      @endif
		      
      		@if ($errors->any())
                {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
            @endif

          	{!! Form::open(array('route' => 'otp_verify', 'id' => 'otp_verify', 'class' => 'col-md-12')) !!}
			  <div class="error-container"></div>

			  <div class="form-group {{ $errors->has('otp') ? 'has-error' : ''}}">
					<label>OTP</label>
					{!! Form::text('otp', null, ['class' => 'form-control form-control-subject col-md-4', 'id' => 'otp', 'placeholder' => ' ', 'required' => true, 'autocomplete' => 'off']) !!}

					{!! $errors->first('otp', '<span class="help-inline">:message</span>') !!}
				</div>

				<input type="hidden" name="recog" value="{{ $mobile_number }}">
			  
			  <!-- <div class="text-right"><br> -->
				<button class="btn btn-primary solid blank" type="submit">SUBMIT</button>
			  </div>
			{!! Form::close() !!}
      </div><!-- Content row 1 end -->

      
    </div><!-- Col end -->
</div><!-- Row end -->
@stop