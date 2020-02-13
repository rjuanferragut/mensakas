<div class="modal fade modal-xl" id="createCustomerModal" tabindex="-1" role="dialog" aria-labelledby="createCustomerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createCustomerModalLabel">Create new customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-group" action="{{route('customer.store')}}" method="post">
          <div class="row">
            <div class="col-md-6">
              <label for="customer_name">First Name</label>
              <input type="text" class="form-control" id="customer_name" value="" maxlength="255" required>
            </div>
            <div class="col-md-6">
              <label for="customer_last_name">Last Name</label>
              <input type="text" class="form-control" id="customer_last_name" value="" maxlength="255" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="customer_phone">Phone</label>
              <input type="number" class="form-control" id="customer_phone" min="600000000" max="999999999" required>
            </div>
            <div class="form-group col-md-6">
              <label for="customer_password">Password</label>
              <input type="password" class="form-control" id="customer_password" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="customer_email">Email</label>
              <input type="email" class="form-control" id="customer_email" maxlength="150" required>
            </div>
          </div>
          <div class="form-group">
            <label for="customer_address">Address</label>
            <input type="text" class="form-control" id="customer_address" placeholder="1234 Main St" maxlength="128" required>
          </div>
          <div class="form-group">
            <label for="customer_address_aux">Address 2</label>
            <input type="text" class="form-control" id="customer_address_aux" placeholder="Apartment, studio, or floor" maxlength="128">
          </div>
          <div class="form-row">
            <div class="form-group col-md-8">
              <label for="customer_state">State</label>
              <select id="customer_state" class="form-control">
                <option selected>Choose...</option>
                @foreach ($states as $state)
                  <option>{{$state->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="customer_zip">Zip</label>
              <input type="number" class="form-control" id="customer_zip" max="99999" required>
            </div>
          </div>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="gridCheck">
              <label class="form-check-label" for="gridCheck">
                Reset password at first login
              </label>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
      </div>
    </div>
  </div>
</div>
