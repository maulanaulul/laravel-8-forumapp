@extends('layouts.master')

@section('content')

   
    <div class="col-md-8">
        <div class="row">
          <div class="col-12">
            {{-- Yield --}}
                <h4 class="mb-3">Edit Kategori</h4>
                
                <form action="/kategori/{{ $kategori->id }}" method="POST">
                    @method('put')
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Kategori</label>
                        <input type="text" value="{{ $kategori ->nama_kategori }}" class="form-control"  id="exampleInputEmail1" name="nama_kategori" aria-describedby="emailHelp" placeholder="Enter category">
                        
                      </div>
                    
                    <button type="submit" class="btn btn-primary">Update Kategori</button>
                </form>
                

            {{-- End Yield --}}
            </div>
        </div>
    </div>

      
      <div class="col-md-4  d-none d-md-block rounded">
        <div class="row">
          {{-- SHow Profile --}}
          @foreach ($profile as $item)
          @if ($item->user_id == Auth::user()->id )
              
          <div class="col-12 bg-white">
              <h3 class="text-center mt-3 text-primary"><strong>{{ $item->nama_lengkap }}</strong></h3>
              <img src="{{ asset('profile-images/'. $item->image) }}"  alt="" class="mt-3" style="margin-left: auto; margin-right:auto; display:block; border-radius: 50%; height:70px">
              <h5 class="text-center mt-3">Email : {{ Auth::user()->email }}</h5>
              <h5 class="text-center mt-2">alamat : {{ Auth::user()->profile->alamat }}</h5>
              <h5 class="text-center mt-2">umur : {{ Auth::user()->profile->umur }}</h5>
          </div>
          @endif
          @endforeach
          {{-- end show profile --}}

          {{-- Kategori --}}
          <div class="col-12 bg-white mt-3">

            <h4 class="mt-3 text-center text-primary">kategori</h4>
            @forelse ($kategoriAll as $item)
                <p class="mt-2 ml-3"><a href="/kategori/{{ $item->id }}">#{{ $item->nama_kategori }}</a></p>
            @empty
                tidak ada kategori
            @endforelse
            
          </div>


           {{-- ALl member --}}
          
           <div class="col-12 mt-3 bg-white">
            <h4 class="text-center mt-3 text-primary"><strong>All member</strong></h3>
              @foreach ($profile as $profil)
            <div class="member ml-3 mt-3 d-flex" style="border-radius: 20px; background-color:#d1d7ee">
                <img src="{{ asset('profile-images/'.$profil->image) }}" alt="" style="height:30px; width:auto; border-radius:50%; margin:5px">
                <h5 class="d-block my-auto ml-3">{{ $profil->nama_lengkap }}</h5>
            </div>
            @endforeach
          </div>
          
          {{-- end all member --}}

        </div>
      </div>

    

    
@endsection