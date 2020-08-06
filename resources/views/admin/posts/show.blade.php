@extends('admin.layouts.index')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Post
                    <small>{{$post->name}}</small>
                    <div>
                        <a href=" {{route('admin.post.index')}} " class="btn btn-success mb3">Back</a>
                    </div>
                </h1>


            </div>

            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">



                <form action="{{  url('admin/post/update/'.$post->id) }}" method="POST"
                    enctype="multipart/form-data">
                    {!! method_field('put') !!}
                    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                    <input type="hidden" name="id" value="{!! $post->id !!}" />

                   
                    <div class="col-xs-12 col-sm-12  col-md-12">
                        <div class="form-group">
                            <strong> Title : </strong>
                            <p>{{$post->title}}</p>
                        </div>
                    </div>

                     <div class="col-xs-12 col-sm-12  col-md-12">
                        <div class="form-group">
                            <strong> Intro : </strong>
                            <p>{{$post->intro}}</p>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12  col-md-12">
                        <div class="form-group">
                            <strong> Content : </strong>
                            <p>{{$post->content}}</p>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12  col-md-12">
                        <div class="form-group">
                            <strong> Image : </strong>
                            <p>
                                <img width="400px" height="400x" src="{{$post->image}}" alt="">
                            </p>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12  col-md-12">
                        <div class="form-group">
                            <strong> Tag : </strong>
                            <p>{{$post->tag}}</p>
                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-12  col-md-12">
                        <div class="form-group">
                            <strong> Description : </strong>
                            <p>{{$post->description}}</p>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12  col-md-12">
                        <div class="form-group">
                            <strong> Slug : </strong>
                            <p>{{$post->slug}}</p>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12  col-md-12">
                        <div class="form-group">
                            <strong>Category Name : </strong>
                            <p>{{$post->category->name}}</p>
                        </div>
                    </div>

                    
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection