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
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th class="text-center">ID</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Tag</th>
                        <th class="text-center">description</th>
                        <th class="text-center">Icon</th>
                        <th class="text-center">Slug</th>
                        <th class="text-center">Delete</th>
                        <th class="text-center">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $categorie)
                    <tr class="odd  gradeX" align="center">
                        <td>{{ $categorie->id }}</td>
                        <td>{{ $categorie->name }}</td>
                        <td>{{ $categorie->tag }}</td>
                        <td>{{ str_limit($categorie->description,$limit = 30) }}</td>
                        <td><img width="100px" height="100px" src="{{URL::to( $categorie->icon)}}" alt=""></td>
                        <td>{{ $categorie->slug }}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a
                                href="admin/category/delete/{{$categorie->id}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                href="admin/category/edit/{{$categorie->id}}">Edit</a></td>
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