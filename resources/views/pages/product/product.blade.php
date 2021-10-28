@extends('layouts.app')
@section('content')
<!-- MultiStep Form -->
<div class="card">
    <div class="card-body">
        <div class="">
            <div class="">
                <h2 class="card-title"><strong>Create New Data Tracking</strong></h2>
                <p>Fill all form field to go to next step</p>
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="truck"><strong>Truck</strong></li>
                                <li id="tire"><strong>Tire</strong></li>
                                <li id="order"><strong>Order</strong></li>
                            </ul>
                            <!-- fieldsets -->
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Truck Information</h2> 
                                    <div class="form-group">
                                        <label for="truckType">Jenis Mobil</label>
                                        <select name="truckType" class="form-control truckType"></select>
                                    </div>
                                    <div class="form-group">
                                        <label for="truckBrand">Merek Mobil</label>
                                        <select name="truckBrand" class="form-control truckBrand"></select>
                                    </div>
                                    <div class="form-group">
                                        <label for="platNomor">Plat Nomor</label>
                                        <input type="text" class="form-control platNomor" name="platNomor" placeholder="Plat Nomor" />
                                    </div>
                                </div> 
                                <input type="button" name="next" class="next action-button" value="Next Step" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Tire Information</h2>
                                    <div class="form-group">
                                        <label for="brand">Brand</label>
                                        <select name="brand" class="form-control brand"></select>
                                    </div>
                                    <div class="form-group">
                                        <label for="sertifikat">Sertifikat</label>
                                        <input type="text" class="form-control sertifikat" name="sertifikat" placeholder="Sertifikat" />
                                    </div>
                                    <div class="form-group">
                                        <label for="speck">speck</label>
                                        <input type="text" class="form-control speck" name="speck" placeholder="Spesifikasi" />
                                    </div>
                                    <div class="form-group">
                                        <label for="safetyWarning">Safety Warning</label>
                                        <input type="text" class="form-control" name="safetyWarning" placeholder="Peringatan Keamanan" />
                                    </div>
                                    <div class="form-group">
                                        <label for="pressureMax">Tekanan Maksimal</label>
                                        <input type="text" class="form-control" name="pressureMax" placeholder="Tekanan Maksimal" />
                                    </div>
                                    <div class="form-group">
                                        <label for="loadMax">Muatan Maksimal</label>
                                        <input type="text" class="form-control" name="loadMax" placeholder="Muatan Maksimal" />
                                    </div>
                                </div> 
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> <input type="button" name="next" class="next action-button" value="Next Step" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Order Information</h2>
                                    <div class="form-group">
                                        <label class="pay">Qty*</label>
                                        <input type="text" class="form-control" name="qty" placeholder="qty" />
                                    </div>
                                    <div class="form-group"> 
                                        <label class="pay">Tanggal Order*</label>
                                        <input type="text" class="form-control dateOrder" name="dateOrder" placeholder="Tanggal order"/>
                                    </div>
                                </div> 
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                <button type="submit" name="order" class="next action-button save-product-data">SUBMIT</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection