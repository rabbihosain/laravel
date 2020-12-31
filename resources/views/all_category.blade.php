@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
      @if($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                  @endforeach
                </ul>
              </div>
              @endif
              <a href="{{ URL::to('add_category') }}" class="btn btn-primary">Add Category</a>
              <a href="{{ URL::to('all_category') }}" class="btn btn-success">All Category</a>
              <hr>
              <table class="table table-responsive">
              <tr>
                <th>SL</th>
                <th>Category Name</th>
                <th>Slug Name</th>
                <th>Created At</th>
                <th>Action</th>
              </tr>
              @foreach($category as $row)
              <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->slug}}</td>
                <td>{{$row->created_at}}</td>
                <td>
                  <a href="{{ URL::to('edit_category/'.$row->id) }}" class="btn btn-info">Edit</a>
                  <a href="{{ URL::to('delete_category/'.$row->id) }}" class="btn btn-danger" id="delete">Delete</a>
                  <a href="{{ URL::to('view_category/'.$row->id) }}" class="btn btn-success">View</a>
                </td>
              </tr>
              @endforeach
              </table>
        
      </div>
    </div>
  </div>
@endsection