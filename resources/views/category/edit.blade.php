@extends('layouts.master')
@section('title')
    Edit  Kategori    
@endsection
@section('content')

<form method="POST" action="/category/{{ $category->id }}">
    @csrf
    @method('PUT')

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
      <input type="text" class="form-control" name="name" value="{{ $category->name}}">
    </div>
    <div class="mb-3">
      <label class="form-label">Category Description</label>
      <textarea name="description" class="form-control" id="" cols="30" rows="10">{{ $category->description }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>



@endsection