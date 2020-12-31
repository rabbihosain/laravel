@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
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
        <form action="{{ url('update_post/'.$post->id) }}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Title </label>
              <input type="text" class="form-control" value="{{$post->title}}" name="title" required>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category </label>
              <select name="category_id" class="form-control">
                @foreach($category as $row)
                  <option value="{{$row->id}}" <?php if($row->id == $post->category_id) echo "selected"; ?>>{{$row->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <br>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>New Image</label>
              <input type="file" class="form-control" name="image" required>
              Old Image: <img src="{{ URL::to($post->image) }}" height="100px" alt="">
              <input type="hidden" name="old_image" value="{{ URL::to($post->image) }}">
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Details</label>
              <textarea rows="5" class="form-control" name="details" required >{{$post->details}}</textarea>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Update</button>
        </form>
      </div>
    </div>
  </div>
@endsection