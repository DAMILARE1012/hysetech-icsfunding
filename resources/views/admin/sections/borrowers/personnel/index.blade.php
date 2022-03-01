@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$business->name}} / Personnel</h3>
                <div class="card-tools">
                    <a href="{{route('admin.borrowers.personnel.create',$business)}}" class="btn btn-success">
                        Add personnel
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <label for="cbx" style="font-weight: normal;padding-right: 2rem">
                            <input type="checkbox" id="cbx"> Showing {{$borrowers->count()}} personnel
                        </label>
                    </div>

                    <div class="col-md-4">
                        <div class="form-inline">
                            <div class="input-group ml-2">
                                <div class="input-group-prepend">
                                <span class="input-group-text"
                                      style="border-right: none;font-weight: 100">Sort By </span>
                                </div>
                                <select name="status" id="status" class="form-control" style="border-left: none">
                                    <option value="">Newest Update</option><option value="">Oldest Update</option>
                                </select>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="row p-0 mt-2">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead style="background: lightblue">
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <td>ID</td>
                                    <td>Designation</td>
                                    <td>Appointment</td>
                                    <td>Resignation</td>
                                    <td colspan="4">Action</td>
                                </tr>
                                </thead>
                                <tbody>
                                @if($borrowers->count())
                                    @foreach($borrowers as $borrower)
                                        <tr>
                                            <td>

                                            </td>
                                            <td>
                                                <div class="float-left pr-3">
                                                    <img src="{{asset('admin/dist/img/avatar.png')}}"
                                                         class="img-fluid rounded-circle border" style="width: 36px"
                                                         alt="">
                                                </div>
                                                <span>
                                                                   <b>{{$borrower->name}}</b>
                                                                   <br>
                                                                  {{$borrower->created_at->format('d-m-Y')}}
                                                               </span>
                                            </td>
                                            <td>{{$borrower->id}}</td>
                                            <td>{{$borrower->designation}}</td>
                                            <td>{{$borrower->appointment_date->format('d-m-Y')}}</td>
                                            <td>{{$borrower->resignationn_date?$borrower->resignationn_date->format('d-m-Y'):'-'}}</td>
                                            <td colspan="4">
                                                <a class="btn btn-default btn-sm" title="Delete"
                                                   data-toggle="modal"
                                                   data-target="#modal-delete-{{$borrower->id}}"
                                                   style="color: red">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>

                                                <div class="modal" id="modal-delete-{{$borrower->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete Record</h4>
                                                                <button type="button" class="close"
                                                                        data-dismiss="modal">&times;
                                                                </button>
                                                            </div>

                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                <p style="color: red">Are you sure you want to
                                                                    delete
                                                                    this
                                                                    record ?<br>
                                                                    Be aware that this action is not reversible and
                                                                    might
                                                                    affect other records too.
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form
                                                                    action="{{ route('admin.borrowers.personnel.delete', $borrower) }}"
                                                                    method="post"
                                                                >
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="button"
                                                                            class="btn btn-flat btn-sm"
                                                                            data-dismiss="modal">
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
                                                <a href="" class="btn btn-default btn-sm">
                                                    View detail
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" style="text-align: center">No personnel added</td>
                                    </tr>
                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
