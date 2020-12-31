@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
              <a href="{{ URL::to('add_category') }}" class="btn btn-primary">Add Category</a>
              <a href="{{ URL::to('all_category') }}" class="btn btn-success">All Category</a>
              <hr>
            <div>
                <ol>
                    <li>Category Name:  {{ $cat->name}}</li>
                    <li>Category Slug: {{ $cat->slug}}</li>
                    <li>Created At: {{ $cat->created_at}}</li>
                </ol>
            </div>
      </div>
    </div>
  </div>
@endsection