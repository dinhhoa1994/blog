@extends('admin.layouts.index')

@section('content')


<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>list</small>
                </h1>


            </div>


            <!-- /.col-lg-12 -->
            <a href="{{ route('admin.category.create')}}" style="margin-bottom: 2%" class="btn btn-primary ">Add
                New Category
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
                        <th class="text-center">Name</th>
                        <th class="text-center">Tag</th>
                        <th class="text-center">description</th>
                        <th class="text-center">Icon</th>
                        <th class="text-center">Slug</th>
                        <th class="text-center">Show</th>
                        <th class="text-center">Delete</th>
                        <th class="text-center">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr class="odd  gradeX" align="center">
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->tag }}</td>
                        <td>{{ str_limit($category->description,$limit = 30) }}</td>
                        <td><img width="100px" height="100px" src="{{URL::to( $category->icon)}}" alt=""></td>
                        <td>{{ $category->slug }}</td>
                        <td> <a class="btn btn-info" href=" {{URL::to('admin/category/show/'.$category->id)}}"> Show
                            </a></td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                            <a onclick="return confirm('Are you sure?')" href="admin/category/delete/{{$category->id}}">
                                Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                href="admin/category/edit/{{$category->id}}">Edit</a></td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
            {!! $categories->links() !!}

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection