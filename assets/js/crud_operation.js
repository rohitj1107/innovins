$(document).ready(function(){
	listIteam();		
	var table = $('#IteamListing').dataTable({     
		"bPaginate": false,
		"bInfo": false,
		"bFilter": false,
		"bLengthChange": false,
		"pageLength": 5		
	}); 
	// list all Iteam in datatable
	function listIteam(){
		$.ajax({
			type  : 'ajax',
			url   : 'iteam/show',
			async : false,
			dataType : 'json',
			success : function(data){
				var html = '';
				var i;
				for(i=0; i<data.length; i++){
					html += '<tr id="'+data[i].id+'">'+
							'<td>'+data[i].id+'</td>'+
							'<td>'+data[i].product_name+'</td>'+
							'<td>'+data[i].price+'</td>'+
							'<td>'+data[i].description+'</td>'+		                        
							'<td>'+data[i].created_time+'</td>'+
							'<td style="text-align:right;">'+
								'<a href="javascript:void(0);" class="btn btn-info btn-sm editRecord" data-id="'+data[i].id+'" data-product_name="'+data[i].product_name+'" data-price="'+data[i].price+'" data-description="'+data[i].description+'">Edit</a>'+' '+
								'<a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord" data-id="'+data[i].id+'">Delete</a>'+
							'</td>'+
							'</tr>';
				}
				$('#listRecords').html(html);					
			}

		});
	}
	// save new Iteam record
	$('#saveIteamForm').submit('click',function(){
		var product_name = $('#product_name').val();
		var price = $('#price').val();
		var description = $('#description').val();
		$.ajax({
			type : "POST",
			url  : "iteam/save",
			dataType : "JSON",
			data : {product_name:product_name, price:price, description:description},
			success: function(data){
				$('#product_name').val("");
				$('#price').val("");
				$('#description').val("");
				$('#addIteamModal').modal('hide');
				listIteam();
			}
		});
		return false;
	});
	// show edit modal form with iteam data
	$('#listRecords').on('click','.editRecord',function(){
		$('#editIteamModal').modal('show');
		$("#iteamId").val($(this).data('id'));
		$("#product_name_edit").val($(this).data('product_name'));
		$("#price_edit").val($(this).data('price'));
		$("#description_edit").val($(this).data('description'));
	});
	// save edit record
	 $('#editIteamForm').on('submit',function(){
		var iteamId = $('#iteamId').val();
		var product_name = $('#product_name_edit').val();
		var price = $('#price_edit').val();
		var description = $('#description_edit').val();	
		$.ajax({
			type : "POST",
			url  : "iteam/update",
			dataType : "JSON",
			data : {id:iteamId, product_name:product_name, price:price, description:description},
			success: function(data){
				$("#iteamId").val("");
				$("#product_name_edit").val("");
				$('#price_edit').val("");
				$("#description_edit").val("");
				$('#editIteamModal').modal('hide');
				listIteam();
			}
		});
		return false;
	});
	// show delete form
	$('#listRecords').on('click','.deleteRecord',function(){
		var iteamId = $(this).data('id');
		let text = "You Want To Delete ! Either OK or Cancel.";
		if (confirm(text) == true) {
			$.ajax({
				type : "POST",
				url  : "iteam/delete",
				dataType : "JSON",  
				data : {id:iteamId},
				success: function(data){
					$("#"+iteamId).remove();
					$('#deleteIteamId').val("");
					$('#deleteIteamModal').modal('hide');
					listIteam();
				}
			});
		}
	});
});