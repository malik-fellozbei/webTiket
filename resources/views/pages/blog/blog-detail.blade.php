@extends('layouts.app')

@section('content')

<x-navbarBlack />

<div class="bg-white">

    <div class="py-28 article-content">
        @include('pages.blog.section.content')
    </div>

</div>


<x-footer />

@endsection
