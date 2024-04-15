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
                            <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1"><?php echo ucfirst($data['loanDetails'][0]->FIRST_NAME).' '.ucfirst($data['loanDetails'][0]->LAST_NAME); ?></a>
                            <a href="#"><i class="ki-duotone ki-verify fs-1 text-success"><span class="path1"></span><span class="path2"></span></i></a>
                        </div>
                        <!--end::Name-->

                        <!--begin::Info-->                        
                        <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                            <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                <i class="ki-duotone ki-profile-circle fs-4 me-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>View Customer Card
                            </a>
                        </div>
                        <div style="margin-bottom:5px;">Loan Number<span class="badge badge-light-primary me-auto"><?php echo $data['loanDetails'][0]->LOAN_NUMBER; ?></span></div>
                        <div style="margin-bottom:5px;">
                        <?php
                            switch($data['loanDetails'][0]->LOAN_STATUS) {
                                case 0:
                                    echo '<span class="badge badge-light-primary me-auto">Awaiting Review</span>';
                                break;
                                case 1:
                                    echo '<span class="badge badge-light-warning me-auto">Awaiting Authorization</span>';
                                break;
                                case 2: 
                                    
                                    echo '<span class="badge badge-light-warning me-auto">Awaiting Disbursement</span>';
                                break;
                                case 3: 
                                    echo '<span class="badge badge-light-success me-auto">Loan is active</span>';
                                break;
                            }
                        ?>
                    </div>
                        <!--end::Info-->
                    </div>
                    <!--end::User-->
                </div>
                <!--end::Title-->

                <!--begin::Stats-->
                <div class="d-flex flex-wrap flex-stack">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column flex-grow-1 pe-8">
                        <!--begin::Stats-->
                        <div class="d-flex flex-wrap">

                        <?php if($data['loanDetails'][0]->LOAN_STATUS == 3) : ?>
                                    <!--begin::Stat-->
                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">
                                    <div class="fs-2 fw-bold counted" style="color:red;" data-kt-countup="true" data-kt-countup-value="<?php echo $data['loanDetails'][0]->TOTAL_LOAN_REPAYMENT; ?>" data-kt-countup-prefix="$" data-kt-initialized="1">₦ <?php echo number_format(($data['loanDetails'][0]->TOTAL_REPAYMENT - $data['loanDetails'][0]->TOTAL_LOAN_REPAYMENT),2); ?></div>
                                </div>
                                <!--end::Number-->

                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-red-500" style="color:red;">Loan Balance</div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->
                        <?php endif; ?>

                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">
                                    <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="<?php echo $data['loanDetails'][0]->LOAN_AMOUNT; ?>" data-kt-countup-prefix="$" data-kt-initialized="1">₦ <?php echo number_format($data['loanDetails'][0]->LOAN_AMOUNT,2); ?></div>
                                </div>
                                <!--end::Number-->

                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-gray-500">Loan Amount</div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->

                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">
                                    <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="<?php echo $data['loanDetails'][0]->TOTAL_REPAYMENT; ?>" data-kt-initialized="1">₦ <?php echo number_format($data['loanDetails'][0]->TOTAL_REPAYMENT,2); ?></div>
                                </div>
                                <!--end::Number-->

                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-gray-500">Total Repayment</div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->

                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">
                                    <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="<?php echo $data['loanDetails'][0]->MONTHLY_REPAYMENT; ?>" data-kt-countup-prefix="%" data-kt-initialized="1">₦ <?php echo number_format($data['loanDetails'][0]->MONTHLY_REPAYMENT,2); ?></div>
                                </div>
                                <!--end::Number-->                                

                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-gray-500">Monthly Repayment</div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->

                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">

                                    <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="60" data-kt-countup-prefix="%" data-kt-initialized="1"><?php echo $data['loanDetails'][0]->LOAN_TENOR; ?> Months</div>
                                </div>
                                <!--end::Number-->                                

                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-gray-500">Loan Tenor</div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->
                        </div>
                        <!--end::Stats-->
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
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 <?php if($data['activeTab'] == 'manage') {echo 'active';} ?>" href="<?php echo URLROOT ?>/loan/manageCard?loan_id=<?php echo $data['loanDetails'][0]->LOAN_ID; ?>">
                        Loan Details</a>
                </li>
                <!--end::Nav item-->
                <!--begin::Nav item-->
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 <?php if($data['activeTab'] == 'schedule') {echo 'active';} ?>" href="<?php echo URLROOT ?>/loan/repaymentSchedule?loan_id=<?php echo $data['loanDetails'][0]->LOAN_ID; ?>">
                        Repayment Schedule</a>
                </li>
                <!--end::Nav item-->
                            <!--begin::Nav item-->
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 <?php if($data['activeTab'] == 'repayment') {echo 'active';} ?>" href="<?php echo URLROOT ?>/loan/RepaymentCard?loan_id=<?php echo $data['loanDetails'][0]->LOAN_ID; ?>">
                        Loan Repayment</a>
                </li>
                <!--end::Nav item-->
                            <!--begin::Nav item-->
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 <?php if($data['activeTab'] == 'history') {echo 'active';} ?>" href="<?php echo URLROOT ?>/loan/history?loan_id=<?php echo $data['loanDetails'][0]->LOAN_ID; ?>">
                       Loan History </a>
                </li>
                <!--end::Nav item-->
                            <!--begin::Nav item-->
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 <?php if($data['activeTab'] == 'approvals') {echo 'active';} ?>" href="<?php echo URLROOT ?>/loan/approvals?loan_id=<?php echo $data['loanDetails'][0]->LOAN_ID; ?>">
                       Loan Reviews and Approvals</a>
                </li>
                <!--end::Nav item-->
                            <!--begin::Nav item-->
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 <?php if($data['activeTab'] == 'settings') {echo 'active';} ?>" href="<?php echo URLROOT ?>/loan/settings?loan_id=<?php echo $data['loanDetails'][0]->LOAN_ID; ?>">
                       Loan Settings</a>
                </li>
                <!--end::Nav item-->
                    </ul>
        <!--begin::Navs-->
    </div>
</div>
<!--end::Navbar-->