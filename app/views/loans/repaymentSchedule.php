

<?php
   require APPROOT . '/views/includes/dashboard/header.php';
?>

	<!--begin::Body-->
	<body id="kt_body" class="aside-enabled">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Aside-->
				<div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
					<!--begin::Aside Toolbarl-->
					<div class="aside-toolbar flex-column-auto" id="kt_aside_toolbar">
						<!--begin::Aside user-->
						<!--begin::User-->
						<div class="aside-user d-flex align-items-sm-center justify-content-center py-5">
							<!--begin::Symbol-->
							<div class="symbol symbol-50px">
								<img src="<?php echo URLROOT ?>/public/img/usericon.png" alt="" />
							</div>
							<!--end::Symbol-->
							<!--begin::Wrapper-->
							<div class="aside-user-info flex-row-fluid flex-wrap ms-5">
								<!--begin::Section-->
								<div class="d-flex">
									<!--begin::Info-->
									<div class="flex-grow-1 me-2">
										<!--begin::Username-->
										
										<a href="#" class="text-white text-hover-primary fs-6 fw-bold"><?php echo ucfirst($_SESSION['firstname']); ?></a>
										<!--end::Username-->
										<!--begin::Description-->
										<span class="text-gray-600 fw-semibold d-block fs-8 mb-1">
											<?php 
												switch($_SESSION['role']) {
													case "001":
														echo 'Administrator';
													break;
													case "002":
														echo 'Supervisor';
													break;
													case "003":
														echo 'Loan Officer';
													break;
													case "004":
														echo 'CRM Officer';
													break;
													case "005":
														echo 'Operator';
													break;
													case "006":
														echo 'Guest';
													break;
												}
											?>
										</span>
										<!--end::Description-->
										<!--begin::Label-->
										<div class="d-flex align-items-center text-success fs-9">
										<span class="bullet bullet-dot bg-success me-1"></span>online</div>
										<!--end::Label-->
									</div>
									<!--end::Info-->
									<!--begin::User menu-->
									<div class="me-n2">
										<!--begin::Action-->
										<a href="#" class="btn btn-icon btn-sm btn-active-color-primary mt-n2" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" data-kt-menu-overflow="true">
											<i class="ki-duotone ki-setting-2 text-muted fs-1">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</a>
										<!--begin::User account menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<div class="menu-content d-flex align-items-center px-3">
													<!--begin::Avatar-->
													<div class="symbol symbol-50px me-5">
														<img alt="Logo" src="assets/media/avatars/300-1.jpg" />
													</div>
													<!--end::Avatar-->
													<!--begin::Username-->
													<div class="d-flex flex-column">
														<div class="fw-bold d-flex align-items-center fs-5">Max Smith 
														<span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span></div>
														<a href="#" class="fw-semibold text-muted text-hover-primary fs-7">max@kt.com</a>
													</div>
													<!--end::Username-->
												</div>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu separator-->
											<div class="separator my-2"></div>
											<!--end::Menu separator-->
											<!--begin::Menu item-->
											<div class="menu-item px-5">
												<a href="account/overview.html" class="menu-link px-5">My Profile</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-5">
												<a href="apps/projects/list.html" class="menu-link px-5">
													<span class="menu-text">My Projects</span>
													<span class="menu-badge">
														<span class="badge badge-light-danger badge-circle fw-bold fs-7">3</span>
													</span>
												</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" data-kt-menu-offset="-15px, 0">
												<a href="#" class="menu-link px-5">
													<span class="menu-title">My Subscription</span>
													<span class="menu-arrow"></span>
												</a>
												<!--begin::Menu sub-->
												<div class="menu-sub menu-sub-dropdown w-175px py-4">
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="account/referrals.html" class="menu-link px-5">Referrals</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="account/billing.html" class="menu-link px-5">Billing</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="account/statements.html" class="menu-link px-5">Payments</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="account/statements.html" class="menu-link d-flex flex-stack px-5">Statements 
														<span class="ms-2 lh-0" data-bs-toggle="tooltip" title="View your statements">
															<i class="ki-duotone ki-information-5 fs-5">
																<span class="path1"></span>
																<span class="path2"></span>
																<span class="path3"></span>
															</i>
														</span></a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu separator-->
													<div class="separator my-2"></div>
													<!--end::Menu separator-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<div class="menu-content px-3">
															<label class="form-check form-switch form-check-custom form-check-solid">
																<input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
																<span class="form-check-label text-muted fs-7">Notifications</span>
															</label>
														</div>
													</div>
													<!--end::Menu item-->
												</div>
												<!--end::Menu sub-->
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-5">
												<a href="account/statements.html" class="menu-link px-5">My Statements</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu separator-->
											<div class="separator my-2"></div>
											<!--end::Menu separator-->
											<!--begin::Menu item-->
											<div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" data-kt-menu-offset="-15px, 0">
												<a href="#" class="menu-link px-5">
													<span class="menu-title position-relative">Language 
													<span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">English 
													<img class="w-15px h-15px rounded-1 ms-2" src="assets/media/flags/united-states.svg" alt="" /></span></span>
												</a>
												<!--begin::Menu sub-->
												<div class="menu-sub menu-sub-dropdown w-175px py-4">
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="account/settings.html" class="menu-link d-flex px-5 active">
														<span class="symbol symbol-20px me-4">
															<img class="rounded-1" src="assets/media/flags/united-states.svg" alt="" />
														</span>English</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="account/settings.html" class="menu-link d-flex px-5">
														<span class="symbol symbol-20px me-4">
															<img class="rounded-1" src="assets/media/flags/spain.svg" alt="" />
														</span>Spanish</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="account/settings.html" class="menu-link d-flex px-5">
														<span class="symbol symbol-20px me-4">
															<img class="rounded-1" src="assets/media/flags/germany.svg" alt="" />
														</span>German</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="account/settings.html" class="menu-link d-flex px-5">
														<span class="symbol symbol-20px me-4">
															<img class="rounded-1" src="assets/media/flags/japan.svg" alt="" />
														</span>Japanese</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="account/settings.html" class="menu-link d-flex px-5">
														<span class="symbol symbol-20px me-4">
															<img class="rounded-1" src="assets/media/flags/france.svg" alt="" />
														</span>French</a>
													</div>
													<!--end::Menu item-->
												</div>
												<!--end::Menu sub-->
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-5 my-1">
												<a href="account/settings.html" class="menu-link px-5">Account Settings</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-5">
												<a href="authentication/layouts/corporate/sign-in.html" class="menu-link px-5">Sign Out</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::User account menu-->
										<!--end::Action-->
									</div>
									<!--end::User menu-->
								</div>
								<!--end::Section-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::User-->
						<!--begin::Aside search-->
						<div class="aside-search py-5">
							<!--begin::Search-->
							<div id="kt_header_search" class="header-search d-flex align-items-center w-100" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="menu" data-kt-search-responsive="false" data-kt-menu-trigger="auto" data-kt-menu-permanent="true" data-kt-menu-placement="bottom-start">
								<!--begin::Tablet and mobile search toggle-->
								<div data-kt-search-element="toggle" class="search-toggle-mobile d-flex d-lg-none align-items-center">
									<div class="d-flex">
										<i class="ki-duotone ki-magnifier fs-1">
											<span class="path1"></span>
											<span class="path2"></span>
										</i>
									</div>
								</div>
								<!--end::Tablet and mobile search toggle-->
								<!--begin::Form-->
								<form data-kt-search-element="form" class="w-100 position-relative" autocomplete="off">
									<!--begin::Hidden input(Added to disable form autocomplete)-->
									<input type="hidden" />
									<!--end::Hidden input-->
									<!--begin::Icon-->
									<i class="ki-duotone ki-magnifier fs-2 search-icon position-absolute top-50 translate-middle-y ms-4">
										<span class="path1"></span>
										<span class="path2"></span>
									</i>
									<!--end::Icon-->
									<!--begin::Input-->
									<input type="text" class="search-input form-control ps-13 fs-7 h-40px" name="search" value="" placeholder="Quick Search" data-kt-search-element="input" />
									<!--end::Input-->
									<!--begin::Spinner-->
									<span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5" data-kt-search-element="spinner">
										<span class="spinner-border h-15px w-15px align-middle text-gray-500"></span>
									</span>
									<!--end::Spinner-->
									<!--begin::Reset-->
									<span class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-4" data-kt-search-element="clear">
										<i class="ki-duotone ki-cross fs-2 fs-lg-1 me-0">
											<span class="path1"></span>
											<span class="path2"></span>
										</i>
									</span>
									<!--end::Reset-->
								</form>
								<!--end::Form-->
							</div>
							<!--end::Search-->
						</div>
						<!--end::Aside search-->
						<!--end::Aside user-->
					</div>
					<!--end::Aside Toolbarl-->
					<!--begin::Aside menu-->
					<div class="aside-menu flex-column-fluid">
						<!--begin::Aside Menu-->
						<div class="hover-scroll-overlay-y mx-3 my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="{default: '#kt_aside_toolbar, #kt_aside_footer', lg: '#kt_header, #kt_aside_toolbar, #kt_aside_footer'}" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="5px">
							<!--begin::Menu-->
							<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
						

							<!-- **************************************** RIGHT NAVIGATION STARTS HERE ********************************************* -->	
							<?php
   require APPROOT . '/views/includes/dashboard/navigation.php';
