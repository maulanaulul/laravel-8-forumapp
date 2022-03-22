@extends('layouts.master')

@section('content')

@push('style')
<link href="{{ asset('nice-select2.css') }}">
@endpush

@push('script')
<script src="{{ asset('nice-select2.js') }}"></script>

  
        <script>
            NiceSelect.bind(document.getElementById("a-select"))
                    
        </script>
@endpush
   
    <div class="col-md-8">
        <div class="row">
          <div class="col-12">
            {{-- yield --}}
            <h2 class="mb-3">Buat pertanyaan</h2>
            <form action="/pertanyaan" method="POST" enctype="multipart/form-data">
                @csrf
             
                 <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Judul</strong>
                            <input type="text" name="judul" class="form-control" placeholder="judul">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Content:</strong>
                            <textarea id="mytextarea" class="form-control" style="height:150px" name="pertanyaan" placeholder="pertanyaan"></textarea>
                            
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Add image</strong>
                           <input type="file" class="form-control" name="image">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Pilih kategori</strong>
                            <select id="select" placeholder="Choose..." name="kategori_id" class="custom-select" id="inputGroupSelect01">
                                @forelse ($kategori as $item)
                                <option name="kategori_id" value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                @empty
                                <option name="kategori_id" value="">tidak ada</option>
                                @endforelse


                               
                                
                              
                              </select>

                        </div>
                    </div>

                    <input type="number" class="d-none" name="user_id" value="{{ Auth::user()->id }}">

                    

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
             
            </form>

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