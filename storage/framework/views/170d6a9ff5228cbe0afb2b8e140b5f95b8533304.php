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
              <center>  <h3 class="content-header-title font-theme ls-0">قائمة المنتجات</h3> </center>
            </div>
            <div class="content-header-right col-md-4 col-12 mb-2">
                <a href="<?php echo e(url('admin/products/create')); ?>" class="btn btn-primary" ><i class="icon-plus"></i> إضافة </a>
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
                                    <th>الاسم</th>
                                    <th>المخزن</th>
                                    <th>المورد</th>

                                    <th>باكو</th>
                                    <th>علبة</th>
                                    <th>كرتونة</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($driver->id); ?></td>
                                    <td><?php echo e($driver->name); ?></td>
                                    <?php if($driver->store): ?>
                                    <td><?php echo e($driver->store->name); ?></td>
                                    <?php else: ?> <td></td><?php endif; ?>
                                    <?php if($driver->supplier): ?>
                                    <td><?php echo e($driver->supplier->name); ?></td>
                                    <?php else: ?> <td></td> <?php endif; ?>



                                    <td><?php echo e($driver->baku); ?></td>
                                    <td><?php echo e($driver->box); ?></td>
                                    <td><?php echo e($driver->carton); ?></td>


                                    <td>



                                        <form class="myform"  id="<?php echo e($driver->id); ?>"  method="post"  action="<?php echo e((route('products.destroy',$driver->id))); ?>">
                                            <?php echo csrf_field(); ?>
                                            <a href="<?php echo e((route('products.edit',$driver->id))); ?>" class="btn btn-success a-btn-slide-text">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                <span><strong>تعديل</strong></span>
                                            </a>
                                            <?php echo method_field('Delete'); ?> <button class="btn btn-icon btn-sm btn-danger" style="float: none;">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                <span><strong>حذف</strong></span>
                                            </button></form>
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

<?php echo $__env->make('layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/codeitco/accountant.3codeit.com/resources/views/admin/products/index.blade.php ENDPATH**/ ?>