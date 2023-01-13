<div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="{{ asset('adminbackend/assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text">Admin</h4>
                </div>
                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">

                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <div class="parent-icon"><i class='bx bx-cookie'></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>

                @if(Auth::user()->can('brand.menu'))
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Brands</div>
                    </a>
                    <ul>
                        @if(Auth::user()->can('all.brand'))
                        <li> <a href="{{ route('all.brand') }}"><i class="bx bx-right-arrow-alt"></i>All Brands</a>
                        </li>
                        @endif
						@if(Auth::user()->can('brand.add'))
                        <li> <a href="{{ route('add.brand') }}"><i class="bx bx-right-arrow-alt"></i>Add brand</a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif

                @if(Auth::user()->can('cat.menu'))
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-category"></i>
                        </div>
                        <div class="menu-title">Category</div>
                    </a>
                    <ul>
                        @if(Auth::user()->can('category.list'))
                        <li> <a href="{{ route('all.category') }}"><i class="bx bx-right-arrow-alt"></i>All Category</a>
                        </li>
                        @endif
						@if(Auth::user()->can('category.add'))
                        <li> <a href="{{ route('add.category') }}"><i class="bx bx-right-arrow-alt"></i>Add Category</a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif

                @if(Auth::user()->can('subcategory.menu'))
                <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">SubCategory</div>
					</a>
					<ul>
                        @if(Auth::user()->can('subcategory.list'))
						<li> <a href="{{ route('all.subcategory') }}"><i class="bx bx-right-arrow-alt"></i>All SubCategory</a>
						</li>
                        @endif
                        @if(Auth::user()->can('subcategory.add'))
						<li> <a href="{{ route('add.subcategory') }}"><i class="bx bx-right-arrow-alt"></i>Add SubCategory</a>
						</li>
                        @endif
					</ul>
				</li>
                @endif
                @if(Auth::user()->can('product.menu'))
                <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Product Manage</div>
					</a>
					<ul>
                        @if(Auth::user()->can('product.list'))
						<li> <a href="{{ route('all.product') }}"><i class="bx bx-right-arrow-alt"></i>All Product</a>
						</li>
                        @endif
                        @if(Auth::user()->can('pproduct.add'))
						<li> <a href="{{ route('add.product') }}"><i class="bx bx-right-arrow-alt"></i>Add Product</a>
						</li>
                        @endif
					</ul>
				</li>
                @endif

                @if(Auth::user()->can('slider.menu'))

                <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Slider Manage</div>
					</a>
					<ul>
                        @if(Auth::user()->can('slider.list'))
						<li> <a href="{{ route('all.slider') }}"><i class="bx bx-right-arrow-alt"></i>All Slider</a>
						</li>
                        @endif
                        @if(Auth::user()->can('slider.add'))
						<li> <a href="{{ route('add.slider') }}"><i class="bx bx-right-arrow-alt"></i>Add Slider</a>
						</li>
                        @endif
					</ul>
				</li>
                @endif

                @if(Auth::user()->can('banner.menu'))
                <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Banner Manage</div>
					</a>
					<ul>

                @if(Auth::user()->can('banner.list'))
						<li> <a href="{{ route('all.banner') }}"><i class="bx bx-right-arrow-alt"></i>All Banner</a>
						</li>
                        @endif
                @if(Auth::user()->can('banner.add'))
						<li> <a href="{{ route('add.banner') }}"><i class="bx bx-right-arrow-alt"></i>Add Banner</a>
						</li>
                        @endif
					</ul>
				</li>
                @endif
                @if(Auth::user()->can('coupon.menu'))
                <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Coupon Systems</div>
					</a>
					<ul>
                        @if(Auth::user()->can('coupon.list'))
						<li> <a href="{{ route('all.coupon') }}"><i class="bx bx-right-arrow-alt"></i>All Coupon</a>
						</li>
                        @endif
                        @if(Auth::user()->can('coupon.add'))
						<li> <a href="{{ route('add.coupon') }}"><i class="bx bx-right-arrow-alt"></i>Add Coupon</a>
						</li>
                        @endif
					</ul>
				</li>
                @endif
                @if(Auth::user()->can('ship.menu'))
                <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Shipping Area </div>
					</a>
					<ul>
                        @if(Auth::user()->can('ship.divison'))
						<li> <a href="{{ route('all.division') }}"><i class="bx bx-right-arrow-alt"></i>All Division</a>
						</li>
                        @endif
                        @if(Auth::user()->can('ship.district'))
						<li> <a href="{{ route('all.district') }}"><i class="bx bx-right-arrow-alt"></i>All District</a>
						</li>
                        @endif
                        @if(Auth::user()->can('ship.state'))
						<li> <a href="{{ route('all.State') }}"><i class="bx bx-right-arrow-alt"></i>All State</a>
						</li>
                         @endif

					</ul>
				</li>
                @endif
                @if(Auth::user()->can('vendor.menu'))
                <li class="menu-label">Vendors</li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-cart'></i>
                        </div>
                        <div class="menu-title">Vendors Management</div>
                    </a>
                    <ul>
                        @if(Auth::user()->can('vendor.inactive'))
                        <li> <a href="{{ route('inactive.vendor') }}"><i class="bx bx-right-arrow-alt"></i>Inactive Vendors</a>
                        </li>
                        @endif
                        @if(Auth::user()->can('vendor.active'))
                        <li> <a href="{{ route('active.vendor') }}"><i class="bx bx-right-arrow-alt"></i>Active Vendor</a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif

                @if(Auth::user()->can('order.menu'))
      <li class="menu-label">Order </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-cart'></i>
                        </div>
                        <div class="menu-title">Order Mange</div>
                    </a>
                    <ul>
                        @if(Auth::user()->can('order.pending'))
                        <li> <a href="{{ route('pending.order') }}"><i class="bx bx-right-arrow-alt"></i>Pending  Order</a>
                        </li>
                        @endif
                        @if(Auth::user()->can('order.confirm'))
                        <li> <a href="{{ route('admin.confirm.order') }}"><i class="bx bx-right-arrow-alt"></i>Confirm Order </a>
                        </li>
                        @endif
                        @if(Auth::user()->can('order.processing'))
                         <li> <a href="{{ route('admin.processing.order') }}"><i class="bx bx-right-arrow-alt"></i>Processing Order </a>
                        </li>
                        @endif
                        @if(Auth::user()->can('order.deliverd'))
                         <li> <a href="{{ route('admin.deliverd.order') }}"><i class="bx bx-right-arrow-alt"></i>Delivered Order </a>
                        </li>
                        @endif


                    </ul>
                </li>
                @endif
                @if(Auth::user()->can('return.menu'))
                <li class="menu-label">Return Order </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-cart'></i>
                        </div>
                        <div class="menu-title">Return Order Mange</div>
                    </a>
                    <ul>
                        @if(Auth::user()->can('return.request'))
                        <li> <a href="{{ route('return.request') }}"><i class="bx bx-right-arrow-alt"></i>Return  Request</a>
                        </li>
                        @endif
                        @if(Auth::user()->can('return.complete'))
                        <li> <a href="{{ route('return.request.complete') }}"><i class="bx bx-right-arrow-alt"></i>Complate Return </a>
                        </li>
                        @endif



                    </ul>
                </li>
                @endif

                @if(Auth::user()->can('report.menu'))
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"> <i class="bx bx-donate-blood"></i>
                        </div>
                        <div class="menu-title">Report Manage</div>
                    </a>
                    <ul>
                        @if(Auth::user()->can('view.report'))
                        <li> <a href="{{ route('report.view') }} "><i class="bx bx-right-arrow-alt"></i>Report View</a>
                        </li>
                        @endif
                        @if(Auth::user()->can('user.report.view'))
                      <li> <a href="{{ route('user.report.view') }} "><i class="bx bx-right-arrow-alt"></i>Order By User Report</a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif



                @if(Auth::user()->can('user.management.menu'))
                 <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"> <i class="bx bx-user-check"></i>
                        </div>
                        <div class="menu-title">User Manage</div>
                    </a>
                    <ul>
                        @if(Auth::user()->can('user.all'))
                        <li> <a href="{{ route('all-user') }} "><i class="bx bx-right-arrow-alt"></i>All User</a>
                        </li>
                        @endif
                        @if(Auth::user()->can('vendor.all'))
                      <li> <a href="{{ route('all-vendor') }} "><i class="bx bx-right-arrow-alt"></i>All Vendor</a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif
                @if(Auth::user()->can('blog.menu'))
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"> <i class="bx bx-user-check"></i>
                        </div>
                        <div class="menu-title">Blog Manage</div>
                    </a>
                    <ul>
                        @if(Auth::user()->can('blog.category.all'))
                        <li> <a href="{{ route('admin.blog.category') }} "><i class="bx bx-right-arrow-alt"></i>All Blog Category</a>
                        </li>
                        @endif
                        @if(Auth::user()->can('blog.category.add'))
                      <li> <a href="{{ route('add.blog.category') }} "><i class="bx bx-right-arrow-alt"></i>Add Blog Category</a>
                        </li>
                        @endif
                        @if(Auth::user()->can('admins.blog.post'))
    <li> <a href="{{ route('admin.blog.post') }} "><i class="bx bx-right-arrow-alt"></i> Blog Post</a>
                        </li>
                        @endif

                    </ul>
                </li>
                @endif


                @if(Auth::user()->can('review.menu'))
               <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"> <i class="bx bx-user-check"></i>
                        </div>
                        <div class="menu-title">Review Manage</div>
                    </a>
                    <ul>
                        @if(Auth::user()->can('review.pending'))
                        <li> <a href="{{ route('pending.review') }} "><i class="bx bx-right-arrow-alt"></i>Pending Review</a>
                        </li>
                        @endif
                        @if(Auth::user()->can('review.approve'))
                      <li> <a href="{{ route('aprove.review') }} "><i class="bx bx-right-arrow-alt"></i>All Aproved Review</a>
                        </li>
                        @endif


                    </ul>
                </li>
                @endif



                @if(Auth::user()->can('site.menu'))
               <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"> <i class="bx bx-user-check"></i>
                        </div>
                        <div class="menu-title">Setting Manage</div>
                    </a>
                    <ul>
                        @if(Auth::user()->can('site.setting'))
                        <li> <a href="{{ route('site.setting') }} "><i class="bx bx-right-arrow-alt"></i>Site Setting</a>
                        </li>
                        @endif
                        @if(Auth::user()->can('seo.setting'))
                         <li> <a href="{{ route('seo.setting') }} "><i class="bx bx-right-arrow-alt"></i>Seo Setting</a>
                        </li>
                        @endif



                    </ul>
                </li>
                @endif


                @if(Auth::user()->can('stock.menu'))
                    <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"> <i class="bx bx-user-check"></i>
                        </div>
                        <div class="menu-title">Stock  Manage</div>
                    </a>
                    <ul>
                        @if(Auth::user()->can('stock.product'))
                        <li> <a href="{{ route('product.stock') }} "><i class="bx bx-right-arrow-alt"></i>Stock</a>
                        </li>
                        @endif




                    </ul>
                </li>
                @endif


                @if(Auth::user()->can('role.permission.menu'))
                <li class="menu-label">Roles and Permissions</li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class="bx bx-line-chart"></i>
                        </div>
                        <div class="menu-title">Roles & Permissions</div>
                    </a>
                    <ul>
                        @if(Auth::user()->can('all.permission'))
                        <li> <a href="{{ route('all.permission') }}"><i class="bx bx-right-arrow-alt"></i>All Permissions</a>
                        </li>
                        @endif
                        @if(Auth::user()->can('add.permission'))
                        <li> <a href="{{ route('add.permission') }}"><i class="bx bx-right-arrow-alt"></i>Add Permissions</a>
                        </li>
                        @endif
                        @if(Auth::user()->can('all.roles'))
                        <li> <a href="{{ route('all.roles') }}"><i class="bx bx-right-arrow-alt"></i>All Roles</a>
                        </li>
                        @endif
                        @if(Auth::user()->can('add.roles.permission'))
                        <li> <a href="{{ route('add.roles.permission') }}"><i class="bx bx-right-arrow-alt"></i>Roles in Permission</a>
                        </li>
                        @endif
                        @if(Auth::user()->can('all.roles.permission'))
                        <li> <a href="{{ route('all.roles.permission') }}"><i class="bx bx-right-arrow-alt"></i>All Roles & Permission</a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif
                @if(Auth::user()->can('admin.menu'))
                <li class="menu-label">Admin Mange</li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class="bx bx-line-chart"></i>
                        </div>
                        <div class="menu-title">Admin Mange</div>
                    </a>
                    <ul>
                        @if(Auth::user()->can('all.admin'))
                        <li> <a href="{{ route('all.admin') }}"><i class="bx bx-right-arrow-alt"></i>All Admin</a>
                        </li>
                        @endif
                        @if(Auth::user()->can('add.admin'))
                        <li> <a href="{{ route('add.admin') }}"><i class="bx bx-right-arrow-alt"></i>Add Admin</a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif

                <li>

                    <a href="" target="_blank">
                        <div class="parent-icon"><i class="bx bx-support"></i>
                        </div>
                        <div class="menu-title">Support</div>
                    </a>
                </li>
            </ul>
            <!--end navigation-->
        </div>
