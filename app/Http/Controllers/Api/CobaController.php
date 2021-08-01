<?php

namespace App\Http\Controllers\Api;

Use App\Models\Friends;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CobaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $friends = Friends::all();

        return response()->json([
            'success' => true,
            'message' => 'Data Barang',
            'data'    => $friends
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
            'namabarang' => 'required|unique:friends|max:255',
            'stock' => 'required|numeric',
          'keterangan' => 'required',
           'tanggal' => 'required|date',
           
            

        ]);

        $friends = Friends::create([
        
       'namabarang' => $request->namabarang,
       'stock' => $request->stock,
       'keterangan' => $request->keterangan,
       'tanggal' => $request->tanggal,


        ]);
       if($friends){
           return response()->json([
            'success' => true,
            'message' => 'data berhasil ditambahkan',
            'data' => $friends
           ], 200);
       }else{
        return response()->json([
            'success' => false,
            'message' => 'data gagal ditambahkan',
            'data' => $friends
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
        $friends = Friends::all();

        return response()->json([
            'success' => true,
            'message' => 'Detail Data ',
            'data'    => $friends
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
        $friend = Friends::with('friends')->where('id', $id)->first();

    return response()->json([
        'success' => true,
        'message' => 'Edit Barang',
        'data'    => $friend
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
            'namabarang' => 'required|unique:friends|max:255',
            'stock' => 'required|numeric',
          'keterangan' => 'required',
           'tanggal' => 'required|date',
         
        ]);
        $fr = Friends::find($id)
        ->update([
            'namabarang' => $request->namabarang,
            'stock' => $request->stock,
            'keterangan' => $request->keterangan, 
            'tanggal' => $request->tanggal, 
        ]);
        return response()->json([
            'success' =>true,
            'message' =>'Data Barang Berhasil Diubah',
            'data' => $fr
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
        $cek = Friends::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Di Hapus',
            'data'    => $cek
        ], 200);
    }
}
