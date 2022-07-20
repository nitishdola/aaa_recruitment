@extends('layouts.frontend.default')
@section('main_content')
<div class="row">
   <div class="ts-intro">
      <h3 class="into-sub-title">ONLINE APPLICATION FORM -  ARM/PMAM</h3>
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
   {!! Form::open(array('route' => 'save_form', 'id' => 'save_form', 'files' => true, 'class' => 'col-md-12')) !!}
   
   <div class="col-lg-12">
      <div class="row">
         <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}} col-md-6">
            <label>Full Name*</label>
            {!! Form::text('name', auth()->user()->name , ['class' => 'form-control form-control-subject', 'id' => 'name', 'placeholder' => ' ', 'required' => true, 'autocomplete' => 'off']) !!}
            {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
         </div>

         <div class="form-group {{ $errors->has('dob') ? 'has-error' : ''}} col-md-6">
            <label>Date of Birth*</label>
            {!! Form::text('dob', null, ['class' => 'datepicker form-control form-control-subject', 'id' => 'datepicker', 'required' => true, 'autocomplete' => 'off']) !!}
            {!! $errors->first('dob', '<span class="help-inline">:message</span>') !!}
         </div>
      </div>

      <div class="row">
         <div class="form-group {{ $errors->has('father_name') ? 'has-error' : ''}} col-md-6">
            <label>Father's Name*</label>
            {!! Form::text('father_name', null , ['class' => 'form-control form-control-subject', 'id' => 'father_name', 'placeholder' => ' ', 'required' => true, 'autocomplete' => 'off']) !!}
            {!! $errors->first('father_name', '<span class="help-inline">:message</span>') !!}
         </div>

         <div class="form-group {{ $errors->has('mother_name') ? 'has-error' : ''}} col-md-6">
            <label>Mother's Name*</label>
            {!! Form::text('mother_name', null , ['class' => 'form-control form-control-subject', 'id' => 'mother_name', 'placeholder' => ' ', 'required' => true, 'autocomplete' => 'off']) !!}
            {!! $errors->first('mother_name', '<span class="help-inline">:message</span>') !!}
         </div>
      </div>

      <div class="row">

         <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}} col-md-6">
            <label>Email*</label>
            {!! Form::email('email', auth()->user()->email, ['class' => 'form-control form-control-subject', 'id' => 'email', 'readonly' => true, 'required' => true, 'autocomplete' => 'off']) !!}
            {!! $errors->first('email', '<span class="help-inline">:message</span>') !!}
         </div>
      

         <div class="form-group {{ $errors->has('mobile_number') ? 'has-error' : ''}} col-md-6">
            <label>Mobile Number*</label>
            {!! Form::text('mobile_number', auth()->user()->mobile_number, ['class' => 'form-control form-control-subject', 'id' => 'mobile_number', 'readonly' => true, 'required' => true, 'autocomplete' => 'off']) !!}
            {!! $errors->first('mobile_number', '<span class="help-inline">:message</span>') !!}
         </div>
      </div>

      <h4>PRESENT ADDRESS</h4>

      <div class="row">
         <div class="form-group {{ $errors->has('present_street_address_1') ? 'has-error' : ''}} col-md-4">
            <label>Street Address 1*</label>
            {!! Form::text('present_street_address_1', null, ['class' => 'form-control form-control-subject', 'id' => 'present_street_address_1', 'required' => true]) !!}
            {!! $errors->first('present_street_address_1', '<span class="help-inline">:message</span>') !!}
         </div>

         <div class="form-group {{ $errors->has('street_address_2') ? 'has-error' : ''}} col-md-4">
            <label>Street Address 2*</label>
            {!! Form::text('present_street_address_2', null, ['class' => 'form-control form-control-subject', 'id' => 'present_street_address_2', 'required' => true]) !!}
            {!! $errors->first('street_address_2', '<span class="help-inline">:message</span>') !!}
         </div>

         <div class="form-group {{ $errors->has('present_village_town_city') ? 'has-error' : ''}} col-md-4">
            <label>Village/Town/City*</label>
            {!! Form::text('present_village_town_city', null, ['class' => 'form-control', 'id' => 'present_village_town_city']) !!}
            {!! $errors->first('present_village_town_city', '<span class="help-inline">:message</span>') !!}
         </div>
      </div>


      <!-- <div class="row">
         <div class="form-group {{ $errors->has('present_village') ? 'has-error' : ''}} col-md-4">
            <label>Village</label>
            {!! Form::text('present_village', null, ['class' => 'form-control', 'id' => 'present_village']) !!}
            {!! $errors->first('present_village', '<span class="help-inline">:message</span>') !!}
         </div>

         <div class="form-group {{ $errors->has('present_town') ? 'has-error' : ''}} col-md-4">
            <label>Town</label>
            {!! Form::text('present_town', null, ['class' => 'form-control', 'id' => 'present_town']) !!}
            {!! $errors->first('present_town', '<span class="help-inline">:message</span>') !!}
         </div>

         <div class="form-group {{ $errors->has('present_city') ? 'has-error' : ''}} col-md-4">
            <label>City</label>
            {!! Form::text('present_city', null, ['class' => 'form-control', 'id' => 'present_city','autocomplete' => 'off']) !!}
            {!! $errors->first('present_city', '<span class="help-inline">:message</span>') !!}
         </div>
      </div> -->

      <div class="row">
         <div class="form-group {{ $errors->has('present_district_id') ? 'has-error' : ''}} col-md-4">
            <label>District*</label>
            {!! Form::select('present_district_id', $districts, null, ['class' => 'form-control', 'id' => 'present_district_id', 'required' => true, 'placeholder' => 'Pleaase select district']) !!}
            {!! $errors->first('present_district_id', '<span class="help-inline">:message</span>') !!}
         </div>

         <div class="form-group {{ $errors->has('present_pin') ? 'has-error' : ''}} col-md-4">
            <label>PIN Code*</label>
            {!! Form::number('present_pin', null, ['class' => 'form-control', 'id' => 'present_pin', 'required' => true, 'autocomplete' => 'off']) !!}
            {!! $errors->first('present_pin', '<span class="help-inline">:message</span>') !!}
         </div>

         <div class="form-group {{ $errors->has('present_police_station') ? 'has-error' : ''}} col-md-4">
            <label>Police Station*</label>
            {!! Form::text('present_police_station', null, ['class' => 'form-control', 'id' => 'present_police_station', 'required' => true, 'autocomplete' => 'off']) !!}
            {!! $errors->first('present_police_station', '<span class="help-inline">:message</span>') !!}
         </div>
      </div>

      <h4>PERMANENT ADDRESS</h4>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="yes" id="same_present_address">
        <label class="form-check-label" for="same_present_address">
          Same as present address
        *</label>
      </div>
      
      <div class="row">
         <div class="form-group {{ $errors->has('permanent_street_address_1') ? 'has-error' : ''}} col-md-4">
            <label>Street Address 1*</label>
            {!! Form::text('permanent_street_address_1', null, ['class' => 'form-control form-control-subject', 'id' => 'permanent_street_address_1', 'required' => true]) !!}
            {!! $errors->first('permanent_street_address_1', '<span class="help-inline">:message</span>') !!}
         </div>

         <div class="form-group {{ $errors->has('permanent_street_address_2') ? 'has-error' : ''}} col-md-4">
            <label>Street Address 2*</label>
            {!! Form::text('permanent_street_address_2', null, ['class' => 'form-control form-control-subject', 'id' => 'permanent_street_address_2', 'required' => true]) !!}
            {!! $errors->first('permanent_street_address_2', '<span class="help-inline">:message</span>') !!}
         </div>

         <div class="form-group {{ $errors->has('permanent_village_town_city') ? 'has-error' : ''}} col-md-4">
            <label>Village/Town/City*</label>
            {!! Form::text('permanent_village_town_city', null, ['class' => 'form-control', 'id' => 'permanent_village_town_city']) !!}
            {!! $errors->first('permanent_village_town_city', '<span class="help-inline">:message</span>') !!}
         </div>
      </div>


      <!-- <div class="row">
         <div class="form-group {{ $errors->has('permanent_village_town_city') ? 'has-error' : ''}} col-md-4">
            <label>Village/Town/City*</label>
            {!! Form::text('permanent_village_town_city', null, ['class' => 'form-control', 'id' => 'permanent_village']) !!}
            {!! $errors->first('permanent_village_town_city', '<span class="help-inline">:message</span>') !!}
         </div>

         <div class="form-group {{ $errors->has('permanent_town') ? 'has-error' : ''}} col-md-4">
            <label>Town</label>
            {!! Form::text('permanent_town', null, ['class' => 'form-control', 'id' => 'permanent_town']) !!}
            {!! $errors->first('permanent_town', '<span class="help-inline">:message</span>') !!}
         </div>

         <div class="form-group {{ $errors->has('permanent_city') ? 'has-error' : ''}} col-md-4">
            <label>City</label>
            {!! Form::text('permanent_city', null, ['class' => 'form-control', 'id' => 'permanent_city','autocomplete' => 'off']) !!}
            {!! $errors->first('permanent_city', '<span class="help-inline">:message</span>') !!}
         </div>
      </div> -->

      <div class="row">
         <div class="form-group {{ $errors->has('permanent_district_id') ? 'has-error' : ''}} col-md-4">
            <label>District*</label>
            {!! Form::select('permanent_district_id', $districts, null, ['class' => 'form-control', 'id' => 'permanent_district_id', 'required' => true, 'placeholder' => 'Pleaase select district']) !!}
            {!! $errors->first('permanent_district_id', '<span class="help-inline">:message</span>') !!}
         </div>

         <div class="form-group {{ $errors->has('permanent_pin') ? 'has-error' : ''}} col-md-4">
            <label>PIN Code*</label>
            {!! Form::number('permanent_pin', null, ['class' => 'form-control', 'id' => 'permanent_pin', 'required' => true, 'autocomplete' => 'off']) !!}
            {!! $errors->first('permanent_pin', '<span class="help-inline">:message</span>') !!}
         </div>

         <div class="form-group {{ $errors->has('permanent_police_station') ? 'has-error' : ''}} col-md-4">
            <label>Police Station*</label>
            {!! Form::text('permanent_police_station', null, ['class' => 'form-control', 'id' => 'permanent_police_station', 'required' => true, 'autocomplete' => 'off']) !!}
            {!! $errors->first('permanent_police_station', '<span class="help-inline">:message</span>') !!}
         </div>
      </div>


      <div class="form-group {{ $errors->has('nationality') ? 'has-error' : ''}} col-md-4">
         <label>Nationality*</label>
         {!! Form::text('nationality', null, ['class' => 'form-control', 'id' => 'nationality', 'required' => true, 'autocomplete' => 'off']) !!}
         {!! $errors->first('nationality', '<span class="help-inline">:message</span>') !!}
      </div>

      <label>Employment Exchange Registration*</label>
      <br>

      <div class="form-check form-check-inline">
        <input class="form-check-input empexch" type="radio" name="employment_exchange_registered" id="employment_exchange_registered_yes" required="required" value="Yes">
        <label class="form-check-label" for="employment_exchange_registered_yes">Yes</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input empexch" required="required" type="radio" name="employment_exchange_registered" id="employment_exchange_registered_no" value="No">
        <label class="form-check-label" for="employment_exchange_registered_no">No</label>
      </div>

      <div class="form-group {{ $errors->has('employment_exchange_number') ? 'has-error' : ''}}" id="empechno" style="display:none;">
         <label>Enter employment exchange number</label>
         {!! Form::text('employment_exchange_number', null, ['class' => 'form-control', 'id' => 'employment_exchange_number', 'autocomplete' => 'off']) !!}
         {!! $errors->first('employment_exchange_number', '<span class="help-inline">:message</span>') !!}
      </div>

      <br>
      <br>
      <label>Education Qualification*</label>
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
            <td>HSLC*</td>
            <td>{!! Form::text('hslc_stream', 'NA', ['class' => 'form-control', 'id' => 'hslc_stream', 'autocomplete' => 'off', 'required' => true]) !!}</td>
            <td>{!! Form::text('hslc_university', null, ['class' => 'form-control', 'id' => 'hslc_university', 'autocomplete' => 'off', 'required' => true]) !!}</td>
            <td>{!! Form::text('hslc_percentage', null, ['class' => 'form-control', 'id' => 'hslc_university', 'autocomplete' => 'off', 'required' => true]) !!}</td>
            <td>{!! Form::text('hslc_division', null, ['class' => 'form-control', 'id' => 'hslc_university', 'autocomplete' => 'off', 'required' => true]) !!}</td>
         </tr>

         <tr>
            <td>HS*</td>
            <td>{!! Form::text('hs_stream', null, ['class' => 'form-control', 'id' => 'hslc_stream', 'autocomplete' => 'off', 'required' => true]) !!}</td>
            <td>{!! Form::text('hs_university', null, ['class' => 'form-control', 'id' => 'hslc_university', 'autocomplete' => 'off', 'required' => true]) !!}</td>
            <td>{!! Form::text('hs_percentage', null, ['class' => 'form-control', 'id' => 'hslc_university', 'autocomplete' => 'off', 'required' => true]) !!}</td>
            <td>{!! Form::text('hs_division', null, ['class' => 'form-control', 'id' => 'hslc_university', 'autocomplete' => 'off', 'required' => true]) !!}</td>
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
      <label>Proficiency in use of computer:*</label>
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
      <label>Experience in health insurance/ assurance scheme run by the State / Central Govt.:*</label>
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
      <label>Language proficiency*</label>
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
         <label class="col-md-3">HSLC Admit Card*</label>
         {!! Form::file('hslc_admit_card', null, ['id' => 'hslc_admit_card', 'required' => true]) !!}
         {!! $errors->first('hslc_admit_card', '<span class="help-inline">:message</span>') !!}
         <span class="info">In PDF format only</span>
      </div>

      <div class="form-group {{ $errors->has('hslc_marksheet') ? 'has-error' : ''}}">
         <label class="col-md-3">HSLC Marksheet*</label>
         {!! Form::file('hslc_marksheet', null, ['id' => 'hslc_marksheet', 'required' => true]) !!}
         {!! $errors->first('hslc_marksheet', '<span class="help-inline">:message</span>') !!}
         <span class="info">In PDF format only</span>
      </div>

      <div class="form-group {{ $errors->has('hslc_marksheet') ? 'has-error' : ''}}">
         <label class="col-md-3">HSLC Pass Certificate*</label>
         {!! Form::file('hslc_certificate', null, ['id' => 'hslc_marksheet', 'required' => true]) !!}
         {!! $errors->first('hslc_marksheet', '<span class="help-inline">:message</span>') !!}
         <span class="info">In PDF format only</span>
      </div>


      <div class="form-group {{ $errors->has('hs_marksheet') ? 'has-error' : ''}}">
         <label class="col-md-3">HS Marksheet*</label>
         {!! Form::file('hs_marksheet', null, ['id' => 'hs_marksheet', 'required' => true]) !!}
         {!! $errors->first('hs_marksheet', '<span class="help-inline">:message</span>') !!}
         <span class="info">In PDF format only</span>
      </div>

      <div class="form-group {{ $errors->has('hs_certificate') ? 'has-error' : ''}}">
         <label class="col-md-3">HS Pass Certificate*</label>
         {!! Form::file('hs_certificate', null, ['id' => 'hs_certificate', 'required' => true]) !!}
         {!! $errors->first('hs_certificate', '<span class="help-inline">:message</span>') !!}
         <span class="info">In PDF format only</span>
      </div>


      <div class="form-group {{ $errors->has('computer_certificate') ? 'has-error' : ''}}">
         <label class="col-md-3">Certificate in Computer Application</label>
         {!! Form::file('computer_certificate', null, ['id' => 'computer_certificate']) !!}
         {!! $errors->first('computer_certificate', '<span class="help-inline">:message</span>') !!}
         <span class="info">In PDF format only</span>
      </div>

      <div class="form-group {{ $errors->has('exp_certificate') ? 'has-error' : ''}}">
         <label class="col-md-3">Experience Certificate *</label>
         {!! Form::file('exp_certificate', null, ['id' => 'exp_certificate', 'required' => true]) !!}
         {!! $errors->first('exp_certificate', '<span class="help-inline">:message</span>') !!}
         <span class="info">In PDF format only</span>
      </div>

      <!-- <div class="form-group {{ $errors->has('exp_exch_certificate') ? 'has-error' : ''}}">
         <label class="col-md-3">Employment Exchange Registration Certificate *</label>
         {!! Form::file('exp_exch_certificate', null, ['id' => 'exp_exch_certificate', 'required' => true]) !!}
         {!! $errors->first('exp_exch_certificate', '<span class="help-inline">:message</span>') !!}
      </div> -->

      <div class="form-group {{ $errors->has('recent_photo') ? 'has-error' : ''}}">
         <label class="col-md-3">Recent photograph*</label>
         {!! Form::file('recent_photo', null, ['id' => 'recent_photo', 'required' => true]) !!}
         {!! $errors->first('recent_photo', '<span class="help-inline">:message</span>') !!}
         <span class="info">In JPG/PNG format only</span>
      </div>

      <div class="form-group {{ $errors->has('signature') ? 'has-error' : ''}}">
         <label class="col-md-3">Scanned Signature*</label>
         {!! Form::file('signature', null, ['id' => 'signature', 'required' => true]) !!}
         {!! $errors->first('signature', '<span class="help-inline">:message</span>') !!}
         <span class="info">In JPG/PNG format only</span>
      </div>


      </div>

      <p>   

         <input class="form-check-input" name="declaration" type="checkbox" value="yes" id="declaration">
         <label class="form-check-label" for="declaration">
          I, hereby, declare that the information provided above  are true to the best of my knowledge and belief. If any information is found to be false, my candidature is liable to be cancelled at any point of time. 
        </label>


      </p>
   <div class="sbmt"><br>
      <button class="btn btn-primary solid blank" disabled="disabled" id="submit_btn" type="submit">SUBMIT</button>
   </div>
   {!! Form::close() !!}
