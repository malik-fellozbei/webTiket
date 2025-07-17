@extends('layouts.app')

@section('content')
<div class="bg-white">

    <x-navbar />

    @include('pages.home.section.hero')
    {{-- @include('pages.home.section.filter') --}}
    <livewire:show-events />
    @include('pages.home.section.ads')
    {{-- @include('pages.home.section.mediaPartner') --}}
    <hr class="opacity-20">
    {{-- @include('pages.home.section.article') --}}
    <livewire:show-posts />

    <x-footer />





</div>
@endsection
