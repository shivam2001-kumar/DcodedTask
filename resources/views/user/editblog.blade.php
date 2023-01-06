@extends('admin.includes.layout', ['breadcrumb_title' => 'Dashboard'])
@section('title', 'Dashboard')

@section('main-content')

<h1>Edit Blog</h1>

<div class="conntainer">
    <form action="{{url('blog/'.$data->id)}}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$data->id}}"/>
        <!-- Name input -->
        <div class="form-outline mb-4">
          <input type="text" name="title" id="form4Example1" value="{{$data->title}}" class="form-control" />
          <label class="form-label" for="form4Example1">Title</label>
        </div>
        <!-- Message input -->
        <div class="form-outline mb-4">
          <textarea name="desc" class="form-control" id="form4Example3" rows="4"> {{$data->description}}</textarea>
          <label class="form-label" for="form4Example3">Description</label>
        </div>
        <div class="form-outline mb-4">
            <input type="text" name="user_id" value="{{Auth::guard('customer')->user()->id }}" id="form4Example1" class="form-control" readonly/>
            <label class="form-label" for="form4Example1">User id</label>
          </div>
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Update</button>
      </form>
</div>
@endsection