</div>
<!-- Row end -->
@stop
@section('pageJs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Zebra_datepicker/1.9.19/zebra_datepicker.src.js" integrity="sha512-UubJYG1P1pdzoOYWgXE0/c+CCqmshJI9mRYBA46DZZbFRHXWqs1mA0Je8GEy4SNjk/YFL2Z1JEcSfzP9rk3u4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ asset('frontend/js/moment.js') }}"></script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.js"></script>
<script>
function calculateAge(e) {
    var t = moment(e, "YYYY-MM-DD"),
        i = moment("2022-01-01", "YYYY-MM-DD");
    return (yearDiff = i.diff(t, "years"));
}
$.validator.addMethod(
    "filesize",
    function (e, t, i) {
        return this.optional(t) || t.files[0].size <= i;
    },
    "File size must be less than {0} MB"
),
    jQuery(function (e) {
        "use strict";
        e("#save_form").validate({
            rules: {
                recent_photo: { required: !0, extension: "jpg,jpeg,png", filesize: 4000000  },
                signature: { required: !0, extension: "jpg,jpeg,png", filesize: 4000000 },
                hslc_admit_card: { required: !0, extension: "pdf", filesize: 4000000 },
                hslc_marksheet: { required: !0, extension: "pdf", filesize: 4000000 },
                hslc_certificate: { required: !0, extension: "pdf", filesize: 4000000 },
                hs_marksheet: { required: !0, extension: "pdf", filesize: 4000000 },
                hs_certificate: { required: !0, extension: "pdf", filesize: 4000000 },
                computer_certificate: { extension: "pdf", filesize: 4000000 },
                exp_certificate: { required: !0, extension: "pdf", filesize: 4000000 },
            },
        });
    }),
    $(".datepicker").Zebra_DatePicker({
        view: "years",
        onSelect: function () {
            (dob_selected = $(this).val()), calculateAge(dob_selected) > 40 ? ($("#submit_btn").attr("disabled", "disabled"), alert("Age must be below 40 years to apply.")) : $("#submit_btn").removeAttr("disabled");
        },
    }),
    $(".select2").select2(),
    $("#same_present_address").click(function () {
        $("#same_present_address").is(":checked")
            ? ($("#permanent_street_address_1").val($("#present_street_address_1").val()),
              $("#permanent_street_address_2").val($("#present_street_address_2").val()),
              $("#permanent_village_town_city").val($("#present_village_town_city").val()),
              $("#permanent_pin").val($("#present_pin").val()),
              $("#permanent_district_id").val($("#present_district_id").val()),
              $("#permanent_district_id").val($("#present_district_id").val()),
              $("#permanent_police_station").val($("#present_police_station").val()))
            : ($("#permanent_street_address_1").val(""),
              $("#permanent_street_address_2").val(""),
              $("#permanent_village_town_city").val(""),
              $("#permanent_pin").val(""),
              $("#permanent_district_id").val(""),
              $("#permanent_district_id").val(""),
              $("#permanent_police_station").val(""));
    }),
    $(".empexch").click(function () {
        ($val = $(this).val()), "Yes" == $val ? $("#empechno").fadeIn() : $("#empechno").hide();
    }),
    $(".exp").click(function () {
        ($expval = $(this).val()), "Yes" == $expval ? $("#expinhealth").fadeIn() : $("#expinhealth").hide();
    }),
    $("#declaration").click(function () {
        (decla = $(this).val()), $("#declaration").prop("checked", !0) ? $("#submit_btn").removeAttr("disabled") : $("#submit_btn").attr("disabled", "disabled");
    });

</script>


@stop
@section('pageCss')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Zebra_datepicker/1.9.19/css/metallic/zebra_datepicker.css" integrity="sha512-3vJ3KczgljOozeM7L+M7NWoka9D2sc57zZTE+ccWZWdcD/yuW2yPW+aiFI+p/yznWiUdxTx2Btj3MHOv3tzPhw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
   span.info {
      font-size: 0.8em;
      color:  #12065c ;
   }

   .error {
      color: red;
   }
</style>
@stop