<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        $('.myform').submit(function() {
            if (confirm('هل ان متأكد من حذف سلف الموظف؟')) {

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
                <center>
               <h3 class="content-header-title font-theme ls-0">قائمة سلف الموظف</h3>
                </center>
            </div>

        </div>
        <div class="content-body">
            <div class="card">
                <div class="card-block">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped datatable">
                                <thead>
                                <tr>
                                    <th>تسلسل</th>
                                    <th>الموظف</th>
                                    <th>المبلغ</th>
                                    <th>عدد شهور الخصم</th>

                                    <th></th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($driver->id); ?></td>
                                    <td><?php echo e($driver->employee->name); ?></td>
                                    <td><?php echo e($driver->money); ?></td>
                                    <td><?php echo e($driver->num_of_months); ?></td>

                                    <td>




                                            <a href="<?php echo e(url('admin/deleteCount/'.$driver->id)); ?>" class="btn btn-icon btn-sm btn-danger">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                <span><strong>حذف</strong></span>
                                            </a>
                                            <a href="<?php echo e(url('admin/editCount/'.$driver->id)); ?>" class="btn btn-success a-btn-slide-text">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                <span><strong>تعديل</strong></span>
                                            </a>

                                    </td>
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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/codeitco/accountant.3codeit.com/resources/views/admin/count/index.blade.php ENDPATH**/ ?>