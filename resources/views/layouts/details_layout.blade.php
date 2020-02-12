@section('details')
<div class="span7 pl-5 pr-2">
  <div class="widget stacked widget-table action-table">

    <div class="widget-header">
      <i class="icon-th-list"></i>
      <h3>Aquí va el nombre del objeto </h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">

      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Name</th>
            <th>Detail</th>
            <th class="td-actions"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>objeto 1</td>
            <td>Breve descripción o función</td>
              <td class="td-actions">
                <!--redirect to the correct page  -->
                <a href="{{route('customers.details')}}" class="btn btn-small btn-primary">
                  <i class="fas fa-sign-out-alt"></i>
                </a>
              </td>
            </tr>
          </tbody>
        </table>

      </div> <!-- /widget-content -->

    </div> <!-- /widget -->
  </div>
@endsection
