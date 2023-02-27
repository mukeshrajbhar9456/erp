@extends('category.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('category.create') }}"> Create New Category</a>
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
            <th>Raw material</th>
            <th>Finish goods</th>
            <th>Spares</th>
            <th>Machines</th>
            <th>other</th>
            
            <th width="280px">Action</th>
        </tr>
        @foreach ($category as $materialCategory)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $materialCategory->Raw_material }}</td>
            <td>{{ $materialCategory->Finish_goods }}</td>
            <td>{{ $materialCategory->Spares }}</td>
            <td>{{ $materialCategory->Machines }}</td>
            <td>{{ $materialCategory->other }}</td>
            <td>
                <form action="{{ route('category.destroy',$materialCategory->id) }}" method="POST">
    
                    <a class="btn btn-primary" href="{{ route('category.edit',$materialCategory->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
      
@endsection