@extends('resources::layout.admin')

@section('content')
<h1 class="mt-6 font-bold text-2xl">This month</h1>
<div class="grid grid-cols-12 gap-6 my-4">
    <div class="col-span-3  card_dashboard">
        <div class="h-3/4 bg-gradient-to-r from-orange-500 to-orange-300 rounded-t-xl"></div>
        <div class="h-1/4"></div>
    </div>
    <div class="col-span-3 bg-blue-600 card_dashboard">1</div>
    <div class="col-span-3 bg-blue-600 card_dashboard">1</div>
    <div class="col-span-3 bg-blue-600 card_dashboard">1</div>
</div>
@endsection