@extends('layout.master2')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        $('.myform').submit(function() {
            if (confirm('هل ان متأكد من حذف بيان الحساب؟')) {

                return true;
            }
            else
            {
                return false;
            }

            // your code here
        });
    });
</script>
@section('content')
<!-- ////////////////////////////////////////////////////////////////////////////-->



<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2">
                <h3 class="content-header-title font-theme ls-0">فواتير مردود بيع
                </h3>
            </div>

        </div>
        <div class="content-body">
            <div class="card">
                <div class="card-block">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-head-fixed text-nowrap table-striped-td table-sm-td text-center">
                                <thead>
                                <tr>
                                    <th>رقم الفاتورة</th>
                                    <th>التاريخ</th>
                                    <th>رقم القيد</th>

                                    <th>القيمة</th>
                                    <th>الخصم</th>
                                    <th>الضريبة</th>
                                    <th>الصافى</th>
                                    <th>حذف</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($drivers as $drive)
                                <tr>
                                    <td>{{$drive->id}}</td>
                                    <td>{{$drive->date}}</td>
                                    <td>{{$drive->registration_number}}</td>

                                    <td>{{$drive->total - $drive->tax + $drive->discount}}</td>
                                    <td>{{$drive->discount}}</td>
                                    <td>{{$drive->tax}}</td>
                                    <td>{{$drive->total}}</td>
                                    <td>

                                        <form class="myform"  id="{{$drive->id}}"  method="post"  action="{{'purchase/delete/'.$drive->id}}">
                                            @csrf

                                            {!! method_field('Delete') !!} <button class="btn btn-icon btn-sm btn-danger" style="float: none;">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                <span><strong>حذف</strong></span>
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->


@endsection
