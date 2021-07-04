@extends('backend.layout.app')

@section('title', 'brand page')
@section('breadcrumd_title', 'Brand')
@section('breadcrumd_title_sub', 'list brand data')
  
@section('content_app')
  <div class="row">
    <div class="col-xl-3 col-md-6">
      <h4 id="title_brand"> This is brand page !</h4>
  </div>
@endsection

@push('javascripts')
  <script>
    // code js o day
    document.getElementById('title_brand').style.color = 'red';
  </script>
@endpush