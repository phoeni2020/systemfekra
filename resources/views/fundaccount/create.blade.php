@extends('layout.master2')

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2">
                <h3 class="content-header-title font-theme ls-0">إضافة كشف جديد</h3>
            </div>
        </div>
        <div class="content-body">
            @if($errors->any())
                {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
            @endif
            <div class="card">
                <div class="card-block">
                    <div class="card-body">
                        <form method="post" action="{{route('fund.store')}}" enctype="multipart/form-data">
                            @csrf()
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الاسم</label>
                                        <input type="text" name="name"required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>المده من</label>
                                        <input type="text" class="form-control timepicker" name="from">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>المده الي</label>
                                        <input type="text" class="form-control timepicker" name="to">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary"><i class="icon-plus"></i> إضافة</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<script type="text/javascript">

    $('.timepicker').datetimepicker({
        format:'YYYY-MM-DD'
    });
</script>
@endsection