?>
							
								
					<!-- **************************************** RIGHT NAVIGATION STOPS HERE ********************************************* -->							
							
							</div>
							<!--end::Menu-->
						</div>
						<!--end::Aside Menu-->
					</div>
					<!--end::Aside menu-->
					<!--begin::Footer-->
					<div class="aside-footer flex-column-auto py-5" id="kt_aside_footer">
					<a onclick="logoutUser();" style="background-color:#f8285b; color: #fff;" class="btn btn-flex btn-custom btn-primary w-100">
							<span class="btn-label">Logout</span>
							<i class="ki-duotone ki-document ms-2 fs-2">
								<span class="path1"></span>
								<span class="path2"></span>
							</i>
						</a>
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" style="" class="header align-items-stretch">
						<!--begin::Brand-->
						<div class="header-brand">
							<!--begin::Logo-->
							<a href="index.html">
								<img alt="Logo" style="width:150px; height:80px; " src="<?php echo URLROOT ?>/public/img/finserve-logo.jpeg" class="h-25px h-lg-25px" />
							</a>
							<!--end::Logo-->
							<!--begin::Aside minimize-->
							<div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-minimize" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
								<i class="ki-duotone ki-entrance-right fs-1 me-n1 minimize-default">
									<span class="path1"></span>
									<span class="path2"></span>
								</i>
								<i class="ki-duotone ki-entrance-left fs-1 minimize-active">
									<span class="path1"></span>
									<span class="path2"></span>
								</i>
							</div>
							<!--end::Aside minimize-->
							<!--begin::Aside toggle-->
							<div class="d-flex align-items-center d-lg-none me-n2" title="Show aside menu">
								<div class="btn btn-icon btn-active-color-primary w-30px h-30px" id="kt_aside_mobile_toggle">
									<i class="ki-duotone ki-abstract-14 fs-1">
										<span class="path1"></span>
										<span class="path2"></span>
									</i>
								</div>
							</div>
							<!--end::Aside toggle-->
						</div>
						<!--end::Brand-->
						<!--begin::Toolbar-->
						<div class="toolbar d-flex align-items-stretch">
							<!--begin::Toolbar container-->
							<div class="container-xxl py-6 py-lg-0 d-flex flex-column flex-lg-row align-items-lg-stretch justify-content-lg-between">
								<!--begin::Page title-->
								<div class="page-title d-flex justify-content-center flex-column me-5">
									<!--begin::Breadcrumb-->
									<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 pt-1">
										<!--begin::Item-->
										<li class="breadcrumb-item text-muted">
											<a href="index.html" class="text-muted text-hover-primary">
                                            <i class="ki-duotone ki-home"></i>
                                            </a>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item">
											<span class="bullet bg-gray-300 w-5px h-2px"></span>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item text-muted">Loan</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item">
											<span class="bullet bg-gray-300 w-5px h-2px"></span>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item text-gray-900">Manage Loan Card</li>
										<!--end::Item-->
									</ul>
									<!--end::Breadcrumb-->
								</div>
								<!--end::Page title-->
								<!--begin::Action group-->
								<div class="d-flex align-items-stretch overflow-auto pt-3 pt-lg-0">
									<!--begin::Action wrapper-->
									<div class="d-flex align-items-center">
										<!--begin::Label-->
										<span class="fs-7 fw-bold text-gray-700 pe-4 text-nowrap d-none d-xxl-block">Default View:</span>
										<!--end::Label-->
										<!--begin::Select-->
										<select class="form-select form-select-sm form-select-solid w-100px w-xxl-125px" data-control="select2" data-placeholder="Latest" data-hide-search="true">
											<option value=""></option>
											<option value="1" selected="selected">CRM</option>
											<option value="2">Loans</option>
											<option value="3">Accounts</option>
										</select>
										<!--end::Select-->
									</div>
									<!--end::Action wrapper-->
									<!--begin::Action wrapper-->
									<div class="d-flex align-items-center">
										<!--begin::Separartor-->
										<div class="bullet bg-secondary h-35px w-1px mx-5"></div>
										<!--end::Separartor-->
										<!--begin::Label-->
										<span class="fs-7 text-gray-700 fw-bold d-none d-sm-block"> 
										<span class="d-none d-xxl-inline"></span></span>
										<!--end::Label-->							
									</div>
									<!--end::Action wrapper-->
									<!--begin::Action wrapper-->
									<div class="d-flex align-items-center">
										<!--begin::Label-->
										<span class="fs-7 text-gray-700 fw-bold pe-3 d-none d-xxl-block">Quick Tools:</span>
										<!--end::Label-->
										<!--begin::Actions-->
										<div class="d-flex">
											<!--begin::Action-->
											<a href="#" class="btn btn-sm btn-icon btn-icon-muted btn-active-icon-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">
												<i class="ki-duotone ki-file fs-1">
													<span class="path1"></span>
													<span class="path2"></span>
												</i>
											</a>
											<!--end::Action-->
											<!--begin::Notifications-->
											<div class="d-flex align-items-center">
												<!--begin::Menu- wrapper-->
												<a href="apps/subscriptions/add.html" class="btn btn-sm btn-icon btn-icon-muted btn-active-icon-primary">
													<i class="ki-duotone ki-add-files fs-1">
														<span class="path1"></span>
														<span class="path2"></span>
														<span class="path3"></span>
													</i>
												</a>
												<!--end::Menu wrapper-->
											</div>
											<!--end::Notifications-->
											<!--begin::Quick links-->
											<div class="d-flex align-items-center">
												<!--begin::Menu wrapper-->
												<a href="apps/file-manager/folders.html" class="btn btn-sm btn-icon btn-icon-muted btn-active-icon-primary">
													<i class="ki-duotone ki-file-up fs-1">
														<span class="path1"></span>
														<span class="path2"></span>
													</i>
												</a>
												<!--end::Menu wrapper-->
											</div>
											<!--end::Quick links-->
										</div>
										<!--end::Actions-->
									</div>
									<!--end::Action wrapper-->
									<!--begin::Theme mode-->
									<div class="d-flex align-items-center">
										<!--begin::Menu toggle-->
										<a href="#" class="btn btn-sm btn-icon btn-icon-muted btn-active-icon-primary" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
											<i class="ki-duotone ki-night-day theme-light-show fs-1">
												<span class="path1"></span>
												<span class="path2"></span>
												<span class="path3"></span>
												<span class="path4"></span>
												<span class="path5"></span>
												<span class="path6"></span>
												<span class="path7"></span>
												<span class="path8"></span>
												<span class="path9"></span>
												<span class="path10"></span>
											</i>
											<i class="ki-duotone ki-moon theme-dark-show fs-1">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</a>
										<!--begin::Menu toggle-->
										<!--begin::Menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
											<!--begin::Menu item-->
											<div class="menu-item px-3 my-0">
												<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
													<span class="menu-icon" data-kt-element="icon">
														<i class="ki-duotone ki-night-day fs-2">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
															<span class="path4"></span>
															<span class="path5"></span>
															<span class="path6"></span>
															<span class="path7"></span>
															<span class="path8"></span>
															<span class="path9"></span>
															<span class="path10"></span>
														</i>
													</span>
													<span class="menu-title">Light</span>
												</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3 my-0">
												<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
													<span class="menu-icon" data-kt-element="icon">
														<i class="ki-duotone ki-moon fs-2">
															<span class="path1"></span>
															<span class="path2"></span>
														</i>
													</span>
													<span class="menu-title">Dark</span>
												</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3 my-0">
												<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
													<span class="menu-icon" data-kt-element="icon">
														<i class="ki-duotone ki-screen fs-2">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
															<span class="path4"></span>
														</i>
													</span>
													<span class="menu-title">System</span>
												</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu-->
									</div>
									<!--end::Theme mode-->
								</div>
								<!--end::Action group-->
							</div>
							<!--end::Toolbar container-->
						</div>
						<!--end::Toolbar-->
					</div>
					<!--end::Header-->

<!-- ****************************** BEGINNING OF NEW CONTENT STARTS HERE ********************************* -->

<div class="content d-flex flex-column flex-column-fluid " id="kt_content">
					<!--begin::Post-->
                    <div class="post d-flex flex-column-fluid" id="kt_post">
						<!--begin::Container-->
<div id="kt_content_container" class=" container-xxl ">

<div class="welcomeProfile">
					<h3 class="fw-bold my-2 welcomeTxt">Manage Loan Card</h3>
					
					</div>
    

<!--*****************************************************  START OF LOAN CARD HEADER  ******************************************************  -->

<?php
   require APPROOT . '/views/includes/dashboard/loanCardHeader.php';
?>


<!--*****************************************************  END OF LOAN CARD HEADER  ****************************************************** -->

<div class="card ">
    <!--begin::Header-->
    <div class="card-header card-header-stretch">
        <!--begin::Title-->
        <div class="card-title">
            <h3>Amortized Repayment Schedule</h3>
        </div>
        <!--end::Title-->
        
        <!--begin::Toolbar-->
        <div class="card-toolbar">
            <!--begin::Tab nav-->
            <ul class="nav nav-stretch fs-5 fw-semibold nav-line-tabs border-transparent" role="tablist">
                <li class="nav-item" role="presentation">
                    <a id="kt_referrals_tab_1" class="nav-link text-active-gray-800 me-4 active" data-bs-toggle="tab" role="tab" href="#kt_referrals_1" aria-selected="true">
                        2024
                    </a>
                </li>
            </ul>
            <!--end::Tab nav-->
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header-->

    <!--begin::Tab content-->
    <div id="kt_referred_users_tab_content" class="tab-content">
                    
            <!--begin::Tab panel-->
            <div id="kt_referrals_1" class="card-body p-0 tab-pane fade show active" role="tabpanel" aria-labelledby="kt_referrals_tab_1">

			<?php if(!$data['repaymentDetails']) : ?>
				<div class="py-5" style="width:50%; margin-left:30px; margin-top:10px; margin-bottom:20px;">
					<div class="d-flex align-items-center rounded py-5 px-5 bg-light-primary ">
						<i class="ki-duotone ki-information-5 fs-3x text-primary me-5">
								<span class="path1"></span>
								<span class="path2"></span>
								<span class="path3"></span>
						</i>
						<div class="text-gray-700 fw-bold fs-6">
							No customer loan history found!
						</div>
					</div>
				</div>
			<?php endif; ?>

                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table table-row-bordered align-middle gy-6">
                        <!--begin::Thead-->
                        <thead class="border-bottom border-gray-200 fs-6 fw-bold bg-lighten">
                            <tr>
                                <th class="min-w-50px ps-9">#</th>
                                <th class="min-w-125px px-9">Month</th>
								<th class="min-w-125px">Monthly Repayment</th>
                                <th class="min-w-125px">Principal</th>
								<th class="min-w-125px">Interest</th>
								<th class="min-w-125px">Balance</th>
                                
                            </tr>
                        </thead>
                        <!--end::Thead-->

                        <!--begin::Tbody-->
                        <tbody class="fs-6 fw-semibold text-gray-600">
						<?php $x=1; ?>
						<?php foreach($data['repaymentDetails'] as $schedule): ?>
                                <tr>
									<td class="ps-9"><?php echo $x; ?></td>
                                    <td class="ps-9"><?php echo 'Month '.$schedule['Payment']; ?></td>
									<td class="text-success"><?php echo '₦'.$schedule['Repayment']; ?></td>
									<td class="text-primary"><?php echo '₦'.$schedule['Principal']; ?></td>
                                    <td class="text-primary"><?php echo '₦'.$schedule['Interest']; ?></td>
									<td class="text-primary"><?php echo '₦'.$schedule['Balance']; ?></td>
                                </tr>
						<?php $x++; ?>
						<?php endforeach; ?>
                        </tbody>
                        <!--end::Tbody-->
                    </table>
                    <!--end::Table-->
                </div>
            </div>
            <!--end::Tab panel-->     
    </div>
    <!--end::Tab content-->
</div>
  
<!--end::Container-->                	</div>
                    <!--end::Post-->
				</div>

