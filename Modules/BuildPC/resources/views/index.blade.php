@extends('buildpc::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('buildpc.name') !!}</p>
@endsection
