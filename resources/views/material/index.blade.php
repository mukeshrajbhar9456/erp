@extends('layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('material.create') }}"> Add Material</a>
            </div>
        </div>
    </div>
   
   @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

     @if ($message = Session::get('danger'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif
   <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Balance</th>
            <th>Category</th>
            <th width="280px">Action</th>
        </tr>
         @foreach ($product as $index=> $product)
        <tr>
            <td>{{$index +1}}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->balance }}</td>
            <td>{{ $product->category }}</td>
            <td>
                <form action="{{ route('material.destroy',$product->id) }}" method="POST">
    
                    <a class="btn btn-primary" href="{{ route('material.edit',$product->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
       
    </table>
    
      
@endsection