<!-- ****************************** END OF NEW CONTENT STARTS HERE ********************************* -->
				
				
					<!--begin::Footer-->
					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
							<!--begin::Copyright-->
							<div class="text-gray-900 order-2 order-md-1">
								<span class="text-muted fw-semibold me-1">2023&copy;</span>
								<a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Keenthemes</a>
							</div>
							<!--end::Copyright-->
							<!--begin::Menu-->
							<ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
								<li class="menu-item">
									<a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
								</li>
								<li class="menu-item">
									<a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
								</li>
								<li class="menu-item">
									<a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
								</li>
							</ul>
							<!--end::Menu-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--begin::Drawers-->
		<!--begin::Activities drawer-->
		<div id="kt_activities" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="activities" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'lg': '900px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_activities_toggle" data-kt-drawer-close="#kt_activities_close">
			<div class="card shadow-none border-0 rounded-0">
				<!--begin::Header-->
				<div class="card-header" id="kt_activities_header">
					<h3 class="card-title fw-bold text-gray-900">Activity Logs</h3>
					<div class="card-toolbar">
						<button type="button" class="btn btn-sm btn-icon btn-active-light-primary me-n5" id="kt_activities_close">
							<i class="ki-duotone ki-cross fs-1">
								<span class="path1"></span>
								<span class="path2"></span>
							</i>
						</button>
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body position-relative" id="kt_activities_body">
					<!--begin::Content-->
					<div id="kt_activities_scroll" class="position-relative scroll-y me-n5 pe-5" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_activities_body" data-kt-scroll-dependencies="#kt_activities_header, #kt_activities_footer" data-kt-scroll-offset="5px">
						<!--begin::Timeline items-->
						<div class="timeline timeline-border-dashed">
							<!--begin::Timeline item-->
							<div class="timeline-item">
								<!--begin::Timeline line-->
								<div class="timeline-line"></div>
								<!--end::Timeline line-->
								<!--begin::Timeline icon-->
								<div class="timeline-icon">
									<i class="ki-duotone ki-message-text-2 fs-2 text-gray-500">
										<span class="path1"></span>
										<span class="path2"></span>
										<span class="path3"></span>
									</i>
								</div>
								<!--end::Timeline icon-->
								<!--begin::Timeline content-->
								<div class="timeline-content mb-10 mt-n1">
									<!--begin::Timeline heading-->
									<div class="pe-3 mb-5">
										<!--begin::Title-->
										<div class="fs-5 fw-semibold mb-2">There are 2 new tasks for you in “AirPlus Mobile App” project:</div>
										<!--end::Title-->
										<!--begin::Description-->
										<div class="d-flex align-items-center mt-1 fs-6">
											<!--begin::Info-->
											<div class="text-muted me-2 fs-7">Added at 4:23 PM by</div>
											<!--end::Info-->
											<!--begin::User-->
											<div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="Nina Nilson">
												<img src="assets/media/avatars/300-14.jpg" alt="img" />
											</div>
											<!--end::User-->
										</div>
										<!--end::Description-->
									</div>
									<!--end::Timeline heading-->
									<!--begin::Timeline details-->
									<div class="overflow-auto pb-5">
										<!--begin::Record-->
										<div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-5">
											<!--begin::Title-->
											<a href="apps/projects/project.html" class="fs-5 text-gray-900 text-hover-primary fw-semibold w-375px min-w-200px">Meeting with customer</a>
											<!--end::Title-->
											<!--begin::Label-->
											<div class="min-w-175px pe-2">
												<span class="badge badge-light text-muted">Application Design</span>
											</div>
											<!--end::Label-->
											<!--begin::Users-->
											<div class="symbol-group symbol-hover flex-nowrap flex-grow-1 min-w-100px pe-2">
												<!--begin::User-->
												<div class="symbol symbol-circle symbol-25px">
													<img src="assets/media/avatars/300-2.jpg" alt="img" />
												</div>
												<!--end::User-->
												<!--begin::User-->
												<div class="symbol symbol-circle symbol-25px">
													<img src="assets/media/avatars/300-14.jpg" alt="img" />
												</div>
												<!--end::User-->
												<!--begin::User-->
												<div class="symbol symbol-circle symbol-25px">
													<div class="symbol-label fs-8 fw-semibold bg-primary text-inverse-primary">A</div>
												</div>
												<!--end::User-->
											</div>
											<!--end::Users-->
											<!--begin::Progress-->
											<div class="min-w-125px pe-2">
												<span class="badge badge-light-primary">In Progress</span>
											</div>
											<!--end::Progress-->
											<!--begin::Action-->
											<a href="apps/projects/project.html" class="btn btn-sm btn-light btn-active-light-primary">View</a>
											<!--end::Action-->
										</div>
										<!--end::Record-->
										<!--begin::Record-->
										<div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-0">
											<!--begin::Title-->
											<a href="apps/projects/project.html" class="fs-5 text-gray-900 text-hover-primary fw-semibold w-375px min-w-200px">Project Delivery Preparation</a>
											<!--end::Title-->
											<!--begin::Label-->
											<div class="min-w-175px">
												<span class="badge badge-light text-muted">CRM System Development</span>
											</div>
											<!--end::Label-->
											<!--begin::Users-->
											<div class="symbol-group symbol-hover flex-nowrap flex-grow-1 min-w-100px">
												<!--begin::User-->
												<div class="symbol symbol-circle symbol-25px">
													<img src="assets/media/avatars/300-20.jpg" alt="img" />
												</div>
												<!--end::User-->
												<!--begin::User-->
												<div class="symbol symbol-circle symbol-25px">
													<div class="symbol-label fs-8 fw-semibold bg-success text-inverse-primary">B</div>
												</div>
												<!--end::User-->
											</div>
											<!--end::Users-->
											<!--begin::Progress-->
											<div class="min-w-125px">
												<span class="badge badge-light-success">Completed</span>
											</div>
											<!--end::Progress-->
											<!--begin::Action-->
											<a href="apps/projects/project.html" class="btn btn-sm btn-light btn-active-light-primary">View</a>
											<!--end::Action-->
										</div>
										<!--end::Record-->
									</div>
									<!--end::Timeline details-->
								</div>
								<!--end::Timeline content-->
							</div>
							<!--end::Timeline item-->
							<!--begin::Timeline item-->
							<div class="timeline-item">
								<!--begin::Timeline line-->
								<div class="timeline-line"></div>
								<!--end::Timeline line-->
								<!--begin::Timeline icon-->
								<div class="timeline-icon me-4">
									<i class="ki-duotone ki-flag fs-2 text-gray-500">
										<span class="path1"></span>
										<span class="path2"></span>
									</i>
								</div>
								<!--end::Timeline icon-->
								<!--begin::Timeline content-->
								<div class="timeline-content mb-10 mt-n2">
									<!--begin::Timeline heading-->
									<div class="overflow-auto pe-3">
										<!--begin::Title-->
										<div class="fs-5 fw-semibold mb-2">Invitation for crafting engaging designs that speak human workshop</div>
										<!--end::Title-->
										<!--begin::Description-->
										<div class="d-flex align-items-center mt-1 fs-6">
											<!--begin::Info-->
											<div class="text-muted me-2 fs-7">Sent at 4:23 PM by</div>
											<!--end::Info-->
											<!--begin::User-->
											<div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="Alan Nilson">
												<img src="assets/media/avatars/300-1.jpg" alt="img" />
											</div>
											<!--end::User-->
										</div>
										<!--end::Description-->
									</div>
									<!--end::Timeline heading-->
								</div>
								<!--end::Timeline content-->
							</div>
							<!--end::Timeline item-->
							<!--begin::Timeline item-->
							<div class="timeline-item">
								<!--begin::Timeline line-->
								<div class="timeline-line"></div>
								<!--end::Timeline line-->
								<!--begin::Timeline icon-->
								<div class="timeline-icon">
									<i class="ki-duotone ki-disconnect fs-2 text-gray-500">
										<span class="path1"></span>
										<span class="path2"></span>
										<span class="path3"></span>
										<span class="path4"></span>
										<span class="path5"></span>
									</i>
								</div>
								<!--end::Timeline icon-->
								<!--begin::Timeline content-->
								<div class="timeline-content mb-10 mt-n1">
									<!--begin::Timeline heading-->
									<div class="mb-5 pe-3">
										<!--begin::Title-->
										<a href="#" class="fs-5 fw-semibold text-gray-800 text-hover-primary mb-2">3 New Incoming Project Files:</a>
										<!--end::Title-->
										<!--begin::Description-->
										<div class="d-flex align-items-center mt-1 fs-6">
											<!--begin::Info-->
											<div class="text-muted me-2 fs-7">Sent at 10:30 PM by</div>
											<!--end::Info-->
											<!--begin::User-->
											<div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="Jan Hummer">
												<img src="assets/media/avatars/300-23.jpg" alt="img" />
											</div>
											<!--end::User-->
										</div>
										<!--end::Description-->
									</div>
									<!--end::Timeline heading-->
									<!--begin::Timeline details-->
									<div class="overflow-auto pb-5">
										<div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-5">
											<!--begin::Item-->
											<div class="d-flex flex-aligns-center pe-10 pe-lg-20">
												<!--begin::Icon-->
												<img alt="" class="w-30px me-3" src="assets/media/svg/files/pdf.svg" />
												<!--end::Icon-->
												<!--begin::Info-->
												<div class="ms-1 fw-semibold">
													<!--begin::Desc-->
													<a href="apps/projects/project.html" class="fs-6 text-hover-primary fw-bold">Finance KPI App Guidelines</a>
													<!--end::Desc-->
													<!--begin::Number-->
													<div class="text-gray-500">1.9mb</div>
													<!--end::Number-->
												</div>
												<!--begin::Info-->
											</div>
											<!--end::Item-->
											<!--begin::Item-->
											<div class="d-flex flex-aligns-center pe-10 pe-lg-20">
												<!--begin::Icon-->
												<img alt="apps/projects/project.html" class="w-30px me-3" src="assets/media/svg/files/doc.svg" />
												<!--end::Icon-->
												<!--begin::Info-->
												<div class="ms-1 fw-semibold">
													<!--begin::Desc-->
													<a href="#" class="fs-6 text-hover-primary fw-bold">Client UAT Testing Results</a>
													<!--end::Desc-->
													<!--begin::Number-->
													<div class="text-gray-500">18kb</div>
													<!--end::Number-->
												</div>
												<!--end::Info-->
											</div>
											<!--end::Item-->
											<!--begin::Item-->
											<div class="d-flex flex-aligns-center">
												<!--begin::Icon-->
												<img alt="apps/projects/project.html" class="w-30px me-3" src="assets/media/svg/files/css.svg" />
												<!--end::Icon-->
												<!--begin::Info-->
												<div class="ms-1 fw-semibold">
													<!--begin::Desc-->
													<a href="#" class="fs-6 text-hover-primary fw-bold">Finance Reports</a>
													<!--end::Desc-->
													<!--begin::Number-->
													<div class="text-gray-500">20mb</div>
													<!--end::Number-->
												</div>
												<!--end::Icon-->
											</div>
											<!--end::Item-->
										</div>
									</div>
									<!--end::Timeline details-->
								</div>
								<!--end::Timeline content-->
							</div>
							<!--end::Timeline item-->
							<!--begin::Timeline item-->
							<div class="timeline-item">
								<!--begin::Timeline line-->
								<div class="timeline-line"></div>
								<!--end::Timeline line-->
								<!--begin::Timeline icon-->
								<div class="timeline-icon">
									<i class="ki-duotone ki-abstract-26 fs-2 text-gray-500">
										<span class="path1"></span>
										<span class="path2"></span>
									</i>
								</div>
								<!--end::Timeline icon-->
								<!--begin::Timeline content-->
								<div class="timeline-content mb-10 mt-n1">
									<!--begin::Timeline heading-->
									<div class="pe-3 mb-5">
										<!--begin::Title-->
										<div class="fs-5 fw-semibold mb-2">Task 
										<a href="#" class="text-primary fw-bold me-1">#45890</a>merged with 
										<a href="#" class="text-primary fw-bold me-1">#45890</a>in “Ads Pro Admin Dashboard project:</div>
										<!--end::Title-->
										<!--begin::Description-->
										<div class="d-flex align-items-center mt-1 fs-6">
											<!--begin::Info-->
											<div class="text-muted me-2 fs-7">Initiated at 4:23 PM by</div>
											<!--end::Info-->
											<!--begin::User-->
											<div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="Nina Nilson">
												<img src="assets/media/avatars/300-14.jpg" alt="img" />
											</div>
											<!--end::User-->
										</div>
										<!--end::Description-->
									</div>
									<!--end::Timeline heading-->
								</div>
								<!--end::Timeline content-->
							</div>
							<!--end::Timeline item-->
							<!--begin::Timeline item-->
							<div class="timeline-item">
								<!--begin::Timeline line-->
								<div class="timeline-line"></div>
								<!--end::Timeline line-->
								<!--begin::Timeline icon-->
								<div class="timeline-icon">
									<i class="ki-duotone ki-pencil fs-2 text-gray-500">
										<span class="path1"></span>
										<span class="path2"></span>
									</i>
								</div>
								<!--end::Timeline icon-->
								<!--begin::Timeline content-->
								<div class="timeline-content mb-10 mt-n1">
									<!--begin::Timeline heading-->
									<div class="pe-3 mb-5">
										<!--begin::Title-->
										<div class="fs-5 fw-semibold mb-2">3 new application design concepts added:</div>
										<!--end::Title-->
										<!--begin::Description-->
										<div class="d-flex align-items-center mt-1 fs-6">
											<!--begin::Info-->
											<div class="text-muted me-2 fs-7">Created at 4:23 PM by</div>
											<!--end::Info-->
											<!--begin::User-->
											<div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="Marcus Dotson">
												<img src="assets/media/avatars/300-2.jpg" alt="img" />
											</div>
											<!--end::User-->
										</div>
										<!--end::Description-->
									</div>
									<!--end::Timeline heading-->
									<!--begin::Timeline details-->
									<div class="overflow-auto pb-5">
										<div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-7">
											<!--begin::Item-->
											<div class="overlay me-10">
												<!--begin::Image-->
												<div class="overlay-wrapper">
													<img alt="img" class="rounded w-150px" src="assets/media/stock/600x400/img-29.jpg" />
												</div>
												<!--end::Image-->
												<!--begin::Link-->
												<div class="overlay-layer bg-dark bg-opacity-10 rounded">
													<a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
												</div>
												<!--end::Link-->
											</div>
											<!--end::Item-->
											<!--begin::Item-->
											<div class="overlay me-10">
												<!--begin::Image-->
												<div class="overlay-wrapper">
													<img alt="img" class="rounded w-150px" src="assets/media/stock/600x400/img-31.jpg" />
												</div>
												<!--end::Image-->
												<!--begin::Link-->
												<div class="overlay-layer bg-dark bg-opacity-10 rounded">
													<a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
												</div>
												<!--end::Link-->
											</div>
											<!--end::Item-->
											<!--begin::Item-->
											<div class="overlay">
												<!--begin::Image-->
												<div class="overlay-wrapper">
													<img alt="img" class="rounded w-150px" src="assets/media/stock/600x400/img-40.jpg" />
												</div>
												<!--end::Image-->
												<!--begin::Link-->
												<div class="overlay-layer bg-dark bg-opacity-10 rounded">
													<a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
												</div>
												<!--end::Link-->
											</div>
											<!--end::Item-->
										</div>
									</div>
									<!--end::Timeline details-->
								</div>
								<!--end::Timeline content-->
							</div>
							<!--end::Timeline item-->
							<!--begin::Timeline item-->
							<div class="timeline-item">
								<!--begin::Timeline line-->
								<div class="timeline-line"></div>
								<!--end::Timeline line-->
								<!--begin::Timeline icon-->
								<div class="timeline-icon">
									<i class="ki-duotone ki-sms fs-2 text-gray-500">
										<span class="path1"></span>
										<span class="path2"></span>
									</i>
								</div>
								<!--end::Timeline icon-->
								<!--begin::Timeline content-->
								<div class="timeline-content mb-10 mt-n1">
									<!--begin::Timeline heading-->
									<div class="pe-3 mb-5">
										<!--begin::Title-->
										<div class="fs-5 fw-semibold mb-2">New case 
										<a href="#" class="text-primary fw-bold me-1">#67890</a>is assigned to you in Multi-platform Database Design project</div>
										<!--end::Title-->
										<!--begin::Description-->
										<div class="overflow-auto pb-5">
											<!--begin::Wrapper-->
											<div class="d-flex align-items-center mt-1 fs-6">
												<!--begin::Info-->
												<div class="text-muted me-2 fs-7">Added at 4:23 PM by</div>
												<!--end::Info-->
												<!--begin::User-->
												<a href="#" class="text-primary fw-bold me-1">Alice Tan</a>
												<!--end::User-->
											</div>
											<!--end::Wrapper-->
										</div>
										<!--end::Description-->
									</div>
									<!--end::Timeline heading-->
								</div>
								<!--end::Timeline content-->
							</div>
							<!--end::Timeline item-->
							<!--begin::Timeline item-->
							<div class="timeline-item">
								<!--begin::Timeline line-->
								<div class="timeline-line"></div>
								<!--end::Timeline line-->
								<!--begin::Timeline icon-->
								<div class="timeline-icon">
									<i class="ki-duotone ki-pencil fs-2 text-gray-500">
										<span class="path1"></span>
										<span class="path2"></span>
									</i>
								</div>
								<!--end::Timeline icon-->
								<!--begin::Timeline content-->
								<div class="timeline-content mb-10 mt-n1">
									<!--begin::Timeline heading-->
									<div class="pe-3 mb-5">
										<!--begin::Title-->
										<div class="fs-5 fw-semibold mb-2">You have received a new order:</div>
										<!--end::Title-->
										<!--begin::Description-->
										<div class="d-flex align-items-center mt-1 fs-6">
											<!--begin::Info-->
											<div class="text-muted me-2 fs-7">Placed at 5:05 AM by</div>
											<!--end::Info-->
											<!--begin::User-->
											<div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="Robert Rich">
												<img src="assets/media/avatars/300-4.jpg" alt="img" />
											</div>
											<!--end::User-->
										</div>
										<!--end::Description-->
									</div>
									<!--end::Timeline heading-->
									<!--begin::Timeline details-->
									<div class="overflow-auto pb-5">
										<!--begin::Notice-->
										<div class="notice d-flex bg-light-primary rounded border-primary border border-dashed min-w-lg-600px flex-shrink-0 p-6">
											<!--begin::Icon-->
											<i class="ki-duotone ki-devices-2 fs-2tx text-primary me-4">
												<span class="path1"></span>
												<span class="path2"></span>
												<span class="path3"></span>
											</i>
											<!--end::Icon-->
											<!--begin::Wrapper-->
											<div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
												<!--begin::Content-->
												<div class="mb-3 mb-md-0 fw-semibold">
													<h4 class="text-gray-900 fw-bold">Database Backup Process Completed!</h4>
													<div class="fs-6 text-gray-700 pe-7">Login into Admin Dashboard to make sure the data integrity is OK</div>
												</div>
												<!--end::Content-->
												<!--begin::Action-->
												<a href="#" class="btn btn-primary px-6 align-self-center text-nowrap">Proceed</a>
												<!--end::Action-->
											</div>
											<!--end::Wrapper-->
										</div>
										<!--end::Notice-->
									</div>
									<!--end::Timeline details-->
								</div>
								<!--end::Timeline content-->
							</div>
							<!--end::Timeline item-->
							<!--begin::Timeline item-->
							<div class="timeline-item">
								<!--begin::Timeline line-->
								<div class="timeline-line"></div>
								<!--end::Timeline line-->
								<!--begin::Timeline icon-->
								<div class="timeline-icon">
									<i class="ki-duotone ki-basket fs-2 text-gray-500">
										<span class="path1"></span>
										<span class="path2"></span>
										<span class="path3"></span>
										<span class="path4"></span>
									</i>
								</div>
								<!--end::Timeline icon-->
								<!--begin::Timeline content-->
								<div class="timeline-content mt-n1">
									<!--begin::Timeline heading-->
									<div class="pe-3 mb-5">
										<!--begin::Title-->
										<div class="fs-5 fw-semibold mb-2">New order 
										<a href="#" class="text-primary fw-bold me-1">#67890</a>is placed for Workshow Planning & Budget Estimation</div>
										<!--end::Title-->
										<!--begin::Description-->
										<div class="d-flex align-items-center mt-1 fs-6">
											<!--begin::Info-->
											<div class="text-muted me-2 fs-7">Placed at 4:23 PM by</div>
											<!--end::Info-->
											<!--begin::User-->
											<a href="#" class="text-primary fw-bold me-1">Jimmy Bold</a>
											<!--end::User-->
										</div>
										<!--end::Description-->
									</div>
									<!--end::Timeline heading-->
								</div>
								<!--end::Timeline content-->
							</div>
							<!--end::Timeline item-->
						</div>
						<!--end::Timeline items-->
					</div>
					<!--end::Content-->
				</div>
				<!--end::Body-->
				<!--begin::Footer-->
				<div class="card-footer py-5 text-center" id="kt_activities_footer">
					<a href="pages/user-profile/activity.html" class="btn btn-bg-body text-primary">View All Activities 
					<i class="ki-duotone ki-arrow-right fs-3 text-primary">
						<span class="path1"></span>
						<span class="path2"></span>
					</i></a>
				</div>
				<!--end::Footer-->
			</div>
		</div>
		<!--end::Activities drawer-->
		<!--begin::Chat drawer-->
		<div id="kt_drawer_chat" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="chat" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'md': '500px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_drawer_chat_toggle" data-kt-drawer-close="#kt_drawer_chat_close">
			<!--begin::Messenger-->
			<div class="card w-100 border-0 rounded-0" id="kt_drawer_chat_messenger">
				<!--begin::Card header-->
				<div class="card-header pe-5" id="kt_drawer_chat_messenger_header">
					<!--begin::Title-->
					<div class="card-title">
						<!--begin::User-->
						<div class="d-flex justify-content-center flex-column me-3">
							<a href="#" class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1">Brian Cox</a>
							<!--begin::Info-->
							<div class="mb-0 lh-1">
								<span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
								<span class="fs-7 fw-semibold text-muted">Active</span>
							</div>
							<!--end::Info-->
						</div>
						<!--end::User-->
					</div>
					<!--end::Title-->
					<!--begin::Card toolbar-->
					<div class="card-toolbar">
						<!--begin::Menu-->
						<div class="me-0">
							<button class="btn btn-sm btn-icon btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
								<i class="ki-duotone ki-dots-square fs-2">
									<span class="path1"></span>
									<span class="path2"></span>
									<span class="path3"></span>
									<span class="path4"></span>
								</i>
							</button>
							<!--begin::Menu 3-->
							<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
								<!--begin::Heading-->
								<div class="menu-item px-3">
									<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Contacts</div>
								</div>
								<!--end::Heading-->
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_users_search">Add Contact</a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">Invite Contacts 
									<span class="ms-2" data-bs-toggle="tooltip" title="Specify a contact email to send an invitation">
										<i class="ki-duotone ki-information fs-7">
											<span class="path1"></span>
											<span class="path2"></span>
											<span class="path3"></span>
										</i>
									</span></a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
									<a href="#" class="menu-link px-3">
										<span class="menu-title">Groups</span>
										<span class="menu-arrow"></span>
									</a>
									<!--begin::Menu sub-->
									<div class="menu-sub menu-sub-dropdown w-175px py-4">
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="Coming soon">Create Group</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="Coming soon">Invite Members</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="Coming soon">Settings</a>
										</div>
										<!--end::Menu item-->
									</div>
									<!--end::Menu sub-->
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3 my-1">
									<a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="Coming soon">Settings</a>
								</div>
								<!--end::Menu item-->
							</div>
							<!--end::Menu 3-->
						</div>
						<!--end::Menu-->
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" id="kt_drawer_chat_close">
							<i class="ki-duotone ki-cross-square fs-2">
								<span class="path1"></span>
								<span class="path2"></span>
							</i>
						</div>
						<!--end::Close-->
					</div>
					<!--end::Card toolbar-->
				</div>
				<!--end::Card header-->
				<!--begin::Card body-->
				<div class="card-body" id="kt_drawer_chat_messenger_body">
					<!--begin::Messages-->
					<div class="scroll-y me-n5 pe-5" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_drawer_chat_messenger_header, #kt_drawer_chat_messenger_footer" data-kt-scroll-wrappers="#kt_drawer_chat_messenger_body" data-kt-scroll-offset="0px">
						<!--begin::Message(in)-->
						<div class="d-flex justify-content-start mb-10">
							<!--begin::Wrapper-->
							<div class="d-flex flex-column align-items-start">
								<!--begin::User-->
								<div class="d-flex align-items-center mb-2">
									<!--begin::Avatar-->
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="assets/media/avatars/300-25.jpg" />
									</div>
									<!--end::Avatar-->
									<!--begin::Details-->
									<div class="ms-3">
										<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian Cox</a>
										<span class="text-muted fs-7 mb-1">2 mins</span>
									</div>
									<!--end::Details-->
								</div>
								<!--end::User-->
								<!--begin::Text-->
								<div class="p-5 rounded bg-light-info text-gray-900 fw-semibold mw-lg-400px text-start" data-kt-element="message-text">How likely are you to recommend our company to your friends and family ?</div>
								<!--end::Text-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Message(in)-->
						<!--begin::Message(out)-->
						<div class="d-flex justify-content-end mb-10">
							<!--begin::Wrapper-->
							<div class="d-flex flex-column align-items-end">
								<!--begin::User-->
								<div class="d-flex align-items-center mb-2">
									<!--begin::Details-->
									<div class="me-3">
										<span class="text-muted fs-7 mb-1">5 mins</span>
										<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
									</div>
									<!--end::Details-->
									<!--begin::Avatar-->
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="assets/media/avatars/300-1.jpg" />
									</div>
									<!--end::Avatar-->
								</div>
								<!--end::User-->
								<!--begin::Text-->
								<div class="p-5 rounded bg-light-primary text-gray-900 fw-semibold mw-lg-400px text-end" data-kt-element="message-text">Hey there, we’re just writing to let you know that you’ve been subscribed to a repository on GitHub.</div>
								<!--end::Text-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Message(out)-->
						<!--begin::Message(in)-->
						<div class="d-flex justify-content-start mb-10">
							<!--begin::Wrapper-->
							<div class="d-flex flex-column align-items-start">
								<!--begin::User-->
								<div class="d-flex align-items-center mb-2">
									<!--begin::Avatar-->
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="assets/media/avatars/300-25.jpg" />
									</div>
									<!--end::Avatar-->
									<!--begin::Details-->
									<div class="ms-3">
										<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian Cox</a>
										<span class="text-muted fs-7 mb-1">1 Hour</span>
									</div>
									<!--end::Details-->
								</div>
								<!--end::User-->
								<!--begin::Text-->
								<div class="p-5 rounded bg-light-info text-gray-900 fw-semibold mw-lg-400px text-start" data-kt-element="message-text">Ok, Understood!</div>
								<!--end::Text-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Message(in)-->
						<!--begin::Message(out)-->
						<div class="d-flex justify-content-end mb-10">
							<!--begin::Wrapper-->
							<div class="d-flex flex-column align-items-end">
								<!--begin::User-->
								<div class="d-flex align-items-center mb-2">
									<!--begin::Details-->
									<div class="me-3">
										<span class="text-muted fs-7 mb-1">2 Hours</span>
										<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
									</div>
									<!--end::Details-->
									<!--begin::Avatar-->
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="assets/media/avatars/300-1.jpg" />
									</div>
									<!--end::Avatar-->
								</div>
								<!--end::User-->
								<!--begin::Text-->
								<div class="p-5 rounded bg-light-primary text-gray-900 fw-semibold mw-lg-400px text-end" data-kt-element="message-text">You’ll receive notifications for all issues, pull requests!</div>
								<!--end::Text-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Message(out)-->
						<!--begin::Message(in)-->
						<div class="d-flex justify-content-start mb-10">
							<!--begin::Wrapper-->
							<div class="d-flex flex-column align-items-start">
								<!--begin::User-->
								<div class="d-flex align-items-center mb-2">
									<!--begin::Avatar-->
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="assets/media/avatars/300-25.jpg" />
									</div>
									<!--end::Avatar-->
									<!--begin::Details-->
									<div class="ms-3">
										<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian Cox</a>
										<span class="text-muted fs-7 mb-1">3 Hours</span>
									</div>
									<!--end::Details-->
								</div>
								<!--end::User-->
								<!--begin::Text-->
								<div class="p-5 rounded bg-light-info text-gray-900 fw-semibold mw-lg-400px text-start" data-kt-element="message-text">You can unwatch this repository immediately by clicking here: 
								<a href="https://keenthemes.com">Keenthemes.com</a></div>
								<!--end::Text-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Message(in)-->
						<!--begin::Message(out)-->
						<div class="d-flex justify-content-end mb-10">
							<!--begin::Wrapper-->
							<div class="d-flex flex-column align-items-end">
								<!--begin::User-->
								<div class="d-flex align-items-center mb-2">
									<!--begin::Details-->
									<div class="me-3">
										<span class="text-muted fs-7 mb-1">4 Hours</span>
										<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
									</div>
									<!--end::Details-->
									<!--begin::Avatar-->
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="assets/media/avatars/300-1.jpg" />
									</div>
									<!--end::Avatar-->
								</div>
								<!--end::User-->
								<!--begin::Text-->
								<div class="p-5 rounded bg-light-primary text-gray-900 fw-semibold mw-lg-400px text-end" data-kt-element="message-text">Most purchased Business courses during this sale!</div>
								<!--end::Text-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Message(out)-->
						<!--begin::Message(in)-->
						<div class="d-flex justify-content-start mb-10">
							<!--begin::Wrapper-->
							<div class="d-flex flex-column align-items-start">
								<!--begin::User-->
								<div class="d-flex align-items-center mb-2">
									<!--begin::Avatar-->
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="assets/media/avatars/300-25.jpg" />
									</div>
									<!--end::Avatar-->
									<!--begin::Details-->
									<div class="ms-3">
										<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian Cox</a>
										<span class="text-muted fs-7 mb-1">5 Hours</span>
									</div>
									<!--end::Details-->
								</div>
								<!--end::User-->
								<!--begin::Text-->
								<div class="p-5 rounded bg-light-info text-gray-900 fw-semibold mw-lg-400px text-start" data-kt-element="message-text">Company BBQ to celebrate the last quater achievements and goals. Food and drinks provided</div>
								<!--end::Text-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Message(in)-->
						<!--begin::Message(template for out)-->
						<div class="d-flex justify-content-end mb-10 d-none" data-kt-element="template-out">
							<!--begin::Wrapper-->
							<div class="d-flex flex-column align-items-end">
								<!--begin::User-->
								<div class="d-flex align-items-center mb-2">
									<!--begin::Details-->
									<div class="me-3">
										<span class="text-muted fs-7 mb-1">Just now</span>
										<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
									</div>
									<!--end::Details-->
									<!--begin::Avatar-->
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="assets/media/avatars/300-1.jpg" />
									</div>
									<!--end::Avatar-->
								</div>
								<!--end::User-->
								<!--begin::Text-->
								<div class="p-5 rounded bg-light-primary text-gray-900 fw-semibold mw-lg-400px text-end" data-kt-element="message-text"></div>
								<!--end::Text-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Message(template for out)-->
						<!--begin::Message(template for in)-->
						<div class="d-flex justify-content-start mb-10 d-none" data-kt-element="template-in">
							<!--begin::Wrapper-->
							<div class="d-flex flex-column align-items-start">
								<!--begin::User-->
								<div class="d-flex align-items-center mb-2">
									<!--begin::Avatar-->
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="assets/media/avatars/300-25.jpg" />
									</div>
									<!--end::Avatar-->
									<!--begin::Details-->
									<div class="ms-3">
										<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian Cox</a>
										<span class="text-muted fs-7 mb-1">Just now</span>
									</div>
									<!--end::Details-->
								</div>
								<!--end::User-->
								<!--begin::Text-->
								<div class="p-5 rounded bg-light-info text-gray-900 fw-semibold mw-lg-400px text-start" data-kt-element="message-text">Right before vacation season we have the next Big Deal for you.</div>
								<!--end::Text-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Message(template for in)-->
					</div>
					<!--end::Messages-->
				</div>
				<!--end::Card body-->
				<!--begin::Card footer-->
				<div class="card-footer pt-4" id="kt_drawer_chat_messenger_footer">
					<!--begin::Input-->
					<textarea class="form-control form-control-flush mb-3" rows="1" data-kt-element="input" placeholder="Type a message"></textarea>
					<!--end::Input-->
					<!--begin:Toolbar-->
					<div class="d-flex flex-stack">
						<!--begin::Actions-->
						<div class="d-flex align-items-center me-2">
							<button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button" data-bs-toggle="tooltip" title="Coming soon">
								<i class="ki-duotone ki-paper-clip fs-3"></i>
							</button>
							<button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button" data-bs-toggle="tooltip" title="Coming soon">
								<i class="ki-duotone ki-cloud-add fs-3">
									<span class="path1"></span>
									<span class="path2"></span>
								</i>
							</button>
						</div>
						<!--end::Actions-->
						<!--begin::Send-->
						<button class="btn btn-primary" type="button" data-kt-element="send">Send</button>
						<!--end::Send-->
					</div>
					<!--end::Toolbar-->
				</div>
				<!--end::Card footer-->
			</div>
			<!--end::Messenger-->
		</div>
		<!--end::Chat drawer-->
		<!--begin::Chat drawer-->
		<div id="kt_shopping_cart" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="cart" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'md': '500px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_drawer_shopping_cart_toggle" data-kt-drawer-close="#kt_drawer_shopping_cart_close">
			<!--begin::Messenger-->
			<div class="card card-flush w-100 rounded-0">
				<!--begin::Card header-->
				<div class="card-header">
					<!--begin::Title-->
					<h3 class="card-title text-gray-900 fw-bold">Shopping Cart</h3>
					<!--end::Title-->
					<!--begin::Card toolbar-->
					<div class="card-toolbar">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_shopping_cart_close">
							<i class="ki-duotone ki-cross fs-2">
								<span class="path1"></span>
								<span class="path2"></span>
							</i>
						</div>
						<!--end::Close-->
					</div>
					<!--end::Card toolbar-->
				</div>
				<!--end::Card header-->
				<!--begin::Card body-->
				<div class="card-body hover-scroll-overlay-y h-400px pt-5">
					<!--begin::Item-->
					<div class="d-flex flex-stack">
						<!--begin::Wrapper-->
						<div class="d-flex flex-column me-3">
							<!--begin::Section-->
							<div class="mb-3">
								<a href="apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fs-4 fw-bold">Iblender</a>
								<span class="text-gray-500 fw-semibold d-block">The best kitchen gadget in 2022</span>
							</div>
							<!--end::Section-->
							<!--begin::Section-->
							<div class="d-flex align-items-center">
								<span class="fw-bold text-gray-800 fs-5">$ 350</span>
								<span class="text-muted mx-2">for</span>
								<span class="fw-bold text-gray-800 fs-5 me-3">5</span>
								<a href="#" class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
									<i class="ki-duotone ki-minus fs-4"></i>
								</a>
								<a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
									<i class="ki-duotone ki-plus fs-4"></i>
								</a>
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Wrapper-->
						<!--begin::Pic-->
						<div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
							<img src="assets/media/stock/600x400/img-1.jpg" alt="" />
						</div>
						<!--end::Pic-->
					</div>
					<!--end::Item-->
					<!--begin::Separator-->
					<div class="separator separator-dashed my-6"></div>
					<!--end::Separator-->
					<!--begin::Item-->
					<div class="d-flex flex-stack">
						<!--begin::Wrapper-->
						<div class="d-flex flex-column me-3">
							<!--begin::Section-->
							<div class="mb-3">
								<a href="apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fs-4 fw-bold">SmartCleaner</a>
								<span class="text-gray-500 fw-semibold d-block">Smart tool for cooking</span>
							</div>
							<!--end::Section-->
							<!--begin::Section-->
							<div class="d-flex align-items-center">
								<span class="fw-bold text-gray-800 fs-5">$ 650</span>
								<span class="text-muted mx-2">for</span>
								<span class="fw-bold text-gray-800 fs-5 me-3">4</span>
								<a href="#" class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
									<i class="ki-duotone ki-minus fs-4"></i>
								</a>
								<a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
									<i class="ki-duotone ki-plus fs-4"></i>
								</a>
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Wrapper-->
						<!--begin::Pic-->
						<div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
							<img src="assets/media/stock/600x400/img-3.jpg" alt="" />
						</div>
						<!--end::Pic-->
					</div>
					<!--end::Item-->
					<!--begin::Separator-->
					<div class="separator separator-dashed my-6"></div>
					<!--end::Separator-->
					<!--begin::Item-->
					<div class="d-flex flex-stack">
						<!--begin::Wrapper-->
						<div class="d-flex flex-column me-3">
							<!--begin::Section-->
							<div class="mb-3">
								<a href="apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fs-4 fw-bold">CameraMaxr</a>
								<span class="text-gray-500 fw-semibold d-block">Professional camera for edge</span>
							</div>
							<!--end::Section-->
							<!--begin::Section-->
							<div class="d-flex align-items-center">
								<span class="fw-bold text-gray-800 fs-5">$ 150</span>
								<span class="text-muted mx-2">for</span>
								<span class="fw-bold text-gray-800 fs-5 me-3">3</span>
								<a href="#" class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
									<i class="ki-duotone ki-minus fs-4"></i>
								</a>
								<a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
									<i class="ki-duotone ki-plus fs-4"></i>
								</a>
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Wrapper-->
						<!--begin::Pic-->
						<div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
							<img src="assets/media/stock/600x400/img-8.jpg" alt="" />
						</div>
						<!--end::Pic-->
					</div>
					<!--end::Item-->
					<!--begin::Separator-->
					<div class="separator separator-dashed my-6"></div>
					<!--end::Separator-->
					<!--begin::Item-->
					<div class="d-flex flex-stack">
						<!--begin::Wrapper-->
						<div class="d-flex flex-column me-3">
							<!--begin::Section-->
							<div class="mb-3">
								<a href="apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fs-4 fw-bold">$D Printer</a>
								<span class="text-gray-500 fw-semibold d-block">Manfactoring unique objekts</span>
							</div>
							<!--end::Section-->
							<!--begin::Section-->
							<div class="d-flex align-items-center">
								<span class="fw-bold text-gray-800 fs-5">$ 1450</span>
								<span class="text-muted mx-2">for</span>
								<span class="fw-bold text-gray-800 fs-5 me-3">7</span>
								<a href="#" class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
									<i class="ki-duotone ki-minus fs-4"></i>
								</a>
								<a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
									<i class="ki-duotone ki-plus fs-4"></i>
								</a>
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Wrapper-->
						<!--begin::Pic-->
						<div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
							<img src="assets/media/stock/600x400/img-26.jpg" alt="" />
						</div>
						<!--end::Pic-->
					</div>
					<!--end::Item-->
					<!--begin::Separator-->
					<div class="separator separator-dashed my-6"></div>
					<!--end::Separator-->
					<!--begin::Item-->
					<div class="d-flex flex-stack">
						<!--begin::Wrapper-->
						<div class="d-flex flex-column me-3">
							<!--begin::Section-->
							<div class="mb-3">
								<a href="apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fs-4 fw-bold">MotionWire</a>
								<span class="text-gray-500 fw-semibold d-block">Perfect animation tool</span>
							</div>
							<!--end::Section-->
							<!--begin::Section-->
							<div class="d-flex align-items-center">
								<span class="fw-bold text-gray-800 fs-5">$ 650</span>
								<span class="text-muted mx-2">for</span>
								<span class="fw-bold text-gray-800 fs-5 me-3">7</span>
								<a href="#" class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
									<i class="ki-duotone ki-minus fs-4"></i>
								</a>
								<a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
									<i class="ki-duotone ki-plus fs-4"></i>
								</a>
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Wrapper-->
						<!--begin::Pic-->
						<div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
							<img src="assets/media/stock/600x400/img-21.jpg" alt="" />
						</div>
						<!--end::Pic-->
					</div>
					<!--end::Item-->
					<!--begin::Separator-->
					<div class="separator separator-dashed my-6"></div>
					<!--end::Separator-->
					<!--begin::Item-->
					<div class="d-flex flex-stack">
						<!--begin::Wrapper-->
						<div class="d-flex flex-column me-3">
							<!--begin::Section-->
							<div class="mb-3">
								<a href="apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fs-4 fw-bold">Samsung</a>
								<span class="text-gray-500 fw-semibold d-block">Profile info,Timeline etc</span>
							</div>
							<!--end::Section-->
							<!--begin::Section-->
							<div class="d-flex align-items-center">
								<span class="fw-bold text-gray-800 fs-5">$ 720</span>
								<span class="text-muted mx-2">for</span>
								<span class="fw-bold text-gray-800 fs-5 me-3">6</span>
								<a href="#" class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
									<i class="ki-duotone ki-minus fs-4"></i>
								</a>
								<a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
									<i class="ki-duotone ki-plus fs-4"></i>
								</a>
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Wrapper-->
						<!--begin::Pic-->
						<div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
							<img src="assets/media/stock/600x400/img-34.jpg" alt="" />
						</div>
						<!--end::Pic-->
					</div>
					<!--end::Item-->
					<!--begin::Separator-->
					<div class="separator separator-dashed my-6"></div>
					<!--end::Separator-->
					<!--begin::Item-->
					<div class="d-flex flex-stack">
						<!--begin::Wrapper-->
						<div class="d-flex flex-column me-3">
							<!--begin::Section-->
							<div class="mb-3">
								<a href="apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fs-4 fw-bold">$D Printer</a>
								<span class="text-gray-500 fw-semibold d-block">Manfactoring unique objekts</span>
							</div>
							<!--end::Section-->
							<!--begin::Section-->
							<div class="d-flex align-items-center">
								<span class="fw-bold text-gray-800 fs-5">$ 430</span>
								<span class="text-muted mx-2">for</span>
								<span class="fw-bold text-gray-800 fs-5 me-3">8</span>
								<a href="#" class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
									<i class="ki-duotone ki-minus fs-4"></i>
								</a>
								<a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
									<i class="ki-duotone ki-plus fs-4"></i>
								</a>
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Wrapper-->
						<!--begin::Pic-->
						<div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
							<img src="assets/media/stock/600x400/img-27.jpg" alt="" />
						</div>
						<!--end::Pic-->
					</div>
					<!--end::Item-->
				</div>
				<!--end::Card body-->
				<!--begin::Card footer-->
				<div class="card-footer">
					<!--begin::Item-->
					<div class="d-flex flex-stack">
						<span class="fw-bold text-gray-600">Total</span>
						<span class="text-gray-800 fw-bolder fs-5">$ 1840.00</span>
					</div>
					<!--end::Item-->
					<!--begin::Item-->
					<div class="d-flex flex-stack">
						<span class="fw-bold text-gray-600">Sub total</span>
						<span class="text-primary fw-bolder fs-5">$ 246.35</span>
					</div>
					<!--end::Item-->
					<!--end::Action-->
					<div class="d-flex justify-content-end mt-9">
						<a href="#" class="btn btn-primary d-flex justify-content-end">Pleace Order</a>
					</div>
					<!--end::Action-->
				</div>
				<!--end::Card footer-->
			</div>
			<!--end::Messenger-->
		</div>
		<!--end::Chat drawer-->
		<!--end::Drawers-->
		<!--end::Main-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<i class="ki-duotone ki-arrow-up">
				<span class="path1"></span>
				<span class="path2"></span>
			</i>
		</div>
		<!--end::Scrolltop-->
		<!--begin::Modals-->
		<!--begin::Modal - Invite Friends-->
		<div class="modal fade" id="kt_modal_invite_friends" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog mw-650px">
				<!--begin::Modal content-->
				<div class="modal-content">
					<!--begin::Modal header-->
					<div class="modal-header pb-0 border-0 justify-content-end">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<i class="ki-duotone ki-cross fs-1">
								<span class="path1"></span>
								<span class="path2"></span>
							</i>
						</div>
						<!--end::Close-->
					</div>
					<!--begin::Modal header-->
					<!--begin::Modal body-->
					<div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
						<!--begin::Heading-->
						<div class="text-center mb-13">
							<!--begin::Title-->
							<h1 class="mb-3">Invite a Friend</h1>
							<!--end::Title-->
							<!--begin::Description-->
							<div class="text-muted fw-semibold fs-5">If you need more info, please check out 
							<a href="#" class="link-primary fw-bold">FAQ Page</a>.</div>
							<!--end::Description-->
						</div>
						<!--end::Heading-->
						<!--begin::Google Contacts Invite-->
						<div class="btn btn-light-primary fw-bold w-100 mb-8">
						<img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />Invite Gmail Contacts</div>
						<!--end::Google Contacts Invite-->
						<!--begin::Separator-->
						<div class="separator d-flex flex-center mb-8">
							<span class="text-uppercase bg-body fs-7 fw-semibold text-muted px-3">or</span>
						</div>
						<!--end::Separator-->
						<!--begin::Textarea-->
						<textarea class="form-control form-control-solid mb-8" rows="3" placeholder="Type or paste emails here"></textarea>
						<!--end::Textarea-->
						<!--begin::Users-->
						<div class="mb-10">
							<!--begin::Heading-->
							<div class="fs-6 fw-semibold mb-2">Your Invitations</div>
							<!--end::Heading-->
							<!--begin::List-->
							<div class="mh-300px scroll-y me-n7 pe-7">
								<!--begin::User-->
								<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
									<!--begin::Details-->
									<div class="d-flex align-items-center">
										<!--begin::Avatar-->
										<div class="symbol symbol-35px symbol-circle">
											<img alt="Pic" src="assets/media/avatars/300-6.jpg" />
										</div>
										<!--end::Avatar-->
										<!--begin::Details-->
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Emma Smith</a>
											<div class="fw-semibold text-muted">smith@kpmg.com</div>
										</div>
										<!--end::Details-->
									</div>
									<!--end::Details-->
									<!--begin::Access menu-->
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1">Guest</option>
											<option value="2" selected="selected">Owner</option>
											<option value="3">Can Edit</option>
										</select>
									</div>
									<!--end::Access menu-->
								</div>
								<!--end::User-->
								<!--begin::User-->
								<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
									<!--begin::Details-->
									<div class="d-flex align-items-center">
										<!--begin::Avatar-->
										<div class="symbol symbol-35px symbol-circle">
											<span class="symbol-label bg-light-danger text-danger fw-semibold">M</span>
										</div>
										<!--end::Avatar-->
										<!--begin::Details-->
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Melody Macy</a>
											<div class="fw-semibold text-muted">melody@altbox.com</div>
										</div>
										<!--end::Details-->
									</div>
									<!--end::Details-->
									<!--begin::Access menu-->
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1" selected="selected">Guest</option>
											<option value="2">Owner</option>
											<option value="3">Can Edit</option>
										</select>
									</div>
									<!--end::Access menu-->
								</div>
								<!--end::User-->
								<!--begin::User-->
								<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
									<!--begin::Details-->
									<div class="d-flex align-items-center">
										<!--begin::Avatar-->
										<div class="symbol symbol-35px symbol-circle">
											<img alt="Pic" src="assets/media/avatars/300-1.jpg" />
										</div>
										<!--end::Avatar-->
										<!--begin::Details-->
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Max Smith</a>
											<div class="fw-semibold text-muted">max@kt.com</div>
										</div>
										<!--end::Details-->
									</div>
									<!--end::Details-->
									<!--begin::Access menu-->
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1">Guest</option>
											<option value="2">Owner</option>
											<option value="3" selected="selected">Can Edit</option>
										</select>
									</div>
									<!--end::Access menu-->
								</div>
								<!--end::User-->
								<!--begin::User-->
								<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
									<!--begin::Details-->
									<div class="d-flex align-items-center">
										<!--begin::Avatar-->
										<div class="symbol symbol-35px symbol-circle">
											<img alt="Pic" src="assets/media/avatars/300-5.jpg" />
										</div>
										<!--end::Avatar-->
										<!--begin::Details-->
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Sean Bean</a>
											<div class="fw-semibold text-muted">sean@dellito.com</div>
										</div>
										<!--end::Details-->
									</div>
									<!--end::Details-->
									<!--begin::Access menu-->
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1">Guest</option>
											<option value="2" selected="selected">Owner</option>
											<option value="3">Can Edit</option>
										</select>
									</div>
									<!--end::Access menu-->
								</div>
								<!--end::User-->
								<!--begin::User-->
								<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
									<!--begin::Details-->
									<div class="d-flex align-items-center">
										<!--begin::Avatar-->
										<div class="symbol symbol-35px symbol-circle">
											<img alt="Pic" src="assets/media/avatars/300-25.jpg" />
										</div>
										<!--end::Avatar-->
										<!--begin::Details-->
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Brian Cox</a>
											<div class="fw-semibold text-muted">brian@exchange.com</div>
										</div>
										<!--end::Details-->
									</div>
									<!--end::Details-->
									<!--begin::Access menu-->
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1">Guest</option>
											<option value="2">Owner</option>
											<option value="3" selected="selected">Can Edit</option>
										</select>
									</div>
									<!--end::Access menu-->
								</div>
								<!--end::User-->
								<!--begin::User-->
								<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
									<!--begin::Details-->
									<div class="d-flex align-items-center">
										<!--begin::Avatar-->
										<div class="symbol symbol-35px symbol-circle">
											<span class="symbol-label bg-light-warning text-warning fw-semibold">C</span>
										</div>
										<!--end::Avatar-->
										<!--begin::Details-->
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Mikaela Collins</a>
											<div class="fw-semibold text-muted">mik@pex.com</div>
										</div>
										<!--end::Details-->
									</div>
									<!--end::Details-->
									<!--begin::Access menu-->
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1">Guest</option>
											<option value="2" selected="selected">Owner</option>
											<option value="3">Can Edit</option>
										</select>
									</div>
									<!--end::Access menu-->
								</div>
								<!--end::User-->
								<!--begin::User-->
								<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
									<!--begin::Details-->
									<div class="d-flex align-items-center">
										<!--begin::Avatar-->
										<div class="symbol symbol-35px symbol-circle">
											<img alt="Pic" src="assets/media/avatars/300-9.jpg" />
										</div>
										<!--end::Avatar-->
										<!--begin::Details-->
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Francis Mitcham</a>
											<div class="fw-semibold text-muted">f.mit@kpmg.com</div>
										</div>
										<!--end::Details-->
									</div>
									<!--end::Details-->
									<!--begin::Access menu-->
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1">Guest</option>
											<option value="2">Owner</option>
											<option value="3" selected="selected">Can Edit</option>
										</select>
									</div>
									<!--end::Access menu-->
								</div>
								<!--end::User-->
								<!--begin::User-->
								<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
									<!--begin::Details-->
									<div class="d-flex align-items-center">
										<!--begin::Avatar-->
										<div class="symbol symbol-35px symbol-circle">
											<span class="symbol-label bg-light-danger text-danger fw-semibold">O</span>
										</div>
										<!--end::Avatar-->
										<!--begin::Details-->
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Olivia Wild</a>
											<div class="fw-semibold text-muted">olivia@corpmail.com</div>
										</div>
										<!--end::Details-->
									</div>
									<!--end::Details-->
									<!--begin::Access menu-->
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1">Guest</option>
											<option value="2" selected="selected">Owner</option>
											<option value="3">Can Edit</option>
										</select>
									</div>
									<!--end::Access menu-->
								</div>
								<!--end::User-->
								<!--begin::User-->
								<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
									<!--begin::Details-->
									<div class="d-flex align-items-center">
										<!--begin::Avatar-->
										<div class="symbol symbol-35px symbol-circle">
											<span class="symbol-label bg-light-primary text-primary fw-semibold">N</span>
										</div>
										<!--end::Avatar-->
										<!--begin::Details-->
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Neil Owen</a>
											<div class="fw-semibold text-muted">owen.neil@gmail.com</div>
										</div>
										<!--end::Details-->
									</div>
									<!--end::Details-->
									<!--begin::Access menu-->
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1" selected="selected">Guest</option>
											<option value="2">Owner</option>
											<option value="3">Can Edit</option>
										</select>
									</div>
									<!--end::Access menu-->
								</div>
								<!--end::User-->
								<!--begin::User-->
								<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
									<!--begin::Details-->
									<div class="d-flex align-items-center">
										<!--begin::Avatar-->
										<div class="symbol symbol-35px symbol-circle">
											<img alt="Pic" src="assets/media/avatars/300-23.jpg" />
										</div>
										<!--end::Avatar-->
										<!--begin::Details-->
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Dan Wilson</a>
											<div class="fw-semibold text-muted">dam@consilting.com</div>
										</div>
										<!--end::Details-->
									</div>
									<!--end::Details-->
									<!--begin::Access menu-->
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1">Guest</option>
											<option value="2">Owner</option>
											<option value="3" selected="selected">Can Edit</option>
										</select>
									</div>
									<!--end::Access menu-->
								</div>
								<!--end::User-->
								<!--begin::User-->
								<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
									<!--begin::Details-->
									<div class="d-flex align-items-center">
										<!--begin::Avatar-->
										<div class="symbol symbol-35px symbol-circle">
											<span class="symbol-label bg-light-danger text-danger fw-semibold">E</span>
										</div>
										<!--end::Avatar-->
										<!--begin::Details-->
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Emma Bold</a>
											<div class="fw-semibold text-muted">emma@intenso.com</div>
										</div>
										<!--end::Details-->
									</div>
									<!--end::Details-->
									<!--begin::Access menu-->
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1">Guest</option>
											<option value="2" selected="selected">Owner</option>
											<option value="3">Can Edit</option>
										</select>
									</div>
									<!--end::Access menu-->
								</div>
								<!--end::User-->
								<!--begin::User-->
								<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
									<!--begin::Details-->
									<div class="d-flex align-items-center">
										<!--begin::Avatar-->
										<div class="symbol symbol-35px symbol-circle">
											<img alt="Pic" src="assets/media/avatars/300-12.jpg" />
										</div>
										<!--end::Avatar-->
										<!--begin::Details-->
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Ana Crown</a>
											<div class="fw-semibold text-muted">ana.cf@limtel.com</div>
										</div>
										<!--end::Details-->
									</div>
									<!--end::Details-->
									<!--begin::Access menu-->
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1" selected="selected">Guest</option>
											<option value="2">Owner</option>
											<option value="3">Can Edit</option>
										</select>
									</div>
									<!--end::Access menu-->
								</div>
								<!--end::User-->
								<!--begin::User-->
								<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
									<!--begin::Details-->
									<div class="d-flex align-items-center">
										<!--begin::Avatar-->
										<div class="symbol symbol-35px symbol-circle">
											<span class="symbol-label bg-light-info text-info fw-semibold">A</span>
										</div>
										<!--end::Avatar-->
										<!--begin::Details-->
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Robert Doe</a>
											<div class="fw-semibold text-muted">robert@benko.com</div>
										</div>
										<!--end::Details-->
									</div>
									<!--end::Details-->
									<!--begin::Access menu-->
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1">Guest</option>
											<option value="2">Owner</option>
											<option value="3" selected="selected">Can Edit</option>
										</select>
									</div>
									<!--end::Access menu-->
								</div>
								<!--end::User-->
								<!--begin::User-->
								<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
									<!--begin::Details-->
									<div class="d-flex align-items-center">
										<!--begin::Avatar-->
										<div class="symbol symbol-35px symbol-circle">
											<img alt="Pic" src="assets/media/avatars/300-13.jpg" />
										</div>
										<!--end::Avatar-->
										<!--begin::Details-->
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">John Miller</a>
											<div class="fw-semibold text-muted">miller@mapple.com</div>
										</div>
										<!--end::Details-->
									</div>
									<!--end::Details-->
									<!--begin::Access menu-->
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1">Guest</option>
											<option value="2">Owner</option>
											<option value="3" selected="selected">Can Edit</option>
										</select>
									</div>
									<!--end::Access menu-->
								</div>
								<!--end::User-->
								<!--begin::User-->
								<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
									<!--begin::Details-->
									<div class="d-flex align-items-center">
										<!--begin::Avatar-->
										<div class="symbol symbol-35px symbol-circle">
											<span class="symbol-label bg-light-success text-success fw-semibold">L</span>
										</div>
										<!--end::Avatar-->
										<!--begin::Details-->
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Lucy Kunic</a>
											<div class="fw-semibold text-muted">lucy.m@fentech.com</div>
										</div>
										<!--end::Details-->
									</div>
									<!--end::Details-->
									<!--begin::Access menu-->
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1">Guest</option>
											<option value="2" selected="selected">Owner</option>
											<option value="3">Can Edit</option>
										</select>
									</div>
									<!--end::Access menu-->
								</div>
								<!--end::User-->
								<!--begin::User-->
								<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
									<!--begin::Details-->
									<div class="d-flex align-items-center">
										<!--begin::Avatar-->
										<div class="symbol symbol-35px symbol-circle">
											<img alt="Pic" src="assets/media/avatars/300-21.jpg" />
										</div>
										<!--end::Avatar-->
										<!--begin::Details-->
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Ethan Wilder</a>
											<div class="fw-semibold text-muted">ethan@loop.com.au</div>
										</div>
										<!--end::Details-->
									</div>
									<!--end::Details-->
									<!--begin::Access menu-->
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1" selected="selected">Guest</option>
											<option value="2">Owner</option>
											<option value="3">Can Edit</option>
										</select>
									</div>
									<!--end::Access menu-->
								</div>
								<!--end::User-->
								<!--begin::User-->
								<div class="d-flex flex-stack py-4">
									<!--begin::Details-->
									<div class="d-flex align-items-center">
										<!--begin::Avatar-->
										<div class="symbol symbol-35px symbol-circle">
											<span class="symbol-label bg-light-primary text-primary fw-semibold">N</span>
										</div>
										<!--end::Avatar-->
										<!--begin::Details-->
										<div class="ms-5">
											<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Neil Owen</a>
											<div class="fw-semibold text-muted">owen.neil@gmail.com</div>
										</div>
										<!--end::Details-->
									</div>
									<!--end::Details-->
									<!--begin::Access menu-->
									<div class="ms-2 w-100px">
										<select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
											<option value="1">Guest</option>
											<option value="2">Owner</option>
											<option value="3" selected="selected">Can Edit</option>
										</select>
									</div>
									<!--end::Access menu-->
								</div>
								<!--end::User-->
							</div>
							<!--end::List-->
						</div>
						<!--end::Users-->
						<!--begin::Notice-->
						<div class="d-flex flex-stack">
							<!--begin::Label-->
							<div class="me-5 fw-semibold">
								<label class="fs-6">Adding Users by Team Members</label>
								<div class="fs-7 text-muted">If you need more info, please check budget planning</div>
							</div>
							<!--end::Label-->
							<!--begin::Switch-->
							<label class="form-check form-switch form-check-custom form-check-solid">
								<input class="form-check-input" type="checkbox" value="1" checked="checked" />
								<span class="form-check-label fw-semibold text-muted">Allowed</span>
							</label>
							<!--end::Switch-->
						</div>
						<!--end::Notice-->
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - Invite Friend-->
		<!--begin::Modal - Users Search-->
		<div class="modal fade" id="kt_modal_users_search" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered mw-650px">
				<!--begin::Modal content-->
				<div class="modal-content">
					<!--begin::Modal header-->
					<div class="modal-header pb-0 border-0 justify-content-end">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<i class="ki-duotone ki-cross fs-1">
								<span class="path1"></span>
								<span class="path2"></span>
							</i>
						</div>
						<!--end::Close-->
					</div>
					<!--begin::Modal header-->
					<!--begin::Modal body-->
					<div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
						<!--begin::Content-->
						<div class="text-center mb-13">
							<h1 class="mb-3">Search Users</h1>
							<div class="text-muted fw-semibold fs-5">Invite Collaborators To Your Project</div>
						</div>
						<!--end::Content-->
						<!--begin::Search-->
						<div id="kt_modal_users_search_handler" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="inline">
							<!--begin::Form-->
							<form data-kt-search-element="form" class="w-100 position-relative mb-5" autocomplete="off">
								<!--begin::Hidden input(Added to disable form autocomplete)-->
								<input type="hidden" />
								<!--end::Hidden input-->
								<!--begin::Icon-->
								<i class="ki-duotone ki-magnifier fs-2 fs-lg-1 text-gray-500 position-absolute top-50 ms-5 translate-middle-y">
									<span class="path1"></span>
									<span class="path2"></span>
								</i>
								<!--end::Icon-->
								<!--begin::Input-->
								<input type="text" class="form-control form-control-lg form-control-solid px-15" name="search" value="" placeholder="Search by username, full name or email..." data-kt-search-element="input" />
								<!--end::Input-->
								<!--begin::Spinner-->
								<span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5" data-kt-search-element="spinner">
									<span class="spinner-border h-15px w-15px align-middle text-muted"></span>
								</span>
								<!--end::Spinner-->
								<!--begin::Reset-->
								<span class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 me-5 d-none" data-kt-search-element="clear">
									<i class="ki-duotone ki-cross fs-2 fs-lg-1 me-0">
										<span class="path1"></span>
										<span class="path2"></span>
									</i>
								</span>
								<!--end::Reset-->
							</form>
							<!--end::Form-->
							<!--begin::Wrapper-->
							<div class="py-5">
								<!--begin::Suggestions-->
								<div data-kt-search-element="suggestions">
									<!--begin::Heading-->
									<h3 class="fw-semibold mb-5">Recently searched:</h3>
									<!--end::Heading-->
									<!--begin::Users-->
									<div class="mh-375px scroll-y me-n7 pe-7">
										<!--begin::User-->
										<a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
											<!--begin::Avatar-->
											<div class="symbol symbol-35px symbol-circle me-5">
												<img alt="Pic" src="assets/media/avatars/300-6.jpg" />
											</div>
											<!--end::Avatar-->
											<!--begin::Info-->
											<div class="fw-semibold">
												<span class="fs-6 text-gray-800 me-2">Emma Smith</span>
												<span class="badge badge-light">Art Director</span>
											</div>
											<!--end::Info-->
										</a>
										<!--end::User-->
										<!--begin::User-->
										<a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
											<!--begin::Avatar-->
											<div class="symbol symbol-35px symbol-circle me-5">
												<span class="symbol-label bg-light-danger text-danger fw-semibold">M</span>
											</div>
											<!--end::Avatar-->
											<!--begin::Info-->
											<div class="fw-semibold">
												<span class="fs-6 text-gray-800 me-2">Melody Macy</span>
												<span class="badge badge-light">Marketing Analytic</span>
											</div>
											<!--end::Info-->
										</a>
										<!--end::User-->
										<!--begin::User-->
										<a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
											<!--begin::Avatar-->
											<div class="symbol symbol-35px symbol-circle me-5">
												<img alt="Pic" src="assets/media/avatars/300-1.jpg" />
											</div>
											<!--end::Avatar-->
											<!--begin::Info-->
											<div class="fw-semibold">
												<span class="fs-6 text-gray-800 me-2">Max Smith</span>
												<span class="badge badge-light">Software Enginer</span>
											</div>
											<!--end::Info-->
										</a>
										<!--end::User-->
										<!--begin::User-->
										<a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
											<!--begin::Avatar-->
											<div class="symbol symbol-35px symbol-circle me-5">
												<img alt="Pic" src="assets/media/avatars/300-5.jpg" />
											</div>
											<!--end::Avatar-->
											<!--begin::Info-->
											<div class="fw-semibold">
												<span class="fs-6 text-gray-800 me-2">Sean Bean</span>
												<span class="badge badge-light">Web Developer</span>
											</div>
											<!--end::Info-->
										</a>
										<!--end::User-->
										<!--begin::User-->
										<a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
											<!--begin::Avatar-->
											<div class="symbol symbol-35px symbol-circle me-5">
												<img alt="Pic" src="assets/media/avatars/300-25.jpg" />
											</div>
											<!--end::Avatar-->
											<!--begin::Info-->
											<div class="fw-semibold">
												<span class="fs-6 text-gray-800 me-2">Brian Cox</span>
												<span class="badge badge-light">UI/UX Designer</span>
											</div>
											<!--end::Info-->
										</a>
										<!--end::User-->
									</div>
									<!--end::Users-->
								</div>
								<!--end::Suggestions-->
								<!--begin::Results(add d-none to below element to hide the users list by default)-->
								<div data-kt-search-element="results" class="d-none">
									<!--begin::Users-->
									<div class="mh-375px scroll-y me-n7 pe-7">
										<!--begin::User-->
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="0">
											<!--begin::Details-->
											<div class="d-flex align-items-center">
												<!--begin::Checkbox-->
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='0']" value="0" />
												</label>
												<!--end::Checkbox-->
												<!--begin::Avatar-->
												<div class="symbol symbol-35px symbol-circle">
													<img alt="Pic" src="assets/media/avatars/300-6.jpg" />
												</div>
												<!--end::Avatar-->
												<!--begin::Details-->
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Emma Smith</a>
													<div class="fw-semibold text-muted">smith@kpmg.com</div>
												</div>
												<!--end::Details-->
											</div>
											<!--end::Details-->
											<!--begin::Access menu-->
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1">Guest</option>
													<option value="2" selected="selected">Owner</option>
													<option value="3">Can Edit</option>
												</select>
											</div>
											<!--end::Access menu-->
										</div>
										<!--end::User-->
										<!--begin::Separator-->
										<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
										<!--end::Separator-->
										<!--begin::User-->
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="1">
											<!--begin::Details-->
											<div class="d-flex align-items-center">
												<!--begin::Checkbox-->
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='1']" value="1" />
												</label>
												<!--end::Checkbox-->
												<!--begin::Avatar-->
												<div class="symbol symbol-35px symbol-circle">
													<span class="symbol-label bg-light-danger text-danger fw-semibold">M</span>
												</div>
												<!--end::Avatar-->
												<!--begin::Details-->
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Melody Macy</a>
													<div class="fw-semibold text-muted">melody@altbox.com</div>
												</div>
												<!--end::Details-->
											</div>
											<!--end::Details-->
											<!--begin::Access menu-->
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1" selected="selected">Guest</option>
													<option value="2">Owner</option>
													<option value="3">Can Edit</option>
												</select>
											</div>
											<!--end::Access menu-->
										</div>
										<!--end::User-->
										<!--begin::Separator-->
										<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
										<!--end::Separator-->
										<!--begin::User-->
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="2">
											<!--begin::Details-->
											<div class="d-flex align-items-center">
												<!--begin::Checkbox-->
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='2']" value="2" />
												</label>
												<!--end::Checkbox-->
												<!--begin::Avatar-->
												<div class="symbol symbol-35px symbol-circle">
													<img alt="Pic" src="assets/media/avatars/300-1.jpg" />
												</div>
												<!--end::Avatar-->
												<!--begin::Details-->
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Max Smith</a>
													<div class="fw-semibold text-muted">max@kt.com</div>
												</div>
												<!--end::Details-->
											</div>
											<!--end::Details-->
											<!--begin::Access menu-->
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1">Guest</option>
													<option value="2">Owner</option>
													<option value="3" selected="selected">Can Edit</option>
												</select>
											</div>
											<!--end::Access menu-->
										</div>
										<!--end::User-->
										<!--begin::Separator-->
										<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
										<!--end::Separator-->
										<!--begin::User-->
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="3">
											<!--begin::Details-->
											<div class="d-flex align-items-center">
												<!--begin::Checkbox-->
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='3']" value="3" />
												</label>
												<!--end::Checkbox-->
												<!--begin::Avatar-->
												<div class="symbol symbol-35px symbol-circle">
													<img alt="Pic" src="assets/media/avatars/300-5.jpg" />
												</div>
												<!--end::Avatar-->
												<!--begin::Details-->
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Sean Bean</a>
													<div class="fw-semibold text-muted">sean@dellito.com</div>
												</div>
												<!--end::Details-->
											</div>
											<!--end::Details-->
											<!--begin::Access menu-->
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1">Guest</option>
													<option value="2" selected="selected">Owner</option>
													<option value="3">Can Edit</option>
												</select>
											</div>
											<!--end::Access menu-->
										</div>
										<!--end::User-->
										<!--begin::Separator-->
										<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
										<!--end::Separator-->
										<!--begin::User-->
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="4">
											<!--begin::Details-->
											<div class="d-flex align-items-center">
												<!--begin::Checkbox-->
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='4']" value="4" />
												</label>
												<!--end::Checkbox-->
												<!--begin::Avatar-->
												<div class="symbol symbol-35px symbol-circle">
													<img alt="Pic" src="assets/media/avatars/300-25.jpg" />
												</div>
												<!--end::Avatar-->
												<!--begin::Details-->
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Brian Cox</a>
													<div class="fw-semibold text-muted">brian@exchange.com</div>
												</div>
												<!--end::Details-->
											</div>
											<!--end::Details-->
											<!--begin::Access menu-->
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1">Guest</option>
													<option value="2">Owner</option>
													<option value="3" selected="selected">Can Edit</option>
												</select>
											</div>
											<!--end::Access menu-->
										</div>
										<!--end::User-->
										<!--begin::Separator-->
										<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
										<!--end::Separator-->
										<!--begin::User-->
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="5">
											<!--begin::Details-->
											<div class="d-flex align-items-center">
												<!--begin::Checkbox-->
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='5']" value="5" />
												</label>
												<!--end::Checkbox-->
												<!--begin::Avatar-->
												<div class="symbol symbol-35px symbol-circle">
													<span class="symbol-label bg-light-warning text-warning fw-semibold">C</span>
												</div>
												<!--end::Avatar-->
												<!--begin::Details-->
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Mikaela Collins</a>
													<div class="fw-semibold text-muted">mik@pex.com</div>
												</div>
												<!--end::Details-->
											</div>
											<!--end::Details-->
											<!--begin::Access menu-->
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1">Guest</option>
													<option value="2" selected="selected">Owner</option>
													<option value="3">Can Edit</option>
												</select>
											</div>
											<!--end::Access menu-->
										</div>
										<!--end::User-->
										<!--begin::Separator-->
										<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
										<!--end::Separator-->
										<!--begin::User-->
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="6">
											<!--begin::Details-->
											<div class="d-flex align-items-center">
												<!--begin::Checkbox-->
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='6']" value="6" />
												</label>
												<!--end::Checkbox-->
												<!--begin::Avatar-->
												<div class="symbol symbol-35px symbol-circle">
													<img alt="Pic" src="assets/media/avatars/300-9.jpg" />
												</div>
												<!--end::Avatar-->
												<!--begin::Details-->
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Francis Mitcham</a>
													<div class="fw-semibold text-muted">f.mit@kpmg.com</div>
												</div>
												<!--end::Details-->
											</div>
											<!--end::Details-->
											<!--begin::Access menu-->
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1">Guest</option>
													<option value="2">Owner</option>
													<option value="3" selected="selected">Can Edit</option>
												</select>
											</div>
											<!--end::Access menu-->
										</div>
										<!--end::User-->
										<!--begin::Separator-->
										<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
										<!--end::Separator-->
										<!--begin::User-->
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="7">
											<!--begin::Details-->
											<div class="d-flex align-items-center">
												<!--begin::Checkbox-->
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='7']" value="7" />
												</label>
												<!--end::Checkbox-->
												<!--begin::Avatar-->
												<div class="symbol symbol-35px symbol-circle">
													<span class="symbol-label bg-light-danger text-danger fw-semibold">O</span>
												</div>
												<!--end::Avatar-->
												<!--begin::Details-->
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Olivia Wild</a>
													<div class="fw-semibold text-muted">olivia@corpmail.com</div>
												</div>
												<!--end::Details-->
											</div>
											<!--end::Details-->
											<!--begin::Access menu-->
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1">Guest</option>
													<option value="2" selected="selected">Owner</option>
													<option value="3">Can Edit</option>
												</select>
											</div>
											<!--end::Access menu-->
										</div>
										<!--end::User-->
										<!--begin::Separator-->
										<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
										<!--end::Separator-->
										<!--begin::User-->
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="8">
											<!--begin::Details-->
											<div class="d-flex align-items-center">
												<!--begin::Checkbox-->
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='8']" value="8" />
												</label>
												<!--end::Checkbox-->
												<!--begin::Avatar-->
												<div class="symbol symbol-35px symbol-circle">
													<span class="symbol-label bg-light-primary text-primary fw-semibold">N</span>
												</div>
												<!--end::Avatar-->
												<!--begin::Details-->
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Neil Owen</a>
													<div class="fw-semibold text-muted">owen.neil@gmail.com</div>
												</div>
												<!--end::Details-->
											</div>
											<!--end::Details-->
											<!--begin::Access menu-->
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1" selected="selected">Guest</option>
													<option value="2">Owner</option>
													<option value="3">Can Edit</option>
												</select>
											</div>
											<!--end::Access menu-->
										</div>
										<!--end::User-->
										<!--begin::Separator-->
										<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
										<!--end::Separator-->
										<!--begin::User-->
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="9">
											<!--begin::Details-->
											<div class="d-flex align-items-center">
												<!--begin::Checkbox-->
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='9']" value="9" />
												</label>
												<!--end::Checkbox-->
												<!--begin::Avatar-->
												<div class="symbol symbol-35px symbol-circle">
													<img alt="Pic" src="assets/media/avatars/300-23.jpg" />
												</div>
												<!--end::Avatar-->
												<!--begin::Details-->
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Dan Wilson</a>
													<div class="fw-semibold text-muted">dam@consilting.com</div>
												</div>
												<!--end::Details-->
											</div>
											<!--end::Details-->
											<!--begin::Access menu-->
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1">Guest</option>
													<option value="2">Owner</option>
													<option value="3" selected="selected">Can Edit</option>
												</select>
											</div>
											<!--end::Access menu-->
										</div>
										<!--end::User-->
										<!--begin::Separator-->
										<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
										<!--end::Separator-->
										<!--begin::User-->
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="10">
											<!--begin::Details-->
											<div class="d-flex align-items-center">
												<!--begin::Checkbox-->
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='10']" value="10" />
												</label>
												<!--end::Checkbox-->
												<!--begin::Avatar-->
												<div class="symbol symbol-35px symbol-circle">
													<span class="symbol-label bg-light-danger text-danger fw-semibold">E</span>
												</div>
												<!--end::Avatar-->
												<!--begin::Details-->
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Emma Bold</a>
													<div class="fw-semibold text-muted">emma@intenso.com</div>
												</div>
												<!--end::Details-->
											</div>
											<!--end::Details-->
											<!--begin::Access menu-->
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1">Guest</option>
													<option value="2" selected="selected">Owner</option>
													<option value="3">Can Edit</option>
												</select>
											</div>
											<!--end::Access menu-->
										</div>
										<!--end::User-->
										<!--begin::Separator-->
										<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
										<!--end::Separator-->
										<!--begin::User-->
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="11">
											<!--begin::Details-->
											<div class="d-flex align-items-center">
												<!--begin::Checkbox-->
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='11']" value="11" />
												</label>
												<!--end::Checkbox-->
												<!--begin::Avatar-->
												<div class="symbol symbol-35px symbol-circle">
													<img alt="Pic" src="assets/media/avatars/300-12.jpg" />
												</div>
												<!--end::Avatar-->
												<!--begin::Details-->
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Ana Crown</a>
													<div class="fw-semibold text-muted">ana.cf@limtel.com</div>
												</div>
												<!--end::Details-->
											</div>
											<!--end::Details-->
											<!--begin::Access menu-->
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1" selected="selected">Guest</option>
													<option value="2">Owner</option>
													<option value="3">Can Edit</option>
												</select>
											</div>
											<!--end::Access menu-->
										</div>
										<!--end::User-->
										<!--begin::Separator-->
										<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
										<!--end::Separator-->
										<!--begin::User-->
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="12">
											<!--begin::Details-->
											<div class="d-flex align-items-center">
												<!--begin::Checkbox-->
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='12']" value="12" />
												</label>
												<!--end::Checkbox-->
												<!--begin::Avatar-->
												<div class="symbol symbol-35px symbol-circle">
													<span class="symbol-label bg-light-info text-info fw-semibold">A</span>
												</div>
												<!--end::Avatar-->
												<!--begin::Details-->
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Robert Doe</a>
													<div class="fw-semibold text-muted">robert@benko.com</div>
												</div>
												<!--end::Details-->
											</div>
											<!--end::Details-->
											<!--begin::Access menu-->
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1">Guest</option>
													<option value="2">Owner</option>
													<option value="3" selected="selected">Can Edit</option>
												</select>
											</div>
											<!--end::Access menu-->
										</div>
										<!--end::User-->
										<!--begin::Separator-->
										<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
										<!--end::Separator-->
										<!--begin::User-->
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="13">
											<!--begin::Details-->
											<div class="d-flex align-items-center">
												<!--begin::Checkbox-->
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='13']" value="13" />
												</label>
												<!--end::Checkbox-->
												<!--begin::Avatar-->
												<div class="symbol symbol-35px symbol-circle">
													<img alt="Pic" src="assets/media/avatars/300-13.jpg" />
												</div>
												<!--end::Avatar-->
												<!--begin::Details-->
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">John Miller</a>
													<div class="fw-semibold text-muted">miller@mapple.com</div>
												</div>
												<!--end::Details-->
											</div>
											<!--end::Details-->
											<!--begin::Access menu-->
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1">Guest</option>
													<option value="2">Owner</option>
													<option value="3" selected="selected">Can Edit</option>
												</select>
											</div>
											<!--end::Access menu-->
										</div>
										<!--end::User-->
										<!--begin::Separator-->
										<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
										<!--end::Separator-->
										<!--begin::User-->
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="14">
											<!--begin::Details-->
											<div class="d-flex align-items-center">
												<!--begin::Checkbox-->
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='14']" value="14" />
												</label>
												<!--end::Checkbox-->
												<!--begin::Avatar-->
												<div class="symbol symbol-35px symbol-circle">
													<span class="symbol-label bg-light-success text-success fw-semibold">L</span>
												</div>
												<!--end::Avatar-->
												<!--begin::Details-->
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Lucy Kunic</a>
													<div class="fw-semibold text-muted">lucy.m@fentech.com</div>
												</div>
												<!--end::Details-->
											</div>
											<!--end::Details-->
											<!--begin::Access menu-->
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1">Guest</option>
													<option value="2" selected="selected">Owner</option>
													<option value="3">Can Edit</option>
												</select>
											</div>
											<!--end::Access menu-->
										</div>
										<!--end::User-->
										<!--begin::Separator-->
										<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
										<!--end::Separator-->
										<!--begin::User-->
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="15">
											<!--begin::Details-->
											<div class="d-flex align-items-center">
												<!--begin::Checkbox-->
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='15']" value="15" />
												</label>
												<!--end::Checkbox-->
												<!--begin::Avatar-->
												<div class="symbol symbol-35px symbol-circle">
													<img alt="Pic" src="assets/media/avatars/300-21.jpg" />
												</div>
												<!--end::Avatar-->
												<!--begin::Details-->
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Ethan Wilder</a>
													<div class="fw-semibold text-muted">ethan@loop.com.au</div>
												</div>
												<!--end::Details-->
											</div>
											<!--end::Details-->
											<!--begin::Access menu-->
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1" selected="selected">Guest</option>
													<option value="2">Owner</option>
													<option value="3">Can Edit</option>
												</select>
											</div>
											<!--end::Access menu-->
										</div>
										<!--end::User-->
										<!--begin::Separator-->
										<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
										<!--end::Separator-->
										<!--begin::User-->
										<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="16">
											<!--begin::Details-->
											<div class="d-flex align-items-center">
												<!--begin::Checkbox-->
												<label class="form-check form-check-custom form-check-solid me-5">
													<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='16']" value="16" />
												</label>
												<!--end::Checkbox-->
												<!--begin::Avatar-->
												<div class="symbol symbol-35px symbol-circle">
													<img alt="Pic" src="assets/media/avatars/300-23.jpg" />
												</div>
												<!--end::Avatar-->
												<!--begin::Details-->
												<div class="ms-5">
													<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Dan Wilson</a>
													<div class="fw-semibold text-muted">dam@consilting.com</div>
												</div>
												<!--end::Details-->
											</div>
											<!--end::Details-->
											<!--begin::Access menu-->
											<div class="ms-2 w-100px">
												<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
													<option value="1">Guest</option>
													<option value="2">Owner</option>
													<option value="3" selected="selected">Can Edit</option>
												</select>
											</div>
											<!--end::Access menu-->
										</div>
										<!--end::User-->
									</div>
									<!--end::Users-->
									<!--begin::Actions-->
									<div class="d-flex flex-center mt-15">
										<button type="reset" id="kt_modal_users_search_reset" data-bs-dismiss="modal" class="btn btn-active-light me-3">Cancel</button>
										<button type="submit" id="kt_modal_users_search_submit" class="btn btn-primary">Add Selected Users</button>
									</div>
									<!--end::Actions-->
								</div>
								<!--end::Results-->
								<!--begin::Empty-->
								<div data-kt-search-element="empty" class="text-center d-none">
									<!--begin::Message-->
									<div class="fw-semibold py-10">
										<div class="text-gray-600 fs-3 mb-2">No users found</div>
										<div class="text-muted fs-6">Try to search by username, full name or email...</div>
									</div>
									<!--end::Message-->
									<!--begin::Illustration-->
									<div class="text-center px-5">
										<img src="assets/media/illustrations/sketchy-1/1.png" alt="" class="w-100 h-200px h-sm-325px" />
									</div>
									<!--end::Illustration-->
								</div>
								<!--end::Empty-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Search-->
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - Users Search-->
		<!--end::Modals-->
	
		<?php
   require APPROOT . '/views/includes/dashboard/footer.php';
?>