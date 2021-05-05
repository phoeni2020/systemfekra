@extends('layout.master2')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" ></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

<script>
    $(document).ready(function() {

        $('.myform').submit(function() {
            if (confirm('هل ان متأكد من حذف القيد؟')) {

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
                <h3 class="content-header-title font-theme ls-0">كشف حساب</h3>
                </center>
            </div>

        </div>
        <div class="content-body">
            <div class="card">
                <div class="card-block">
                    <div class="card-body">
                        <form method="get" action="/search" class="row p-0">

                            <div class="input-group mb-2">
                                <select name="account_id" required class="form-control">
                                    <option value="" disabled="" selected="">اختار الحساب</option>

                                    @foreach($accounts as $account)
                                        <option value="{{$account->id}}">{{$account->name}}</option>
                                        @endforeach
                                </select>

                                <input type="date" class="form-control" name="from" required placeholder="من" style="border: 1px solid #ced4da;border-radius: .25rem;">
                                <input type="date" class="form-control" required name="to" placeholder="الي" style="border: 1px solid #ced4da;border-radius: .25rem;">

                                <div class="input-group-append">
                                    <button class="btn-primary" type="submit" name="search" value="بحث" style="color: #fff;border-radius: .25rem;">
                                        بحث
                                    </button>
                                </div>


                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped datatable">
                                <thead>
                                <tr>
                                    <th>رقم القيد</th>
                                    <th>التاريخ</th>

                                    <th>الاسم</th>

                                    <th>رقم الحساب</th>
                                    <th>مدين </th>
                                    <th>دائن </th>
                                    <th>حذف </th>

                                </tr>
                                </thead>
                                <tbody>

                                @php($total=0)
                                @if(isset($drivers))
                                @if(count($drivers)>0)
                                    @php($total=-$drivers[0]->account->credit_salary+$drivers[0]->account->debit_salary)

                                    <tr>

                                        <td></td>
                                        <td>الرصيد الافتتاحي</td>

                                        <td></td>

                                        <td></td>

                                            <td>
                                                {{$drivers[0]->account->credit_salary}}
                                            </td>


                                        <td>
                                            {{$drivers[0]->account->debit_salary}}
                                        </td>



                                        <td></td>


                                    </tr>

                                @foreach($drivers as $driver)
                                    <tr>
                                        <td>{{$driver->registration_number}}</td>
                                        <td>{{$driver->date}}</td>


                                        <td>{{$driver->account->name}}</td>

                                        <td>{{$driver->account->number}}</td>
                                        @if($driver->amount<0)
                                            @php($total+=$driver->amount)

                                            <td>
                                                {{str_replace('-','',$driver->amount)}}
                                            </td>




                                        @else
                                            <td>

                                            </td>
                                        @endif
                                        @if($driver->amount>0)
                                            @php($total+=$driver->amount)

                                            <td>
                                                {{$driver->amount}}
                                            </td>




                                        @else
                                            <td>

                                            </td>
                                        @endif

                                        <td>

                                            <form class="myform"  id="{{$driver->id}}"  method="post"  action="{{'statement/delete/'.$driver->id}}">
                                                @csrf

                                                {!! method_field('Delete') !!} <button class="btn btn-icon btn-sm btn-danger" style="float: none;">
                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                    <span><strong>حذف</strong></span>
                                                </button>
                                            </form>
                                        </td>


                                    </tr>

                                @endforeach
                                        @endif
                                @endif

                                <tr>
                                    <td>اجمالي</td>

                                    <td></td>
                                    <td></td>

                                    <td></td>
                                    @if($total<0)

                                        <td>
                                            {{str_replace('-','',$total)}}
                                        </td>




                                    @else
                                        <td>

                                        </td>
                                    @endif
                                    @if($total>0)

                                        <td>
                                            {{$total}}
                                        </td>




                                    @else
                                        <td>

                                        </td>
                                    @endif
                                    <td></td>


                                </tr>

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
<script type="text/javascript">
$(document).ready(function () {
$('select').selectize({
sortField: 'text'
});
});
</script>
@endsection
