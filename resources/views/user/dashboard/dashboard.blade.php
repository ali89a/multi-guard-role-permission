@extends('user.layouts.app')
@section('title','Dashboard')
@push('style')
<style>
    #map {
        width: 100%;
        height: 70vh;
        background-color: gray;
    }
</style>
@endpush
@section('content')
<div class="content-wrapper">
    @php
    $links = [
    'Home'=>route('dashboard')
    ]
    @endphp
    <x-bread-crumb-component title='Dashboard' :links="$links" />
    <div class="content-body">
      

    </div>
</div>
@endsection
@push('script')

@endpush
