@extends('backend.layout.app')

{{-- truyen title  --}}
@section('title', 'Dashboard page')
@section('breadcrumd_title', 'Dashboard')
@section('breadcrumd_title_sub', 'main data')

{{-- viet css o day, day no ra ngoai file app.blade layout --}}
@push('stylesheets')
  <link href="{{ asset('backend/css/dashboard.css') }}" rel="stylesheet" />
@endpush
  
@section('content_app')
  <div class="row">
    <div class="col-xl-3 col-md-6">
      {{-- hien thi bien --}}
      {{-- template cua laravel ten la blade --}}
      <h1> user {{ $user }} </h1>
      <h3> age: {{ $age }}</h3>
      {{-- <//?=  ?> --}}
    </div>
  </div>
@endsection