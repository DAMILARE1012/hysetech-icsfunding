@extends('admin.layout.app')
@section('content')
  <!--Blog Deail Start-->

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
                    <div class="card" style="padding: 20px;">
                        <div class="header mb-4">
                            <h2>Comments 3</h2>
                        </div>
                        <div class="body">
                            <ul class="comment-reply list-unstyled">
                                <li class="row clearfix">
                                    <div class="icon-box col-md-2 col-4"><img class="img-fluid img-thumbnail" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Awesome Image"></div>
                                    <div class="text-box col-md-10 col-8 p-l-0 p-r0">
                                        <h5 class="m-b-0">Gigi Hadid </h5>
                                        <p>Why are there so many tutorials on how to decouple WordPress? how fast and easy it is to get it running (and keep it running!) and its massive ecosystem. </p>
                                        <ul class="list-inline">
                                            <li><a href="javascript:void(0);">Mar 09 2018</a></li>
                                            <li><a href="javascript:void(0);">Reply</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="row clearfix">
                                    <div class="icon-box col-md-2 col-4"><img class="img-fluid img-thumbnail" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="Awesome Image"></div>
                                    <div class="text-box col-md-10 col-8 p-l-0 p-r0">
                                        <h5 class="m-b-0">Christian Louboutin</h5>
                                        <p>Great tutorial but few issues with it? If i try open post i get following errors. Please can you help me?</p>
                                        <ul class="list-inline">
                                            <li><a href="javascript:void(0);">Mar 12 2018</a></li>
                                            <li><a href="javascript:void(0);">Reply</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="row clearfix">
                                    <div class="icon-box col-md-2 col-4"><img class="img-fluid img-thumbnail" src="https://bootdey.com/img/Content/avatar/avatar4.png" alt="Awesome Image"></div>
                                    <div class="text-box col-md-10 col-8 p-l-0 p-r0">
                                        <h5 class="m-b-0">Kendall Jenner</h5>
                                        <p>Very nice and informative article. In all the years I've done small and side-projects as a freelancer, I've ran into a few problems here and there.</p>
                                        <ul class="list-inline">
                                            <li><a href="javascript:void(0);">Mar 20 2018</a></li>
                                            <li><a href="javascript:void(0);">Reply</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card" style="padding: 20px;">
                        <div class="header mb-4">
                            <h2>Leave a reply</h2>
                        </div>
                        <div class="body">
                            <div class="comment-form">
                                <form class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Your Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Email Address">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea rows="4" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-block btn-primary">SUBMIT</button>
                                    </div>
                                </form>
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
