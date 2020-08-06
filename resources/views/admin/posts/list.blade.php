@extends('admin.layouts.index')

@section('content')


<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Post
                    <small>list</small>
                </h1>


            </div>


            <!-- /.col-lg-12 -->
            <a href="{{ route('admin.post.create')}}" style="margin-bottom: 2%" class="btn btn-primary ">Add
                New Post
            </a>


            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th class="text-center">ID</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Intro</th>
                        <th class="text-center">Content</th>
                        <th class="text-center">Image</th>
                        <th class="text-center">Tag</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Count Comment</th>
                        <th class="text-center">Slug</th>
                        <th class="text-center">Category Name</th>
                        <th class="text-center">Show</th>
                        <th class="text-center">Delete</th>
                        <th class="text-center">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr class="odd  gradeX" align="center">
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->intro }}</td>
                        <td>{{ $post->content }}</td>
                        <td><img width="100px" height="100px" src="{{URL::to( $post->image)}}" alt=""></td>
                        <td>{{ $post->tag }}</td>
                        <td>{{ str_limit($post->description,$limit = 30) }}</td>
                        <td>{{ $post->count_comment}}</td>
                        <td>{{ $post->slug }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td> <a class="btn btn-info" href=" {{URL::to('admin/post/show/'.$post->id)}}"> Show
                            </a></td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                            <a onclick="return confirm('Are you sure?')" href="admin/post/delete/{{$post->id}}">
                                Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                href="admin/post/edit/{{$post->id}}">Edit</a></td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
            {!! $posts->links() !!}

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection