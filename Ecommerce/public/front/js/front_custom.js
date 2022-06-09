

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

$("#sort").on('change',function(){
    var sort = $(this).val();
    var fabric = get_filter('fabric');
    var sleeve = get_filter('sleeve');
    var pattern = get_filter('pattern');
    var fit = get_filter('fit');
    var occasion = get_filter('occasion');
    var url = $("#url").val();
    // alert(url);
    $.ajax({
        url:url,
        method:"post",
        data:{fabric:fabric,sleeve:sleeve,pattern:pattern,fit:fit,occasion:occasion,sort:sort,url:url},
        success:function(data){
            $('.filter_products').html(data);
        }
    });
});

//fabric filter
$(".fabric").on('click',function(){
    var fabric = get_filter('fabric');
    var sleeve = get_filter('sleeve');
    var pattern = get_filter('pattern');
    var fit = get_filter('fit');
    var occasion = get_filter('occasion');
    var sort = $("#sort option:selected").val();
    var url = $("#url").val();
    $.ajax({
        url:url,
        method:"post",
        data:{fabric:fabric,sleeve:sleeve,pattern:pattern,fit:fit,occasion:occasion,sort:sort,url:url},
        success:function(data){
            $('.filter_products').html(data);
        }
    });

});

//sleeve filter
$(".sleeve").on('click',function(){
    var fabric = get_filter('fabric');
    var sleeve = get_filter('sleeve');
    var pattern = get_filter('pattern');
    var fit = get_filter('fit');
    var occasion = get_filter('occasion');
    var sort = $("#sort option:selected").val();
    var url = $("#url").val();
    $.ajax({
        url:url,
        method:"post",
        data:{fabric:fabric,sleeve:sleeve,pattern:pattern,fit:fit,occasion:occasion,sort:sort,url:url},
        success:function(data){
            $('.filter_products').html(data);
        }
    });

});
//pattern filter
$(".pattern").on('click',function(){
    var fabric = get_filter('fabric');
    var sleeve = get_filter('sleeve');
    var pattern = get_filter('pattern');
    var fit = get_filter('fit');
    var occasion = get_filter('occasion');
    var sort = $("#sort option:selected").val();
    var url = $("#url").val();
    $.ajax({
        url:url,
        method:"post",
        data:{fabric:fabric,sleeve:sleeve,pattern:pattern,fit:fit,occasion:occasion,sort:sort,url:url},
        success:function(data){
            $('.filter_products').html(data);
        }
    });

});
//fit filter
$(".fit").on('click',function(){
    var fabric = get_filter('fabric');
    var sleeve = get_filter('sleeve');
    var pattern = get_filter('pattern');
    var fit = get_filter('fit');
    var occasion = get_filter('occasion');
    var sort = $("#sort option:selected").val();
    var url = $("#url").val();
    $.ajax({
        url:url,
        method:"post",
        data:{fabric:fabric,sleeve:sleeve,pattern:pattern,fit:fit,occasion:occasion,sort:sort,url:url},
        success:function(data){
            $('.filter_products').html(data);
        }
    });

});
//occasion filter
$(".occasion").on('click',function(){
    var fabric = get_filter('fabric');
    var sleeve = get_filter('sleeve');
    var pattern = get_filter('pattern');
    var fit = get_filter('fit');
    var occasion = get_filter('occasion');
    var sort = $("#sort option:selected").val();
    var url = $("#url").val();
    $.ajax({
        url:url,
        method:"post",
        data:{fabric:fabric,sleeve:sleeve,pattern:pattern,fit:fit,occasion:occasion,sort:sort,url:url},
        success:function(data){
            $('.filter_products').html(data);
        }
    });

});

function get_filter(class_name){
    var filter = [];
    $('.'+class_name+':checked').each(function(){
        filter.push($(this).val());
    });
    return filter;
}



$("#getPrice").on('change', function(){
    var size = $(this).val();
    if(size ==""){
        alert("Please select size");
        return false;
    }
    var product_id = $(this).attr('product-id');
    //alert(size);
    $.ajax({
        url:'get-product-price',
        data:{size:size,product_id:product_id},
        type:'post',
        success:function(resp){
            // alert(resp['product_price']);
            // alert(resp['discounted_price']);
            // return false;
            if(resp['final_price']>0){
                $(".getAttrPrice").html("৳.<del> "+resp['product_price']+"</del> ৳."+resp['final_price']);
            }else{
                $(".getAttrPrice").html("৳. "+resp['product_price']);
            }
            
        },error:function(){
            alert('Error');
        }
    });
    
});

