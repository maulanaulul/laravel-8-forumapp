@extends('layouts.master')

@section('content')

   
    <div class="col-md-8">
        <div class="row">
          <div class="col-12">
            {{-- Yield --}}
                <h4 class="mb-3">Edit jawaban</h4>
                
                <form action="/jawaban/{{ $jawaban->id }}" method="POST">
                    @method('put')
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputEmail1">jawaban</label>
                        <input type="text" value="{{ $jawaban ->jawaban }}" class="form-control"  id="exampleInputEmail1" name="jawaban" aria-describedby="emailHelp" placeholder="Enter answer">
                        <input type="number" class="d-none" name="pertanyaan_id" value="{{ $jawaban->pertanyaan_id }}">
                      </div>
                    
                    <button type="submit" class="btn btn-primary">Update jawaban</button>
                </form>
                

            {{-- End Yield --}}
            </div>
        </div>
    </div>

      
      <div class="col-md-4  d-none d-md-block rounded">
        <div class="row">
         

        </div>
      </div>

    

    
@endsection