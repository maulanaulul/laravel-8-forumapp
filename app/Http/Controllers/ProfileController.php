<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.create');
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

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_lengkap' => 'required'
        ]);

        $imageName     =  time().'.'.$request->image->extension();
        $request->image->move(public_path('profile-images'), $imageName);

        $profile = new Profile;
 
        $profile->nama_lengkap = $request->nama_lengkap;
        $profile->email = $request->email;
        $profile->umur = $request->umur;
        $profile->alamat = $request->alamat;
        $profile->image = $imageName;
        $profile->user_id = $request->user_id;
 
        $profile->save();
        // dd($profile);
        return redirect('/');
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
    public function edit()
    {
        $profile = DB::table('profiles')->get();
        return view('profile.edit', compact('profile'));
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
        
        if($request->image){
            $imageName     =  time().'.'.$request->image->extension();
            $request->image->move(public_path('pertanyaan-images'), $imageName);
  
     
            $imageName     =  time().'.'.$request->image->extension();
            $request->image->move(public_path('profile-images'), $imageName);
    
            $profile = Profile::find($id);
     
            $profile->nama_lengkap = $request['nama_lengkap'];
            $profile->email = $request['email'];
            $profile->umur = $request['umur'];
            $profile->alamat = $request['alamat'];
            $profile->image = $imageName;
            }
            else{

                $profile = Profile::find($id);
         
                $profile->nama_lengkap = $request['nama_lengkap'];
                $profile->email = $request['email'];
                $profile->umur = $request['umur'];
                $profile->alamat = $request['alamat'];
              
            }


        
        $profile->save();
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
        //
    }
}
