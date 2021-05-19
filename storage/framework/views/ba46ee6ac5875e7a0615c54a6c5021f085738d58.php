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
            <div class="content-header-left col-md-12 col-12 mb-2">
               <center> <h3 class="content-header-title font-theme ls-0">ميزان المراجعة</h3></center>
            </div>

        </div>
        <form method="get" name="/review" >
            <input type="date" name="from">
            <input type="date" name="to">
            <input type="number" placeholder="ميزان لفرع معين" step="0.1" name="branch">
            <button type="submit">بحث</button>
        </form>
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

                                    <th>رقم الحساب</th>
                                    <th>مدين </th>
                                    <th>دائن </th>

                                    <th>مدين </th>
                                    <th>دائن </th>

                                    <th>مدين </th>
                                    <th>دائن </th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php ($total=0); ?>
                                <?php ($totalcredit=0); ?>
                                <?php ($totaldepit=0); ?>
                                <?php ($totalcreditsalary=0); ?>
                                <?php ($totaldepitsalary=0); ?>
                                <?php $__currentLoopData = $drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php ($driver->balance=$driver->credit+$driver->depit); ?>
                                <tr>
                                    <td><?php echo e($driver->id); ?></td>


                                    <td> <a href="<?php echo e(url('admin/userTransaction/'.$driver->id)); ?>"> <?php echo e($driver->name); ?></a></td>

                                    <td><?php echo e($driver->number); ?></td>
                                    <td><?php echo e($driver->credit_salary); ?></td>
                                    <td><?php echo e($driver->debit_salary); ?></td>
                                    <?php ($totalcreditsalary+=$driver->credit_salary); ?>
                                    <?php ($totaldepitsalary+=$driver->debit_salary); ?>
                                    <td><?php echo e(str_replace('-','',$driver->credit)); ?></td>
                                    <td><?php echo e($driver->depit); ?></td>
                                    <?php ($totalcredit+=$driver->credit); ?>
                                    <?php ($totaldepit+=$driver->depit); ?>
                                    <?php ($driver->balance=$driver->balance-$driver->credit_salary+$driver->debit_salary); ?>
                                <?php if($driver->balance<0): ?>
                                        <?php ($total+=$driver->balance); ?>

                                        <td>
                                            <?php echo e(str_replace('-','',$driver->balance)); ?>

                                    </td>




                                        <?php else: ?>
                                    <td>

                                    </td>
                                        <?php endif; ?>
                                    <?php if($driver->balance>0): ?>
                                        <?php ($total+=$driver->balance); ?>

                                        <td>
                                            <?php echo e($driver->balance); ?>

                                        </td>




                                    <?php else: ?>
                                        <td>

                                        </td>
                                    <?php endif; ?>


                                </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>اجمالي</td>

                                    <td></td>

                                    <td></td>
                                    <td><?php echo e($totalcreditsalary); ?></td>
                                    <td><?php echo e($totaldepitsalary); ?></td>


                                    <td><?php echo e(str_replace('-','',$totalcredit)); ?></td>
                                    <td><?php echo e($totaldepit); ?></td>
                                    <?php if($total<0): ?>

                                        <td><?php echo e(str_replace('-','',$total)); ?></td>




                                    <?php else: ?>
                                        <td>

                                        </td>
                                    <?php endif; ?>
                                    <?php if($total>0): ?>

                                        <td>
                                            <?php echo e($total); ?>

                                        </td>


                                    <?php else: ?>
                                        <td>

                                        </td>
                                    <?php endif; ?>


                                </tr>

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

<?php echo $__env->make('layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/codeitco/accountant.3codeit.com/resources/views/account/review.blade.php ENDPATH**/ ?>