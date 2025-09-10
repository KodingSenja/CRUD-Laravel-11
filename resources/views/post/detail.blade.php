@extends('layouts.master')
@section('title')
Detail  Postingan    
@endsection
@section('content')

{{-- menampilkan gambar --}}
<img src="{{ asset('image/'.$post->image) }}" width="100%" height="500px">
{{-- menampilkan judul --}}
<h1 class="text-primary">{{ $post->title }}</h1>
{{-- menampilkan artikel --}}
<p class="text-succes">{{ $post->content }}</p>

<a href="/post" class="btn btn-success btn-lg">Kembali</a>

@endsection