@extends('layouts.master')

@section('content')

   
    <div class="col-md-8">
        <div class="row">
          <div class="col-12">
            {{-- Yield --}}
                <h4>Kategori</h4>

                <a href="/kategori/create" class="btn btn-primary mt-3 mb-3">Buat Kategori</a>

                
                    
                
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($kategori as $key => $item)
                      <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $item->nama_kategori }}</td>
                        <td>
                            <form action="/kategori/{{$item->id}}" method="POST">
                                <a href="/kategori/{{$item->id}}/edit" class="btn btn-warning">Edit</a>
                                    @csrf 
                                    @method('delete')
                                    <input type="submit" value="delete" class="btn btn-danger ">
                                </form>
                        </td>
                      </tr>
                      @empty
                      <h3>Data tidak ada</h3>
                          
                      @endforelse
                    </tbody>
                  </table>

               
                
                

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