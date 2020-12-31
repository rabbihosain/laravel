@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
              <a href="{{ URL::to('add_category') }}" class="btn btn-primary">Add Category</a>
              <a href="{{ URL::to('all_category') }}" class="btn btn-success">All Category</a>
              <a href="{{ URL::to('all_post') }}" class="btn btn-success">All Posts</a>
              <hr>
              @if($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach($errors->all() as $error)
                      <li>{{$error}}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
        <form action="{{ url('store_post')}}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Title </label>
              <input type="text" class="form-control" placeholder="Title" name="title" required>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category </label>
              <select name="category_id" class="form-control">
                @foreach($category as $row)
                  <option value="{{$row->id}}">{{$row->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <br>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Post Image</label>
              <input type="file" class="form-control" name="image" required>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Details</label>
              <textarea rows="5" class="form-control" placeholder="Details" name="details" required ></textarea>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Post</button>
        </form>
      </div>
    </div>
  </div>
@endsection