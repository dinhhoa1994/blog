@extends('admin.layouts.index')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Post
                    <small>Create</small>
                    <div>
                        <a href=" {{route('admin.post.index')}} " class="btn btn-success mb3">Back</a>
                    </div>
                </h1>


            </div>

            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">

                @if (count($errors)>0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                    {{$err}}<br>
                    @endforeach
                </div>
                @endif


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

                <form action="admin/post/store" method="POST" enctype="multipart/form-data">
                    {{-- // 'id', 'title', 'intro', 'content', 'image', 'tag', 'description', 'count_comment', 'slug', 'category_id', 'active' --}}

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="col-xs-12 col-sm-12  col-md-12">
                        <div class="form-group">
                            <strong>Post Title : </strong>
                            <input id="post_title" type="text" name="title" class="form-control"
                                placeholder="Post title">
                        </div>
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xs-12 col-sm-12  col-md-12">
                        <div class="form-group">
                            <strong>Post Intro : </strong>
                            <input id="post_intro" type="text" name="intro" class="form-control"
                                placeholder="Post intro">
                        </div>
                        @error('intro')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xs-12 col-sm-12  col-md-12">
                        <div class="form-group">
                            <strong>Post Content : </strong>
                            <input id="post_content" type="text" name="content" class="form-control"
                                placeholder="Post content">
                        </div>
                        @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xs-12 col-sm-12  col-md-12">
                        <div class="form-group">
                            <strong>Category Image : </strong>
                            <input type="file" name="image" class="form-control">
                        </div>
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xs-12 col-sm-12  col-md-12">
                        <div class="form-group">
                            <strong>Post tag : </strong>
                            <input id="post_tag" type="text" name="tag" class="form-control" placeholder="Post tag">
                        </div>
                        @error('tag')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xs-12 col-sm-12  col-md-12">
                        <div class="form-group">
                            <strong>Post Description : </strong>
                            <input id="post_description" type="text" name="description" class="form-control"
                                placeholder="Post description">
                        </div>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xs-12 col-sm-12  col-md-12">
                        <div class="form-group">
                            <strong>Post Count Comment : </strong>
                            <input id="post_title" type="text" name="count_comment" class="form-control"
                                placeholder="Post count comment">
                        </div>
                        @error('count_comment')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xs-12 col-sm-12  col-md-12">
                        <div class="form-group">
                            <strong>Post slug : </strong>
                            <input id="post_slug" type="text" name="slug" class="form-control" placeholder="Post slug">
                        </div>
                        @error('slug')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xs-12 col-sm-12  col-md-12">
                        <label>Category name</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="col-xs-12 col-sm-12  col-md-12 mb-3 m3">
                        <button type="submit" class="btn btn-primary ">Submit </button>
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