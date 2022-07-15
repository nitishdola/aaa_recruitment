@extends('layouts.frontend.default')
@section('main_content')
<div class="row">



   <div class="ts-intro">
      <h3 class="into-sub-title">ONLINE APPLICATION</h3>
   </div>
   <!-- Intro box end -->
   <div class="gap-20"></div>
   @if(Session::has('message'))
   <div class="col-lg-12">
      <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
         <button type="button" class="close" data-dismiss="alert"></button>
         {!! Session::get('message') !!}
      </div>
   </div>
   @endif
   @if ($errors->any())
   {!! implode('', $errors->all('
   <div class="alert alert-danger">:message</div>
   ')) !!}
   @endif
   {!! Form::open(array('route' => 'register_user', 'id' => 'contact-form', 'class' => 'col-md-12')) !!}
   
   <div class="col-lg-8">
      <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
         <label>Full Name</label>
         {!! Form::text('name', auth()->user()->name , ['class' => 'form-control form-control-subject', 'id' => 'name', 'placeholder' => ' ', 'required' => true, 'autocomplete' => 'off']) !!}
         {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
      </div>
      <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
         <label>Email</label>
         {!! Form::email('email', auth()->user()->email, ['class' => 'form-control form-control-subject', 'id' => 'email', 'readonly' => true, 'required' => true, 'autocomplete' => 'off']) !!}
         {!! $errors->first('email', '<span class="help-inline">:message</span>') !!}
      </div>
   

      <div class="form-group {{ $errors->has('mobile_number') ? 'has-error' : ''}}">
         <label>Mobile Number</label>
         {!! Form::text('mobile_number', auth()->user()->mobile_number, ['class' => 'form-control form-control-subject', 'id' => 'mobile_number', 'readonly' => true, 'required' => true, 'autocomplete' => 'off']) !!}
         {!! $errors->first('mobile_number', '<span class="help-inline">:message</span>') !!}
      </div>
      <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
         <label>Date of Birth</label>
         {!! Form::text('datepicker', null, ['class' => 'datepicker form-control form-control-subject', 'id' => 'datepicker', 'required' => true, 'autocomplete' => 'off']) !!}
         {!! $errors->first('email', '<span class="help-inline">:message</span>') !!}
      </div>

      <h4>PRESENT ADDRESS</h4>
      <div class="form-group {{ $errors->has('present_address') ? 'has-error' : ''}}">
         <label>Address</label>
         {!! Form::textarea('present_address', null, ['class' => 'form-control form-control-subject', 'id' => 'present_address', 'required' => true, 'rows' => '4']) !!}
         {!! $errors->first('present_address', '<span class="help-inline">:message</span>') !!}
      </div>

      <div class="form-group {{ $errors->has('present_district_id') ? 'has-error' : ''}}">
         <label>District</label>
         {!! Form::select('present_district_id', $districts, null, ['class' => 'form-control', 'id' => 'present_district_id', 'required' => true, 'placeholder' => 'Pleaase select district']) !!}
         {!! $errors->first('present_district_id', '<span class="help-inline">:message</span>') !!}
      </div>

      <div class="form-group {{ $errors->has('present_pin') ? 'has-error' : ''}}">
         <label>PIN Code</label>
         {!! Form::number('present_pin', null, ['class' => 'form-control', 'id' => 'present_pin', 'required' => true, 'autocomplete' => 'off']) !!}
         {!! $errors->first('present_pin', '<span class="help-inline">:message</span>') !!}
      </div>


      <h4>PERMANENT ADDRESS</h4>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="yes" id="same_present_address">
        <label class="form-check-label" for="same_present_address">
          Same as present address
        </label>
      </div>


      <div class="form-group {{ $errors->has('permanent_address') ? 'has-error' : ''}}">
         <label>Address</label>
         {!! Form::textarea('permanent_address', null, ['class' => 'form-control form-control-subject', 'id' => 'permanent_address', 'required' => true, 'rows' => '4']) !!}
         {!! $errors->first('permanent_address', '<span class="help-inline">:message</span>') !!}
      </div>

      <div class="form-group {{ $errors->has('permanent_district_id') ? 'has-error' : ''}}">
         <label>District</label>
         {!! Form::select('permanent_district_id', $districts, null, ['class' => 'form-control', 'id' => 'permanent_district_id', 'required' => true, 'placeholder' => 'Pleaase select district']) !!}
         {!! $errors->first('permanent_district_id', '<span class="help-inline">:message</span>') !!}
      </div>

      <div class="form-group {{ $errors->has('permanent_pin') ? 'has-error' : ''}}">
         <label>PIN Code</label>
         {!! Form::number('permanent_pin', null, ['class' => 'form-control', 'id' => 'permanent_pin', 'required' => true, 'autocomplete' => 'off']) !!}
         {!! $errors->first('permanent_pin', '<span class="help-inline">:message</span>') !!}
      </div>


      <div class="form-group {{ $errors->has('nationality') ? 'has-error' : ''}}">
         <label>Nationality</label>
         {!! Form::text('nationality', null, ['class' => 'form-control', 'id' => 'nationality', 'required' => true, 'autocomplete' => 'off']) !!}
         {!! $errors->first('nationality', '<span class="help-inline">:message</span>') !!}
      </div>


      </div>
   <div class=""><br>
      <button class="btn btn-primary solid blank" type="submit">SUBMIT</button>
   </div>
   {!! Form::close() !!}
</div>
<!-- Row end -->
@stop
@section('pageJs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Zebra_datepicker/1.9.19/zebra_datepicker.src.js" integrity="sha512-UubJYG1P1pdzoOYWgXE0/c+CCqmshJI9mRYBA46DZZbFRHXWqs1mA0Je8GEy4SNjk/YFL2Z1JEcSfzP9rk3u4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
   $('.datepicker').Zebra_DatePicker({
       view: 'years'
   });

   $('.select2').select2();

   $('#same_present_address').click(function() {
      if ($("#same_present_address").is(":checked")) {
         $("#permanent_address").val($('#present_address').val());
         $("#permanent_district_id").val($('#present_district_id').val());
         $("#permanent_pin").val($('#present_pin').val());
      }else{
         $("#permanent_address").val('');
         $("#permanent_district_id").val('');
         $("#permanent_pin").val('');
      }
   })
   
</script>


@stop
@section('pageCss')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Zebra_datepicker/1.9.19/css/metallic/zebra_datepicker.css" integrity="sha512-3vJ3KczgljOozeM7L+M7NWoka9D2sc57zZTE+ccWZWdcD/yuW2yPW+aiFI+p/yznWiUdxTx2Btj3MHOv3tzPhw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop