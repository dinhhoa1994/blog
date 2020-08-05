@extends('admin.layouts.index')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>{{$category->name}}</small>
                    <div>
                        <a href=" {{route('admin.category.index')}} " class="btn btn-success mb3">Back</a>
                    </div>
                </h1>


            </div>

            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">



                <form action="{{  url('admin/category/update/'.$category->id) }}" method="POST"
                    enctype="multipart/form-data">
                    {!! method_field('put') !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{!! $category->id !!}" />

                    <div class="col-xs-12 col-sm-12  col-md-12">
                        <div class="form-group">
                            <strong>Category Name : </strong>
                            <p>{{$category->name}}</p>
                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-12  col-md-12">
                        <div class="form-group">
                            <strong>Category Tag : </strong>
                            <p>{{$category->tag}}</p>
                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-12  col-md-12">
                        <div class="form-group">
                            <strong>Category Description : </strong>
                            <p>{{$category->description}}</p>
                        </div>

                    </div>



                    <div class="col-xs-12 col-sm-12  col-md-12">
                        <div class="form-group">
                            <strong>Category Icon : </strong>
                            <p>
                                <img width="400px" height="400x" src="{{$category->icon}}" alt="">
                            </p>

                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-12  col-md-12">
                        <div class="form-group">
                            <strong>Category Slug : </strong>
                            <p>{{$category->slug}}</p>
                        </div>
                        @error('slug')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection