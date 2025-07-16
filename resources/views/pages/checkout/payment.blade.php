@extends('layouts.app')

@section('content')
<div class="bg-white">

    <x-navbarBlack />

    <div class="py-28">
        @include('pages.checkout.section.content')
    </div>

    <x-footer />





</div>
@endsection
