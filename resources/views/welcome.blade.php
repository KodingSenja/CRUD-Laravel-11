@extends('layouts.master')

@section('title')
Beranda    
@endsection


@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('danger'))
    <div class="alert alert-danger">
        {{ session('danger') }}
    </div>
@endif


@auth
    <h1>Selamat Datang {{ Auth()->user()->name }}
    @if (Auth()->user()->profile)
    ({{ Auth ()->user()->profile->age }} Tahun )        
    @else
        
    @endif
@endauth

    <ul>
        <li><a href="/about">About</a></li>
        <li><a href="/contact">Contact</a></li>
    </ul>

@endsection

