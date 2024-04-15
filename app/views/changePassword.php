
<?php
   require APPROOT . '/views/includes/login/header.php';
?>
	<!--begin::Body-->
	<body id="kt_body" class="auth-bg bgi-size-cover bgi-attachment-fixed bgi-position-center bgi-no-repeat">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page bg image-->
			<style>body { background-image: url('<?php echo URLROOT ?>/public/img/5040007.jpg'); } [data-bs-theme="dark"] body { background-image: url('<?php echo URLROOT ?>/public/img/bg4-dark.jpg'); }</style>
			<!--end::Page bg image-->
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-column-fluid flex-lg-row">
				<!--begin::Aside-->
				<div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
					<!--begin::Aside-->
					<div class="d-flex flex-center flex-lg-start flex-column">
						<!--begin::Logo-->
                        <div>
                            
                        </div><img style="height:100%; width:300px; margin-bottom:40px; border-radius:10px;" alt="Finserve_Logo" src="<?php echo URLROOT ?>/public/img/finserve-logo.jpeg" />
						<a href="index.html" class="mb-7">
							<h1 style="font-weight:700; font-size: 45px; color: #fff; ">LAM <span style="color:#e8232b">Suite</span> 1.0</h1>
						</a>
						<!--end::Logo-->
						<!--begin::Title-->
                        <ul style="color:#fff; line-height:45px; margin-left:-13px;">
                            <li style="padding-left:20px;"><h3 class="text-white fw-normal m-0">Fund Administration & Management</h3></li>
                            <li style="padding-left:20px;"><h3 class="text-white fw-normal m-0">Loan Administration & Management</h3></li>
                            <li style="padding-left:20px;"><h3 class="text-white fw-normal m-0">Advance Workflow Management</h3></li>
                            <li style="padding-left:20px;"><h3 class="text-white fw-normal m-0">Administration and User Management</h3></li>
                            <li style="padding-left:20px;"><h3 class="text-white fw-normal m-0">Advance Reporting</h3></li>
                        </ul>
						<!--end::Title-->
					</div>
					<!--begin::Aside-->
				</div>
				<!--begin::Aside-->
				<!--begin::Body-->
				<div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12 p-lg-20">
					<!--begin::Card-->
					<div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
						<!--begin::Wrapper-->
						<div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
							<!--begin::Form-->
							<form class="form w-100" novalidate="novalidate" id="changePasswordForm" method ="POST" action="<?php echo URLROOT; ?>/pages/changePassword">
								<!--begin::Heading-->
								<div class="text-center mb-11">
									<!--begin::Title-->
									<h1 class="text-gray-900 fw-bolder mb-3"><span style="color: #160b53;">Change Password</span></h1>
									<!--end::Title-->
								</div>
								<!--begin::Heading-->
								<?php if(!empty($data['change_fieldError']) && $data['change_fieldError'] != '') : ?>
								<div class="errorMsgBox" style="background-color:#ffeef3; padding: 15px; font-weight:bold; color:#25304a; border-radius:10px; margin-bottom:15px;">
									<i class="fas fa-times" style="margin-right:5px; color:#f8285b; font-size:16px;"></i> <?php echo $data['fieldError']; ?>
								</div>
    							<?php endif; ?>

								<?php if(isset($_SESSION['ENTRY_ID_CHANGED'])) : ?>
								<div class="errorMsgBox" style="background-color:#d1ecf1; padding: 15px; font-weight:bold; color:#155460; border-radius:10px; margin-bottom:15px;">
									<i class="fas fa-info-circle" style="margin-right:5px; color:#155460; font-size:16px;"></i> <?php echo 'Hello '.$_SESSION['FIRSTNAME_CHANGED'].', Please change your password to proceed!'; ?>
								</div>
    							<?php endif; ?>

								<!--begin::Input group=-->
								<div class="fv-row mb-8">
									<!--begin::Email-->
									<input type="text" placeholder="Enter New Password" required name="new_access_code" autocomplete="off" class="form-control bg-transparent" />
									<!--end::Email-->
								</div>
								<div class="fv-row mb-8">
									<!--begin::Email-->
									<input type="text" placeholder="Confirm New Password" required name="confirm_pwd" autocomplete="off" class="form-control bg-transparent" />
									<!--end::Email-->
								</div>
	
			
								<!--begin::Submit button-->
								<div class="d-grid mb-10">
									<button type="submit" id="kt_sign_in_submit" style="  background-color: #9c0101; color: #fff;" class="btn btn-primary ">
										<!--begin::Indicator label-->
										<span class="indicator-label">Change Password</span>
										<!--end::Indicator label-->
										<!--begin::Indicator progress-->
										<span class="indicator-progress">Please wait... 
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
										<!--end::Indicator progress-->
									</button>
								</div>
							</form>
							<!--end::Form-->
							<a style="border-radius: 7px; display:none; border-color: #66a1e6; border-width: 1px; border-style: solid; padding: 10px 35%;" href="<?php echo URLROOT; ?>/signin">Login In here</a>
						</div>
						<!--end::Wrapper-->
						<!--begin::Footer-->
						<div class="d-flex flex-stack px-lg-10">
							<!--begin::Languages-->
							<div class="me-0">
								<a href="#"><span style="color: #9c0101;">© <?php echo date("Y"); ?> Finserve Investment Limited</span></a>
							</div>
							<!--end::Languages-->
							<!--begin::Links-->
							<div class="d-flex fw-semibold text-primary fs-base gap-5">
								<a href="pages/contact.html" target="_blank"><span style="color: #9c0101;">Contact Support</span></a>
							</div>
							<!--end::Links-->
						</div>
						<!--end::Footer-->
					</div>
					<!--end::Card-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
<?php
   require APPROOT . '/views/includes/login/footer.php';
?>