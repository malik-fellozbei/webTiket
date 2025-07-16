@extends('layouts.app')

@section('content')
<div class="bg-white">

    <x-navbar />

    @include('pages.event.section.hero')
    @include('pages.event.section.filter')
    <livewire:show-events />

    <x-footer />





</div>
@endsection
