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
                <h3 class="content-header-title font-theme ls-0">إضافة حسابات الي الكشف</h3>
            </div>
        </div>
        <div class="content-body">
            @if($errors->any())
                {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
            @endif
            <div class="card">
                <div class="card-block">
                    <div class="card-body">
                        <form method="post" action="{{url('/admin/fund/fields/'.$fund->id)}}" enctype="multipart/form-data">
                            @csrf()
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>رصيد اول الفترة</label>
                                        <input type="text" name="fund[0][0]name" value="رصيد اول الفترة" hidden>
                                        <input type="text" name="fund[0][1]balance"  class="form-control">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <br>
                                                <label>مدين</label>
                                                <input type="radio" class="" name="fund[0][2]type" value="debt">
                                                <br>
                                                <label>دائن</label>
                                                <input type="radio" class="" name="fund[0][2]type" value="credit">
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>المشتريات</label>
                                        <input type="text" name="fund[1][0]name" value="المشتريات" hidden>
                                        <input type="text" class="form-control" name="fund[1][1]balance">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <br>
                                                <label>مدين</label>
                                                <input type="radio" class="" name="fund[1][2]type" value="debt">
                                                <br>
                                                <label>دائن</label>
                                                <input type="radio" class="" name="fund[1][2]type" value="credit">
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>مردود المشتريات</label>
                                        <input type="text" name="fund[2][0]name" value="مردود المشتريات" hidden>
                                        <input type="text" class="form-control" name="fund[2][1]balance">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <br>
                                                <label>مدين</label>
                                                <input type="radio" class="" name="fund[2][2]type" value="debt">
                                                <br>
                                                <label>دائن</label>
                                                <input type="radio" class="" name="fund[2][2]type" value="credit">
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>المبيعات</label>
                                        <input type="text" name="fund[3][0]name" value="المبيعات" hidden>
                                        <input type="text" class="form-control" name="fund[3][1]balance">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <br>
                                                <label>مدين</label>
                                                <input type="radio" class="" name="fund[3][2]type" value="debt">
                                                <br>
                                                <label>دائن</label>
                                                <input type="radio" class="" name="fund[3][2]type" value="credit">
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>مردود المبيعات</label>
                                        <input type="text" name="fund[4][0]name" value="مردود المبيعات" hidden>
                                        <input type="text" class="form-control" name="fund[4][1]balance">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <br>
                                                <label>مدين</label>
                                                <input type="radio" class="" name="fund[4][2]type" value="debt">
                                                <br>
                                                <label>دائن</label>
                                                <input type="radio" class="" name="fund[4][2]type" value="credit">
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>سندات الصرف</label>
                                        <input type="text" name="fund[5][0]name" value="سندات الصرف" hidden>
                                        <input type="text" class="form-control" name="fund[5][1]balance">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <br>
                                                <label>مدين</label>
                                                <input type="radio" class="" name="fund[5][2]type" value="debt">
                                                <br>
                                                <label>دائن</label>
                                                <input type="radio" class="" name="fund[5][2]type" value="credit">
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>سندات القبض</label>
                                        <input type="text" name="fund[6][0]name" value="سندات القبض" hidden>
                                        <input type="text" class="form-control" name="fund[6][1]balance">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <br>
                                                <label>مدين</label>
                                                <input type="radio" class="" name="fund[6][2]type" value="debt">
                                                <br>
                                                <label>دائن</label>
                                                <input type="radio" class="" name="fund[6][2]type" value="credit">
                                            </div>
                                        </div>
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
