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
<?php $__env->startSection('content'); ?>
<!-- ////////////////////////////////////////////////////////////////////////////-->



<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2">
                <h3 class="content-header-title font-theme ls-0">تقرير</h3>
            </div>

        </div>
        <div class="content-body">
            <div class="card">
                <div class="card-block">
                    <div class="card-body">
                        <form method="get" action="/admin/report" class="row p-0">

                            <div class="input-group mb-2">
                                <select name="supplier"  class="form-control">
                                    <option value="" disabled="" selected="">اختار المورد</option>

                                    <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($account->id); ?>"><?php echo e($account->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <input type="date" class="form-control" name="from"  placeholder="من" style="border: 1px solid #ced4da;border-radius: .25rem;">
                                <input type="date" class="form-control"  name="to" placeholder="الي" style="border: 1px solid #ced4da;border-radius: .25rem;">

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
                                    <th>رقم الفاتورة</th>
                                    <th>التاريخ</th>
                                    <th>مبلغ الفاتورة</th>
                                    <th>الخصم </th>
                                    <th>الضريبة </th>
                                    <th>الصافي </th>
                                    <th>توع السداد </th>

                                </tr>
                                </thead>
                                <tbody>


                                <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($driver->id); ?></td>
                                        <td><?php echo e($driver->date); ?></td>
                                        <td><?php echo e($driver->total); ?></td>
                                        <td><?php echo e($driver->discount); ?></td>
                                        <td><?php echo e($driver->tax); ?></td>
                                        <td><?php echo e($driver->total - $driver->discount + $driver->tax); ?></td>
                                        <td><?php echo e($driver->type); ?></td>
                                    </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/codeitco/accountant.3codeit.com/resources/views/account/report.blade.php ENDPATH**/ ?>