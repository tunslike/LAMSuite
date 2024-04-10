<!--begin::Modals-->
<div class="modal fade" id="store_setup_config" tabindex="-1" style="display: none;" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_create_api_key_header">
                <!--begin::Modal title-->
                <h2>Store Setup</h2>
                <!--end::Modal title-->

                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i></div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->

            <!--begin::Form-->
            <form id="kt_modal_create_api_key_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">
                    <!--begin::Scroll-->
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_create_api_key_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_create_api_key_header" data-kt-scroll-wrappers="#kt_modal_create_api_key_scroll" data-kt-scroll-offset="300px" style="max-height: 293px;">


                        <!--begin::Input group-->
                        <div class="mb-5 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-semibold mb-2">Bulk Discount</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="number" placeholder="Enter bulk discount here" class="form-control" id="bulkDiscount" name="bulkDiscount">
                            <!--end::Input-->
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                        <!--end::Input group-->


                        <!--begin::Input group-->
                        <div class="mb-5 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-semibold mb-2">Payment Method</label>
                            <!--end::Label-->

                            <!--begin::Input-->
							<select class="form-select" aria-label="Select example" id="paymentMethod" name="paymentMethod">
									<option selected="selected" value="">Select here</option>
									<option value="Pay on Delivery">Pay on Delivery</option>
								</select>
                            <!--end::Input-->
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                        <!--end::Input group-->
				
						<!--begin::Input group-->
                        <div class="row mb-5">

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-semibold mb-2">Delivery Fee</label>
                                <!--end::Label-->

                                <!--begin::Input-->
								<input type="number" id="deliveryFee" class="form-control" placeholder="Enter amount here" name="deliveryFee"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--end::Label-->
                                <label class="required fs-5 fw-semibold mb-2">Delivery Pack</label>
                                <!--end::Label-->

                                <!--end::Input-->
                                <input type="number" id="deliverPack" class="form-control" placeholder="Enter amount here" name="deliverPack"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                       
                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->

                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="button" id="kt_modal_create_api_key_cancel" data-bs-dismiss="modal" class="btn btn-danger me-3">
                        Discard
                    </button>
                    <!--end::Button-->

                    <!--begin::Button-->
                    <button type="button" id="btnSaveStoreSetup" class="btn btn-primary">
                        <span class="indicator-label">
                            Save Settings
                        </span>
                        <span class="indicator-progress">
                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
		<!--end::Modals-->


        <!--begin::Modals-->
		<div class="modal fade" id="customer_order_modal" tabindex="-1" style="display: none;" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_create_api_key_header">
                <!--begin::Modal title-->
                <h2>Process Customer Order #<span style="color: red;" id="custNo"></span></h2>
                <!--end::Modal title-->

                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->

            <!--begin::Form-->
            <form id="kt_modal_create_api_key_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">
                    <!--begin::Scroll-->
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_create_api_key_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_create_api_key_header" data-kt-scroll-wrappers="#kt_modal_create_api_key_scroll" data-kt-scroll-offset="300px" style="max-height: 293px;">

                
                    <div> <input type="hidden" id="orderID"></div>

                    <!--begin::Input group-->
                        <div class="mb-5 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-semibold mb-2">Customer Name</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="text" class="form-control" readonly id="customerName">
                            <!--end::Input-->
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row mb-5">

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-semibold mb-2">Phone Number</label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <input type="text" readonly class="form-control" id="phoneNumber"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--end::Label-->
                                <label class="required fs-5 fw-semibold mb-2">Total Amount</label>
                                <!--end::Label-->

                                <!--end::Input-->
                                <input type="number" id="totalAmount" class="form-control" readonly/>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-semibold mb-2">Additional Comment</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <textarea class="form-control" rows="3" id="orderComment" placeholder="Enter additional comment here"></textarea>
                            <!--end::Input-->
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                        <!--end::Input group-->

						  <!--begin::Input group-->
						  <div class="row mb-5">

<!--begin::Col-->
<div class="col-md-6 fv-row">
	<!--begin::Label-->
	<label class="required fs-5 fw-semibold mb-2">Delivery Contact Name</label>
	<!--end::Label-->

	<!--begin::Input-->
	<input type="text" class="form-control" id="deliveryName"/>
	<!--end::Input-->