//update cart item
$(document).on('click','.btnItemUpdate',function(){
if($(this).hasClass('qtyMinus')){
    var quantity = $(this).prev().val();
    if(quantity<=1){
        alert("item quantity must 1 or greatr!");
        return false;
    }else{
        new_qty = parseInt(quantity)-1;
    }
   
}
if($(this).hasClass('qtyPlus')){
    var quantity = $(this).prev().prev().val();
    new_qty = parseInt(quantity)+1;
}
// alert(new_qty);
let cartid =$(this).data('cartid');
// alert(cartid);

$.ajax({
        data:{"cartid":cartid,"qty":new_qty},
        url:"/update-cart-item-qty",
        type:"post",
        success:function(resp){
            // alert(resp);
            
            if(resp.status==false){
                alert(resp.message);
            }
            
            $(".totalCartItems").html(resp.totalCartItems);
            $('#AppendCartItems').html(resp.view);
        },error:function(){
            alert("Error");
        }
    });
});
//delete cart item
$(document).on('click','.btnItemDelete',function(){

    let cartid =$(this).data('cartid');
    // alert(cartid);
    let result = confirm('want to delete this cart item!');
    if(result){
        $.ajax({
            data:{"cartid":cartid},
            url:"/delete-cart-item",
            type:"post",
            success:function(resp){
                $(".totalCartItems").html(resp.totalCartItems);
                $('#AppendCartItems').html(resp.view);
            },error:function(){
                alert("Error");
            }
        });
    }
    
    });
//register form validation
    $("#RegisterForm").validate({
        rules: {
            name: "required",
            mobile: {
                required: true,
                minlength: 11,
                maxlength: 11,
                digits:true
            },
           
            email: {
                required: true,
                email: true,
                remote: "check-email"
            },
            password: {
                required: true,
                minlength: 6
            },
            messages: {
				name: "Please enter your name",
				mobile: {
					required: "Please enter a username",
					minlength: "Your must  at least 11 gidits",
                    maxlength: "Your maximum 11 gidits",
                    digits: "Your must gidits only"
				},
                
				email: {
					required: "Please provide a password",
					email: "valid email is required",
                    remote: "Email alrady exist!"
				},
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				}
			}
        }
    });
    //register form validation
    $("#LoginForm").validate({
        rules: {
            
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 6
            },
            messages: {
				email: {
					required: "Please provide a password",
					email: "valid email is required"
				},
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 6 characters long"
				}
			}
        }
    });
    //user account
    $("#userAccountForm").validate({
        rules: {
            
            name: {
                required: true,
            },
            mobile: {
                required: true,
                minlength: 11,
                maxlength: 13,
                 digits:true
            },
            messages: {
				name: {
					required: "name is required",
				},
				mobile: {
					required: "Please enter a username",
					minlength: "Your must  at least 11 gidits",
                    maxlength: "Your maximum 11 gidits",
				}
			}
        }
    });



    $("#current_pwd").keyup(function(){
		var current_pwd = $("#current_pwd").val();
		$.ajax({
			type:'post',
			url:'/check-user-pwd',
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

//apply coupon
    $("#ApplyCoupon").submit(function(){
        // alert('test');
        var user = $(this).attr("user");
        if(user==1){
            //do nothing
        }else{
            alert("Please Login to Apply!");
            return false;
        }
        var code = $("#code").val();
        // alert(code);
        $.ajax({
           type:"post",
           data:{code:code},
           url:'/apply-coupon',
           success:function(resp){
            if(resp.message != ""){
                alert(resp.message);
            }
            $(".totalCartItems").html(resp.totalCartItems);
            $('#AppendCartItems').html(resp.view);
            if(resp.couponAmount >=0){
                $(".couponAmount").text("৳. "+resp.couponAmount);
            }else{
                $(".couponAmount").text("৳.0");
            }
            if(resp.grand_total>=0){
                $(".grand_total").text("৳. "+resp.grand_total);
            }
            
           
           },error:function(){
               alert("Error");
           }
        });
    });

    $(document).on('click','.delivaryAddressDelete',function(){
       var result = confirm("Want to delete this Address ?");
        if(!result){
            return false;
        }
    });

    //calclute shipping charge
    
    $("input[name=address_id]").bind('change',function(){
        var shipping_charges = $(this).attr("shipping_charges");
        var total_price = $(this).attr("total_price");
        var coupon_amount = $(this).attr("coupon_amount");
        if(coupon_amount==0){
            coupon_amount =0;
        }
        // alert(coupon_amount);
        $(".shipping_charges").html("৳."+shipping_charges);
        var grand_total = parseInt(total_price) + parseInt(shipping_charges) - parseInt(coupon_amount);
        $(".grand_total").html(grand_total);

     });

     $(".userLogin").on('click',function(){
        alert("Login to Add Products in your Wishlist");
     });
    //wish list 
     $(".updateWishlist").on('click',function(){
        var product_id = $(this).data('productid');
        $.ajax({
            type:"post",
            url:"/update-wishlist",
            data:{"product_id":product_id},
            success:function(resp){
                if(resp.action=='add'){
                    $('button[data-productid='+product_id+']').html('Wish List <i class="icon-heart"></i>');
                    alert("product add from Wishlist");
                }else if(resp.action=='remove'){
                    $('button[data-productid='+product_id+']').html('Wish List <i class="icon-heart-empty"></i>');
                    alert("product remove from Wishlist");
                }
            },error:function(){
                alert("Error");
            }
        });
     });


// wishlistItemDelete
$(document).on('click','.wishlistItemDelete',function(){
    var wishlistid = $(this).data('wishlistid');
    // alert(wishlist);
    $.ajax({
        type:"post",
        url:"/delete-wishlist-item",
        data:{"wishlistid":wishlistid},
        success:function(resp){
            $('.totalWishlisttems').html(resp.totalWishlisttems);
            $("#appentWishlistItems").html(resp.view);
        },error:function(){
            alert("Error");
        }
    });
});


});
