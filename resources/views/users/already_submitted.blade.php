@extends('layouts.frontend.default')
@section('main_content')
<div class="row">
   <div class="ts-intro">
      <p>Your have already applied for the post on {{ date('d-m-Y', strtotime($submission_date)) }} . Reference Number : <span style="color: #00c718 ">{{ $unique_code}}</span></p>
   </div>
   <!-- Intro box end -->
   <div class="gap-20"></div>
</div>
@stop
