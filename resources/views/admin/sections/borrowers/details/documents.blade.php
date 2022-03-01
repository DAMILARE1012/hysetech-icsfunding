@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="row" style="align-items: center">

            <a href="{{route('admin.borrowers')}}" style="color: black">
                <i class="fas fa-arrow-left" style="font-size: larger"></i>
            </a>
            <div class="col-md-2 col-xs-3 tabbed">
                <a href="{{route('admin.borrowers.details',['business'=>$business,'tab'=>'info'])}}" class="tab-title">Borrower
                    Information</a>
            </div>
            <div class="col-md-2 col-xs-3  tabbed">
                <a href="{{route('admin.borrowers.details.applications',$business)}}" class="tab-title">Applications</a>
            </div>
            <div class="col-md-2 col-xs-3  tabbed  tab-active">
                <a href="{{route('admin.borrowers.details.documents',$business)}}" class="tab-title">Documents</a>
            </div>

            <div class="col-md-2 col-xs-3  tabbed">
                <a href="{{route('admin.borrowers.details.collect-money',$business)}}" class="tab-title">Collect
                    Money</a>
            </div>
            <div class="col-md-2 col-xs-3  tabbed">
                <a href="{{route('admin.borrowers.details.reminder-log',$business)}}" class="tab-title">Reminder Log</a>
            </div>
        </div>

        <hr class="mt-0">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$business->name}} / All documents</h3>
                <div class="card-tools">
                    <a href="{{route('admin.borrowers.details.documents.upload',$business)}}" class="btn btn-success">
                        Upload new
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row p-0">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead style="background: lightblue">
                                <tr>
                                    <td colspan="5">Document Type</td>
                                    <td>Date</td>
                                    <td>Action</td>
                                </tr>
                                </thead>
                                <tbody>

                                @if(count($business->nricDocs))
                                    <tr style="background-color: lightgrey">
                                        <th colspan="12">
                                            NRIC
                                        </th>
                                    </tr>
                                    @foreach($business->nricDocs as $document)
                                        <tr style="background-color: #f5f4f4">
                                            <td colspan="5">
                                                {{$document->borrower->first_name}} {{$document->borrower->last_name}}
                                                <a href="{{asset('storage/'.$document->attachment)}}" target="_blank"><i
                                                        class="fas fa-link pl-4"></i>
                                                    Attachment</a>

                                            </td>
                                            <td>
                                                {{$document->created_at->format('d/m/Y')}}
                                            </td>
                                            <td>
                                                <a data-toggle="modal" data-target="#modal-delete-{{$document->id}}"
                                                   title="">
                                                    <i class="fa fa-trash" style="color: red; cursor: pointer;"></i>
                                                </a>

                                                <!-- The Modal -->
                                                <div class="modal" id="modal-delete-{{$document->id}}">
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
                                                                    action="{{ route('admin.borrowers.delete.documents', $document->id) }}"
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
{{--                                @else--}}
{{--                                    <tr>--}}
{{--                                        <td colspan="12" style="text-align: center">--}}
{{--                                            No document uploaded--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
                                @endif



                                @if(count($business->cbsrDocs))
                                    <tr style="background-color: lightgrey">
                                        <th colspan="12">
                                            CBS Report
                                        </th>
                                    </tr>
                                    @foreach($business->cbsrDocs as $document)
                                        <tr style="background-color: #f5f4f4">
                                            <td colspan="5">
                                                {{$document->borrower->first_name}} {{$document->borrower->last_name}}
                                                <a href="{{asset('storage/'.$document->attachment)}}" target="_blank"><i
                                                        class="fas fa-link pl-4"></i>
                                                    Attachment</a>
                                            </td>
                                            <td>
                                                {{$document->created_at->format('d/m/Y')}}
                                            </td>
                                            <td>
                                                <a data-toggle="modal" data-target="#modal-delete-{{$document->id}}"
                                                   title="">
                                                    <i class="fa fa-trash" style="color: red; cursor: pointer;"></i>
                                                </a>
                                                <!-- The Modal -->
                                                <div class="modal" id="modal-delete-{{$document->id}}">
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
                                                                    action="{{ route('admin.borrowers.delete.documents', $document->id) }}"
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
{{--                                @else--}}
{{--                                    <tr>--}}
{{--                                        <td colspan="12" style="text-align: center">--}}
{{--                                            No document uploaded--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
                                @endif


                                @if(count($business->bankStatements))
                                    <tr style="background-color: lightgrey">
                                        <th colspan="12">
                                            Bank Statement
                                        </th>
                                    </tr>
                                    @foreach($business->bankStatements as $document)
                                        <tr style="background-color: #f5f4f4">
                                            <td colspan="5">
                                                {{$document->borrower->first_name}} {{$document->borrower->last_name}}
                                                <a href="{{asset('storage/'.$document->attachment)}}" target="_blank"><i
                                                        class="fas fa-link pl-4"></i>
                                                    Attachment</a>
                                            </td>
                                            <td>
                                                {{$document->created_at->format('d/m/Y')}}
                                            </td>
                                            <td>
                                                <a data-toggle="modal" data-target="#modal-delete-{{$document->id}}"
                                                   title="">
                                                    <i class="fa fa-trash" style="color: red; cursor: pointer"></i>
                                                </a>

                                                <!-- The Modal -->
                                                <div class="modal" id="modal-delete-{{$document->id}}">
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
                                                                    action="{{ route('admin.borrowers.delete.documents', $document->id) }}"
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
{{--                                @else--}}
{{--                                    <tr>--}}
{{--                                        <td colspan="12" style="text-align: center">--}}
{{--                                            No document uploaded--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
                                @endif


                                @if(count($business->acraDocs))
                                    <tr style="background-color: lightgrey">
                                        <th colspan="12">
                                            ACRA
                                        </th>
                                    </tr>
                                    @foreach($business->acraDocs as $document)
                                        <tr style="background-color: #f5f4f4">
                                            <td colspan="5">
                                                {{$document->borrower->first_name}} {{$document->borrower->last_name}}
                                                <a href="{{asset('storage/'.$document->attachment)}}" target="_blank"><i
                                                        class="fas fa-link pl-4"></i>
                                                    Attachment</a>
                                            </td>
                                            <td>
                                                {{$document->created_at->format('d/m/Y')}}
                                            </td>
                                            <td>
                                                <a data-toggle="modal" data-target="#modal-delete-{{$document->id}}"
                                                   title="">
                                                    <i class="fa fa-trash" style="color: red; cursor: pointer"></i>
                                                </a>

                                                <!-- The Modal -->
                                                <div class="modal" id="modal-delete-{{$document->id}}">
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
                                                                    action="{{ route('admin.borrowers.delete.documents', $document->id) }}"
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
{{--                                @else--}}
{{--                                    <tr>--}}
{{--                                        <td colspan="12" style="text-align: center">--}}
{{--                                            No document uploaded--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </section>
@endsection
