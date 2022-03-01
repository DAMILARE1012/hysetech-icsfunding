@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-eye"></i> Import Preview</h3>

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                @foreach($rows as $index=>$items)
                                    <tr>
                                        @foreach($items as $item)
                                            @if($index==0)
                                                <th>{{$item}}</th>
                                            @else
                                                <td>{{$item}}</td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <form action="{{route('admin.borrowers.import.process')}}" method="post">
                <input type="hidden" name="path" value="{{$path}}">
                @csrf
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Import Borrowers
                    </button>
                </div>
            </form>

        </div>
    </section>
@endsection
