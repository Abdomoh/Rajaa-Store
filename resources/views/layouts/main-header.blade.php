<!-- main-header opened -->
			<div class="main-header sticky side-header nav nav-item">
				<div class="container-fluid">
					<div class="main-header-left ">
						<div class="responsive-logo">
							<a href="{{ url('dashboard') }}"><img src="{{URL::asset('admin/img/1630276374.PNG')}}" class="logo-1" alt="logo"></a>
							<a href="{{ url('dashboard') }}"><img src="{{URL::asset('admin/img/1630276374.PNG')}}" class="dark-logo-1" alt="logo"></a>
							<a href="{{ url('dashboard') }}"><img src="{{URL::asset('admin/img/1630276374.PNG')}}" class="logo-2" alt="logo"></a>//
							<a href="{{ url('dashboard') }}"><img src="{{URL::asset('admin/img/1630276374.PNG')}}" class="dark-logo-2" alt="logo"></a>
						</div>
						<div class="app-sidebar__toggle" data-toggle="sidebar">
							<a class="open-toggle" href="#"><i class="header-icon fe fe-align-left" ></i></a>
							<a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
						</div>
						<div class="main-header-center mr-3 d-sm-none d-md-none d-lg-block">
							<form action="/public-search" method="post">
								{{csrf_field()}}
							<input class="form-control" placeholder=" ابحث عن كل شي هنا ..." type="text" name="q"> <button class="btn"><i class="fas fa-search d-none d-md-block"></i></button>
						</form>
						</div>
					</div>
					<div class="main-header-right">

						<div class="nav nav-item  navbar-nav-right ml-auto">
							<div class="nav-link" id="bs-example-navbar-collapse-1">
								<form class="navbar-form" role="search">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Search">
										<span class="input-group-btn">
											<button type="reset" class="btn btn-default">
												<i class="fas fa-times"></i>
											</button>
											<button type="submit" class="btn btn-default nav-link resp-btn">
												<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
											</button>
										</span>
									</div>
								</form>
							</div>
							<div class="dropdown nav-item main-header-message ">
								<a class="new nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg><span class=" pulse-danger"></span></a>
								<div class="dropdown-menu">
									<div class="menu-header-content bg-primary text-right">
										<div class="d-flex">
											<h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">البريد</h6>
											<span class="badge badge-pill badge-warning mr-auto my-auto float-left">8</span>
										</div>
										<p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">البريد الوارد 4</p>
									</div>
                                    
									<div class="main-message-list chat-scroll">
										<a href="" class="p-3 d-flex border-bottom">
											<div class="  drop-img  cover-image  " data-image-src="{{URL::asset('admin/img/faces/3.jpg')}}">
												<span class="avatar-status bg-teal"></span>
											</div>

											<div class="wd-90p">

												<div class="d-flex">
													<h5 class="mb-1 name"> ali</h5>
												</div>
												<p class="mb-0 desc">hgghhggghgg</p>
												<p class="time mb-0 text-left float-right mr-2 mt-2">21/8/2020</p>


											</div>

										</a>


									</div>

									<div class="text-center dropdown-footer">
										<a href=""> جميع الرسائل</a>
									</div>
								</div>
							</div>

							<div class="nav-item full-screen fullscreen-button">
								<a class="new nav-link full-screen-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg></a>
							</div>
							<div class="dropdown main-profile-menu nav nav-item nav-link">
								<a class="profile-user d-flex" href=""><img alt="" src="{{URL::asset('admin/img/profile.svg')}}"></a>
								<div class="dropdown-menu">
									<div class="main-header-profile bg-primary p-3">
										<div class="d-flex wd-100p">
											<div class="main-img-user"><img alt="" src="{{URL::asset('admin/img/profile.svg')}}" class=""></div>
											<div class="mr-3 my-auto">
												<h6>@auth{{Auth::user()->name}} @endauth</h6><span>المدير  </span>
											</div>
										</div>
									</div>
									<a class="dropdown-item" href="../profial"><i class="bx bx-user-circle"></i>البروفايل</a>
									<a class="dropdown-item" href=""><i class="bx bx-cog"></i> تعديل البروفايل</a>


									<a class="dropdown-item" href="{{ url('../logout') }}"><i class="bx bx-log-out"></i>تسجيل خروج</a>
								</div>
							</div>
							<div class="dropdown main-header-message right-toggle">
								<a class="nav-link pr-0" data-toggle="sidebar-left" data-target=".sidebar-left">
									<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- /main-header -->
