<?php $__env->startSection('content'); ?>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2">
                <h3 class="content-header-title font-theme ls-0">ادخال قيود</h3>
            </div>
        </div>
        <div class="content-body">
            <div class="card">
                <div class="card-block">
                    <?php if(Session::has('success')): ?>
                        <p class="alert alert-success"><?php echo e(Session::get('success')); ?></p>
                    <?php else: ?>
                    <?php endif; ?>
                        <?php if(Session::has('error')): ?>
                            <p class="alert alert-danger"><?php echo e(Session::get('error')); ?></p>
                        <?php else: ?>
                        <?php endif; ?>
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    <div class="card-body">
                        <form method="post" action="/upload" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ملف الاكسيل</label>
                                        <input type="file" name="select_file"  accept=".xlsx,.csv" required class="form-control">
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <button type="submit" class="btn-primary"><i class="icon-plus"></i> إضافة</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/codeitco/accountant.3codeit.com/resources/views/account/upload.blade.php ENDPATH**/ ?>