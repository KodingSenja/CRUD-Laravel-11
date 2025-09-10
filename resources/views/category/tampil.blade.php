@extends('layouts.master')
@section('title')
Tampil Kategori   
@endsection
@section('content')

@auth
  @if (Auth()->user()->role === 'admin')
    <a href="/category/create" class="btn btn-primary btn-lg my-2"> Tambah</a>
  @endif
@endauth


<table class="table">
  <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($categories as $item)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $item->name }}</td>
      <td>
        <form method="POST" action="/category/{{ $item->id }}">
        <a href="/category/{{ $item->id }}" class="btn btn-info btn-sm">Detail</a>

        @auth
        @if (Auth()->user()->role === 'admin')
          <a href="/category/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
              @csrf
              @method("DELETE")
              <input type="submit" value="Delete" class="btn btn-danger btn-sm">
          </form>
        @endif
        @endauth
      
      </td>
    </tr>
    @empty
    <h1>Belum ada postingan</h1>
    @endforelse
  </tbody>
</table>

@endsection