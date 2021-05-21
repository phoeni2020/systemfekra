@extends('layout.master2')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    function printpage(){
        window.print();
    }
</script>
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
                <center>
                    <h3 class="content-header-title font-theme ls-0">قائمة الحسابات</h3>
                </center>
            </div>
            <div class="content-header-right col-md-4 col-12 mb-2">
                <a href="{{url('admin/account/create')}}" class="btn btn-primary"><i class="icon-plus"></i> إضافة حساب</a>
            </div>
        </div>
        <div class="content-body">
            <div class="card">
                <div class="card-block">
                    <div class="card-body">
                        <div class="table-responsive">
                            <a href="{{url('admin/fund/fields/print/'.$id->id)}}">click me</a>
                            <table  class="table table-bordered table-striped datatable" style="padding:3px; margin:3px;  border : 1px solid">
                                <thead>
                                <tr>
                                    <th colspan="4">
                                        بيان كشف الصندوق
                                    </th>
                                </tr>
                                <tr style="padding:3px; margin:3px; border : 1px solid">
                                    <th>اسم البيان</th>
                                    <th>مدين</th>
                                    <th>دائن</th>
                                    <th>رصيد</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($fund as $fundaccount)
                                        <tr>
                                            <td>{{$fundaccount->name}}</td>
                                            <td>{{$fundaccount->debit}}</td>
                                            <td>{{$fundaccount->credit}}</td>
                                            <td>{{$fundaccount->balance}}</td>
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

