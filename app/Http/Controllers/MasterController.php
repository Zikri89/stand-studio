<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\TireBrand;
use App\Models\TruckBrand;
use App\Models\TruckType;

class MasterController extends Controller
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
        return view('pages.master.master');
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
            'dataMaster' =>  'required',
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
            foreach($request->input('dataMaster') as $tierBrands){
                $result = TireBrand::create([
                    'brand' => strtoupper($tierBrands)
                ]);
            }

            return response()->json([
                'status'=>200,
                'title'=>'Add Tire Master',
                'message'=> 'Tire Brand master Added Successfully'
            ]);
        }
    }

    public function storeTruckBrand(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'dataMaster' =>  'required',
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
            foreach($request->input('dataMaster') as $tierBrands){
                $result = TruckBrand::create([
                    'name' => strtoupper($tierBrands)
                ]);
            }

            return response()->json([
                'status'=>200,
                'title'=>'Add Tire Master',
                'message'=> 'Truck Brand master Added Successfully'
            ]);
        }
    }

    public function storeTruckType(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'dataMaster' =>  'required',
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
            foreach($request->input('dataMaster') as $tierBrands){
                $result = TruckType::create([
                    'name' => strtoupper($tierBrands)
                ]);
            }

            return response()->json([
                'status'=>200,
                'title'=>'Add Tire Master',
                'message'=> 'Truck Type master Added Successfully'
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
