@extends('borrower.layout.app')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$borrower->business->name}} / Document</h3>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="borrower_id">Borrower</label>
                                <select name="borrower_id" id="borrower_id" class="form-control select2"
                                        data-placeholder="Select borrower">
                                    <option value=""></option>
                                    @foreach($borrower->business->borrowers as $index=>$borrower)
                                        <option
                                            value="{{$borrower->id}}" {{$borrower->id == old('borrower_id') ?'selected':''}}>{{$borrower->first_name}} {{$borrower->last_name}}</option>
                                    @endforeach
                                </select>
                                @error('borrower_id')
                                <span class="text-danger text-sm pull-right">{{$errors->first('borrower_id')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="document_type">Document Type</label>
                                <select name="document_type" id="document_type" class="form-control select2"
                                        data-placeholder="Select Document Type">
                                    <option value=""></option>
                                    <option value="NRIC">NRIC</option>
                                    <option value="CBS Report">CBS Report</option>
                                    <option value="Bank Statement">Bank Statement</option>
                                    <option value="ACRA">ACRA</option>
                                </select>
                                @error('document_type')
                                <span class="text-danger text-sm pull-right">{{$errors->first('document_type')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="attachment">Attachment</label>
                                <br><br>
                                <input type="file" id="attachment" name="attachment">
                                <br>
                                @error('attachment')
                                <span class="text-danger text-sm pull-right">{{$errors->first('attachment')}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Save Information
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
