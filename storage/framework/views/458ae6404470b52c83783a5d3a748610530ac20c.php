<?php $__env->startSection('content'); ?>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2">
                <h3 class="content-header-title font-theme ls-0">تعديل الموظف</h3>
            </div>
        </div>
        <div class="content-body">
            <div class="card">
                <div class="card-block">
                    <div class="card-body">
                        <form action="<?php echo e(route('employees.update',$driver->id)); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <?php echo method_field('PUT'); ?>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الاسم</label>
                                        <input type="text"value="<?php echo e($driver->name); ?>" name="name"required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>البريد الالكتروني</label>
                                        <input type="email"value="<?php echo e($driver->email); ?>" name="email" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>رقم المحمول</label>
                                        <input type="text"value="<?php echo e($driver->mobile); ?>" required name="mobile"class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>رقم الهاتف</label>
                                        <input type="text"value="<?php echo e($driver->phone); ?>" required name="phone"class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>رقم المحمول</label>
                                        <input type="text"value="<?php echo e($driver->mobile); ?>" required name="mobile"class="form-control">
                                    </div>
                                </div> <div class="col-md-6">
                                    <div class="form-group">
                                        <label>رقم البطاقة</label>
                                        <input type="text" value="<?php echo e($driver->national_id); ?>"required name="national_id"class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>تاريخ الميلاد </label>
                                        <input type="date" value="<?php echo e($driver->birthdate); ?>" name="birthdate"required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>	ساعات العمل الاضافي</label>
                                        <input type="text"  value="<?php echo e($driver->working_hours); ?>"name="working_hours"required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الجنسية</label>
                                        <input type="text" value="<?php echo e($driver->national); ?>" name="national"required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الراتب</label>
                                        <input type="text" value="<?php echo e($driver->salary); ?>" name="salary"required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الفرع</label>
                                        <input type="text"  value="<?php echo e($driver->branch); ?>"name="branch"required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الحالة الاجتماعية</label>
                                        <input type="text"value="<?php echo e($driver->social_status); ?>" name="social_status"required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الفرع</label>
                                        <input type="text" value="<?php echo e($driver->branch); ?>" name="branch"required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الادارة</label>
                                        <input type="text"  value="<?php echo e($driver->manges); ?>" name="manges"required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>المستوي العلمي</label>
                                        <input type="text" value="<?php echo e($driver->education_status); ?>" name="education_status"required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الوظيفة</label>
                                        <input type="text" value="<?php echo e($driver->job); ?>" name="job"required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>تاريخ التخرج</label>
                                        <input type="date" value="<?php echo e($driver->graduation_date); ?>" name="graduation_date"required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>المدير المباشر</label>
                                        <input type="text" value="<?php echo e($driver->head_manger); ?>" name="head_manger"required class="form-control">
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

<?php echo $__env->make('layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/codeitco/accountant.3codeit.com/resources/views/admin/employees/edit.blade.php ENDPATH**/ ?>