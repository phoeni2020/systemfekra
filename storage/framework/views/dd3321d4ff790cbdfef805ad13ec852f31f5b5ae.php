<?php $__env->startSection('content'); ?>

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">


            </div>
            <div class="content-body">
                <div class="card">
                    <div class="card-block">
                        <?php if(Session::has('success')): ?>
                            <p class="alert alert-success"><?php echo e(Session::get('success')); ?></p>
                        <?php else: ?>
                        <?php endif; ?>
                        <div class="card-body">
        <!-- Enry Modal -->

                    <form id="add-form" action="/admin/entry" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4 mb-1 order-md-1 order-2">




                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-4">رقم القيد</label>
                                        <div class="col-sm-8"><input type="text" name="registration_number" value="<?php if($transaction): ?><?php echo e($transaction->id+1); ?> <?php else: ?> 1 <?php endif; ?>" class="form-control bg-gray-light"></div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-4">التاريخ</label>
                                        <div class="col-sm-8"><input type="text" name="date" required class="form-control bg-gray-light" id="current-date"></div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-1 text-center order-md-1 order-1">
                                    <h5 class="modal-title">قيد يومية</h5>
                                </div>
                                <div class="col-md-4 mb-1 order-md-1 order-3">
                                    <div class="form-group row">&nbsp;</div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-4">الفرع</label>
                                        <div class="col-sm-8"><input type="text" name="branch" class="form-control bg-gray-light"></div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-4">نوع القيد</label>
                                        <div class="col-sm-8"><input name="type" type="text" class="form-control bg-gray-light"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card shadow-none m-0">
                                        <div class="card-body table-responsive p-0" style="height:250px;">
                                            <table class="table table-head-fixed text-nowrap table-striped-td table-input-td text-center" id="add-table">
                                                <thead>
                                                <tr>
                                                    <th>اسم الحساب</th>
                                                    <th>المدين</th>
                                                    <th>الدائن</th>
                                                    <th>البيان</th>
                                                    <th>حذف</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr id="entryrow_1">
                                                    <td>
                                                        <select required  data-type="name" class="form-control " id="name_1" name="names[]" autocomplete="off">
                                                            <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($account->id); ?>">
                                                                    <?php echo e($account->name); ?>


                                                                </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </td>
                                                    <td><input type="text" class="form-control bg-transparent border-0 inputs" id="debtor_1" name="debtor[]"></td>
                                                    <td><input type="text" class="form-control bg-transparent border-0 inputs" id="creditor_1" name="creditor[]"></td>
                                                    <td><input type="text" class="form-control bg-transparent border-0 inputs sal-lst" id="statement_1" name="statement[]"></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0 row">
                            <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save mr-2"></i>حفظ</button>
                        </div>
                    </form>

        <!-- End Entry Modal -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Content -->
    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </a>
    <script src="/assets/vendor/jquery/jquery.min.js"></script>

    <script>
        var AddMultiAutoField = (function(){
            var rowcount, html, tableBody, rowId;
            rowcount = $("#add-table tbody tr").length+1;
            tableBody = $("#add-table tbody");

            function formHtml(code) {
                rowId = $("#add-table tbody tr").attr('id').split('_')[0];

                if (code == 13 && rowId == 'invoicerow') {
                    html = '<tr id="invoicerow_'+rowcount+'">';
                    html += '<td><input type="text" class="form-control bg-transparent border-0 inputs" id="id_'+rowcount+'" name="id[]"></td>';
                    html += '<td><input type="text" data-type="code" class="form-control bg-transparent border-0 inputs autocomplete_txt" id="code_'+rowcount+'" name="code[]" autocomplete="off"></td>';
                    html += '<td><input type="text" data-type="name" class="form-control bg-transparent border-0 inputs autocomplete_txt" id="name_'+rowcount+'" name="name[]" autocomplete="off"></td>';
                    html += '<td><input type="text" class="form-control bg-transparent border-0 inputs" id="quantity_'+rowcount+'" name="quantity[]"></td>';
                    html += '<td><input type="text" data-type="unit" class="form-control bg-transparent border-0 inputs autocomplete_txt" id="unit_'+rowcount+'" name="unit[]" autocomplete="off"></td>';
                    html += '<td><input type="text" data-type="price" class="form-control bg-transparent border-0 inputs autocomplete_txt" id="price_'+rowcount+'" name="price[]" autocomplete="off"></td>';
                    html += '<td><input type="text" class="form-control bg-transparent border-0 inputs sal-lst" id="total_'+rowcount+'" name="total[]"></td>';
                    html += '<td class="p-0"><button type="button" class="btn btn-rounded border-radius-left-0 btn-danger">حذف</button></td>';
                    html += '</tr>';
                    rowcount++;
                    return html;
                }
                var accounts = <?php echo json_encode($accounts)?>;
                var options='';
                for(var i=0;i<accounts.length;i++)
                {
                    options+='<option value="'+accounts[i].id+'">'+accounts[i].name+'</option>';

                }

                if (code == 13 && rowId == 'entryrow') {
                    html = '<tr id="entryrow_'+rowcount+'">';
                    html += '<td> <select  required  class="form-control " id="name_'+rowcount+'" name="names[]" autocomplete="off">' +

                        options+
                        '</select></td>';

                    html += '<td><input type="text" class="form-control bg-transparent border-0 inputs" id="debtor_'+rowcount+'" name="debtor[]"></td>';
                    html += '<td><input type="text" class="form-control bg-transparent border-0 inputs" id="creditor_'+rowcount+'" name="creditor[]"></td>';
                    html += '<td><input type="text" class="form-control bg-transparent border-0 inputs sal-lst" id="statement_'+rowcount+'" name="statement[]"></td>';
                    html += '<td class="p-0"><button type="button" class="btn btn-rounded border-radius-left-0 btn-danger">حذف</button></td>';
                    html += '</tr>';
                    rowcount++;

                    return html;
                }
            }

            function getFieldNo(type){
                var fieldNo;
                switch (type) {
                    case 'name':
                        fieldNo = 0;
                        break;
                    case 'code':
                        fieldNo = 1;
                        break;
                    case 'unit':
                        fieldNo = 2;
                        break;
                    case 'price':
                        fieldNo = 3;
                        break;
                    default:
                        break;
                }
                return fieldNo;
            }
            function handleMultiAutocomplete() {
                var type, fieldNo, currentEle;
                type = $(this).data('type');
                fieldNo = getFieldNo(type);
                currentEle = $(this);

                if(typeof fieldNo === 'undefined') {
                    return false;
                }

                currentEle.autocomplete({
                    source: function (data, cb) {
                        var result;
                        result = [
                            {
                                label: 'There is matching record found for '+data.term,
                                value: ''
                            }
                        ];
                        if (multiple.length) {
                            var result = $.map(multiple, function (obj) {
                                var arr = obj.split("|");
                                return { label: arr[fieldNo], value: arr[fieldNo], data: obj };
                            });
                        }
                        data.term, cb($.ui.autocomplete.filter(result, data.term));
                    },
                    autoFocus: true,
                    minLength: 1,
                    select: function( event, ui ) {
                        var resArr, rowNo;


                        rowNo = getId(currentEle);
                        resArr = ui.item.data.split("|");

                        $('#name_'+rowNo).val(resArr[0]);
                        $('#code_'+rowNo).val(resArr[1]);
                        $('#unit_'+rowNo).val(resArr[2]);
                        $('#price_'+rowNo).val(resArr[3]);
                    }
                });
            }

            function getId(element){
                var id, idArr;
                id = element.attr('id');
                idArr = id.split("_");
                return idArr[idArr.length - 1];
            }

            function addNewRow(code) {
                $('#add-table').append(formHtml(code));
                $('select').selectize({
                    sortField: 'text'
                });
            }

            function deleteRow() {
                $(this).closest('tr').remove();
            }

            function registerEvents() {
                $('#add-table').on('keyup', '.sal-lst', function(e) {
                    var code = (e.keyCode ? e.keyCode : e.which);
                    addNewRow(code);
                });

                $('#add-table').on('keydown', '.inputs', function(e) {
                    var code = (e.keyCode ? e.keyCode : e.which);
                    if (code == 13) {
                        var index = $('.inputs').index(this) + 1;
                        $('.inputs').eq(index).focus();
                    }
                });

                $('#add-table').on('click', '.btn-danger', deleteRow);

                $(document).on('focus','.autocomplete_txt', handleMultiAutocomplete);

                $(window).ready(function() {
                    $("#add-form").on("keypress", function (event) {
                        var keyPressed = event.keyCode || event.which;
                        if (keyPressed === 13) {
                            event.preventDefault();
                        }
                    });
                });
            }
            function init() {
                registerEvents();
            }

            return {
                init: init
            };
        })();

        $(document).ready(function(){
            $("#accModal").modal('show');
            AddMultiAutoField.init();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('select').selectize({
                sortField: 'text'
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/codeitco/accountant.3codeit.com/resources/views/account/entry.blade.php ENDPATH**/ ?>