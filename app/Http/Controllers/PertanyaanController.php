<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Pertanyaan;
use App\Models\Jawaban;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        return view('pertanyaan.create', compact('profile', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->image){
        $imageName     =  time().'.'.$request->image->extension();
        $request->image->move(public_path('pertanyaan-images'), $imageName);

        $pertanyaan = new Pertanyaan;
 
        $pertanyaan->judul = $request->judul;
        $pertanyaan->pertanyaan = strip_tags($request->pertanyaan);
        $pertanyaan->image = $imageName;
        $pertanyaan->kategori_id = $request->kategori_id;
        $pertanyaan->user_id = $request->user_id;
        }
        else{
            $pertanyaan = new Pertanyaan;
 
        $pertanyaan->judul = $request->judul;
        $pertanyaan->pertanyaan = strip_tags($request->pertanyaan);
        $pertanyaan->image = '0';
        $pertanyaan->kategori_id = $request->kategori_id;
        $pertanyaan->user_id = $request->user_id;
        }

        
 
        $pertanyaan->save();
        return redirect('/')->with('success', 'Pertanyaan berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pertanyaan = Pertanyaan::find($id);
        $jawaban = Jawaban::all();

        return view('pertanyaan.show', compact('pertanyaan','jawaban'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pertanyaan = Pertanyaan::find($id);
        $kategori = DB::table('kategoris')->get();
        return view('pertanyaan.edit', compact('pertanyaan','kategori'));
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
        $pertanyaan= Pertanyaan::find($id);
 
        if($request->image){
            $imageName     =  time().'.'.$request->image->extension();
            $request->image->move(public_path('pertanyaan-images'), $imageName);
  
     
            $pertanyaan->judul = $request->judul;
            $pertanyaan->pertanyaan = strip_tags($request->pertanyaan);
            $pertanyaan->image = $imageName;
            $pertanyaan->kategori_id = $request->kategori_id;
            $pertanyaan->user_id = $request->user_id;
            }
            else{

     
            $pertanyaan->judul = $request->judul;
            $pertanyaan->pertanyaan = strip_tags($request->pertanyaan);
            $pertanyaan->kategori_id = $request->kategori_id;
            $pertanyaan->user_id = $request->user_id;
            }
        
        $pertanyaan->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pertanyaan = Pertanyaan::find($id);
 
        $pertanyaan->delete();

        return redirect('/');
    }
}
