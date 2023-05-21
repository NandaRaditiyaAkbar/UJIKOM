<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KomentarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftarkomentar = DB::table('tb_detail')->join('tb_artikel','tb_detail.id_artikel','tb_artikel.id')->join('tb_komentar','tb_detail.id_komentar','tb_komentar.id')->join('users','tb_artikel.user_id','users.id')->get();
        // $daftarkomentar = Obat::all();
        // dd($daftarkomentar);
        return view('backend/daftarkomentar', compact('daftarkomentar'));
    }

    public function komentarpenulis(){
        $daftarkomentar = DB::table('tb_detail')->join('tb_artikel','tb_detail.id_artikel','tb_artikel.id')->join('tb_komentar','tb_detail.id_komentar','tb_komentar.id')->join('users','tb_artikel.user_id','users.id')->where('users.id','=',Auth::user()->id)->get();
        // $dataartikel = Obat::all();
        // dd($dataartikel);
        return view('backend/daftarkomentar', compact('daftarkomentar'));
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
        $komentar = new Komentar;
        $komentar->nama = $request->nama;
        $komentar->isi_komentar = $request->isi_komentar;
        $komentar->email = $request->email;
        $komentar->save();
        
        $detail = new Detail;
        $detail->id_artikel = $request->id_artikel;
        $detail->id_komentar = $komentar->id;
        $detail->save();
        
        return redirect()->back();
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
        $daftarkomentar = DB::table('tb_komentar')->where('id','=',$id);
        // $dataartikel = Data::find($id);
        $daftarkomentar->delete();
        return redirect()->back();
    }
}
