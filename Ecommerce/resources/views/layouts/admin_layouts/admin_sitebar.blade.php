<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{asset('backEnd/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Ecommerce</h4>
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
						<div class="menu-title">Catalogues</div>
					</a>
					<ul>
						<li> <a href="{{url('admin/sections')}}"><i class="bx bx-right-arrow-alt"></i>Sections</a>
						</li>
						<li> <a href="{{url('admin/brands')}}"><i class="bx bx-right-arrow-alt"></i>Brands</a>
						</li>
						<li> <a href="{{url('admin/categories')}}"><i class="bx bx-right-arrow-alt"></i>Categories</a>
						</li>
						<li> <a href="{{url('admin/products')}}"><i class="bx bx-right-arrow-alt"></i>Products</a>
						</li>
						<li> <a href="{{url('admin/banners')}}"><i class="bx bx-right-arrow-alt"></i>Banners</a>
						</li>
						<li> <a href="{{url('admin/coupons')}}"><i class="bx bx-right-arrow-alt"></i>Coupons</a>
						</li>
						<li> <a href="{{url('admin/orders')}}"><i class="bx bx-right-arrow-alt"></i>Orders</a>
						</li>


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