@extends('layouts.dashboard.head')
@section('sidebar')
<header class="header">
  <nav class="navbar navbar-toggleable-md navbar-light pt-0 pb-0 overflow-hidden" style="background-color:#462952">
    <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
      <div class="float-left"> <a href="#" class="button-left"><span class="fa fa-fw fa-bars "></span></a> </div>
      <ul class="navbar-nav">
        <li class="nav-item dropdown  customers-menu ">
          <a class="nav-link dropdown-toggle d-inline-block" href="{{route('home')}}" id="navbarDropdownMenuLink">
            <img src="https://media-exp1.licdn.com/dms/image/C560BAQHZrWAf-vJoCA/company-logo_200_200/0?e=2159024400&v=beta&t=Ggf-Fbf9Oe0A_lLm6xfAISNgEBClfZ-qC8is_Ea59n0" class="customers-image" style="width:40px" alt="customers Image" >
            <span class="">Developer</span>
          </a>
        </li>
      </ul>
    </div>
  </nav>
</header>
<div class="float-left">
  <aside>
    <div class="sidebar left position-absolute sidebarresponsive fliph"  style="height: 100vh; z-index:2;">
      <a href="#" class="button-left text-white ml-2 d-md-block d-lg-none"><span class="fa fa-fw fa-bars "></span></a>
      <ul class="list-sidebar bg-defoult">
        <li> <a href="{{route('index')}}"><i class="fa fa-home"></i> <span class="nav-label">Home</span></a> </li>
        <li> <a href="#" data-toggle="collapse" data-target="#dashboard" class="collapsed active"><i class="fas fa-list-alt"></i><span class="nav-label">Menús</span> <span class="fa fa-chevron-left pull-right"></span> </a>
          <ul class="sub-menu collapse" id="dashboard">
            <li class="active"><a href="{{route('customers.index')}}">Customers</a></li>
            <li><a href="{{route('suppliers.index')}}">Suppliers</a></li>
            <li><a href="{{route('products.index')}}">Products</a></li>
            <li><a href="{{route('orders.index')}}">Orders</a></li>
            <li><a href="{{route('riders.index')}}">Riders</a></li>
            <li><a href="{{route('employees.index')}}">Employees</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </aside>
</div>
@endsection
