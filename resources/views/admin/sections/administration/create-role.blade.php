@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-1 tabbed">
                <a href="{{route('admin.administration')}}" class="tab-title">Users</a>
            </div>
            <div class="col-1 tabbed tab-active">
                <a href="{{route('admin.administration.roles')}}" class="tab-title">Roles</a>
            </div>
        </div>

        <hr class="mt-0">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create Role</h3>
            </div>
            <form action="" method="post">
                @csrf
                <div class="card-body">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" class="form-control"
                                   value="{{old('title')}}"
                                   placeholder="Enter Title">
                            @error('title')
                            <span class="text-danger text-sm pull-right">{{$errors->first('title')}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" rows="4" id="description" name="description"
                                      placeholder="Enter Description">{{old('description')}}</textarea>
                            @error('description')
                            <span
                                class="text-danger text-sm pull-right">{{$errors->first('description')}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            @foreach($permissions as $permission)
                                <div class="col-md-6">
                                    <label><input type="checkbox" name="permissions[]"
                                                  value="{{$permission->id}}" {{is_array(old('permissions')) && in_array($permission->id,old('permissions'))?'checked="checked"':''}}> {{$permission->label}}
                                    </label>
                                </div>
                            @endforeach
                            <div class="col-md-12">
                                @error('permissions')
                                <span
                                    class="text-danger text-sm pull-right">{{$errors->first('permissions')}}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
