@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">New Reminder</h3>
            </div>
            <form action="{{route('admin.reminders.create')}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="application_id">Account</label>
                                <select name="application_id" id="application_id" class="form-control select2"
                                        data-placeholder="Select Account / Application">
                                    <option value=""></option>
                                    @foreach($applications as $index=>$application)
                                        <option
                                            value="{{$application->id}}" {{$application->id == old('application_id',$applicationId) ?'selected':''}}>
                                            KP{{$application->id}}</option>
                                    @endforeach
                                </select>
                                @error('application_id')
                                <span class="text-danger text-sm pull-right">{{$errors->first('application_id')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="reminder_type">Reminder Type</label>
                                <select name="reminder_type" id="reminder_type" class="form-control select2"
                                        data-placeholder="Select Reminder Type">
                                    <option value=""></option>
                                    <option value="Email" {{$reminderType == 'Email'?'selected':''}}>Email</option>
                                    <option value="SMS" {{$reminderType == 'SMS'?'selected':''}}>SMS</option>
                                    <option value="Demand Letter" {{$reminderType == 'Demand Letter'?'selected':''}}>
                                        Demand Letter
                                    </option>
                                    <option
                                        value="Payment Due Report" {{$reminderType == 'Payment Due Report'?'selected':''}}>
                                        Payment Due Report
                                    </option>
                                </select>
                                @error('reminder_type')
                                <span class="text-danger text-sm pull-right">{{$errors->first('reminder_type')}}</span>
                                @enderror
                            </div>
                        </div>
                        @if($content != '')
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea class="form-control {{$reminderType !='SMS'?'summernote':''}}" rows="4"
                                              id="content" name="content"
                                              placeholder="Enter Content">{{old('content',$content)}}</textarea>
                                    @error('content')
                                    <span
                                        class="text-danger text-sm pull-right">{{$errors->first('content')}}</span>
                                    @enderror
                                </div>
                            </div>
                        @endif
                        @if($content!='' && $reminderType != 'SMS' )
                            <div class="form-group">
                                <label for="attachment">Attachment</label>
                                <br>
                                <input type="file" id="attachment" name="attachment">
                                @error('attachment')
                                <span class="text-danger text-sm pull-right">{{$errors->first('attachment')}}</span>
                                @enderror
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <button type="{{$content == ''?'button':'submit'}}" class="btn btn-success">
                        Dispatch
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(function () {
            $('#reminder_type').change(function () {
                if ($('#application_id :selected').val() == '') {
                    alert('Please select an application first!')
                    $(this).val('');
                    return;
                }
                if ($(this).val() == 'Email') {
                    window.location = '{{url('admin/reminders/create/email')}}/' + $('#application_id :selected').val();
                } else if ($(this).val() == 'SMS') {
                    window.location = '{{url('admin/reminders/create/sms')}}/' + $('#application_id :selected').val();
                } else if ($(this).val() == 'Demand Letter') {
                    window.location = '{{url('admin/reminders/create/demand-letter')}}/' + $('#application_id :selected').val();
                } else if ($(this).val() == 'Payment Due Report') {
                    window.location = '{{url('admin/reminders/create/payment-due-report')}}/' + $('#application_id :selected').val();
                }
            })
        })
    </script>
@endsection
