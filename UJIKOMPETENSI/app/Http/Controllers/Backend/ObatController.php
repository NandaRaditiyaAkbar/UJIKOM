<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataobat = DB::table('obat')->get();
        // $dataobat = Obat::all();
        return view('backend/dataobat', compact('dataobat'));
    }

    public function tambahobat()
    {
        return view('backend/tambahobat');
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
        $obat = new Obat;
        $obat->nama_obat = $request->nama_obat;
        $obat->jml_obat = $request->jml_obat;
        $obat->hrg_obat = $request->hrg_obat;
        $obat->save();
        
        return redirect('dataobat');
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
        $dataobat = DB::table('obat')->where('id','=',$id)->first();
        // $dataobat = Obat::find($id);
        return view('backend/editobat', compact('dataobat'));
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
        $dataobat = DB::table('obat')->where('id','=',$id);
        $dataobat->update([
            'nama_obat'=>$request->nama_obat,
            'jml_obat'=>$request->jml_obat,
            'hrg_obat'=>$request->hrg_obat,
        ]);
        return redirect('dataobat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataobat = DB::table('obat')->where('id','=',$id);
        // $dataobat = Data::find($id);
        $dataobat->delete();
        return redirect()->back();
    }
}
