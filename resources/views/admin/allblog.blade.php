@extends('admin.includes.layout', ['breadcrumb_title' => 'Dashboard'])
@section('title', 'Dashboard')

@section('main-content')

<h1>All Blog</h1>

<div class="conntainer">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th>Action</th>

        </tr>
        </thead>
        <tbody>
            {{-- @foreach ($blog_data as $bdata)
            <tr>
                <th scope="row">1</th>

                <td>{{$bdata->title}}</td>
                <td>{{$bdata->description}}</td>
                <td><a href="{{url('blog/' . $bdata ->id . '/edit')}}" class="btn btn-primary">Edit
                </a>
                <form action="{{ route('blog.destroy', $bdata->id ) }}" method="post">
                    @csrf
                    @method('DELETE')
                <button type="submit" class=" btn fa fa-trash text-danger" onclick="return confirm('Are you sure to delete this user?')"></button>
                </form>

            </td>
              </tr>

            @endforeach --}}

        </tbody>
      </table>
</div>
@endsection
