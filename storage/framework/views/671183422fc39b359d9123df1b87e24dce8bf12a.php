<?php $__env->startSection('content'); ?>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2">
                <h3 class="content-header-title font-theme ls-0">إضافة سند قبض</h3>
            </div>
        </div>
        <div class="content-body">
            <div class="card">
                <?php if(Session::has('success')): ?>
                    <p class="alert alert-success"><?php echo e(Session::get('success')); ?></p>
                <?php else: ?>
                <?php endif; ?>
                <div class="card-block">
                    <div class="card-body">
                        <form method="post" action="/admin/catch" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>التاريخ</label>
                                        <input type="date" value="<?php echo e(date('Y-m-d')); ?>" name="date" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>رقم السند</label>
                                        <input type="text" value="<?php if($transaction): ?><?php echo e($transaction->id+1); ?> <?php else: ?> 1 <?php endif; ?>" name="statement" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> الحساب</label>
                                <select name="account_id" required class="form-control  bg-gray-light autocomplete_txt">
                                    <option value="" disabled="" selected="">اختار الحساب</option>

                                    <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($account->id); ?>"><?php echo e($account->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>المبلغ</label>
                                        <input type="number" step=".001" name="money" required class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ملاحظات</label>
                                        <input type="text" name="notes" required class="form-control">
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
<script src="/assets/vendor/jquery/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('select').selectize({
            sortField: 'text'
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/codeitco/accountant.3codeit.com/resources/views/account/catch.blade.php ENDPATH**/ ?>