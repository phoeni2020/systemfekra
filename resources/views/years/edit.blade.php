@extends('layout.master2')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2">
                <h3 class="content-header-title font-theme ls-0">تعديل السنة المالية</h3>
            </div>
        </div>
        <div class="content-body">
            <div class="card">
                <div class="card-block">
                    <div class="card-body">
                        <form action="{{route('years.update',$driver->id)}}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            {!! method_field('PUT') !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>السنة</label>
                                        <input type="number" name="year"value="{{$driver->year}}"  required class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-cyan btn-icon-text my-2"><i class="icon-check"></i> حفظ</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection