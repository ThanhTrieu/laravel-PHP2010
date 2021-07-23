@extends('backend.layout.app')

@section('title', 'brand page')
@section('breadcrumd_title', 'Brand')
@section('breadcrumd_title_sub', 'list brand data')
  
@section('content_app')
  <div class="row">
    <div class="col-xl-12 col-md-12">
      {{-- <h4 id="title_brand"> This is brand page !</h4> --}}
      <a href="{{ route('admin.add.brand') }}" class="btn btn-primary"> Add brand</a>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th> # </th>
            <th width="10%"> Name </th>
            <th width="30%"> Logo </th>
            <th> Address </th>
            <th colspan="2" class="text-center" width="5%"> Action </th>
          </tr>
        </thead>
        <tbody>
          @foreach($brands as $key => $item)
          <tr id="rowBrand_{{ $item->id }}">
            <td>{{ $key + 1 }}</td>
            <td> {{ $item->name }}</td>
            <td>
              <img class="img-fluid" width="20%" height="20%" src={{ asset('storage/images/'.$item->logo) }} />
            </td>
            <td>{{ $item->address }}</td>
            <td>
              <button id="delete_brand_{{ $item->id }}" class="btn btn-danger" onclick="deleteBrand({{ $item->id }})"> Delete</button>
            </td>
            <td>
              <a class="btn btn-info" href="{{ route('admin.brand.edit',['slug' => Str::slug($item->name, '-'), 'id' => $item->id]) }}"> Edit</a>
            </td>
          </tr>
          @endforeach
        </tbody
        </tbody>
      </table>
      {{ $brands->links() }}
  </div>
@endsection

@push('javascripts')
  <script>
    // code js o day
    // document.getElementById('title_brand').style.color = 'red';
    function deleteBrand(id) {
      // viet ajax
      $.ajax({
        url: "{{ route('admin.delete.brand') }}",
        type: "POST",
        data : { id },
        beforSend: function() {
          $('#delete_brand_'+id).text('Loading ...');
        },
        success: function(result) {
          if(result.cod === 200){
            // xoa thanh cong
            $('#rowBrand_'+id).hide();
          } else {
            alert(result.mess);
          }
        }
      })
    }
  </script>
@endpush