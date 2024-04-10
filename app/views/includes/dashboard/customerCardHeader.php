<!--begin::Navbar-->
<div class="card mb-5 mb-xl-10">
    <div class="card-body pt-9 pb-0">
        <!--begin::Details-->
        <div class="d-flex flex-wrap flex-sm-nowrap">
            <!--begin: Pic-->
            <div class="me-7 mb-4">
                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                    <img src="<?php echo URLROOT ?>/public/img/male_profile.png" alt="image">
                    <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px"></div>
                </div>
            </div>
            <!--end::Pic-->

            <!--begin::Info-->
            <div class="flex-grow-1">
                <!--begin::Title-->
                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                    <!--begin::User-->
                    <div class="d-flex flex-column">
                        <!--begin::Name-->
                        <div class="d-flex align-items-center mb-2">
                            <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1"><?php echo $data['customer']->FIRST_NAME.' '.$data['customer']->LAST_NAME; ?></a>
                            <a href="#"><i class="ki-duotone ki-verify fs-1 text-success"><span class="path1"></span><span class="path2"></span></i></a>
                        </div>
                        <!--end::Name-->

                        <!--begin::Info-->
                       
                        <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                        <?php if($data['loan']) : ?>
                            <a href="<?php echo URLROOT ?>/loan/manageLoanCard?load_id=<?php echo $data['loan']->LOAN_ID; ?>" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                <i class="ki-duotone ki-profile-circle fs-4 me-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>View Loan Card
                            </a>
                        <?php endif; ?>
                        </div>
                       
                        <div style="margin-bottom:5px;">Customer Number <span class="badge badge-light-primary me-auto"><?php echo $data['customer']->CUSTOMER_NO; ?></span></div>
                        <div style="margin-bottom:5px;"><span class="badge badge-light-danger me-auto">Incomplete KYC Status</span></div>
                        <!--end::Info-->
                    </div>
                    <!--end::User-->
                </div>
                <!--end::Title-->

                <!--begin::Stats-->
                <div class="d-flex flex-wrap flex-stack">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column flex-grow-1 pe-8">
                    <div class="d-flex flex-wrap">
                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">
                                  <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="0" data-kt-countup-prefix="$" data-kt-initialized="1"><?php echo $data['customer']->ACCOUNT_NO; ?></div>
                                </div>
                                <!--end::Number-->

                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-gray-500">Account Number</div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->
                        </div>
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Stats-->
            </div>
            <!--end::Info-->
        </div>
        <!--end::Details-->   

        <!--begin::Navs-->
        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                            <!--begin::Nav item-->
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 <?php if($data['activeTab'] == 'personal') {echo 'active';} ?>" href="<?php echo URLROOT ?>/customer/viewCustomerCard?customer_id=<?php echo $data['customer']->CUSTOMER_ID; ?>">
                            Personal Record</a>
                </li>
                <!--end::Nav item-->
                            <!--begin::Nav item-->
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 <?php if($data['activeTab'] == 'employment') {echo 'active';} ?>" href="<?php echo URLROOT ?>/customer/viewEmployerCard?customer_id=<?php echo $data['customer']->CUSTOMER_ID; ?>">
                        Employment Record</a>
                </li>
                <!--end::Nav item-->
                            <!--begin::Nav item-->
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 <?php if($data['activeTab'] == 'nok') {echo 'active';} ?>" href="<?php echo URLROOT ?>/customer/viewNOKRecordCard?customer_id=<?php echo $data['customer']->CUSTOMER_ID; ?>">
                       Next of Kin Record </a>
                </li>
                <!--end::Nav item-->
                            <!--begin::Nav item-->
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 <?php if($data['activeTab'] == 'document') {echo 'active';} ?>" href="<?php echo URLROOT ?>/customer/viewKYCDocumentsCard?customer_id=<?php echo $data['customer']->CUSTOMER_ID; ?>">
                      KYC Documents</a>
                </li>
                <!--end::Nav item-->
                            <!--begin::Nav item-->
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 <?php if($data['activeTab'] == 'settings') {echo 'active';} ?>" href="<?php echo URLROOT ?>/customer/viewAccountSettins?customer_id=<?php echo $data['customer']->CUSTOMER_ID; ?>">
                       Account Settings</a>
                </li>
                <!--end::Nav item-->
                    </ul>
        <!--begin::Navs-->
    </div>
</div>
<!--end::Navbar-->