<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class Groupscontroller extends Controller
{
    
    public function index()
    {
        
        $groups = Groups::orderBy('id', 'desc')->paginate(3);
        return view('groups.index', compact('groups'));
    }

    public function create()
    {
        
        return view('groups.create');
    }

    public function store(Request $request)
    {
        // validate the request...
        $request->validate([
            'namabarangk' => 'required|unique:groups|max:255',
            'jumlah' => 'required|numeric',
            'penerima' => 'required',
         
           
        ]);
        $groups = new Groups;
        
        $groups->namabarangk= $request->namabarangk;
        $groups->jumlah = $request->jumlah;
        $groups->penerima = $request->penerima;
        $groups->save();

        return redirect('/');
    }

    public function show($id)
    {
        $groups= Groups::where('id', $id)->first();
        return view ('groups.show', ['group' => $groups]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $groups= Groups::where('id', $id)->first();
        return view ('groups.edit', ['group' => $groups]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'namabarangk' => 'required|unique:groups|max:255',
            'jumlah' =>'required|numeric',
            'penerima' => 'required',
           
        ]);
        Groups::find($id)->update([
            'namabarangk' => $request->namabarangk,
            'jumlah' => $request->jumlah,
            'penerima' => $request->penerima,
           
        ]);

        return redirect ('/');
    }
    public function destroy($id)
    {
        Groups::find($id)->delete();
        return redirect ('/');
    }
}


