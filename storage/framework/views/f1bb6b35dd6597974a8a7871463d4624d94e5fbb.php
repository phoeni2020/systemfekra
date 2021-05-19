
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
<?php $__env->startSection('content'); ?>
<!-- ////////////////////////////////////////////////////////////////////////////-->



<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2">
                <center>
                <h3 class="content-header-title font-theme ls-0">فواتير بيع
                </h3>
                </center>
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
                                <?php $__currentLoopData = $drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $drive): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($drive->id); ?></td>
                                    <td><?php echo e($drive->date); ?></td>
                                    <td><?php echo e($drive->registration_number); ?></td>

                                    <td><?php echo e($drive->total - $drive->tax + $drive->discount); ?></td>
                                    <td><?php echo e($drive->discount); ?></td>
                                    <td><?php echo e($drive->tax); ?></td>
                                    <td><?php echo e($drive->total); ?></td>
                                    <td>

                                        <form class="myform"  id="<?php echo e($drive->id); ?>"  method="post"  action="<?php echo e('purchase/delete/'.$drive->id); ?>">
                                            <?php echo csrf_field(); ?>

                                            <?php echo method_field('Delete'); ?> <button class="btn btn-icon btn-sm btn-danger" style="float: none;">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                <span><strong>حذف</strong></span>
                                            </button>
                                        </form>
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

<?php echo $__env->make('layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/codeitco/accountant.3codeit.com/resources/views/admin/purchase/index3.blade.php ENDPATH**/ ?>