<?php $__env->startSection('content'); ?>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2">
                <h3 class="content-header-title font-theme ls-0">تعديل المستخدم</h3>
            </div>
        </div>
        <div class="content-body">
            <div class="card">
                <div class="card-block">
                    <div class="card-body">
                        <form action="<?php echo e(route('users.update',$driver->id)); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <?php echo method_field('PUT'); ?>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الاسم</label>
                                        <input type="text" name="name"value="<?php echo e($driver->name); ?>"  required class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>البريد الالكتروني</label>
                                        <input type="email" name="email"value="<?php echo e($driver->email); ?>"  required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>كلمة المرور</label>
                                        <input type="text" name="password"class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>صلاحيات المستخدم</label>

                                        <input type="checkbox" class="form-control"  <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($per->name=="المحاسبة"): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> name="per_name[]" value="المحاسبة">
                                        <label>المحاسبة</label>
                                        <input type="checkbox" class="form-control"   <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($per->name=="سند قبض"): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> name="per_name[]" value="سند قبض">
                                        <label>سند قبض</label>
                                        <input type="checkbox" class="form-control"   <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($per->name=="صرف"): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> name="per_name[]" value="صرف">
                                        <label>صرف</label>
                                        <input type="checkbox" class="form-control"   <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($per->name=="قيود يومية"): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> name="per_name[]" value="قيود يومية">
                                        <label>قيود يومية</label>
                                        <input type="checkbox" class="form-control"  <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($per->name=="ميزان المراجعه"): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> hname="per_name[]" value="ميزان المراجعه">
                                        <label>ميزان المراجعه</label>
                                        <input type="checkbox" class="form-control"  <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($per->name=="مشتريات"): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> name="per_name[]" value="مشتريات">
                                        <label>مشتريات</label>
                                        <input type="checkbox" class="form-control"  <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($per->name=="فاتورة المشتريات"): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> name="per_name[]" value="فاتورة المشتريات">
                                        <label>فاتورة المشتريات</label>
                                        <input type="checkbox" class="form-control"   <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($per->name=="مردود المشتريات"): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> name="per_name[]" value="مردود المشتريات">
                                        <label>مردود المشتريات</label>
                                        <input type="checkbox" class="form-control"  <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($per->name=="المخزون"): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> name="per_name[]" value="المخزون">
                                        <label>المخزون</label>
                                        <input type="checkbox" class="form-control"   <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($per->name=="انشاءالاصناف"): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> name="per_name[]" value="انشاءالاصناف">
                                        <label>انشاءالاصناف</label>
                                        <input type="checkbox" class="form-control"   <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($per->name=="انشاءالمجموعات"): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> name="per_name[]" value="انشاءالمجموعات">
                                        <label>انشاءالمجموعات</label>
                                        <input type="checkbox" class="form-control"  <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($per->name=="التقارير"): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  name="per_name[]" value="التقارير">
                                        <label>التقارير</label>
                                        <input type="checkbox" class="form-control"  <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($per->name=="كاشير"): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> name="per_name[]" value="كاشير">
                                        <label>كاشير</label>


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

<?php echo $__env->make('layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/codeitco/accountant.3codeit.com/resources/views/admin/users/edit.blade.php ENDPATH**/ ?>