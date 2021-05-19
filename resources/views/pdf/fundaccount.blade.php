<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body{
            font-family: DejaVu Sans, sans-serif;
            align-content: right;
        }
        td{
            margin :3px;
            padding: 3px;
            border: 1px solid;
            text-align:center;
        }
        th{
            margin :3px;
            padding: 3px;
            border: 1px solid;
            text-align:center;
        }
    </style>
    <body dir="rtl">
    <table style="padding:3px; margin:3px;  border : 1px solid">
        <thead>
        <tr>
            <th colspan="4">
                بيان كشف الصندوق
            </th>
        </tr>
        <tr style="padding:3px; margin:3px; border : 1px solid">
            <th>رصيد</th>
            <th>دائن</th>
            <th>مدين</th>
            <th>اسم البيان</th>
        </tr>
        </thead>
        @foreach($fundaccounts as $fundaccount)
            <tr>
                <td>{{$fundaccount->balance}}</td>
                <td>{{$fundaccount->credit}}</td>
                <td>{{$fundaccount->debit}}</td>
                <td>{{$fundaccount->name}}</td>
            </tr>
    @endforeach
    </body>
