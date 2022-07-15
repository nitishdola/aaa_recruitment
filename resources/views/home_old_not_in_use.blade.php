@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('home') }}" method="GET">
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
							<label class="control-label col-sm-3" for="email"></label>

							<div class="col-sm-9">
								<button type="submit" class="btn btn-primary">Search</button>
							</div>
						</div>

							

                    </form>


                    <table class="table table-hover table-bordered mt-3">
                    	<tr>
                    		<th>Sl </th>
                    		<th>Name</th>
                    		<th>Mobile</th>
                    		<th>Email</th>
                    		<th>Experience</th>
                    		<th>Applied For</th>
                    		<th>Action</th>
                    	</tr>

                    	@foreach($all_applications as $k => $v)
                    	<tr>
                    		<td>{{ $k+1 }}</td>
                    		<td>{{ $v->name }}</td>
                    		<td>{{ $v->mobile }}</td>
                    		<td>{{ $v->email }}</td>
                    		<td>{{ $v->experience }}</td>
                    		<td>{{ $v->applied_for }}</td>
                    		<td><a href="{{ asset('cv_attachments/'.$v->cv_path) }}">Download CV</a></td>
                    	</tr>
                    	@endforeach
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
