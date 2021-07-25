@extends('frontend.layout.app')

@section('title', 'Cart page')

@section('content_app')
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th width="30%">Image</th>
                            <th>QTY</th>
                            <th>Price</th>
                            <th>Money</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $key => $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    <h5>{{ $item->name }}</h5>
                                    <p>{{ $item->options->description }}</p>
                                </td>
                                <td>
                                    <img width="15%" height="15%" src="{{ $item->options->image }}"class="img-fluid img-thumbnail img-responsive" />
                                </td>
                                <td>
                                    <input class="form-control" type="number" value="{{ $item->qty }}" />
                                </td>
                                <td>
                                    <span> {{ number_format($item->price) }} </span>
                                </td>
                                <td>
                                    <span> {{ number_format($item->price*$item->qty)}} </span>
                                </td>
                            </tr>   
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection