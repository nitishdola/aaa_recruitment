@extends('layouts.frontend.default')

@section('main_content')
<div class="row">
    <div class="col-lg-6">
      <div class="ts-intro">
          <h3 class="into-sub-title">REGISTER</h3>
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

          	{!! Form::open(array('route' => 'register_user', 'id' => 'contact-form', 'class' => 'col-md-12')) !!}
			  <div class="error-container"></div>

				
			  
			  <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
					<label>Full Name</label>
					{!! Form::text('name', null, ['class' => 'form-control form-control-subject', 'id' => 'name', 'placeholder' => ' ', 'required' => true, 'autocomplete' => 'off']) !!}

					{!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
				</div>


				<div class="form-group {{ $errors->has('mobile_number') ? 'has-error' : ''}}">
					<label>Mobile Number</label>
					{!! Form::text('mobile_number', null, ['class' => 'form-control form-control-subject', 'id' => 'mobile_number', 'placeholder' => ' ', 'required' => true, 'autocomplete' => 'off']) !!}

					{!! $errors->first('mobile_number', '<span class="help-inline">:message</span>') !!}
				</div>
				
			  <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
					<label>Email</label>
					{!! Form::email('email', null, ['class' => 'form-control form-control-subject', 'id' => 'email', 'placeholder' => ' ', 'required' => true, 'autocomplete' => 'off']) !!}

					{!! $errors->first('email', '<span class="help-inline">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
					<label>Choose a Password(Min. 6 characters)</label>
					<input data-toggle="password" class="form-control form-control-subject" type="password" name="password" id="password" placeholder="" required>
					{!! $errors->first('password', '<span class="help-inline">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
					<label>Confirm Password</label>
					<input class="form-control form-control-subject" type="password" name="password_confirmation" id="password" placeholder="" required>
					{!! $errors->first('password_confirmation', '<span class="help-inline">:message</span>') !!}
				</div>
				
			  
			  <div class="text-right"><br>
				<button class="btn btn-primary solid blank" type="submit">SUBMIT</button>
			  </div>
			{!! Form::close() !!}
      </div><!-- Content row 1 end -->

      
    </div><!-- Col end -->

    <div class="col-lg-6 mt-4 mt-lg-0">
      <h3 class="into-sub-title">Important Notes</h3>
      
      <div class="accordion accordion-group" id="our-values-accordion">
          <div class="card">
            <div class="card-header p-0 bg-transparent" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      GUIDE TO FILL UP THE FORM
                  </button>
                </h2>
            </div>
          
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#our-values-accordion">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidata
                </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header p-0 bg-transparent" id="headingTwo">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      FAQs
                  </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#our-values-accordion">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidata
                </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header p-0 bg-transparent" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      NEWS & UPDATES
                  </button>
                </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#our-values-accordion">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidata
                </div>
            </div>
          </div>
      </div>
      <!--/ Accordion end -->

    </div><!-- Col end -->
</div><!-- Row end -->
@stop