@extends('layouts.master')

@section('content')


   
    <div class="col-md-8">
        <div class="row">
          <div class="col-12">
            {{-- yield --}}

            
                
            
        
            {{-- question --}}
            <div class="question p-3 bg-white mt-4 mr-md-5" style="border-radius:10px">
                <h3>{{ $pertanyaan->judul }}</h3>
                {{-- profile --}}
                <div class="profile mt-3 d-flex justify-content-between">
                    <div class="left d-flex">
                        <img src="{{ asset('profile-images/'.$pertanyaan->user->profile->image) }}" alt="" style="height:30px; width:auto; border-radius:50%; margin:5px">
                        <p class="ml-2 d-block my-auto"><strong>{{ $pertanyaan->user->profile->nama_lengkap }}</strong></p>
                    </div>
                    <div class="right">
                        <div class="kategori px-4 py-1" style="background-color: rgb(235, 233, 141); border-radius:10px">
                            <p class="d-block my-auto"><strong>{{ $pertanyaan->kategori->nama_kategori }}</strong></p>
                        </div>
                    </div>
                </div>
                {{-- end profile --}}
                {{-- content --}}
                <div class="mt-3">
                    {{ $pertanyaan->pertanyaan }}
                </div>

                @if ($pertanyaan->image !="0")
                <img  src="{{ asset('pertanyaan-images/'.$pertanyaan->image) }}" alt="" style="height:80%; width:100%; border-radius:10px; margin:5px">
                @endif
                
                <p></p>
                {{-- end content --}}
        
                {{-- Jawaban --}}
                <div class="section d-flex">
                    {{-- <div class="komentar p-1 mr-3" style="background-color: rgb(235, 233, 141); border-radius:10px">
                        <p class="d-block  my-auto"><strong>jawaban (0)</strong></p>
                    </div> --}}
                    @if (Auth::user()->id == $pertanyaan->user_id)
                        <form action="/pertanyaan/{{$pertanyaan->id}}" method="POST">
                        <a href="/pertanyaan/{{$pertanyaan->id}}/edit" style="border: none; background-color:rgb(235, 233, 141); color:black; border-radius:10px; height:40px; padding:10px" class="">Edit</a>
                            @csrf 
                            @method('delete')
                            <input type="submit" value="delete" class=" " style="border: none; background-color:rgb(235, 233, 141); color:black; border-radius:10px; height:40px" >
                        </form>


                        {{-- <div class="komentar p-1" style="background-color: rgb(235, 233, 141); border-radius:10px">
                            <a href="/pertanyaan/{{$pertanyaan->id}}/edit" style="color:black"><p class="d-block my-auto"><strong>Edit</strong></p></a>
                        </div>

                        <div class="komentar p-1 ml-3" style="background-color: rgb(235, 233, 141); border-radius:10px">
                            <a href="/pertanyaan/{{$pertanyaan->id}}" style="color:black"><p class="d-block my-auto"><strong>Delete</strong></p></a>
                        </div> --}}
                    @endif
                   
                </div>
            </div>

            {{-- Jawaban --}}
                <div class="jawaban-outer p-3 bg-white mt-4 mr-md-5" style="border-radius:10px">
                    @forelse ($jawaban as $item)
                        {{-- profile --}}
                @if ($item->pertanyaan_id == $pertanyaan->id)
                    @if ($item)
                    <div class="jawaban">
                        <div class="profile m-3 p-1 justify-content-between" style="background-color: rgba(247, 223, 162, 0.856); border-radius:10px">
                            <div class="left d-flex">
                                <img src="{{ asset('profile-images/'.$item->user->profile->image) }}" alt="" style="height:30px; width:auto; border-radius:50%; margin:5px">
                                <p class="ml-2 d-block my-auto"><strong>{{ $item->user->profile->nama_lengkap }}</strong></p>
                                
                            </div>
    
                            <p class="mt-3 ml-4 mb-3">{{ $item->jawaban }}</p>

                            @if (Auth::user()->id == $item->user_id)
                            <form action="/jawaban/{{$item->id}}" method="POST">
                            <a href="/jawaban/{{$item->id}}/edit" style="border: none; background-color:rgb(235, 233, 141); color:black; border-radius:10px; height:40px; padding:10px" class="">Edit</a>
                                @csrf 
                                @method('delete')
                                <input type="submit" value="delete" class=" " style="border: none; background-color:rgb(235, 233, 141); color:black; border-radius:10px; height:40px" >
                            </form>
    
    
                            {{-- <div class="komentar p-1" style="background-color: rgb(235, 233, 141); border-radius:10px">
                                <a href="/pertanyaan/{{$pertanyaan->id}}/edit" style="color:black"><p class="d-block my-auto"><strong>Edit</strong></p></a>
                            </div>
    
                            <div class="komentar p-1 ml-3" style="background-color: rgb(235, 233, 141); border-radius:10px">
                                <a href="/pertanyaan/{{$pertanyaan->id}}" style="color:black"><p class="d-block my-auto"><strong>Delete</strong></p></a>
                            </div> --}}
                        @endif
                            
                        </div>
                    </div>
                    @else
                        <p>Tidak ada jawaban</p>
                    @endif
                
                
                @endif
                {{-- end profile --}}
                    @empty
                        <p class="text-center">Tidak ada Jawaban</p> 
                    @endforelse

                   
                        <form action="/jawaban" method="POST">
                            @csrf
                            <input type="number" value="{{ $pertanyaan->id }}" name="pertanyaan_id" class="d-none">
                            <input type="number" value="{{ Auth::user()->id }}" name="user_id" class="d-none">
                            <div class="input-group mt-3 mb-3">
                            <input type="text" name="jawaban" class="form-control" placeholder="Jawab Pertanyaan">
                            
                            <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Jawab</button>
                            </div>
                            </div>
                        </form>
                    
                </div>
            {{-- End JAwaban --}}

            {{-- buat jawaban --}}
                
            {{-- End buat jawaban --}}


            
            {{-- End question --}}

            {{-- end yield --}}
        
            
          </div>
        </div>
      </div>
    {{-- End content field --}}

      
      <div class="col-md-4  d-none d-md-block rounded">
        <div class="row">
          {{-- SHow Profile --}}
          

        </div>
      </div>

    

    
@endsection