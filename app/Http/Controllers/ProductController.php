<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'VAT' => 'boolean',
            'VAT_percentage' => 'numeric',
            // 'VAT_value' // calculated depending on percentage
            'paied_price' => 'required|numeric',
            'store_id' => 'required|exists:stores,id',
            'shipping_cost' => 'numeric',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        // $user = Auth::user();
        // dd($user);
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->name = $request->name;
        $product->name = $request->name;
     
        $product->save();
        return response()->json(["success" => "تم اضافة متجر لك"]);
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
