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

                {{-- @if (count($errors)>0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                    {{$err}}<br>
                @endforeach
            </div>

            @endif --}}

            @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
            @endif

            <form action="{{  url('admin/category/update/'.$category->id) }}" method="POST"
                enctype="multipart/form-data">
                {{-- 'name', 'tag', 'description', 'icon', 'slug' --}}
                {!! method_field('put') !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{!! $category->id !!}" />

                <div class="col-xs-12 col-sm-12  col-md-12">
                    <div class="form-group">
                        <strong>Category Name : </strong>
                        <input id="category_name" type="text" name="name" class="form-control"
                            placeholder="Category Name" value="{{$category->name}}">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-xs-12 col-sm-12  col-md-12">
                    <div class="form-group">
                        <strong>Category Tag : </strong>
                        <input id="category_tag" type="text" name="tag" class="form-control" placeholder="Category Tag"
                            value="{{$category->tag}}">
                    </div>
                    @error('tag')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-xs-12 col-sm-12  col-md-12">
                    <div class="form-group">
                        <strong>Category Description : </strong>
                        <input id="category_description" type="text" name="description" class="form-control"
                            placeholder="Category Description" value="{{$category->description}}">
                    </div>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>



                <div class="col-xs-12 col-sm-12  col-md-12">
                    <div class="form-group">
                        <strong>Category Icon : </strong>
                        <p>
                            <img width="400px" height="400x" src="{{$category->icon}}" alt="">
                        </p>
                        <input type="file" name="icon" class="form-control">
                    </div>
                    @error('icon')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-xs-12 col-sm-12  col-md-12">
                    <div class="form-group">
                        <strong>Category Slug : </strong>
                        <input id="category_slug" type="text" name="slug" class="form-control"
                            placeholder="Category Slug" value="{{$category->slug}}">
                    </div>
                    @error('slug')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="col-xs-12 col-sm-12  col-md-12 mb-3">
                    <button type="submit" class="btn btn-primary">Submit </button>
                    <button type="reset" class="btn btn-primary">Refresh </button>
                </div>

                <form>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
@endsection