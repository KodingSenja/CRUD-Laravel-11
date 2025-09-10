@extends('layouts.master')
@section('title')
Contact   
@endsection
@section('content')
    <form action="welcome" method="POST">
        @csrf
        <label> Nama : </label>
        <input type="text" name="nama"><br><br>
        <label>jurusan : </label>
        <input type="text" name="jurusan"><br><br>
        <label>alamat</label><br>
        <textarea name="alamat" cols="30" rows="10"></textarea><br>
        <input type="submit" value="kirim">
    </form>
@endsection