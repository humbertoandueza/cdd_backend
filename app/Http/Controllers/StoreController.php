<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $stores = Store::all();
       return response()->json($stores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stores = Store::all();
        $numeros = [];
        foreach ($stores as $registro) {
            $cupones = explode(',', $registro->coupons);
            $numeros = array_merge($numeros, $cupones);
        }
        return response()->json(['count'=> count($numeros)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $store = new Store;
        $store->ci = $request->ci;
        $store->name = $request->name;
        $store->phone = $request->phone;
        $store->zone = $request->zone;
        $store->coupons = $request->coupons;
        $store->save();

        return response()->json($store);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $store = Store::find($id);
        return response()->json($store);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $store = Store::find($id);
        $store->ci = $request->ci;
        $store->name = $request->name;
        $store->phone = $request->phone;
        $store->zone = $request->zone;
        $store->coupons = $request->coupons;
        $store->save();
        return response()->json($store);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $store = Store::find($id);
        $store->delete();

        return response()->json(['message'=>'Eliminado con éxito']);
    }
}
