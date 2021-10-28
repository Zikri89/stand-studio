@extends('layouts.app')
@section('content')
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Tracking Ban</h4>
      <form class="form-sample">
        <p class="card-description">
          Filter
        </p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Tier Brand</label>
              <div class="col-sm-9">
                <select class="form-control brand brand" name="brand"></select>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Plat Nomor</label>
              <div class="col-sm-9">
                <input type="text" class="form-control platNomor" name="platNomor" />
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Show Result Data Tracking Ban</h4>
      <div class="table-responsive">
        <table class="table table-striped tableTracking">
          <thead>
            <tr>
              <th>Truck Type</th>
              <th>Truck Brand</th>
              <th>Tire Brand</th>
              <th>Plat Nomor</th>
              <th>Qty</th>
              <th>Date Order</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
          <tfoot>
            <tr>
                <th colspan="4" style="text-align:right">Total:</th>
                <th></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection