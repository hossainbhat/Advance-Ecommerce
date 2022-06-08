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


//daynamic delete function 
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


		// //sections status active or inactive
		$(".updateSectionStatus").click(function(){
			var status = $(this).text();
			var section_id = $(this).attr("section_id");
	
			$.ajax({
				type:"post",
				url:"/admin/update-section-status",
				data:{status:status,section_id:section_id},
				success:function(resp){
					// alert(resp['status']);
					// alert(resp['section_id']);
					if (resp['status']==0) {
						$("#section-"+section_id).html("<a class='updateSectionStatus' href='javascript:void(0)'>Inactive</a>");
					}else if(resp['status']==1){
						$("#section-"+section_id).html("<a class='updateSectionStatus'   href='javascript:void(0)'>Active</a>");
					}
				},error:function(){
					alert("Error");
				}
			});
		});
		// //shipping charge status active or inactive
		$(".updateShippingChargeStatus").click(function(){
			var status = $(this).text();
			var shipping_id = $(this).attr("shipping_id");
	
			$.ajax({
				type:"post",
				url:"/admin/update-shipping-status",
				data:{status:status,shipping_id:shipping_id},
				success:function(resp){
					// alert(resp['status']);
					// alert(resp['shipping_id']);
					if (resp['status']==0) {
						$("#shipping-"+shipping_id).html("<a class='updateShippingChargeStatus' href='javascript:void(0)'>Inactive</a>");
					}else if(resp['status']==1){
						$("#shipping-"+shipping_id).html("<a class='updateShippingChargeStatus'   href='javascript:void(0)'>Active</a>");
					}
				},error:function(){
					alert("Error");
				}
			});
		});
			// //sections status active or inactive
			$(".updateCouponStatus").click(function(){
				var status = $(this).text();
				var coupon_id = $(this).attr("coupon_id");
		
				$.ajax({
					type:"post",
					url:"/admin/update-coupon-status",
					data:{status:status,coupon_id:coupon_id},
					success:function(resp){
						// alert(resp['status']);
						// alert(resp['coupon_id']);
						if (resp['status']==0) {
							$("#coupon-"+coupon_id).html("<a class='updateCouponStatus' href='javascript:void(0)'>Inactive</a>");
						}else if(resp['status']==1){
							$("#coupon-"+coupon_id).html("<a class='updateCouponStatus'   href='javascript:void(0)'>Active</a>");
						}
					},error:function(){
						alert("Error");
					}
				});
			});
		// brand status active or inactive
		$(".updateBrandStatus").click(function(){
			var status = $(this).text();
			var brand_id = $(this).attr("brand_id");
	
			$.ajax({
				type:"post",
				url:"/admin/update-brand-status",
				data:{status:status,brand_id:brand_id},
				success:function(resp){
					// alert(resp['status']);
					// alert(resp['brand_id']);
					if (resp['status']==0) {
						$("#brand-"+brand_id).html("<a class='updateBrandStatus' href='javascript:void(0)'>Inactive</a>");
					}else if(resp['status']==1){
						$("#brand-"+brand_id).html("<a class='updateBrandStatus'   href='javascript:void(0)'>Active</a>");
					}
				},error:function(){
					alert("Error");
				}
			});
		});
			// category status active or inactive
			$(".updateCategoryStatus").click(function(){
				var status = $(this).text();
				var category_id = $(this).attr("category_id");
		
				$.ajax({
					type:"post",
					url:"/admin/update-category-status",
					data:{status:status,category_id:category_id},
					success:function(resp){
						// alert(resp['status']);
						// alert(resp['category_id']);
						if (resp['status']==0) {
							$("#category-"+category_id).html("<a class='updateCategoryStatus' href='javascript:void(0)'>Inactive</a>");
						}else if(resp['status']==1){
							$("#category-"+category_id).html("<a class='updateCategoryStatus'   href='javascript:void(0)'>Active</a>");
						}
					},error:function(){
						alert("Error");
					}
				});
			});
				// product attribute status active or inactive
				$(".updateAttributeStatus").click(function(){
					var status = $(this).text();
					var attribute_id = $(this).attr("attribute_id");
			
					$.ajax({
						type:"post",
						url:"/admin/update-attribute-status",
						data:{status:status,attribute_id:attribute_id},
						success:function(resp){
							// alert(resp['status']);
							// alert(resp['attribute_id']);
							if (resp['status']==0) {
								$("#attribute-"+attribute_id).html("<a class='updateAttributeStatus' href='javascript:void(0)'>Inactive</a>");
							}else if(resp['status']==1){
								$("#attribute-"+attribute_id).html("<a class='updateAttributeStatus'   href='javascript:void(0)'>Active</a>");
							}
						},error:function(){
							alert("Error");
						}
					});
				});
				// product attribute image active or inactive
				$(".updateImageStatus").click(function(){
					var status = $(this).text();
					var image_id = $(this).attr("image_id");
			
					$.ajax({
						type:"post",
						url:"/admin/update-image-status",
						data:{status:status,image_id:image_id},
						success:function(resp){
							// alert(resp['status']);
							// alert(resp['image_id']);
							if (resp['status']==0) {
								$("#image-"+image_id).html("<a class='updateImageStatus' href='javascript:void(0)'>Inactive</a>");
							}else if(resp['status']==1){
								$("#image-"+image_id).html("<a class='updateImageStatus'   href='javascript:void(0)'>Active</a>");
							}
						},error:function(){
							alert("Error");
						}
					});
				});
						// banner status active or inactive
						$(".updateBannerStatus").click(function(){
							var status = $(this).text();
							var banner_id = $(this).attr("banner_id");
					
							$.ajax({
								type:"post",
								url:"/admin/update-banner-status",
								data:{status:status,banner_id:banner_id},
								success:function(resp){
									// alert(resp['status']);
									// alert(resp['banner_id']);
									if (resp['status']==0) {
										$("#banner-"+banner_id).html("<a class='updateBannerStatus' href='javascript:void(0)'>Inactive</a>");
									}else if(resp['status']==1){
										$("#banner-"+banner_id).html("<a class='updateBannerStatus'   href='javascript:void(0)'>Active</a>");
									}
								},error:function(){
									alert("Error");
								}
							});
						});
			// banner status active or inactive
			$(".updateProductStatus").click(function(){
				var status = $(this).text();
				var product_id = $(this).attr("product_id");
		
				$.ajax({
					type:"post",
					url:"/admin/update-product-status",
					data:{status:status,product_id:product_id},
					success:function(resp){
						// alert(resp['status']);
						// alert(resp['product_id']);
						if (resp['status']==0) {
							$("#product-"+product_id).html("<a class='updateProductStatus' href='javascript:void(0)'>Inactive</a>");
						}else if(resp['status']==1){
							$("#product-"+product_id).html("<a class='updateProductStatus'   href='javascript:void(0)'>Active</a>");
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

		//show curier traking number and name
		$("#courier_name").hide();
		$("#traking_number").hide();

		$("#order_status").on('change',function(){
			if(this.value=="Shipped"){
				$("#courier_name").show();
				$("#traking_number").show();
			}else{
				$("#courier_name").hide();
				$("#traking_number").hide();
			}
		});

});