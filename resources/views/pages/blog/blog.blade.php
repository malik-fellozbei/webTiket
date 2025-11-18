@extends('layouts.app')

@section('content')

<x-navbar />

@include('pages.home.section.hero')


<div class="bg-white">

    <livewire:show-posts />

</div>


<x-footer />

@endsection
