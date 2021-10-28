<?php

namespace App\Http\Controllers;

use App\Models\TruckType;
use App\Models\TruckBrand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\TireBrand;
use DataTables;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.product.product');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create(Request $request)
    {
        $title = "Data Product";
        return view('pages.product.list', compact('title'));
    }

    public function createProduct(Request $request)
    {
        $data = Product::join('truck_types', 'products.truckTypeId', '=' ,'truck_types.id')
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
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = '<a href="/edit/product/'.$row->ids.'" class="edit btn btn-success btn-sm">Edit</a><a href="#delete" data-ids = "'.$row->ids.'" class="delete-product-data btn btn-danger btn-sm">Delete</a>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    
     public function createTruckTypeJson(Request $request)
    {
        $term = trim($request->q);
        $truck = TruckType::where('name','LIKE',"%{$term}%")->limit(10)->get();
        $formatted_truck = [];
        foreach ($truck as $truck) {
            $formatted_truck[] = ['id' => $truck->id, 'text' => $truck->name];
        }

        return response()->json($formatted_truck);
    }

    public function createTruckBrandJson(Request $request)
    {
        $term = trim($request->q);
        $truck = TruckBrand::where('name','LIKE',"%{$term}%")->limit(10)->get();
        $formatted_truck = [];
        foreach ($truck as $truck) {
            $formatted_truck[] = ['id' => $truck->id, 'text' => $truck->name];
        }

        return response()->json($formatted_truck);

    }

    public function createBrandJson(Request $request)
    {
        $term = trim($request->q);
        $tire = TireBrand::where('brand','LIKE',"%{$term}%")->limit(10)->get();
        $formatted_tire = [];
        foreach ($tire as $tire) {
            $formatted_tire[] = ['id' => $tire->id, 'text' => $tire->brand];
        }

        return response()->json($formatted_tire);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'truckType'     =>  'required',
            'truckBrand'    =>  'required',
            'platNomor'     =>  'required',
            'brand'         =>  'required',
            'sertifikat'   =>  'required',
            'speck'         =>  'required',
            'safetyWarning' =>  'required',
            'pressureMax'   =>  'required',
            'loadMax'       =>  'required',
            'qty'           =>  'required',
            'dateOrder'     =>  'required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $product = new Product;
            //truck information
            $product->truckTypeId   = $request->input('truckType');
            $product->truckBrandId  = $request->input('truckBrand');
            $product->platNomor     = $request->input('platNomor');

            //tire information
            $product->brandId       = $request->input('brand');
            $product->sertifikat    = $request->input('sertifikat');
            $product->speck         = $request->input('speck');
            $product->safetyWarning = $request->input('safetyWarning');
            $product->pressureMax   = $request->input('pressureMax');
            $product->loadMax       = $request->input('loadMax');

            //order information
            $product->qty       = $request->input('qty');
            $product->dateOrder = $request->input('dateOrder');
            $product->save();
            
            return response()->json([
                'status'=>200,
                'data'=>'Add Product',
                'message'=>'Product Added Successfully.'
            ]);
        }
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
        $data = Product::join('truck_types', 'products.truckTypeId', '=' ,'truck_types.id')
        ->join('truck_brands', 'products.truckBrandId', '=' ,'truck_brands.id')
        ->join('tire_brands', 'products.brandId', '=' ,'tire_brands.id')
        ->select([
            'products.id as ids',
            'products.truckTypeId',
            'products.truckBrandId',
            'products.brandId',
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
        ])
        ->where('products.id',$id)
        ->first();
        $title = "Edit Data Product";
        return view('pages.product.edit', compact('title','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'truckType'     =>  'required',
            'truckBrand'    =>  'required',
            'platNomor'     =>  'required',
            'brand'         =>  'required',
            'sertifikat'   =>  'required',
            'speck'         =>  'required',
            'safetyWarning' =>  'required',
            'pressureMax'   =>  'required',
            'loadMax'       =>  'required',
            'qty'           =>  'required',
            'dateOrder'     =>  'required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $product = Product::where(['id' => $request->input('ids')])->update([
                'truckTypeId' => $request->input('truckType'),
                'truckBrandId' => $request->input('truckBrand'),
                'platNomor' => $request->input('platNomor'),
                'brandId' => $request->input('brand'),
                'sertifikat' => $request->input('sertifikat'),
                'speck' => $request->input('speck'),
                'safetyWarning' => $request->input('safetyWarning'),
                'pressureMax' => $request->input('pressureMax'),
                'loadMax' => $request->input('loadMax'),
                'qty' => $request->input('qty'),
                'dateOrder' => $request->input('dateOrder'),
            ]);
            
            return response()->json([
                'status'=>200,
                'data'=>'Add Product',
                'message'=>'Product Updated Successfully.'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ids = $request->ids;
        Product::destroy($ids);
        return response()->json([
            'status'=>200,
            'data'=>'Delete Product',
            'message'=>'Product Deleted Successfully.'
        ]);
    }
}
