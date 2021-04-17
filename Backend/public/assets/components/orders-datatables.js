"use strict";
var KTDatatablesAdvancedMultipleControls = function() {
	var init = function() {
		var table = $('#kt_datatable');

		// begin first table
		var DataTable = table.DataTable({
			// DOM Layout settings
			dom:'Bfrtip',
			dom:
				"<'row'<'col-xs-12 col-sm-6 col-md-6'l><'col-xs-12 col-sm-6 col-md-6 text-right'Bf>>" +
				"<'row'<'col-xs-6 col-sm-6 col-md-6'i><'col-xs-6 col-sm-6 col-md-6'p>> " +
				"<'row'<'col-sm-12 'tr>>" +
				"<'row'<'col-xs-4 col-sm-6 col-md-6 'l><'col-xs-8 col-sm-6 col-md-6  text-right'f>>" +
				"<'row'<'col-xs-6 col-sm-6 col-md-6 'i><'col-xs-6 col-sm-6 col-md-6 'p>>", // read more: https://datatables.net/examples/basic_init/dom.html
	        buttons: [
	            {
	                extend: 'colvis',
	                columns: ':not(.noVis)',
	                text: "<i class='fa fas fa-angle-down'></i> عرض الأعمدة",
	            },
	            {
	             	extend: 'print',
	             	customize: function (win) {
                       $(win.document.body).css('direction', 'rtl');     
                    },
 					'exportOptions': {
				    	columns: ':not(:last-child)',
				  	},
	         	},
	         	{
	             	extend: 'copy',
 					'exportOptions': {
				    	columns: ':not(:last-child)',
				  	},
	         	},
	         	{
	             	extend: 'excel',
 					'exportOptions': {
				    	columns: ':not(:last-child)',
				  	},
	         	},
	         	{
	             	extend: 'csv',
 					'exportOptions': {
				    	columns: ':not(:last-child)',
				  	},
	         	},
	         	{
	             	extend: 'pdf',
 					'exportOptions': {
				    	columns: ':not(:last-child)',
				  	},
	         	},
	        ],
	        oLanguage: {
				sSearch: "  البحث: ",
				sInfo: 'يتم العرض من  _START_ الي _END_ (العدد الكلي للسجلات _TOTAL_ )',
				sLengthMenu: 'عرض _MENU_ سجلات',
				sEmptyTable: "لا يوجد نتائج مسجلة",
				sProcessing: "جاري التحميل",
				sInfoEmpty: "لا يوجد نتائج مسجلة",
				select:{
					rows: {
                    	_: "لقد قمت باختيار %d عناصر",
	                    0: "",
	                    1: "لقد قمت باختيار عنصر واحد"
	                }
				}
			},
			responsive: true,
			searchDelay: 500,
			processing: true,
			serverSide: true,
			stateSave: true,
			select: {
				style: 'multi',
				selector: 'td:nth-child(2) .checkable',
			},
			ajax: {
				url: '/'+$('input.url').val(),
				type: 'GET',
				data:function(dtParms){
			       	dtParms.created_at = $('#kt_datetimepicker_7_1').val();
			       	dtParms.status = $('select[name="status"]').val();
			       	dtParms.category_id = $('select[name="category_id"]').val();
			        dtParms.columnsDef= [
						'id','order_no' ,'name','email','phone','card_name','fieldText','cityText','membershipText','brief','statusText','created_at'];
			        return dtParms
			    }
			},
			columns: [
				{data: 'id'},
				{data: 'id'},
				{data: 'order_no'},
				{data: 'name'},
				{data: 'email',},
				{data: 'phone',},
				{data: 'card_name',},
				{data: 'fieldText',},
				{data: 'cityText',},
				{data: 'membershipText',},
				{data: 'brief',},
				{data: 'statusText',},
				{data: 'created_at', type: 'date'},
				{data: 'id', responsivePriority: -1},
			],
			columnDefs: [
				{
					targets: 0,
					width: 75,
					orderable: false,
				},
				{
					targets: 1,
					orderable: false,
					render: function(data, type, full, meta) {
						return '<label class="checkbox checkbox-single checkbox-primary mb-0">'+
                            '<input type="checkbox" value="" data-cols="'+full.id+'" class="checkable"/>'+
                            '<span></span>'+
                        '</label>';
					},
				},
				{
					targets: 2,
					title: 'رقم الطلب',
					className: 'edits',
					render: function(data, type, full, meta) {
						return '<a class="editable" data-col="order_no" data-id="'+full.id+'">'+data+'</a>';
					},
				},
				{
					targets: 3,
					title: 'الاسم',
					className: 'edits',
					render: function(data, type, full, meta) {
						return '<a class="editable" data-col="name" data-id="'+full.id+'">'+data+'</a>';
					},
				},
				{
					targets: 4,
					title: 'البريد الالكتروني',
					className: 'edits',
					render: function(data, type, full, meta) {
						return '<a class="editable" data-col="email" data-id="'+full.id+'">'+data+'</a>';
					},
				},
				{
					targets: 5,
					title: 'رقم الجوال',
					className: 'edits',
					render: function(data, type, full, meta) {
						return '<a class="editable" data-col="phone" data-id="'+full.id+'">'+data+'</a>';
					},
				},
				{
					targets: 6,
					title: 'الاسم علي البطاقة',
					className: 'edits',
					render: function(data, type, full, meta) {
						return '<a class="editable" data-col="card_name" data-id="'+full.id+'">'+data+'</a>';
					},
				},
				{
					targets: 7,
					title: 'المجال الفني',
					className: 'edits selects',
					render: function(data, type, full, meta) {
						return '<a class="editable" data-col="field_id" data-id="'+full.id+'"><div class="btn btn-raised waves-effect">'+data+'</div></a>';
					},
				},
				{
					targets: 8,
					title: 'المدينة',
					className: 'edits selects',
					render: function(data, type, full, meta) {
						return '<a class="editable" data-col="city_id" data-id="'+full.id+'"><div class="btn btn-raised waves-effect">'+data+'</div></a>';
					},
				},
				{
					targets: 9,
					title: 'العضوية',
					className: 'edits selects',
					render: function(data, type, full, meta) {
						return '<a class="editable" data-col="membership_id" data-id="'+full.id+'"><div class="btn btn-raised waves-effect">'+data+'</div></a>';
					},
				},
				{
					targets: 10,
					title: 'السيرة الذاتية',
					className: 'edits',
					render: function(data, type, full, meta) {
						return '<a class="editable w-100" data-col="service_brief" data-id="'+full.id+'">'+data+'</a>';
					},
				},
				{
					targets: 11,
					title: 'الحالة',
					className: 'edits selects',
					render: function(data, type, full, meta) {
						return '<a class="editable" data-col="status" data-id="'+full.id+'"><div class="btn btn-raised btn-warning waves-effect">'+data+'</div></a>';
					},
				},
				{
					targets: 12,
					title: 'تاريخ الارسال',
					className: 'edits dates',
					render: function(data, type, full, meta) {
						return '<a class="editable" data-col="created_at" data-id="'+full.id+'">'+data+'</a>';
					},
				},
				{
					targets: -1,
					title: 'الاجراءات',
					width: 100,
					orderable: false,
					render: function(data, type, full, meta) {
						var deleteButton = '';
						var newMembButton = '';
						if($('input[name="data-cols"]').val() == 1){
							deleteButton = '<a href="#" class="dropdown-item" onclick="deleteItem('+data+')">'+
		                                    '<i class="m-nav__link-icon fa fa-trash"></i>'+
		                                    '<span class="m-nav__link-text">حذف</span>'+
		                                '</a>';
						}

						if(full.status == 5){
							newMembButton = '<a href="#" class="dropdown-item newMemb" data-cols="'+full.id+'" data-image="'+full.image+'" data-identity_no="'+full.identity_no+'" data-identity_end_date="'+full.identity_end_date+'" data-identity_image="'+full.identity_image+'" >'+
		                                    '<i class="m-nav__link-icon far fa-credit-card"></i>'+
		                                    '<span class="m-nav__link-text">انشاء عضوية جديدة</span>'+
		                                '</a>';
						}
						return '<div class="main-menu dropdown dropdown-inline">'+
		                            '<button type="button" class="btn btn-light-primary btn-icon btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
		                                '<i class="ki ki-bold-more-hor"></i>'+
		                            '</button>'+
		                            '<div class="dropdown-menu" dropdown-toggle="hover">'+
		                                deleteButton+
		                                newMembButton+
		                            '</div>'+
		                        '</div>';
					},
				},
			],
		});

		if ($("#m_search")[0]) {
		    $("#m_search").on("click", function (t) {
		        t.preventDefault();
		        var e = {};
		        $(".m-input").each(function () {
		            var a = $(this).data("col-index");
		            e[a] ? e[a] += "|" + $(this).val() : e[a] = $(this).val();
		        }), $.each(e, function (t, e) {
		            DataTable.column(t).search(e || "", !1, !1);
		        }), DataTable.table().draw();
		    });
		}

		$('.selectAll').on('click',function(e){
		    e.preventDefault();
		    e.stopPropagation();
		    DataTable.rows().select();
		    $('table input[type="checkbox"]').attr('checked','checked');
		    $('table input[type="checkbox"]').parents('tr').addClass('selected');
		});

		$('.deselectAll').on('click',function(e){
		    e.preventDefault();
		    e.stopPropagation();
		    DataTable.rows().deselect();
		    $('table input[type="checkbox"]').attr('checked', false);
		    $('input[type="checkbox"]').parents('tr').removeClass('selected');
		});

	};

	return {
		//main function to initiate the module
		init: function() {
			init();
		}
	};

}();

