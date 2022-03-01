@extends('web.layout.app')
@section('content')
    <!--Blog Deail Start-->

    <style>
        a{
            color: #007bff;
        }
        a:hover{
            color: #0056b3;
        }
        .blog-page{
            margin-top: 150px;
        }
    </style>

    <div id="main-content" class="blog-page">
        <div class="container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 left-box">
                    <div class="card single_post">
                        <div class="body" style="padding: 20px;">
                            <div class="img-post">
                                <img class="d-block img-fluid rounded" src="{{ $blog->featured_image?asset('storage').'/'.$blog->featured_image: 'https://via.placeholder.com/800x280/87CEFA/000000'}}" alt="First slide">
                            </div>
                            <p class="mb-4">Published on: {!! $blog->created_at->format('d-M-Y') !!}</p>
                            <h3><a href="{{ route('admin.blog.details', $blog) }}">{{$blog->title}}</a></h3>
                            <div class="my-5">
                                {!! $blog->body !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 right-box">
                    <div class="card" style="padding: 20px">
                        <div class="header">
                            <h2>Popular Posts</h2>
                        </div>
                        <div class="body widget popular-post">
                            <div class="row">
                                <div class="col-lg-12">
                                    @if($blogs->count())
                                        @foreach($blogs as $singleBlog)
                                            @if($singleBlog->id !== $blog->id)
                                                <div class="single_post my-4">
                                                    <a href="{{ route('admin.blog.details', $singleBlog) }}">{{$singleBlog->title}}</a>
                                                    <div class="img-post">
                                                        <img class="rounded"
                                                             src="{{ $singleBlog->featured_image?asset('storage').'/'.$singleBlog->featured_image: 'https://via.placeholder.com/280x280/87CEFA/000000' }}"
                                                             alt="Awesome Image"
                                                             style="max-width: 300px;"
                                                        >
                                                    </div>
                                                    <span>Published on: {!! $singleBlog->created_at->format('d-M-Y') !!}</span>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
