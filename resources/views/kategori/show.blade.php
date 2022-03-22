@extends('layouts.master')

@section('content')

   
    <div class="col-md-8">
        <div class="row">
          <div class="col-12">
            <h4>#{{ $kategori->nama_kategori }}</h4>

            @forelse ($pertanyaan as $item)
            @if ($item->kategori_id == $kategori->id)
                
            
                
            
        
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
            @endif
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
          

        </div>
      </div>

    

    
@endsection