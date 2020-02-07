@extends('layouts.adminpanel.headerAdminpanel')
@extends('layouts.adminpanel.sidebarAdminpanel')
@section('content')
<div class="container" style="z-index:-1">
  <div>
    <h1 class="mt-5 text-center"> Bienvenido al panel del administrador</h1>
  </div>
  <div id="adminUsers" class="">
    <p>Aqui va admin users CRUD</p>
  </div>
  <div id="adminBusiness" class="">
    <p>Aqui va admin business CRUD</p>
  </div>
  <div id="adminMenus" class="">
    <p>Aqui va admin menus CRUD</p>
  </div>
  <div id="adminOrders" class="">
    <p>Aqui va admin orders CRUD</p>
  </div>
  <div id="adminDelivers" class="">
    <p>Aqui va admin delivers CRUD</p>
  </div>
</div>
@endsection
