<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{asset('backEnd/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Everywearbd</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="{{url('admin/dashboard')}}">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
				
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Section</div>
					</a>
					<ul>
						<li> <a href="{{url('admin/add-edit-section')}}"><i class="bx bx-right-arrow-alt"></i>Add Sections</a></li>
						<li> <a href="{{url('admin/sections')}}"><i class="bx bx-right-arrow-alt"></i>Section List</a></li>

					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Brand</div>
					</a>
					<ul>
						<li> <a href="{{url('admin/add-edit-brand')}}"><i class="bx bx-right-arrow-alt"></i>Add Brand</a></li>
						<li> <a href="{{url('admin/brands')}}"><i class="bx bx-right-arrow-alt"></i>Brand List</a>
						</li>

					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Category</div>
					</a>
					<ul>
						<li> <a href="{{url('admin/add-edit-category')}}"><i class="bx bx-right-arrow-alt"></i>Add Category</a></li>
						<li> <a href="{{url('admin/categories')}}"><i class="bx bx-right-arrow-alt"></i>Category List</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Product</div>
					</a>
					<ul>
						<li> <a href="{{url('admin/add-edit-product')}}"><i class="bx bx-right-arrow-alt"></i>Add Product</a></li>
						<li> <a href="{{url('admin/products')}}"><i class="bx bx-right-arrow-alt"></i>Product List</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Banner</div>
					</a>
					<ul>
						<li> <a href="{{url('admin/add-edit-banner')}}"><i class="bx bx-right-arrow-alt"></i>Add Banner</a></li>
						<li> <a href="{{url('admin/banners')}}"><i class="bx bx-right-arrow-alt"></i>Banner List</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Coupon</div>
					</a>
					<ul>
						<li> <a href="{{url('admin/add-edit-coupon')}}"><i class="bx bx-right-arrow-alt"></i>Add Coupon</a></li>
						<li> <a href="{{url('admin/coupons')}}"><i class="bx bx-right-arrow-alt"></i>Coupon List</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Coupon</div>
					</a>
					<ul>
					<li> <a href="{{url('admin/shipping-charges')}}"><i class="bx bx-right-arrow-alt"></i>Shipping Charge</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Rating</div>
					</a>
					<ul>
					<li> <a href="{{url('admin/ratings')}}"><i class="bx bx-right-arrow-alt"></i>Rating List</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Cms Page</div>
					</a>
					<ul>
						<li> <a href="{{url('admin/cms-pages')}}"><i class="bx bx-right-arrow-alt"></i>Cms Pages List</a>
						</li>
						<li> <a href="{{url('admin/add-edit-cms')}}"><i class="bx bx-right-arrow-alt"></i>Add Cms</a>
						</li>
						

					</ul>
				</li>
				<li>
					<a href="{{url('admin/shipping-charges')}}">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Shipping Charge</div>
					</a>
				</li>
				<li>
					<a href="{{url('admin/orders')}}">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Order List</div>
					</a>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-user"></i>
						</div>
						<div class="menu-title">User</div>
					</a>
					<ul>
						<li> <a href="{{url('admin/users')}}"><i class="bx bx-right-arrow-alt"></i>User List</a></li>
						<li> <a href="{{url('admin/admins')}}"><i class="bx bx-right-arrow-alt"></i>Admin List</a></li>
					</ul>
				</li>
				<li>
					<a href="{{url('admin/logout')}}">
						<div class="parent-icon"><i class="fadeIn animated bx bx-power-off"></i>
						</div>
						<div class="menu-title">Logout</div>
					</a>
				</li>
			</ul>
			<!--end navigation-->
		</div>