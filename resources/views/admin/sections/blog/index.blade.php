@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Blog Posts</h3>
                        <div class="card-tools">
                            <a href="{{route('admin.blog.create')}}" class="btn btn-success">
                                New Blog Post
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="data-table">
                                <thead>
                                <tr>
                                    <th>Post ID</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Body</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($blogs->count())
                                    @foreach($blogs as $blog)
                                        <tr>
                                            <td>{{ $blog->id }}</td>
                                            <td>{!! $blog->title !!}</td>
                                            <td>
                                                <img class="rounded"
                                                     src="{{ $blog->featured_image?asset('storage').'/'.$blog->featured_image: 'https://via.placeholder.com/280x280/87CEFA/000000' }}"
                                                     alt="Awesome Image"
                                                     style="max-width: 150px;"
                                                >
                                            </td>
                                            <td>{!! Str::words($blog->body, 120, ' ...') !!}</td>
                                            <td>
                                                @if($blog->published)
                                                    <span class="badge badge-success" style="cursor: context-menu">Published</span>
                                                @else
                                                    <span class="badge badge-warning" style="cursor: context-menu">Not Published</span>
                                                @endif
                                            </td>
                                            <td>

{{--                                                <a href="{{ route('admin.blog.details', $blog) }}"--}}
{{--                                                   class="btn btn-default btn-sm"--}}
{{--                                                   title="View">--}}
{{--                                                    <i class="fas fa-eye"></i>--}}
{{--                                                </a>--}}

                                                <a href="{{ route('admin.blog.edit', $blog) }}"
                                                   class="btn btn-default btn-sm m-1"
                                                    title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>

                                                <a class="btn btn-default btn-sm text-danger" data-toggle="modal"
                                                   data-target="#modal-delete-{{$blog->id}}"
                                                    title="Delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>

                                                <!-- The Modal -->
                                                <div class="modal" id="modal-delete-{{$blog->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete Record</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>

                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                <p style="color: red">Are you sure you want to delete this
                                                                    record ?<br>
                                                                    Be aware that this action is not reversible and might
                                                                    affect other records too.
                                                                </p>
                                                            </div>

                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                                <form
                                                                    action="{{ route('admin.blog.delete', $blog) }}"
                                                                    method="post"
                                                                >
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="button" class="btn btn-flat btn-sm" data-dismiss="modal">
                                                                        Cancel
                                                                    </button>
                                                                    <button type="submit"
                                                                            class="btn btn-danger btn-flat btn-sm"
                                                                            title=""><i
                                                                            class="fa fa-trash"></i> Delete
                                                                        Record
                                                                    </button>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