</div>
<!--end::Col-->

<!--begin::Col-->
<div class="col-md-6 fv-row">
	<!--end::Label-->
	<label class="required fs-5 fw-semibold mb-2">Delivery Contact Phone</label>
	<!--end::Label-->

	<!--end::Input-->
	<input type="number" id="deliveryPhone" class="form-control"/>
	<!--end::Input-->
</div>
<!--end::Col-->
</div>
<!--end::Input group-->
                        <br>
                    
                     <!--******************************************** LIST START HERE ------------------>
                    
                     <span id="rowDataValue"></span>

                     <!--******************************************** LIST ENDS HERE------- -->
                       <br>
                       <br>
                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->

                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="button" id="kt_modal_create_api_key_cancel" data-bs-dismiss="modal" class="btn btn-danger me-3">
                        Discard
                    </button>
                    <!--end::Button-->

                    <!--begin::Button-->
                    <button type="button" id="btnCompleteCustomerOrder" class="btn btn-success">
                        <span class="indicator-label">
                            Complete Order
                        </span>
                        <span class="indicator-progress">
                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
	
		<!--end::Modals-->
    <!--begin::Modals-->
    <div class="modal fade" id="view_completed_order" tabindex="-1" style="display: none;" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_create_api_key_header">
                <!--begin::Modal title-->
                <h2>Customer Order Completed #<span style="color: green;" id="custNo"></span></h2>
                <!--end::Modal title-->

                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->

            <!--begin::Form-->
            <form id="kt_modal_create_api_key_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">
                    <!--begin::Scroll-->
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_create_api_key_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_create_api_key_header" data-kt-scroll-wrappers="#kt_modal_create_api_key_scroll" data-kt-scroll-offset="300px" style="max-height: 293px;">

                
                    <div> <input type="hidden" id="orderID"></div>

                    <!--begin::Input group-->
                        <div class="mb-5 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="fs-5 fw-semibold mb-2">Customer Name</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="text" class="form-control" readonly id="c_customerName">
                            <!--end::Input-->
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row mb-5">

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="fs-5 fw-semibold mb-2">Phone Number</label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <input type="text" readonly class="form-control" id="c_phoneNumber"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--end::Label-->
                                <label class="fs-5 fw-semibold mb-2">Total Amount</label>
                                <!--end::Label-->

                                <!--end::Input-->
                                <input type="number" id="c_totalAmount" class="form-control" readonly/>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="fs-5 fw-semibold mb-2">Additional Comment</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <textarea class="form-control" readonly rows="3" id="c_orderComment"></textarea>
                            <!--end::Input-->
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row mb-5">

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="fs-5 fw-semibold mb-2">Date Processed</label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <input type="text" readonly class="form-control" id="dateProcessed"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--end::Label-->
                                <label class="fs-5 fw-semibold mb-2">Processed By</label>
                                <!--end::Label-->

                                <!--end::Input-->
                                <input type="text" id="processedBy" class="form-control" readonly/>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <br>
                    
                     <!--******************************************** LIST START HERE ------------------>
                    
                     <span id="rowDataValueCompleted"></span>

                     <!--******************************************** LIST ENDS HERE------- -->
                       <br>
                       <br>
                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->

                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="button" id="kt_modal_create_api_key_cancel" data-bs-dismiss="modal" class="btn btn-danger me-3">
                        Discard
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
	
		<!--end::Modals-->   
	<!--begin::Modals-->
    <div class="modal fade" id="kt_modal_create_food_menu" tabindex="-1" style="display: none;" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_create_api_key_header">
                <!--begin::Modal title-->
                <h2>Create Food Menu</h2>
                <!--end::Modal title-->

                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->

            <!--begin::Form-->
            <form id="kt_modal_create_api_key_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">
                    <!--begin::Scroll-->
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_create_api_key_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_create_api_key_header" data-kt-scroll-wrappers="#kt_modal_create_api_key_scroll" data-kt-scroll-offset="300px" style="max-height: 293px;">

                    <!--begin::Input group-->
                        <div class="mb-5 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-semibold mb-2">Food Category</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <select name="foodCategory" id="foodCategory" class="form-select" aria-label="Select example">
                                <option value="" selected="selected">Select here</option>
                                <option value="Food">Food</option>
                                <option value="Snack">Snack</option>
                                <option value="Drink">Drink</option>
                                <option value="Fruit">Fruit</option>
                            </select>
                            <!--end::Input-->
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                        <!--end::Input group-->
                        
                        <!--begin::Input group-->
                        <div class="mb-5 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-semibold mb-2">Food Name</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="text" class="form-control" placeholder="Enter food name here" id="foodName" name="foodName">
                            <!--end::Input-->
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-semibold mb-2">Food Description</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <textarea class="form-control" rows="3" name="foodDesc" id="foodDesc" placeholder="Food Description"></textarea>
                            <!--end::Input-->
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row mb-5">

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-semibold mb-2">Amount</label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <input type="text" class="form-control" placeholder="Enter food amount" id="foodAmount" name="foodAmount"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--end::Label-->
                                <label class="required fs-5 fw-semibold mb-2">Max Quantity</label>
                                <!--end::Label-->

                                <!--end::Input-->
                                <input type="number" id="foodQuant" class="form-control" placeholder="Enter max quantity" name="foodQuant"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

						   
                        <!--begin::Input group-->
                        <div class="mb-5 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-semibold mb-2">Upload Food Picture</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="file" class="form-control" id="foodPicture" name="foodPicture">
                            <!--end::Input-->
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                        <!--end::Input group-->

                       
                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->

                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="button" id="kt_modal_create_api_key_cancel" data-bs-dismiss="modal" class="btn btn-danger me-3">
                        Discard
                    </button>
                    <!--end::Button-->

                    <!--begin::Button-->
                    <button type="button" id="btnCreateFoodItem" class="btn btn-primary">
                        <span class="indicator-label">
                            Create Food Item
                        </span>
                        <span class="indicator-progress">
                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
		<!--end::Modals-->
   <!--begin::Modals-->
   <div class="modal fade" id="create_new_user" tabindex="-1" style="display: none;" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_create_api_key_header">
                <!--begin::Modal title-->
                <h2>Create New User</h2>
                <!--end::Modal title-->

                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->

            <!--begin::Form-->
            <form id="kt_modal_create_api_key_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">
                    <!--begin::Scroll-->
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_create_api_key_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_create_api_key_header" data-kt-scroll-wrappers="#kt_modal_create_api_key_scroll" data-kt-scroll-offset="300px" style="max-height: 293px;">

                    <!--begin::Input group-->
                        <div class="row mb-5">

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-semibold mb-2">First Name</label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <input type="text" class="form-control" id="user_firstname"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--end::Label-->
                                <label class="required fs-5 fw-semibold mb-2">Last Name</label>
                                <!--end::Label-->

                                <!--end::Input-->
                                <input type="text" id="user_lastname" onblur="createUsername();" class="form-control"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="mb-5 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-semibold mb-2">System Username</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="text" class="form-control" readonly id="username">
                            <!--end::Input-->
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                        <!--end::Input group-->

                    <!--begin::Input group-->
                        <div class="mb-5 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-semibold mb-2">User Role</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <select id="userRole" class="form-select" aria-label="Select example">
                                <option value="" selected="selected">Select here</option>
                                <option value="001">Administrator</option>
                                <option value="002">Supervisor</option>
                                <option value="003">Loan Officer</option>
                                <option value="004">CRM Officer</option>
                                <option value="005">Operator</option>
                                <option value="006">Guest</option>
                            </select>
                            <!--end::Input-->
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row mb-5">

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="fs-5 fw-semibold mb-2">Email Address</label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <input type="text" class="form-control" id="user_email"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--end::Label-->
                                <label class="fs-5 fw-semibold mb-2">Phone</label>
                                <!--end::Label-->

                                <!--end::Input-->
                                <input type="text" id="user_phone" class="form-control"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                   
                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->

                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="button" id="kt_modal_create_api_key_cancel" data-bs-dismiss="modal" class="btn btn-danger me-3">
                        Discard
                    </button>
                    <!--end::Button-->

                    <!--begin::Button-->
                    <button type="button" id="btnCreateNewUser" class="btn btn-primary">
                        <span class="indicator-label">
                            Create User
                        </span>
                        <span class="indicator-progress">
                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
		<!--end::Modals-->

	