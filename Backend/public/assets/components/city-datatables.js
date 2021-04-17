"use strict";
var KTDatatablesAdvancedMultipleControls = function() {

	var init = function() {
		var table = $('#kt_datatable');

		// begin first table
		var DataTable = table.DataTable({
			// DOM Layout settings
			dom:'Bfrtip',
			dom:
				"<'row'<'col-sm-12 col-md-9'l><'col-sm-12 col-md-3 text-right'Bf>>" +
				"<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'p>> " +
				"<'row'<'col-sm-12'tr>>" +
				"<'row'<'col-sm-12 col-md-9'l><'col-sm-12 col-md-3 text-right'f>>" +
				"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>", // read more: https://datatables.net/examples/basic_init/dom.html
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
			ajax: {
				url: '/cities',
				type: 'GET',
				data: {
					// parameters for custom backend script demo
					columnsDef: [
						'id', 'title'],
				},
			},
			columns: [
				{data: 'id'},
				{data: 'title',},
				{data: 'id', responsivePriority: -1},
			],
			columnDefs: [
				{
					targets: 1,
					title: 'العنوان عربي',
					className: 'edits',
					render: function(data, type, full, meta) {
						return '<a class="editable" data-col="title" data-id="'+full.id+'">'+data+'</a>';
					},
				},
				{
					targets: -1,
					title: 'الاجراءات',
					orderable: false,
					render: function(data, type, full, meta) {
						var editButton = '';
						var deleteButton = '';
						if($('input[name="data-area"]').val() == 1){
							editButton = '<a href="/cities/edit/'+data+'" class="dropdown-item">'+
		                                    '<i class="m-nav__link-icon fa fa-pencil-alt"></i>'+
		                                    '<span class="m-nav__link-text">تعديل</span>'+
		                                '</a>';
						}

						if($('input[name="data-cols"]').val() == 1){
							deleteButton = '<a href="#" class="dropdown-item" onclick="deleteItem('+data+')">'+
		                                    '<i class="m-nav__link-icon fa fa-trash"></i>'+
		                                    '<span class="m-nav__link-text">حذف</span>'+
		                                '</a>';
						}
						return '<div class="main-menu dropdown dropdown-inline">'+
		                            '<button type="button" class="btn btn-light-primary btn-icon btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
		                                '<i class="ki ki-bold-more-hor"></i>'+
		                            '</button>'+
		                            '<div class="dropdown-menu" dropdown-toggle="hover">'+
		                                editButton+
		                                deleteButton+
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
		if ($("#m_reset")[0]) {
		    $("#m_reset").on("click", function (t) {
		        t.preventDefault(), $(".m-input").each(function () {
		            $(this).val(""), DataTable.column($(this).data("col-index")).search("", !1, !1);
		        }), DataTable.table().draw();
		    });
		}
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
});
