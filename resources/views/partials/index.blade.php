@extends('layouts.master')

@section('content')

   
    <div class="col-md-8">
        <div class="row">
          <div class="col-12">
            <div class="new-post d-flex justify-content-between p-2 mr-md-5" style="background-color: #ffff; border-radius:10px">
                <h4 class="d-block my-auto ml-2">Create new question</h4>
                <a class="mr-3" href="/pertanyaan/create"><button style="background-color: rgb(107, 107, 255); color:white; border:none; border-radius:10px; width:120%; height:100%">Create</button></a>
                {{-- <a href="" class="btn">Create</a> --}}
            </div>

            @forelse ($pertanyaan as $item)
                
            
        
            {{-- question --}}
            <div class="question p-3 bg-white mt-4 mr-md-5" style="border-radius:10px">
                <h3>{{ $item->judul }}</h3>
                {{-- profile --}}
                <div class="profile mt-3 d-flex justify-content-between">
                    <div class="left d-flex">
                        <img src="{{ asset('profile-images/'.$item->user->profile->image) }}" alt="" style="height:30px; width:auto; border-radius:50%; margin:5px">
                        <p class="ml-2 d-block my-auto"><strong>{{ $item->user->profile->nama_lengkap }}</strong></p>
                    </div>
                    <div class="right">
                        <div class="kategori px-4 py-1" style="background-color: rgb(235, 233, 141); border-radius:10px">
                            <p class="d-block my-auto"><strong>{{ $item->kategori->nama_kategori }}</strong></p>
                        </div>
                    </div>
                </div>
                {{-- end profile --}}
                {{-- content --}}
                <div class="mt-3">
                    {{ $item->pertanyaan }}
                </div>

                @if ($item->image !="0")
                <img  src="{{ asset('pertanyaan-images/'.$item->image) }}" alt="" style="height:80%; width:100%; border-radius:10px; margin:5px">
                @endif
                
                <p></p>
                {{-- end content --}}
        
                {{-- Jawaban --}}
                <div class="section d-flex">
                    {{-- <div class="komentar p-1 mr-3" style="background-color: rgb(235, 233, 141); border-radius:10px">
                        <p class="d-block my-auto"><strong>jawaban (0)</strong></p>
                    </div> --}}
        
                    <div class="komentar p-1" style="background-color: rgb(235, 233, 141); border-radius:10px">
                        <a href="/pertanyaan/{{$item->id}}" style="color:black"><p class="d-block my-auto"><strong>Beri jawaban</strong></p></a>
                    </div>

                    <div class="komentar p-1 ml-3" style="background-color: rgb(235, 233, 141); border-radius:10px">
                        <a href="/pertanyaan/{{$item->id}}" style="color:black"><p class="d-block my-auto"><strong>Detail</strong></p></a>
                    </div>
                </div>
            </div>
            @empty
                Tidak ada pertanyaan
            @endforelse
            {{-- End question --}}
          </div>
        </div>
      </div>
    {{-- End content field --}}

    
        {{-- <h4>{{ $pertanyaan1->user->profile->nama_lengkap }}</h4> --}}
       
        {{-- @foreach ($pertanyaan->user as $users)
            {{ $users }}
        @endforeach
    --}}



    {{-- @foreach ($profile as $profiles)
        @foreach ($profiles->user as $users)
            {{ $users->email }}
        @endforeach
    @endforeach --}}
    {{-- @foreach ($profile as $item)
        {{ $item->user->email }}
    @endforeach --}}

      
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
             @forelse ($kategori as $item)
                <p class="mt-2 ml-3"><a href="/kategori/{{ $item->id }}">#{{ $item->nama_kategori }}</a></p>
            @empty
                tidak ada kategori
            @endforelse
          </div>


          {{-- ALl member --}}
         
          <div class="col-12 mt-3 bg-white">
            <h4 class="text-center mt-3 text-primary"><strong>All member</strong></h3>
                @foreach ($profile as $profil)
            <div class="member ml-3 mb-2 mt-3 d-flex" style="border-radius: 20px; background-color:#d1d7ee">
                <img src="{{ asset('profile-images/'.$profil->image) }}" alt="" style="height:30px; width:40px; border-radius:50%; margin:5px">
                <h5 class="d-block my-auto ml-3">{{ $profil->nama_lengkap }}</h5>
            </div>
            @endforeach
          </div>
          
          {{-- end all member --}}

        </div>
      </div>

    

    
@endsection