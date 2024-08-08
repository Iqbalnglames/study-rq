@extends('layouts.dashboard_layouts')

@section('content')
    <!-- component -->
    <h1>Assalamualaikum, {{ Auth::user()->name }}l</h1>
@endsection