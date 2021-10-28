<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DataTables;
use Illuminate\Support\Str; 
class TrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.tracking.list');
    }

    public function createProduct(Request $request)
    {
        if ($request->ajax()) {
            $post = Product::join('truck_types', 'products.truckTypeId', '=' ,'truck_types.id')
            ->join('truck_brands', 'products.truckBrandId', '=' ,'truck_brands.id')
            ->join('tire_brands', 'products.brandId', '=' ,'tire_brands.id')
            ->select([
                'products.id as ids',
                'products.platNomor',
                'products.sertifikat',
                'products.speck',
                'products.safetyWarning',
                'products.pressureMax',
                'products.loadMax',
                'products.qty',
                'products.dateOrder',
                'truck_types.name as truckTypeName',
                'truck_brands.name',
                'tire_brands.brand',
            ]);

            //filter berdasarkan brand and plat nomor
            if($request->input('brand') && $request->input('platNomor')){
                $post->where('products.brandId',$request->input('brand'))
                ->where('products.platNomor',$request->input('platNomor'));
            }

            //filter berdasarkan brand
            if($request->input('brand')){
                $post->where('products.brandId',$request->input('brand'));
            }

            //filter berdasarkan plat nomor
            if($request->input('platNomor')){
                $post->where('products.platNomor',$request->input('platNomor'));
            }

            return DataTables::of($post)
            ->make(true);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
