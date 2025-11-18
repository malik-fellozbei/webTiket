@extends('layouts.app')

@section('content')
<div class="bg-white">

    <x-navbarBlack />

    <div class="pt-28">
        @include('pages.myticket.section.detail-ticket-owner')
    </div>


    <x-footer />

</div>
@endsection
