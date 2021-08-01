<?php

namespace App\Http\Controllers;

use App\Models\Friends;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class Cobacontroller extends Controller
{
    
    public function index()
    {
        
        $friends = Friends::orderBy('id', 'desc')->paginate(3);
        return view('friends.index', compact('friends'));
    }

    public function create()
    {
        
        return view('friends.create');
    }

    public function store(Request $request)
    {
        // validate the request...
        $request->validate([
            'namabarang' => 'required|unique:friends|max:255',
            'stock' => 'required|numeric',
          'keterangan' => 'required',
           'tanggal' => 'required|date',
           
        ]);
        $friends = new Friends;
        
        $friends->namabarng = $request->namabarang;
        $friends->stock = $request->stock;
        $friends->keterangan = $request->keterangan;
        $friends->tanggal = $request->tanggal;
        $friends->save();

        return redirect('/');
    }

    public function show($id)
    {
        $friends= Friends::where('id', $id)->first();
        return view ('friends.show', ['firend' => $friend]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $friends= Friends::where('id', $id)->first();
        return view ('friends.edit', ['friend' => $friends]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'namabarang' => 'required|unique:friends|max:255',
            'stock' =>'required|numeric',
            'keterangan' => 'required',
            'tanggal' => 'required|date',
        ]);
        Friends::find($id)->update([
            'namabarang' => $request->namabarang,
            'stock' => $request->stock,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
        ]);

        return redirect ('/');
    }
    public function destroy($id)
    {
        Friends::find($id)->delete();
        return redirect ('/');
    }
}


