@extends('layouts.app')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">{{$title}}</h4>
        <div class="table-responsive">
          <table class="table table-striped tableProduct">
            <thead>
              <tr>
                <th>Truck Type</th>
                <th>Truck Brand</th>
                <th>Tire Brand</th>
                <th>Plat Nomor</th>
                <th>Sertifricate</th>
                <th>Speck</th>
                <th>Qty</th>
                <th>Deskripsion</th>
                <th>Date Order</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection