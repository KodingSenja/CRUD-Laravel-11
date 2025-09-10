@extends('layouts.master')
@section('title')
Tambah  Kategori    
@endsection
@section('content')

<form method="POST" action="/category">
    @csrf

    {{-- validation --}}

    @if ($errors->any())
     <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
     </div>
    @endif
    
    {{-- akhir validation --}}

    <div class="mb-3">
      <label class="form-label">Category Name</label>
      <input type="text" class="form-control" name="name">
    </div>
    <div class="mb-3">
      <label class="form-label">Category Description</label>
      <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>



@endsection