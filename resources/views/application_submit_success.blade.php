@extends('layouts.master')
@section('main')
<div class="col-md-12" style="background:#FFF important !">
	<p></p>

	<div class="alert alert-success" role="alert">
	 Your application has been submitted successfully ! Reference Number : {{ $uc}}
	</div>

	<a href="{{ url('/') }}" class="btn btn-warning btn-lg">HOME</a>
</div>
@stop
