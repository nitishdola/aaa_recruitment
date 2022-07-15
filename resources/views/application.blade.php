@extends('layouts.master')
@section('main')
<div class="col-md-3">
	<div class="contact-info">
		<!-- <img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image"/> -->
		<!-- <h4>Atal Amrit Abhiyan Society</h4> -->
		<img src="{{ asset('img/aaas.png') }}" />
		<img src="{{ asset('img/pmjay.jpg') }}" height="140" width="140" />

		<p><a href="https://atalamritabhiyan.assam.gov.in/resource/recruitment" class="btn btn-info" target="_blank">VIEW TORs</a></p>
	</div>
</div>
<div class="col-md-9">
	<div class="contact-form">

		@if ($errors->any())
		     @foreach ($errors->all() as $error)
		         <div class="alert alert-danger">{{$error}}</div>
		     @endforeach
		@endif

		<form method="POST" action="{{ route('recruitment_form.store') }}" enctype="multipart/form-data" id="rform">
            @csrf

            <div class="form-group">
			  <label class="control-label col-sm-3" for="name">Post Applied For:</label>
			  <div class="col-sm-9">          
				<select class="form-control" name="applied_for">
					<option value="">Select Post Applied For</option>
					<option value="Data Analyst">Data Analyst</option>
					<option value="District Medical Officer">District Medical Officer</option>
					<option value="District Program Coordinator">District Program Coordinator</option>
					<option value="Hospital Administrator">Hospital Administrator</option>
					<option value="Senior Manager">Senior Manager</option>
					<option value="Lead Service Coordinator">Lead Service Coordinator</option>
					<option value="Service Coordinator - PMJAY">Service Coordinator - PMJAY</option>
					<option value="IT Coordinator (Hardware & Networking)">IT Coordinator (Hardware & Networking)</option>
					<option value="IT Coordinator (Software Support)">IT Coordinator (Software Support)</option>
					<option value="Medical Officer">Medical Officer</option>
					<option value="State Quality Coordinator">State Quality Coordinator</option>
					<option value="Grievance Coordinator">Grievance Coordinator</option>
					<option value="IEC Manager">IEC Manager</option>
				</select>
			  </div>
			</div>

			<div class="form-group">
			  <label class="control-label col-sm-3" for="name">Full Name:</label>
			  <div class="col-sm-9">          
				<input type="text" class="form-control" id="name" autocomplete="off" placeholder="Enter Full Name" name="name">
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-3" for="mobile_number">Mobile Number:</label>
			  <div class="col-sm-9">          
				<input type="text" class="form-control" id="mobile_number" autocomplete="off" placeholder="Enter Mobile Number" name="mobile_number">
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-3" for="email">Email:</label>
			  <div class="col-sm-9">
				<input type="email" class="form-control" id="email" autocomplete="off" placeholder="Enter email" name="email">
			  </div>
			</div>

			<div class="form-group">
			  <label class="control-label col-sm-3" for="experience">Experience:</label>
			  <div class="col-sm-9">
				<input type="number" class="form-control" id="experience" autocomplete="off" placeholder="Enter experience in numbers only e.g 4.7" step=".01" name="experience">
			  </div>
			</div>

			<div class="form-group">
			  <label class="control-label col-sm-3" for="comment">Upload your CV:</label>
			  <div class="col-sm-9">
				<input type="file" class="form-control" id="cv" required="required" accept="application/pdf" name="cv">
				<small class="text-muted">In PDF Format Only. Max Size 5MB</small>
			  </div>
			</div>

			@if(config('services.recaptcha.key'))
			    <div class="g-recaptcha"
			        data-sitekey="{{config('services.recaptcha.key')}}">
			    </div>
			@endif

			<div class="form-group mt-3">        
			  <div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default">Submit</button>

			  </div>
			</div>
		</form>
	</div>
</div>
@stop

@section('pageJs')

<script src="https://www.google.com/recaptcha/api.js"></script>
<script type="text/javascript">
	function onSubmit(token) {
     	document.getElementById("demo-form").submit();
   }
</script>
<script>

jQuery.validator.addMethod("lettersonly", function(value, element) 
{
return this.optional(element) || /^[a-z," "]+$/i.test(value);
}, "Letters and spaces only please"); 

jQuery.validator.addMethod("validatemobile", function(value, element){
    if (value.length != 10) {
        return false;
    } else {
        return true;
    };
});


$("#rform").validate({
	rules: {
		name: {
			required : true,
			lettersonly: true 
		},
		email: {
			required: true,
			email: true
		},
		mobile_number: {
			required: true,
			number: true,
			validatemobile:true
		},

		experience: {
			required: true,
			number: true
		}
	},
	messages: {
		name: "Please enter your Name",
		email: "Please enter a valid email address",
		mobile_number: "Enter valid mobile number"
	}
});
</script>
@stop

@section('pageCss')
<style>
    .error{
        color:red;
        font-weight: normal !important;
    }
</style>
@endsection