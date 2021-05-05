$(document).ready(function() {

	// DataTable

	$('.datatable').DataTable({
		'language': {
		    'sEmptyTable': 'ليست هناك بيانات متاحة في الجدول',
		    'sLoadingRecords': 'جارٍ التحميل...',
		    'sProcessing': 'جارٍ التحميل...',
		    'sLengthMenu': 'عرض_MENU_ مدخلات',
		    'sZeroRecords': 'لم يعثر على أية سجلات',
		    'sInfo': 'عرض _START_ إلى _END_ من أصل _TOTAL_ مدخلات',
		    'sInfoEmpty': 'يعرض 0 إلى 0 من أصل 0 سجل',
		    'sInfoFiltered': '(منتقاة من مجموع _MAX_ مُدخل)',
		    'sInfoPostFix': '',
		    'sSearch': 'بحث:',
		    'sUrl': '',
		    'oPaginate': {
		    	'sFirst': 'الأول',
		    	'sPrevious': 'السابق',
		    	'sNext': 'التالي',
		    	'sLast': 'الأخير'
		    },
		    'oAria': {
			    'sSortAscending': ': تفعيل لترتيب العمود تصاعدياً',
			    'sSortDescending': ': تفعيل لترتيب العمود تنازلياً'
		    }
		}
	});

});