@extends('layouts.admin.default')
@section('main_content')
<div class="container-xl">
  <!-- Page title -->
  <div class="page-header d-print-none">
    <div class="row g-2 align-items-center">
      <div class="col">
        <h2 class="page-title">
           Total {{ count($results) }} Applications Submitted
        </h2>
      </div>
    </div>
  </div>
</div>
<div class="page-body">
  <div class="container-xl">
    <div class="row row-cards">
      <div class="col-12">
        <div class="card">
            @if(count($results))
          <div class="table-responsive">
            <table
class="table table-vcenter card-table">
              <thead>
                <tr>
                    <th>#</th>
                  <th>Name</th>
                  <th>Mobile Number</th>
                  <th>Present District</th>
                  <th>Email</th>
                  <th>Experience In Health</th>
                  <th>Reference Code</th>
                  <th class="w-1">Submitted On</th>
                </tr>
              </thead>
              <tbody>
                @foreach($results as $k => $v)
                <tr>
                    <td>{{ $k+1 }}</td>
                  <td >{{ $v->name }}</td>
                  <td class="text-muted" >
                    {{ $v->user->mobile_number }}
                  </td>
                  <td class="text-muted" >{{ $v->present_district->name }}</td>
                  <td class="text-muted" >
                    {{ $v->user->email }}
                  </td>
                  <td>
                    {{ $v->experience_in_health }}</td>
                  </td>
                  <td>{{$v->unique_code}}</td>
                  <td>{{$v->submission_date}}</td>
                  
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          @else
          <h1>NO APPLICATIONS RECEIVED</h1>
          @endif
        </div>
      </div>
      
    
    
      
    </div>
  </div>
</div>
@stop