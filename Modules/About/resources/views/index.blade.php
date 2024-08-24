@extends('about::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('about.name') !!}</p>
@endsection
