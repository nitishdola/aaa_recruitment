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
   
   <div class="col-lg-12">
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

      <label>Employment Exchange Registration</label>
      <br>

      <div class="form-check form-check-inline">
        <input class="form-check-input empexch" type="radio" name="employment_exchange_registered" id="employment_exchange_registered_yes" value="Yes">
        <label class="form-check-label" for="employment_exchange_registered_yes">Yes</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input empexch" type="radio" name="employment_exchange_registered" id="employment_exchange_registered_no" value="No">
        <label class="form-check-label" for="employment_exchange_registered_no">No</label>
      </div>

      <div class="form-group {{ $errors->has('employment_exchange_number') ? 'has-error' : ''}}" id="empechno" style="display:none;">
         <label>Enter employment exchange number</label>
         {!! Form::text('employment_exchange_number', null, ['class' => 'form-control', 'id' => 'employment_exchange_number', 'autocomplete' => 'off']) !!}
         {!! $errors->first('employment_exchange_number', '<span class="help-inline">:message</span>') !!}
      </div>

      <br>
      <br>
      <label>Education Qualification</label>
      <br>
      <table class="table table-bordered">
         <tr>
            <th>Qualification</th>
            <th>Stream</th>
            <th>University/Board</th>
            <th>Percentage</th>
            <th>Division</th>
         </tr>

         <tr>
            <td>HSLC</td>
            <td>{!! Form::text('hslc_stream', null, ['class' => 'form-control', 'id' => 'hslc_stream', 'autocomplete' => 'off']) !!}</td>
            <td>{!! Form::text('hslc_university', null, ['class' => 'form-control', 'id' => 'hslc_university', 'autocomplete' => 'off']) !!}</td>
            <td>{!! Form::text('hslc_percentage', null, ['class' => 'form-control', 'id' => 'hslc_university', 'autocomplete' => 'off']) !!}</td>
            <td>{!! Form::text('hslc_division', null, ['class' => 'form-control', 'id' => 'hslc_university', 'autocomplete' => 'off']) !!}</td>
         </tr>

         <tr>
            <td>HS</td>
            <td>{!! Form::text('hs_stream', null, ['class' => 'form-control', 'id' => 'hslc_stream', 'autocomplete' => 'off']) !!}</td>
            <td>{!! Form::text('hs_university', null, ['class' => 'form-control', 'id' => 'hslc_university', 'autocomplete' => 'off']) !!}</td>
            <td>{!! Form::text('hs_percentage', null, ['class' => 'form-control', 'id' => 'hslc_university', 'autocomplete' => 'off']) !!}</td>
            <td>{!! Form::text('hs_division', null, ['class' => 'form-control', 'id' => 'hslc_university', 'autocomplete' => 'off']) !!}</td>
         </tr>

         <tr>
            <td>Graduation</td>
            <td>{!! Form::text('graduation_stream', null, ['class' => 'form-control', 'id' => 'hslc_stream', 'autocomplete' => 'off']) !!}</td>
            <td>{!! Form::text('graduation_university', null, ['class' => 'form-control', 'id' => 'hslc_university', 'autocomplete' => 'off']) !!}</td>
            <td>{!! Form::text('graduation_percentage', null, ['class' => 'form-control', 'id' => 'hslc_university', 'autocomplete' => 'off']) !!}</td>
            <td>{!! Form::text('graduation_division', null, ['class' => 'form-control', 'id' => 'hslc_university', 'autocomplete' => 'off']) !!}</td>
         </tr>

         <tr>
            <td>Others</td>
            <td>{!! Form::text('others_stream', null, ['class' => 'form-control', 'id' => 'hslc_stream', 'autocomplete' => 'off']) !!}</td>
            <td>{!! Form::text('others_university', null, ['class' => 'form-control', 'id' => 'hslc_university', 'autocomplete' => 'off']) !!}</td>
            <td>{!! Form::text('others_percentage', null, ['class' => 'form-control', 'id' => 'hslc_university', 'autocomplete' => 'off']) !!}</td>
            <td>{!! Form::text('others_division', null, ['class' => 'form-control', 'id' => 'hslc_university', 'autocomplete' => 'off']) !!}</td>
         </tr>

      </table>


      <br>
      <label>Computer knowledge:</label>
      <br>

      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="computer_knowledge" id="compknowledgeyes" value="Yes">
        <label class="form-check-label" for="compknowledgeyes">
          Yes
        </label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="computer_knowledge" id="compknowledgeno" value="No">
        <label class="form-check-label" for="compknowledgeno">
          No
        </label>
      </div>


      <br>
      <br>
      <label>Experience in health insurance/ assurance scheme run by the State / Contral Govt.:</label>
      <br>

      <div class="form-check form-check-inline">
        <input class="form-check-input exp" type="radio" name="experience" id="experienceyes" value="Yes">
        <label class="form-check-label" for="experienceyes">
          Yes
        </label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input exp" type="radio" name="experience" id="experienceno" value="No">
        <label class="form-check-label" for="experienceno">
          No
        </label>
      </div>


      <div class="form-group {{ $errors->has('experience_in_health') ? 'has-error' : ''}}" id="expinhealth" style="display:none;">
         <label>If yes, experience in years</label>
         {!! Form::number('experience_in_health', null, ['class' => 'form-control', 'id' => 'experience_in_health', 'step' => 0.01, 'autocomplete' => 'off']) !!}
         {!! $errors->first('experience_in_health', '<span class="help-inline">:message</span>') !!}
      </div>


      <br><br>
      <label>Language proficiency</label>
      <br>
      <table class="table table-bordered"> 
         <tr>
            <th>Language</th>
            <th>Read</th>
            <th>Write</th>
            <th>Speak</th>
         </tr>

         <tr>
            <td>Assamese</td>
            <td>
               <div class="form-check">
                  <input class="form-check-input" name="assamese_read" type="checkbox" value="Yes" id="assamese_read">
                  <label class="form-check-label" for="assamese_read">
                  </label>
               </div>
            </td>
            <td>
               <div class="form-check">
                  <input class="form-check-input" name="assamese_write" type="checkbox" value="Yes" id="assamese_write">
                  <label class="form-check-label" for="assamese_write">
                  </label>
               </div>
            </td>

            <td>
               <div class="form-check">
                  <input class="form-check-input" name="assamese_speak" type="checkbox" value="Yes" id="assamese_speak">
                  <label class="form-check-label" for="assamese_speak">
                  </label>
               </div>
            </td>

         </tr>



         <tr>
            <td>Hindi</td>
            <td>
               <div class="form-check">
                  <input class="form-check-input" name="hindi_read" type="checkbox" value="Yes" id="hindi_read">
                  <label class="form-check-label" for="hindi_read">
                  </label>
               </div>
            </td>
            <td>
               <div class="form-check">
                  <input class="form-check-input" name="hindi_write" type="checkbox" value="Yes" id="hindi_write">
                  <label class="form-check-label" for="hindi_write">
                  </label>
               </div>
            </td>

            <td>
               <div class="form-check">
                  <input class="form-check-input" name="hindi_speak" type="checkbox" value="Yes" id="hindi_speak">
                  <label class="form-check-label" for="hindi_speak">
                  </label>
               </div>
            </td>

         </tr>



         <tr>
            <td>English</td>
            <td>
               <div class="form-check">
                  <input class="form-check-input" name="english_read" type="checkbox" value="Yes" id="english_read">
                  <label class="form-check-label" for="english_read">
                  </label>
               </div>
            </td>
            <td>
               <div class="form-check">
                  <input class="form-check-input" name="english_write" type="checkbox" value="Yes" id="english_write">
                  <label class="form-check-label" for="english_write">
                  </label>
               </div>
            </td>

            <td>
               <div class="form-check">
                  <input class="form-check-input" name="english_speak" type="checkbox" value="Yes" id="english_speak">
                  <label class="form-check-label" for="english_speak">
                  </label>
               </div>
            </td>

         </tr>
      </table>

      <br><br>
      <div class="form-group {{ $errors->has('hslc_admit_card') ? 'has-error' : ''}}">
         <label class="col-md-3">HSLC Admit Card</label>
         {!! Form::file('hslc_admit_card', null, ['id' => 'hslc_admit_card', 'required' => true]) !!}
         {!! $errors->first('hslc_admit_card', '<span class="help-inline">:message</span>') !!}
      </div>

      <div class="form-group {{ $errors->has('hslc_marksheet') ? 'has-error' : ''}}">
         <label class="col-md-3">HSLC Marksheet</label>
         {!! Form::file('hslc_marksheet', null, ['id' => 'hslc_marksheet', 'required' => true]) !!}
         {!! $errors->first('hslc_marksheet', '<span class="help-inline">:message</span>') !!}
      </div>

      <div class="form-group {{ $errors->has('hslc_marksheet') ? 'has-error' : ''}}">
         <label class="col-md-3">HSLC Pass Certificate</label>
         {!! Form::file('hslc_certificate', null, ['id' => 'hslc_marksheet', 'required' => true]) !!}
         {!! $errors->first('hslc_marksheet', '<span class="help-inline">:message</span>') !!}
      </div>


      <div class="form-group {{ $errors->has('hs_marksheet') ? 'has-error' : ''}}">
         <label class="col-md-3">HS Marksheet</label>
         {!! Form::file('hs_marksheet', null, ['id' => 'hs_marksheet', 'required' => true]) !!}
         {!! $errors->first('hs_marksheet', '<span class="help-inline">:message</span>') !!}
      </div>

      <div class="form-group {{ $errors->has('hs_marksheet') ? 'has-error' : ''}}">
         <label class="col-md-3">HS Pass Certificate</label>
         {!! Form::file('hs_certificate', null, ['id' => 'hs_marksheet', 'required' => true]) !!}
         {!! $errors->first('hs_marksheet', '<span class="help-inline">:message</span>') !!}
      </div>


      <div class="form-group {{ $errors->has('hs_marksheet') ? 'has-error' : ''}}">
         <label class="col-md-3">HS Marksheet</label>
         {!! Form::file('hs_marksheet', null, ['id' => 'hs_marksheet', 'required' => true]) !!}
         {!! $errors->first('hs_marksheet', '<span class="help-inline">:message</span>') !!}
      </div>

      <div class="form-group {{ $errors->has('hs_certificate') ? 'has-error' : ''}}">
         <label class="col-md-3">HS Pass Certificate</label>
         {!! Form::file('hs_certificate', null, ['id' => 'hs_certificate', 'required' => true]) !!}
         {!! $errors->first('hs_certificate', '<span class="help-inline">:message</span>') !!}
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
   });

   $('.empexch').click(function() {
      $val = $(this).val();
      if($val == 'Yes') {
         $('#empechno').fadeIn();
      }else{
         $('#empechno').hide();
      }
   });


   $('.exp').click(function() {
      $expval = $(this).val();

      if($expval == 'Yes') {
         $('#expinhealth').fadeIn();
      }else{
         $('#expinhealth').hide();
      }
   });
   
</script>


@stop
@section('pageCss')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Zebra_datepicker/1.9.19/css/metallic/zebra_datepicker.css" integrity="sha512-3vJ3KczgljOozeM7L+M7NWoka9D2sc57zZTE+ccWZWdcD/yuW2yPW+aiFI+p/yznWiUdxTx2Btj3MHOv3tzPhw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop