@extends('layouts.dashboard')
@section('dashboardContent')
    <div class="text-center font-bold p-2 text-lg">  
            <h1>Selamat Datang Kembali  {{Auth::user()->name}} </h1>

        </div>
    </div>
@endsection