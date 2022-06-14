<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = app('firebase.firestore')->database()->collection('products')->documents();

        return view('admin.products.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $data = app('firebase.firestore')->database()->collection('products')->newDocument();
        $data->set([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'kategori' => $request->kategori,
            'tipe'    => $request->tipe
        ]);
        return redirect()->route('product.index');
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
        $data = app('firebase.firestore')->database()->collection('products')->document($request->id_update)
            ->update([
                ['path' => 'nama', 'value' => $request->nama_update],
                ['path' => 'harga', 'value' => $request->harga_update],
                ['path' => 'kategori', 'value' => $request->kategori_update],
                ['path' => 'tipe', 'value' => $request->tipe_update]
            ]);

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $data = app('firebase.firestore')->database()->collection('products')->document($request->id_delete)->delete();
        return redirect()->route('product.index');
    }

    public function getProduk(Request $request)
    {
        $data = app('firebase.firestore')->database()->collection('products')->document($request->id)->snapshot()->data();

        return response()->json(['data' => $data], 200);
    }
}
