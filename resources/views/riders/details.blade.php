@extends('layouts.dashboard.head')
@extends('layouts.dashboard.sidebar')
<!-- @extends('layouts.details_layout') -->
@section('content')
<div class="container pl-5">
  <div>
    <h1 class="mt-5 text-center"> Welcome to the riders details</h1>
    <ul>
      <li>CREATE</li>
      <li>READ</li>
      <li>UPDATE</li>
      <li>DELETE</li>
    </ul>
  </div>
  <p>AQUÍ VAN LISTAS CON LA INFO EXTENDIDA DEL OBJETO SELECCIONADO</p>
</div>
@endsection
