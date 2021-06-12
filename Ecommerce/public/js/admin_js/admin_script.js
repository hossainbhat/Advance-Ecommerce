$(document).ready(function(){

	$("#current_pwd").keyup(function(){
		var current_pwd = $("#current_pwd").val();
		$.ajax({
			type:'post',
			url:'/admin/check-pwd',
			data:{current_pwd:current_pwd},
			success:function(resp){
				// alert(resp);
				if(resp=="false"){
					$("#chkPwd").html("<font color='red'>Current Password is Incorrect</font>");
				}else if(resp=="true"){
					$("#chkPwd").html("<font color='green'>Current Password is Correct</font>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});

	//banner status active or inactive
	$(".updateBannerStatus").click(function(){
		var status = $(this).children("i").attr("Status");
		var banner_id = $(this).attr("banner_id");

		$.ajax({
			type:"post",
			url:"/admin/update-banner-status",
			data:{status:status,banner_id:banner_id},
			success:function(resp){
				// alert(resp['status']);
				// alert(resp['banner_id']);
				if (resp['status']==0) {
					$("#banner-"+banner_id).html("<i class='fa fa-toggle-off' aria-hidden='true' Status='Inactive'></i>");
				}else if(resp['status']==1){
					$("#banner-"+banner_id).html("<i class='fa fa-toggle-on' aria-hidden='true' Status='Active'></i>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});
	//section status active or inactive
	$(".updateSectionStatus").click(function(){
		var status = $(this).children("i").attr("Status");
		var section_id = $(this).attr("section_id");

		$.ajax({
			type:"post",
			url:"/admin/update-section-status",
			data:{status:status,section_id:section_id},
			success:function(resp){
				// alert(resp['status']);
				// alert(resp['section_id']);
				if (resp['status']==0) {
					$("#section-"+section_id).html("<i class='fa fa-toggle-off' aria-hidden='true' Status='Inactive'></i>");
				}else if(resp['status']==1){
					$("#section-"+section_id).html("<i class='fa fa-toggle-on' aria-hidden='true' Status='Active'></i>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});

	//brand status active or inactive
	$(".updateBrandStatus").click(function(){
		var status = $(this).children("i").attr("Status");
		var brand_id = $(this).attr("brand_id");

		$.ajax({
			type:"post",
			url:"/admin/update-brand-status",
			data:{status:status,brand_id:brand_id},
			success:function(resp){
				// alert(resp['status']);
				// alert(resp['section_id']);
				if (resp['status']==0) {
					$("#brand-"+brand_id).html("<i class='fa fa-toggle-off' aria-hidden='true' Status='Inactive'></i>");
				}else if(resp['status']==1){
					$("#brand-"+brand_id).html("<i class='fa fa-toggle-on' aria-hidden='true' Status='Active'></i>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});

		//category status active or inactive
	$(".updateCategoryStatus").click(function(){
		var status = $(this).children("i").attr("Status");
		var category_id = $(this).attr("category_id");

		$.ajax({
			type:"post",
			url:"/admin/update-category-status",
			data:{status:status,category_id:category_id},
			success:function(resp){
				// alert(resp['status']);
				// alert(resp['section_id']);
				if (resp['status']==0) {
					$("#category-"+category_id).html("<i class='fa fa-toggle-off' aria-hidden='true' Status='Inactive'></i>");
				}else if(resp['status']==1){
					$("#category-"+category_id).html("<i class='fa fa-toggle-on' aria-hidden='true' Status='Active'></i>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});

	//append categories level
	$('#section_id').change(function(){
		var section_id = $(this).val();
		// alert(section_id);

		$.ajax({
			type:'post',
			url:'/admin/appendcategorieslavel',
			data:{section_id:section_id},
			success:function(resp){
				$('#appendCategoriesLevel').html(resp);
			},error:function(){
				alert('Error');
			}
		});
	});

	// delete catagory
	// $(".confirmDelete").click(function(){
	// 	var name =$(this).attr('name');
	// 	if (confirm("Are you Sure to delete this "+name+"?")) {
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// });

//$(document).on("click",".confirmDelete",function(){
		$(".confirmDelete").click(function(){
		var record =$(this).attr('record');
		var recoedid =$(this).attr('recoedid');

		Swal.fire({
		  title: 'Are you sure?',
		  text: "You won't be able to revert this!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
		  if (result.value) {
		    window.location.href="/admin/delete-"+record+"/"+recoedid;
		  }
		});

	});

	//Product status active or inactive
	$(".updateProductStatus").click(function(){
		var status = $(this).children("i").attr("Status");
		var product_id = $(this).attr("product_id");

		$.ajax({
			type:"post",
			url:"/admin/update-product-status",
			data:{status:status,product_id:product_id},
			success:function(resp){
				// alert(resp['status']);
				// alert(resp['product_id']);
				if (resp['status']==0) {
					$("#product-"+product_id).html("<i class='fa fa-toggle-off' aria-hidden='true' Status='Inactive'></i>");
				}else if(resp['status']==1){
					$("#product-"+product_id).html("<i class='fa fa-toggle-on' aria-hidden='true' Status='Active'></i>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});

		//attribute status active or inactive
	$(".updateAttributeStatus").click(function(){
		var status = $(this).children("i").attr("Status");
		var attribute_id = $(this).attr("attribute_id");

		$.ajax({
			type:"post",
			url:"/admin/update-attribute-status",
			data:{status:status,attribute_id:attribute_id},
			success:function(resp){
				// alert(resp['status']);
				// alert(resp['attribute_id']);
				if (resp['status']==0) {
					$("#attr-"+attribute_id).html("<i class='fa fa-toggle-off' aria-hidden='true' Status='Inactive'></i>");
				}else if(resp['status']==1){
					$("#attr-"+attribute_id).html("<i class='fa fa-toggle-on' aria-hidden='true' Status='Active'></i>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});

			//image status active or inactive
	$(".updateImageStatus").click(function(){
		var status = $(this).children("i").attr("Status");
		var image_id = $(this).attr("image_id");

		$.ajax({
			type:"post",
			url:"/admin/update-image-status",
			data:{status:status,image_id:image_id},
			success:function(resp){
				// alert(resp['status']);
				// alert(resp['image_id']);
				if (resp['status']==0) {
					$("#attr-"+image_id).html("<i class='fa fa-toggle-off' aria-hidden='true' Status='Inactive'></i>");
				}else if(resp['status']==1){
					$("#attr-"+image_id).html("<i class='fa fa-toggle-on' aria-hidden='true' Status='Active'></i>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});

	//add remove product attrbutes
	 var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div style="margin-top:10px;"><div style="height:10px;"></div><input type="text" name="size[]" required placeholder="size" style="width:115px;"/>&nbsp;<input type="number" name="price[]" required placeholder="price" style="width:115px;"/>&nbsp;<input type="number" name="stock[]" required placeholder="stock" style="width:115px;"/>&nbsp;<input type="text" name="sku[]" required placeholder="sku" style="width:115px;"/><a href="javascript:void(0);" class="remove_button">Delete</a></div>'; //New input field html
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });

});
