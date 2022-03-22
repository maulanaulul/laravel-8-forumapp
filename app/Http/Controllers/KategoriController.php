<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Kategori;
use App\Models\Pertanyaan;
use App\Models\Profile;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = DB::table('profiles')->get();
        $kategori = DB::table('kategoris')->get();
        return view('kategori.index', compact('profile','kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profile = DB::table('profiles')->get();
        $kategori = DB::table('kategoris')->get();
        return view('kategori.create', compact('profile', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategori = new Kategori;
 
        $kategori->nama_kategori = $request->nama_kategori;
 
        $kategori->save();
        return redirect('/kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = Kategori::find($id);
        $pertanyaan = Pertanyaan::all();
        $profile = Profile::all();

        return view('kategori.show', compact('kategori','pertanyaan','profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::find($id);
        $kategoriAll = DB::table('kategoris')->get();
        $profile = DB::table('profiles')->get();

        return view('kategori.edit', compact('kategori','profile','kategoriAll'));
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
        $kategori= Kategori::find($id);
 
        $kategori->nama_kategori = $request['nama_kategori'];
        
        $kategori->save();
        return redirect('/kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
 
        $kategori->delete();

        return redirect('/kategori');
    }
}
