@extends('layouts.frontend.default')

@section('main_content')
<div class="row">
    <div class="col-lg-12">
      <div class="ts-intro">
          <h3 class="into-sub-title">OOPS !</h3>
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
      </div><!-- Content row 1 end -->
    </div><!-- Col end -->
</div><!-- Row end -->
@stop