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

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Brands</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('all.brand') }}"><i class="bx bx-right-arrow-alt"></i>All Brands</a>
                        </li>
                        <li> <a href="{{ route('add.brand') }}"><i class="bx bx-right-arrow-alt"></i>Add brand</a>
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
                        <li> <a href="{{ route('all.category') }}"><i class="bx bx-right-arrow-alt"></i>All Category</a>
                        </li>
                        <li> <a href="{{ route('add.category') }}"><i class="bx bx-right-arrow-alt"></i>Add Category</a>
                        </li>
                    </ul>
                </li>

                <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">SubCategory</div>
					</a>
					<ul>
						<li> <a href="{{ route('all.subcategory') }}"><i class="bx bx-right-arrow-alt"></i>All SubCategory</a>
						</li>
						<li> <a href="{{ route('add.subcategory') }}"><i class="bx bx-right-arrow-alt"></i>Add SubCategory</a>
						</li>

					</ul>
				</li>

                <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Product Manage</div>
					</a>
					<ul>
						<li> <a href="{{ route('all.product') }}"><i class="bx bx-right-arrow-alt"></i>All Product</a>
						</li>
						<li> <a href="{{ route('add.product') }}"><i class="bx bx-right-arrow-alt"></i>Add Product</a>
						</li>

					</ul>
				</li>


                <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Slider Manage</div>
					</a>
					<ul>
						<li> <a href="{{ route('all.slider') }}"><i class="bx bx-right-arrow-alt"></i>All Slider</a>
						</li>
						<li> <a href="{{ route('add.slider') }}"><i class="bx bx-right-arrow-alt"></i>Add Slider</a>
						</li>

					</ul>
				</li>

                <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Banner Manage</div>
					</a>
					<ul>
						<li> <a href="{{ route('all.banner') }}"><i class="bx bx-right-arrow-alt"></i>All Banner</a>
						</li>
						<li> <a href="{{ route('add.banner') }}"><i class="bx bx-right-arrow-alt"></i>Add Banner</a>
						</li>

					</ul>
				</li>

                <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Coupon Systems</div>
					</a>
					<ul>
						<li> <a href="{{ route('all.coupon') }}"><i class="bx bx-right-arrow-alt"></i>All Coupon</a>
						</li>
						<li> <a href="{{ route('add.coupon') }}"><i class="bx bx-right-arrow-alt"></i>Add Coupon</a>
						</li>

					</ul>
				</li>

                <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Shipping Area </div>
					</a>
					<ul>
						<li> <a href="{{ route('all.division') }}"><i class="bx bx-right-arrow-alt"></i>All Division</a>
						</li>
						<li> <a href="{{ route('all.district') }}"><i class="bx bx-right-arrow-alt"></i>All District</a>
						</li>

						<li> <a href="{{ route('all.State') }}"><i class="bx bx-right-arrow-alt"></i>All State</a>
						</li>

					</ul>
				</li>

                <li class="menu-label">Vendors</li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-cart'></i>
                        </div>
                        <div class="menu-title">Vendors Management</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('inactive.vendor') }}"><i class="bx bx-right-arrow-alt"></i>Inactive Vendors</a>
                        </li>
                        <li> <a href="{{ route('active.vendor') }}"><i class="bx bx-right-arrow-alt"></i>Active Vendor</a>
                        </li>
                    </ul>
                </li>


      <li class="menu-label">Order </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-cart'></i>
                        </div>
                        <div class="menu-title">Order Mange</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('pending.order') }}"><i class="bx bx-right-arrow-alt"></i>Pending  Order</a>
                        </li>
                        <li> <a href="{{ route('admin.confirm.order') }}"><i class="bx bx-right-arrow-alt"></i>Confirm Order </a>
                        </li>
                         <li> <a href="{{ route('admin.processing.order') }}"><i class="bx bx-right-arrow-alt"></i>Processing Order </a>
                        </li>
                         <li> <a href="{{ route('admin.deliverd.order') }}"><i class="bx bx-right-arrow-alt"></i>Delivered Order </a>
                        </li>


                    </ul>
                </li>

                <li class="menu-label">Return Order </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-cart'></i>
                        </div>
                        <div class="menu-title">Return Order Mange</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('return.request') }}"><i class="bx bx-right-arrow-alt"></i>Return  Request</a>
                        </li>
                        <li> <a href="{{ route('return.request.complete') }}"><i class="bx bx-right-arrow-alt"></i>Complate Return </a>
                        </li>



                    </ul>
                </li>


            
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"> <i class="bx bx-donate-blood"></i>
                        </div>
                        <div class="menu-title">Report Manage</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('report.view') }} "><i class="bx bx-right-arrow-alt"></i>Report View</a>
                        </li>
                      <li> <a href="{{ route('user.report.view') }} "><i class="bx bx-right-arrow-alt"></i>Order By User Report</a>
                        </li>
                    </ul>
                </li>




                 <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"> <i class="bx bx-user-check"></i>
                        </div>
                        <div class="menu-title">User Manage</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('all-user') }} "><i class="bx bx-right-arrow-alt"></i>All User</a>
                        </li>
                      <li> <a href="{{ route('all-vendor') }} "><i class="bx bx-right-arrow-alt"></i>All Vendor</a>
                        </li>
                    </ul>
                </li>



                <li class="menu-label">Charts & Maps</li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class="bx bx-line-chart"></i>
                        </div>
                        <div class="menu-title">Charts</div>
                    </a>
                    <ul>
                        <li> <a href="charts-apex-chart.html"><i class="bx bx-right-arrow-alt"></i>Apex</a>
                        </li>
                        <li> <a href="charts-chartjs.html"><i class="bx bx-right-arrow-alt"></i>Chartjs</a>
                        </li>
                        <li> <a href="charts-highcharts.html"><i class="bx bx-right-arrow-alt"></i>Highcharts</a>
                        </li>
                    </ul>
                </li>
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
