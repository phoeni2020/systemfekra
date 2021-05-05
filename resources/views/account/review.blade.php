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
            <div class="content-header-left col-md-12 col-12 mb-2">
               <center> <h3 class="content-header-title font-theme ls-0">ميزان المراجعة</h3></center>
            </div>

        </div>
        <form method="get" name="/review" >
            <input type="date" name="from">
            <input type="date" name="to">
            <input type="number" placeholder="ميزان لفرع معين" step="0.1" name="branch">
            <button type="submit">بحث</button>
        </form>
        <div class="content-body">
            <div class="card">
                <div class="card-block">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped datatable">
                                <thead>
                                <tr>
                                    <th>تسلسل</th>

                                    <th>الاسم</th>

                                    <th>رقم الحساب</th>
                                    <th>مدين </th>
                                    <th>دائن </th>

                                    <th>مدين </th>
                                    <th>دائن </th>

                                    <th>مدين </th>
                                    <th>دائن </th>

                                </tr>
                                </thead>
                                <tbody>
                                @php($total=0)
                                @php($totalcredit=0)
                                @php($totaldepit=0)
                                @php($totalcreditsalary=0)
                                @php($totaldepitsalary=0)
                                @foreach($drivers as $driver)
                                    @php($driver->balance=$driver->credit+$driver->depit)
                                <tr>
                                    <td>{{$driver->id}}</td>


                                    <td> <a href="{{url('admin/userTransaction/'.$driver->id)}}"> {{$driver->name}}</a></td>

                                    <td>{{$driver->number}}</td>
                                    <td>{{$driver->credit_salary}}</td>
                                    <td>{{$driver->debit_salary}}</td>
                                    @php($totalcreditsalary+=$driver->credit_salary)
                                    @php($totaldepitsalary+=$driver->debit_salary)
                                    <td>{{str_replace('-','',$driver->credit)}}</td>
                                    <td>{{$driver->depit}}</td>
                                    @php($totalcredit+=$driver->credit)
                                    @php($totaldepit+=$driver->depit)
                                    @php($driver->balance=$driver->balance-$driver->credit_salary+$driver->debit_salary)
                                @if($driver->balance<0)
                                        @php($total+=$driver->balance)

                                        <td>
                                            {{str_replace('-','',$driver->balance)}}
                                    </td>




                                        @else
                                    <td>

                                    </td>
                                        @endif
                                    @if($driver->balance>0)
                                        @php($total+=$driver->balance)

                                        <td>
                                            {{$driver->balance}}
                                        </td>




                                    @else
                                        <td>

                                        </td>
                                    @endif


                                </tr>

                                @endforeach
                                <tr>
                                    <td>اجمالي</td>

                                    <td></td>

                                    <td></td>
                                    <td>{{$totalcreditsalary}}</td>
                                    <td>{{$totaldepitsalary}}</td>


                                    <td>{{str_replace('-','',$totalcredit)}}</td>
                                    <td>{{$totaldepit}}</td>
                                    @if($total<0)

                                        <td>{{str_replace('-','',$total)}}</td>




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


@endsection
