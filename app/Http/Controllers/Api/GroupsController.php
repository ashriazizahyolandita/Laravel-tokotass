<?php

namespace App\Http\Controllers\Api;

Use App\Models\Groups;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Groups::all();

        return response()->json([
            'success' => true,
            'message' => 'Data Barang',
            'data'    => $groups
        ], 200);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'namabarangk' => 'required|unique:groups|max:255',
            'jumlah' => 'required|numeric',
          'penerima' => 'required',

        ]);

        $groups = Groups::create([
        
       'namabarangk' => $request->namabarangk,
       'jumlah' => $request->jumlah,
       'penerima' => $request->penerima,


        ]);
       if($groups){
           return response()->json([
            'success' => true,
            'message' => 'data berhasil ditambahkan',
            'data' => $groups
           ], 200);
       }else{
        return response()->json([
            'success' => false,
            'message' => 'data gagal ditambahkan',
            'data' => $groups
        ], 409);

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
        $groups = Groups::all();

        return response()->json([
            'success' => true,
            'message' => 'Detail Data ',
            'data'    => $groups
        ], 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $group = Groups::with('groups')->where('id', $id)->first();

    return response()->json([
        'success' => true,
        'message' => 'Edit Barang',
        'data'    => $group
    ], 200);
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
        $request->validate([
            'namabarangk' => 'required|unique:groups|max:255',
            'jumlah' => 'required|numeric',
          'penerima' => 'required',

         
        ]);
        $gr = Groups::find($id)
        ->update([
            'namabarangk' => $request->namabarangk,
            'jumlah' => $request->jumlah,
            'penerima' => $request->penerima, 
          
        ]);
        return response()->json([
            'success' =>true,
            'message' =>'Data Barang Berhasil Diubah',
            'data' => $gr
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cek = Groups::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Di Hapus',
            'data'    => $cek
        ], 200);
    }
}
