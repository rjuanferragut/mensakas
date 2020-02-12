@extends('layouts.dashboard.sidebar')
@section('content')
<div class="container pl-5">
  <div>
    <h1 class="mt-5 text-center"> Welcome to the orders panel</h1>
    <ul>
      <li>READ</li>
      <li>UPDATE</li>
    </ul>
  </div>
  <!-- este enlace ha de ir dentro del layouts.details_layout en el sitio indicado -->

  <div class="links">
    <a href="{{route('orders.details')}}">order detail</a>
  </div>
</div>
@endsection
