@extends('layouts.dashboard.sidebar')
@section('content')

{{-- <div class="container pl-5">
  <div>
    <h1 class="mt-5 text-center"> Welcome to the Customer's panel</h1>
    <ul>
      <li>CREATE</li>
      <li>READ</li> OK
      <li>UPDATE</li>
      <li>DELETE</li>
    </ul>
  </div>
  <!-- este enlace ha de ir dentro del layouts.details_layout en el sitio indicado -->
  <div class="links">
    <a href="">Customer detail</a>
  </div>
</div> --}}

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#customersNavbar">
					<span class="navbar-toggler-icon"></span>
				</button> <a class="navbar-brand" href="#">Customers</a>
				<div class="collapse navbar-collapse" id="customersNavbar">
          @include('customers.create')
					<ul class="navbar-nav ml-md-auto">
						<li class="nav-item dropdown">
							 <a class="nav-link dropdown-toggle" href="http://example.com" id="customersActionsMenu" data-toggle="dropdown">Actions</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="#customersActionsMenu">
								 {{-- <a class="dropdown-item" data-toggle="modal" data-target="#createCustomer">New customer</a> --}}
                 <button type="button" class="dropdown-item" data-toggle="modal" data-target="#createCustomerModal">New customer</button>
                 <a class="dropdown-item" href="#">Order last first</a>
                 <a class="dropdown-item" href="#">Something else here</a>
								<div class="dropdown-divider"></div>
                <a class="dropdown-item" style="color:red" href="#">Remove Customer</a>
							</div>
						</li>
            <li class="nav-item">
              <form class="form-inline">
                <input class="form-control mr-sm-2" type="text" />
                <button class="btn btn-primary my-2 my-sm-0" type="submit">
                  Search
                </button>
              </form>
            </li>
					</ul>
				</div>
			</nav>
			<div class="card">
				<div class="card-body">
          <table class="table">
    				<thead>
    					<tr>
    						<th>#</th>
    						<th>Name</th>
    						<th>Email</th>
    						<th>Phone</th>
                <th>Details</th>
    					</tr>
    				</thead>
    				<tbody>
              @foreach ($customers as $customer)
                <tr>
                  <td>
                    {{$customer->id_customer}}
                  </td>
                  <td>
                    {{$customer->first_name}} {{$customer->last_name}}
                  </td>
                  <td>
                    {{$customer->email}}
                  </td>
                  <td>
                    {{$customer->phone}}
                  </td>
                  <td>
                    <a href="#" class="btn btn-small btn-light">
                      <i class="fas fa-sign-out-alt"></i>
                    </a>
                  </td>
                </tr>
              @endforeach
    				</tbody>
    			</table>
				</div>
				<div class="card-footer">
					<nav>
            <ul class="pagination justify-content-end">
              <li class="page-item">
                <a class="page-link" href="#">Previous</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">4</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">5</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
