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
              <a href="{{ URL::to('write') }}" class="btn btn-success">Write Post</a>
              <hr>
              <table class="table table-responsive">
              <tr>
                <th>SL</th>
                <th>Category</th>
                <th>Title</th>
                <th>Details</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
              @foreach($post as $row)
              <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->title}}</td>
                <td>{{$row->details}}</td>
                <td> <img src="{{ URL::to($row->image) }}" style="height:100px;" alt=""> </td>
                <td>
                  <a href="{{ URL::to('edit_post/'.$row->id) }}" class="btn btn-info">Edit</a>
                  <a href="{{ URL::to('delete_post/'.$row->id) }}" class="btn btn-danger" id="delete">Delete</a>
                  <a href="{{ URL::to('view_post/'.$row->id) }}" class="btn btn-success">View</a>
                </td>
              </tr>
              @endforeach
              </table>
        
      </div>
    </div>
  </div>
@endsection