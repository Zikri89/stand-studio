@extends('layouts.app')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Add Tire Master</h4>
        <form class="tire-master-brand-form">
            <div class="form-group">
                <label for="tire-brand">Brand</label>
                <select class="form-control tireBrand" name="tireBrand" id="tireBrand" multiple="multiple" data-placeholder="Tambah Tier Brand"></select>
                <p class="card-description">Pisahkan tag dengan tanda ","</p>
            </div>
            <button type="submit" class="btn btn-primary mr-2 submit" id="save-tire-master">Submit</button>
        </form>
        </div>
    </div>
</div>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Add Truck Brand Master</h4>
        <form class="forms-sample">
            <div class="form-group">
                <label for="truck-brand">Brand</label>
                <select class="form-control truckBrand" name="truckBrand" id="truckBrand" multiple="multiple" data-placeholder="Tambah Truck Brand"></select>
                <p class="card-description">Pisahkan tag dengan tanda ","</p>
            </div>
            <button type="submit" class="btn btn-primary mr-2 submit" id="save-truck-brand">Submit</button>
        </form>
        </div>
    </div>
</div>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Add Truck Type Master</h4>
        <form class="forms-sample">
            <div class="form-group">
                <label for="truck-type">Type</label>
                <select class="form-control truckType" name="truckType" id="truckType" multiple="multiple" data-placeholder="Tambah Truck Type"></select>
                <p class="card-description">Pisahkan tag dengan tanda ","</p>
            </div>
            <button type="submit" class="btn btn-primary mr-2 submit" id="save-truck-type">Submit</button>
        </form>
        </div>
    </div>
</div>
@endsection