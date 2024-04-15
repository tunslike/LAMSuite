	<!--begin:Menu item-->
    <div class="menu-item pt-5">

             <!--begin:Menu item-->
             <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo URLROOT ?>/dashboard/home">
                                        <span class="menu-icon">
                                            <i class="ki-duotone ki-home fs-2"></i>
                                        </span>
                                        <span class="menu-title">CRM</span>
                                    </a>
                                    <!--end:Menu link-->
									  <!--begin:Menu link-->
									  <a class="menu-link" href="<?php echo URLROOT ?>/dashboard/loan">
                                        <span class="menu-icon">
                                            <i class="ki-duotone ki-chart-pie-3 fs-2">
												<span class="path1"></span>
												<span class="path2"></span>
												<span class="path3"></span>
											</i>
                                        </span>
                                        <span class="menu-title">Loan</span>
                                    </a>
                                    <!--end:Menu link-->
            </div>
								<!--end:Menu item-->
                                <br>
									<!--begin:Menu content-->
									<div class="menu-content">
										<span class="menu-heading fw-bold text-uppercase fs-7">Menu</span>
									</div>
									<!--end:Menu content-->
								</div>

								<!--begin:Menu item-->
								<div data-kt-menu-trigger="click" class="menu-item <?php if(isset($data['parent']) && $data['parent'] == 'funds') {echo 'here show';} ?>  menu-accordion">
									<!--begin:Menu link-->
									<span class="menu-link">
										<span class="menu-icon">
											<i class="ki-duotone ki-address-book fs-2">
												<span class="path1"></span>
												<span class="path2"></span>
												<span class="path3"></span>
											</i>
										</span>
										<span class="menu-title">Schemes</span>
										<span class="menu-arrow"></span>
									</span>
									<!--end:Menu link-->
									<!--begin:Menu sub-->
									<div class="menu-sub menu-sub-accordion">
										<!--begin:Menu item-->
										<div class="menu-item">
											<!--begin:Menu link-->
											<a class="menu-link <?php if(isset($data['active']) && $data['active'] == 'scheme') { echo 'active';} ?>" href="<?php echo URLROOT ?>/scheme/newScheme">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">New Scheme</span>
											</a>
											<!--end:Menu link-->
										</div>
										<!--end:Menu item-->
										<!--begin:Menu item-->
										<div class="menu-item">
											<!--begin:Menu link-->
											<a class="menu-link <?php if(isset($data['active']) && $data['active'] == 'manageScheme') { echo 'active';} ?>" href="<?php echo URLROOT ?>/scheme/manageScheme">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">Manage Scheme</span>
											</a>
											<!--end:Menu link-->
										</div>
										<!--end:Menu item-->
									</div>
									<!--end:Menu sub-->
								</div>
								<!--end:Menu item-->
								<!--begin:Menu item-->
								<div data-kt-menu-trigger="click" class="menu-item  <?php if(isset($data['parent']) && $data['parent'] == 'crm') {echo 'here show';} ?> menu-accordion">
									<!--begin:Menu link-->
									<span class="menu-link">
										<span class="menu-icon">
											<i class="ki-duotone ki-user fs-2">
												<span class="path1"></span>
												<span class="path2"></span>
												<span class="path3"></span>
												<span class="path4"></span>
												<span class="path5"></span>
											</i>
										</span>
										<span class="menu-title">Customer CRM</span>
										<span class="menu-arrow"></span>
									</span>
									<!--end:Menu link-->
									<!--begin:Menu sub-->
									<div class="menu-sub menu-sub-accordion">
										<!--begin:Menu item
										<div class="menu-item">
											<a class="menu-link <?php if(isset($data['active']) && $data['active'] == 'customer') { echo 'active';} ?>" href="<?php echo URLROOT ?>/customer/newCustomer">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">New Customer</span>
											</a>
										</div>
										nd:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
											<!--begin:Menu link-->
											<a class="menu-link <?php if(isset($data['active']) && $data['active'] == 'channel') { echo 'active';} ?>" href="<?php echo URLROOT ?>/customer/customerChannel">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">Customer Channel</span>
											</a>
											<!--end:Menu link-->
										</div>
										<!--end:Menu item-->
										<!--begin:Menu item-->
										<div class="menu-item">
											<!--begin:Menu link-->
											<a class="menu-link <?php if(isset($data['active']) && $data['active'] == 'manage_crm') { echo 'active';} ?>" href="<?php echo URLROOT ?>/customer/manageCRM">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">Manage CRM</span>
											</a>
											<!--end:Menu link-->
										</div>
										<!--end:Menu item-->
										
					
									</div>
									<!--end:Menu sub-->
								</div>
								<!--end:Menu item-->
							    <!--begin:Menu item-->
								<div data-kt-menu-trigger="click" class="menu-item <?php if(isset($data['parent']) && $data['parent'] == 'loan') {echo 'here show';} ?> menu-accordion">
									<!--begin:Menu link-->
									<span class="menu-link">
										<span class="menu-icon">
											<i class="ki-duotone ki-briefcase fs-2">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</span>
										<span class="menu-title">Loans</span>
										<span class="menu-arrow"></span>
									</span>
									<!--end:Menu link-->
									<!--begin:Menu sub-->
									<div class="menu-sub menu-sub-accordion">
											<!--begin:Menu item-->
											<div class="menu-item">
											<!--begin:Menu link-->
											<a class="menu-link <?php if(isset($data['active']) && $data['active'] == 'manageLoan') { echo 'active';} ?>" href="<?php echo URLROOT ?>/loan/manageLoans">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">Manage Loans</span>
											</a>
											<!--end:Menu link-->
										</div>
										<!--end:Menu item-->

										<!--begin:Menu item-->
										<div class="menu-item">
											<!--begin:Menu link-->
											<a class="menu-link <?php if(isset($data['active']) && $data['active'] == 'disburseLoan') { echo 'active';} ?>" href="<?php echo URLROOT ?>/loan/disburseLoan">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">Disbursement</span>
											</a>
											<!--end:Menu link-->
										</div>
										<!--end:Menu item-->
								
										<!--begin:Menu item-->
										<div class="menu-item">
											<!--begin:Menu link-->
											<a class="menu-link <?php if(isset($data['active']) && $data['active'] == 'repayLoan') { echo 'active';} ?>" href="<?php echo URLROOT ?>/loan/loanRepayment">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">Repayment</span>
											</a>
											<!--end:Menu link-->
										</div>
										<!--end:Menu item-->
									</div>
									<!--end:Menu sub-->
								</div>
								<!--end:Menu item-->
								<!--begin:Menu item-->
								<div data-kt-menu-trigger="click" class="menu-item <?php if(isset($data['parent']) && $data['parent'] == 'workflow') {echo 'here show';} ?> menu-accordion">
									<!--begin:Menu link-->
									<span class="menu-link">
										<span class="menu-icon">
											<i class="ki-duotone ki-element-plus fs-2">
												<span class="path1"></span>
												<span class="path2"></span>
												<span class="path3"></span>
												<span class="path4"></span>
												<span class="path5"></span>
											</i>
										</span>
										<span class="menu-title">Workflows</span>
										<span class="menu-arrow"></span>
									</span>
									<!--end:Menu link-->
									<!--begin:Menu sub-->
									<div class="menu-sub menu-sub-accordion">
                                        <!--begin:Menu item-->
										<div class="menu-item">
											<!--begin:Menu link-->
											<a class="menu-link <?php if(isset($data['active']) && $data['active'] == 'approveLoan') { echo 'active';} ?>" href="<?php echo URLROOT ?>/loan/approveNewLoan">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">Loans</span>
											</a>
											<!--end:Menu link-->
										</div>
										 <!--begin:Menu item-->
										 <div class="menu-item">
											<!--begin:Menu link-->
											<a class="menu-link <?php if(isset($data['active']) && $data['active'] == 'systemWorkflow') { echo 'active';} ?>" href="<?php echo URLROOT ?>/dashboard/systemWorkflow">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">Company Profile</span>
											</a>
											<!--end:Menu link-->
										</div>
										<!--end:Menu item-->
									</div>
									<!--end:Menu sub-->
								</div>
								<!--end:Menu item-->
								<!--begin:Menu item-->
								<div class="menu-item pt-5">
									<!--begin:Menu content-->
									<div class="menu-content">
										<span class="menu-heading fw-bold text-uppercase fs-7">System</span>
									</div>
									<!--end:Menu content-->
								</div>
								<!--end:Menu item-->
								<!--begin:Menu item-->
								<div data-kt-menu-trigger="click" class="menu-item <?php if(isset($data['parent']) && $data['parent'] == 'user') {echo 'here show';} ?> menu-accordion">
									<!--begin:Menu link-->
									<span class="menu-link">
										<span class="menu-icon">
											<i class="ki-duotone ki-abstract-41 fs-2">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</span>
										<span class="menu-title">User Management</span>
										<span class="menu-arrow"></span>
									</span>
									<!--end:Menu link-->
									<!--begin:Menu sub-->
									<div class="menu-sub menu-sub-accordion">
										<!--begin:Menu item-->
										<div class="menu-item">
											<!--begin:Menu link-->
											<a class="menu-link <?php if(isset($data['active']) && $data['active'] == 'manageUser') { echo 'active';} ?>" href="<?php echo URLROOT ?>/dashboard/manageUsers">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">Manage Users</span>
											</a>
											<!--end:Menu link-->
										</div>
										<!--end:Menu item-->
												<!--begin:Menu item-->
												<div class="menu-item">
											<!--begin:Menu link-->
											<a class="menu-link <?php if(isset($data['active']) && $data['active'] == 'userRole') { echo 'active';} ?>" href="<?php echo URLROOT ?>/dashboard/manageUsers">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">User Roles</span>
											</a>
											<!--end:Menu link-->
										</div>
										<!--end:Menu item-->
									</div>
									<!--end:Menu sub-->
								</div>
								<!--end:Menu item-->
					
								<!--begin:Menu item-->
								<div data-kt-menu-trigger="click" class="menu-item <?php if(isset($data['parent']) && $data['parent'] == 'admin') {echo 'here show';} ?>  menu-accordion">
									<!--begin:Menu link-->
									<span class="menu-link">
										<span class="menu-icon">
											<i class="ki-duotone ki-gear fs-2">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</span>
										<span class="menu-title">Administration</span>
										<span class="menu-arrow"></span>
									</span>
									<!--end:Menu link-->
									<!--begin:Menu sub-->
									<div class="menu-sub menu-sub-accordion">
										<!--begin:Menu item-->
										<div class="menu-item">
											<!--begin:Menu link-->
											<a class="menu-link <?php if(isset($data['active']) && $data['active'] == 'setup') { echo 'active';} ?>" href="<?php echo URLROOT ?>/dashboard/setup">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">Setup</span>
											</a>
											<!--end:Menu link-->
										</div>
										<!--end:Menu item-->
                                        	<!--begin:Menu item-->
										<div class="menu-item">
											<!--begin:Menu link-->
											<a class="menu-link <?php if(isset($data['active']) && $data['active'] == 'workflow') { echo 'active';} ?>" href="<?php echo URLROOT ?>/dashboard/workflowSetup">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">Workflow Setup</span>
											</a>
											<!--end:Menu link-->
										</div>
										<!--end:Menu item-->
										   	<!--begin:Menu item-->
											   <div class="menu-item">
											<!--begin:Menu link-->
											<a class="menu-link <?php if(isset($data['active']) && $data['active'] == 'companyprofile') { echo 'active';} ?>" href="<?php echo URLROOT ?>/dashboard/companyProfileList">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">Company Profile</span>
											</a>
											<!--end:Menu link-->
										</div>
										<!--end:Menu item-->
							
									</div>
									<!--end:Menu sub-->
								</div>
								<!--end:Menu item-->