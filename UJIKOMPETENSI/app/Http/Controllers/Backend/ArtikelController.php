<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataartikel = DB::table('tb_artikel')->where('user_id','=',Auth::user()->id)->get();
        // $dataartikel = Obat::all();
        // dd($dataartikel);
        return view('backend/dataartikel', compact('dataartikel'));
    }

    public function tambahartikel()
    {
        return view('backend/tambahartikel');
    }
    public function daftarartikel()
    {
        $dataartikel = DB::table('tb_artikel')->join('users','tb_artikel.user_id','users.id')->get();
        // $dataartikel = Obat::all();
        // dd($dataartikel);
        return view('backend/daftarartikel', compact('dataartikel'));
    }

    public function artikel()
    {
        $dataartikel = DB::table('tb_artikel')->join('users','tb_artikel.user_id','users.id')->select('tb_artikel.id as id_artikel','users.id as id_user', 'tb_artikel.isi_artikel','tb_artikel.judul_artikel')->get();
        // $dataartikel = Obat::all();
        // dd($dataartikel);
        return view('frontend/artikel', compact('dataartikel'));
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
        $artikel = new Artikel;
        $artikel->judul_artikel = $request->judul_artikel;
        $artikel->isi_artikel = $request->isi_artikel;
        $artikel->tanggal = $request->tanggal;
        $artikel->user_id = Auth::user()->id;
        $artikel->save();
        
        return redirect('dataartikel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail_artikel = DB::table('tb_artikel')->join('users','tb_artikel.user_id','users.id')->where('tb_artikel.id','=',$id)->select('tb_artikel.id as id_artikel','tb_artikel.judul_artikel','tb_artikel.isi_artikel','users.username','users.id as id_user')->first();
        // dd($detail_artikel);
        return view('frontend/detailartikel', compact('detail_artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataartikel = DB::table('tb_artikel')->where('id','=',$id)->where('user_id','=',Auth::user()->id)->first();
        // $dataartikel = Obat::find($id);
        return view('backend/editartikel', compact('dataartikel'));
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
        $dataartikel = DB::table('tb_artikel')->where('id','=',$id)->where('user_id','=',Auth::user()->id);
        $dataartikel->update([
            'judul_artikel'=>$request->judul_artikel,
            'isi_artikel'=>$request->isi_artikel,
            'tanggal'=>$request->tanggal,
        ]);
        return redirect('dataartikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataartikel = DB::table('tb_artikel')->where('id','=',$id)->where('user_id','=',Auth::user()->id);
        // $dataartikel = Data::find($id);
        $dataartikel->delete();
        return redirect()->back();
    }
}
