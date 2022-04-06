@extends('main_layout')

@section('content')

<section id="app">
    <slider :movies="{{ $movies }}"></slider>
    <movies></movies>
</section>


@endsection