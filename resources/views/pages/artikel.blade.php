@extends('layouts.app')

@section('title', 'Artikel - JAWARI')

@section('activeLink', 'Artikel')
@section('content')
    @livewire('components.header', [
        'title' => 'Artikel',
        'subtitle' => 'Berita dan informasi terkini seputar budaya Banten',
        'imgPath' => asset('assets/header-artikel.webp'),
    ])
    @livewire('artikel.content-artikel')

@endsection()
