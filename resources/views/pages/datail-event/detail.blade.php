@extends('layouts.app')

@section('content')
<div class="bg-white">

    <x-navbar />

    @include('pages.datail-event.section.content')
    @include('pages.datail-event.section.event')

    <x-footer />



    @stack('scripts')


</div>
@endsection
