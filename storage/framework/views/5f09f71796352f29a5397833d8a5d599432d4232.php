<?php $__env->startSection('content'); ?>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2">
                <h3 class="content-header-title font-theme ls-0">تعديل غياب الموظف</h3>
            </div>
        </div>
        <div class="content-body">
            <div class="card">
                <div class="card-block">
                    <div class="card-body">
                        <form action="<?php echo e(url('updateAttendance/'.$attendance->id)); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الموظفين</label>
                                        <select name="employee_id" class="form-control">
                                            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($emp->id); ?>"<?php if($emp->id==$attendance->employee_id): ?> selected <?php endif; ?>.0><?php echo e($emp->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>عدد الايام</label>
                                        <input type="number" name="num_days" value="<?php echo e($attendance->num_days); ?>" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>قيمة اليوم</label>
                                        <input type="number" step="0.1" name="day_value"  value="<?php echo e($attendance->day_value); ?>"  required class="form-control">
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/codeitco/accountant.3codeit.com/resources/views/admin/attendance/edit.blade.php ENDPATH**/ ?>