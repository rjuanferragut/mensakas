@extends('layouts.dashboard.sidebar')
@extends('layouts.details_layout')

@section('content')
<div class="container pl-5">
  <div>
    <h1 class="mt-5 text-center"> Welcome to the Supplier's panel</h1>
    <ul>
      <li>CREATE</li>
      <li>READ</li>
      <li>UPDATE</li>
      <li>DELETE</li>
    </ul>
  </div>
  <!-- este enlace ha de ir dentro del layouts.details_layout en el sitio indicado -->

  <div class="links">
    <a href="{{route('suppliers.details')}}">suppliers detail</a>
  </div>
</div>
@endsection
