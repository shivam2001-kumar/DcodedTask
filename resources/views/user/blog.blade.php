@extends('admin.includes.layout', ['breadcrumb_title' => 'Dashboard'])
@section('title', 'Dashboard')

@section('main-content')

<h1>Blog</h1>

<div class="conntainer">
    <form action="{{route('blog.store')}}" method="post">
        @csrf
        <!-- Name input -->
        <div class="form-outline mb-4">
          <input type="text" name="title" id="form4Example1" class="form-control" />
          <label class="form-label" for="form4Example1">Title</label>
        </div>
        <!-- Message input -->
        <div class="form-outline mb-4">
          <textarea name="desc" class="form-control" id="form4Example3" rows="4"></textarea>
          <label class="form-label" for="form4Example3">Description</label>
        </div>
        <div class="form-outline mb-4">
            <input type="text" name="user_id" value="{{Auth::guard('customer')->user()->id }}" id="form4Example1" class="form-control" />
            <label class="form-label" for="form4Example1">User id</label>
          </div>
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Send</button>
      </form>
</div>
@endsection
