@extends('layouts.master')
@section('title')
Buat Profile   
@endsection
@section('content')

<form method="POST" action="/profile">
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
      <label class="form-label">Age</label>
      <input type="text" class="form-control" name="age">
    </div>
    <div class="mb-3">
      <label class="form-label">Bio</label>
      <textarea name="bio" class="form-control" id="" cols="30" rows="10"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>



@endsection