jQuery(document).ready(function() {
	KTDatatablesAdvancedMultipleControls.init();

	$('.moveToTrash').on('click',function(e){
	    e.preventDefault();
	    e.stopPropagation();
	    if($('table tr.selected').length){
	        var myArrs = [];
	        $('table tr.selected').each(function(index,item){
	            myArrs.push($(item).find('input[type="checkbox"]:checked').data('cols'));
	        });
	        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
	        $.ajax({
	            type: 'POST',
	            url: myURL+'/changeStatus/7',
	            data:{
	                '_token': $('meta[name="csrf-token"]').attr('content'),
	                'data': myArrs,
	            },
	            success:function(data){
	                if(data.status.original.status.status == 1){
	                    successNotification(data.status.original.status.message);
	                    setTimeout(function(){
	                        $('#kt_datatable').DataTable().ajax.reload();
	                    },2500)
	                }else{
	                    errorNotification(data.status.original.status.message);
	                }
	            },
	        });
	    }else{
	        errorNotification('من فضلك قم باختيار الطلبات');      
	    }
	});

	$('.delete').on('click',function(e){
	    e.preventDefault();
	    e.stopPropagation();
	    if($('table tr.selected').length){
	        var myArrs = [];
	        $('table tr.selected').each(function(index,item){
	            myArrs.push($(item).find('input[type="checkbox"]:checked').data('cols'));
	        });
	        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
	        $.ajax({
	            type: 'POST',
	            url: myURL+'/delete',
	            data:{
	                '_token': $('meta[name="csrf-token"]').attr('content'),
	                'data': myArrs,
	            },
	            success:function(data){
	                if(data.status.original.status.status == 1){
	                    successNotification(data.status.original.status.message);
	                    setTimeout(function(){
	                        $('#kt_datatable').DataTable().ajax.reload();
	                    },2500)
	                }else{
	                    errorNotification(data.status.original.status.message);
	                }
	            },
	        });
	    }else{
	        errorNotification('من فضلك قم باختيار الطلبات');      
	    }
	});

	$('.backToNew').on('click',function(e){
	    e.preventDefault();
	    e.stopPropagation();
	    if($('table tr.selected').length){
	        var myArrs = [];
	        $('table tr.selected').each(function(index,item){
	            myArrs.push($(item).find('input[type="checkbox"]:checked').data('cols'));
	        });
	        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
	        $.ajax({
	            type: 'POST',
	            url: myURL+'/changeStatus/1',
	            data:{
	                '_token': $('meta[name="csrf-token"]').attr('content'),
	                'data': myArrs,
	            },
	            success:function(data){
	                if(data.status.original.status.status == 1){
	                    successNotification(data.status.original.status.message);
	                    setTimeout(function(){
	                        $('#kt_datatable').DataTable().ajax.reload();
	                    },2500)
	                }else{
	                    errorNotification(data.status.original.status.message);
	                }
	            },
	        });
	    }else{
	        errorNotification('من فضلك قم باختيار الطلبات');      
	    }
	});
	
	$(document).on('click','.newMemb',function(e){
		e.preventDefault();
		e.stopPropagation();
		var id = $(this).data('cols');
		var image = $(this).data('image');
		var identity_no = $(this).data('identity_no');
		var identity_end_date = $(this).data('identity_end_date');
		var identity_image = $(this).data('identity_image');
		$('#newMemberModal').modal('toggle');
		$('#newMemberModal img.image').attr('src',image);
		$('#newMemberModal input.identity_no').val(identity_no);
		$('#newMemberModal input.identity_end_date').val(identity_end_date);
		$('#newMemberModal img.identity_image').attr('src',identity_image);
		$('#newMemberModal .btn-success').data('cols',id);
	});

	$('#newMemberModal .btn-success').on('click',function(e){
		e.preventDefault();
		e.stopPropagation();
		var id = $(this).data('cols');
		var deliver_no = $('#newMemberModal input.deliver_no').val();
		if(deliver_no){
			$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
	        $.ajax({
	            type: 'POST',
	            url: myURL+'/newMember',
	            data:{
	                '_token': $('meta[name="csrf-token"]').attr('content'),
	                'id': id,
	                'deliver_no': deliver_no,
	            },
	            success:function(data){
	                if(data.status.status == 1){
	                    successNotification(data.status.message);
	                    setTimeout(function(){
	                    	$('#newMemberModal').modal('hide');
	                    	location.reload();
	                    },2500)
	                }else{
	                    errorNotification(data.status.message);
	                }
	            },
	        });
		}
	})

});
