@extends('layouts.dashboard.sidebar')
@section('content')
<div class="container pl-5">
  <div>
    <h1 class="mt-5 text-center"> Welcome to the Employees panel</h1>
    <ul>
      <li>CREATE</li>
      <li>READ</li>
      <li>UPDATE</li>
      <li>DELETE</li>
    </ul>
  </div>
  <!-- este enlace ha de ir dentro del layouts.details_layout en el sitio indicado -->

  <div class="links">
    <a href="{{route('employees.details')}}">employee detail</a>
  </div>
</div>
@endsection
