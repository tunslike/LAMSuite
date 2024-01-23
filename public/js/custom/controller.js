//function to show alert
function showErrorAlert(message) {
    Swal.fire({
        text: message,
        icon: "error",
        buttonsStyling: false,
        confirmButtonText: "Ok, got it!",
        customClass: {
            confirmButton: "btn btn-danger"
        }
    });
}
//end of function 

//function to approve customer profile
$('#btnCompanyProfileApprove').click(function () {
    
    //get details
    let comment = $('#txtComment').val()
    let profID = $('#proileid').val()

    if(profID == '') {
        showErrorAlert('Please select company profile to proceed!')
        return false;
    }

     // show prompt
     Swal.fire({
        text: "Do you want to approve company profile?",
        icon: "question",
        buttonsStyling: false,
        showCancelButton: true,
        confirmButtonText: "Yes, Proceed!",
        cancelButtonText: 'Nope, cancel it',
        customClass: {
            cancelButton: 'btn btn-danger',
            confirmButton: "btn btn-primary"
        }
    }).then((result) => {
        if (result.isConfirmed) {

        // Show page loading
        KTApp.showPageLoading();

         //ajax request
            $.ajax({
                type: "POST",
                data: { profileid: profID, comment:comment},
                url: "http://localhost/lamsuite/dashboard/approveCompanyProfile",
                success: function (data) {

                    //hide
                    KTApp.hidePageLoading();

                    //check data
                    if(data == 1) {

                        Swal.fire({
                            title: "Company Profile Approved!",
                            text: "Record has been approved successully!",
                            icon: "success"
                          });

                          // refresh
                          location.reload();

                    }else {

                        Swal.fire({
                            title: "Unable to approve company profile!",
                            text: "Unable to process your request, please retry!",
                            icon: "error"
                          });

                          // refresh
                          location.reload();

                    }
                
                },
            });
        }
      });

})
//end of function 

//function to load customer profile
$('#btnSearchCompanyProfile').click(function () {
    //get details
    let profileid = $('#proileid').val()

    //check
    if(profileid == '') {
        showErrorAlert('Select Company profile to proceed!')
        return false;
    }

     // Show page loading
     KTApp.showPageLoading();

    //ajax request
    $.ajax({
        type: "POST",
        data: { profileid: profileid},
        url: "http://localhost/lamsuite/dashboard/companyProfileForApproval",
        success: function (data) {

            //hide
            KTApp.hidePageLoading();

            var response = JSON.parse(data);

            //set personal details
            $('#employerName').val(response[0].COMPANY_NAME)
            $('#empAddress').val(response[0].ADDRESS)
            $('#employerArea').val(response[0].AREA_LOCALITY)
            $('#employerState').val(response[0].STATE)

            $('#clientFullname').val(response[0].CONTACT_PERSON)
            $('#phonenumber').val(response[0].CONTACT_PHONE_NUMBER)
            $('#emailaddress').val(response[0].CONTACT_EMAIL)

            $('#dateCreated').val(response[0].PROFILE_DATE_CREATED)
            $('#createdBy').val(response[0].FIRST_NAME + ' ' + response[0].LAST_NAME)
            
        
        },
    });
})
//end of funcfion 

//form to submit company profile form
$('#btnCoyProfile').click(function() {

    //get details
    let employerName = $('#employerName').val()
    let companyAddr = $('#empAddress').val()
    let employerArea = $('#employerArea').val()
    let employerState = $('#employerState').val()

    let clientFullname = $('#clientFullname').val()
    let phonenumber = $('#phonenumber').val()
    let emailaddress = $('#emailaddress').val()

    if(employerName == '' || companyAddr == '' || employerArea == '' || employerState == '' || clientFullname == '' || phonenumber == '' || emailaddress == '')  {
        showErrorAlert('All fields are compulsory!')
        return false;
    }

    // show prompt
    Swal.fire({
        text: "Do you want to submit company profile?",
        icon: "question",
        buttonsStyling: false,
        showCancelButton: true,
        confirmButtonText: "Yes, Proceed!",
        cancelButtonText: 'Nope, cancel it',
        customClass: {
            cancelButton: 'btn btn-danger',
            confirmButton: "btn btn-primary"
        }
    }).then((result) => {
        if (result.isConfirmed) {

            //submit form
            $('#formCompanyProfile').submit()
        }   
    });
    
})
//end of function

// search customer button
const btnSearch = document.getElementById('loadSearchCustomer');
const btnApprove = document.getElementById('btnApprove');
const btnReject = document.getElementById('btnReject');

//approve button
btnApprove.addEventListener('click', e =>{
    e.preventDefault();

    var e_comment = document.getElementById("txtComment");
    var comment = e_comment.value;

    var e_customerid = document.getElementById("customer_id");
    var custid = e_customerid.value;

    if(custid == '') {
        Swal.fire({
            text: "Please select a customer to proceed!",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "Ok, got it!",
            customClass: {
                confirmButton: "btn btn-danger"
            }
        });

        return;
    }

    // show prompt
    Swal.fire({
        text: "Do you want to approve customer record?",
        icon: "question",
        buttonsStyling: false,
        showCancelButton: true,
        confirmButtonText: "Yes, Proceed!",
        cancelButtonText: 'Nope, cancel it',
        customClass: {
            cancelButton: 'btn btn-danger',
            confirmButton: "btn btn-primary"
        }
    }).then((result) => {
        if (result.isConfirmed) {

        // Show page loading
        KTApp.showPageLoading();

         //ajax request
            $.ajax({
                type: "POST",
                data: { customerid: custid, comment:comment},
                url: "http://localhost:8080/lamsuite/customer/approveCustomerRecord",
                success: function (data) {

                    //hide
                    KTApp.hidePageLoading();

                    //check data
                    if(data == 1) {

                        Swal.fire({
                            title: "Customer Record Approved!",
                            text: "Record has been approved successully!",
                            icon: "success"
                          });

                          // refresh
                          location.reload();

                    }else {

                        Swal.fire({
                            title: "Cannot approve customer record!",
                            text: "Unable to process your request, please retry!",
                            icon: "error"
                          });

                          // refresh
                          location.reload();

                    }
                
                },
            });
        }
      });

})


//function to clear data
function clearFieldData() {

     //set personal details
     document.getElementById("acctType").value = '';
     document.getElementById("kycStatus").value = '';
     document.getElementById("lastname").value = '';
     document.getElementById("firstname").value = '';
     document.getElementById("othername").value = '';
     document.getElementById("gender").value = '';
     document.getElementById("dob").value = '';
     document.getElementById("placeBirth").value = '';
     document.getElementById("phoneNumber").value = '';
     document.getElementById("email").value = '';
     document.getElementById("stateOrigin").value = '';
     document.getElementById("nationality").value = '';

     //correspondence
     document.getElementById("address").value = '';
     document.getElementById("areaLoc").value = response[0].AREA_LOCALITY;
     document.getElementById("cusState").value = response[0].CUSTOMER_STATE;

     //employer details
     document.getElementById("employerName").value = response[0].EMPLOYER_NAME;
     document.getElementById("officeAddress").value = response[0].OFFICE_ADDRESS;
     document.getElementById("empLoc").value = response[0].EMP_AREA_LOCALITY;
     document.getElementById("employerState").value = response[0].EMPLOYER_STATE; 
     document.getElementById("empSector").value = response[0].SECTOR;
     document.getElementById("empGradeLevel").value = response[0].GRADE_LEVEL;

     //nok details
     document.getElementById("nokLastname").value = response[0].NOK_LAST_NAME;
     document.getElementById("nokFirstname").value = response[0].NOK_FIRST_NAME;
     document.getElementById("nokRel").value = response[0].RELATIONSHIP;
     document.getElementById("nokGender").value = response[0].NOK_GENDER;
     document.getElementById("nokPhone").value = response[0].NOK_PHONE;
     document.getElementById("nokEmail").value = response[0].NOK_EMAIL;
     document.getElementById("nok_address").value = response[0].NOK_ADDRESS;
     document.getElementById("nokAreaLoc").value = response[0].NOK_AREA_LOCALITY;
     document.getElementById("nokState").value = response[0].NOK_STATE;
}
//end of function


//search button
btnSearch.addEventListener('click', e =>{
    e.preventDefault();

    var e_customerid = document.getElementById("customer_id");
    var custid = e_customerid.value;

    if(custid == '') {
        Swal.fire({
            text: "Please select a customer to proceed!",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "Ok, got it!",
            customClass: {
                confirmButton: "btn btn-danger"
            }
        });

        return;
    }

     // Show page loading
     KTApp.showPageLoading();

    //ajax request
    $.ajax({
        type: "POST",
        data: { customerid: custid},
        url: "http://localhost:8080/lamsuite/customer/fetchCustomerDataForApproval",
        success: function (data) {

            //hide
            KTApp.hidePageLoading();

            var response = JSON.parse(data);

            //set personal details
            document.getElementById("acctType").value = response[0].ACCOUNT_TYPE;
            document.getElementById("kycStatus").value = response[0].KYC_STATUS;
            document.getElementById("lastname").value = response[0].LAST_NAME;
            document.getElementById("firstname").value = response[0].FIRST_NAME;
            document.getElementById("othername").value = response[0].OTHER_NAME;
            document.getElementById("gender").value = response[0].GENDER;
            document.getElementById("dob").value = response[0].DATE_OF_BIRTH;
            document.getElementById("placeBirth").value = response[0].PLACE_OF_BIRTH;
            document.getElementById("phoneNumber").value = response[0].PHONE_NUMBER;
            document.getElementById("email").value = response[0].EMAIL_ADDRESS;
            document.getElementById("stateOrigin").value = response[0].STATE_OF_ORIGIN;
            document.getElementById("nationality").value = response[0].NATIONALITY;

            //correspondence
            document.getElementById("address").value = response[0].ADDRESS;
            document.getElementById("areaLoc").value = response[0].AREA_LOCALITY;
            document.getElementById("cusState").value = response[0].CUSTOMER_STATE;

            //employer details
            document.getElementById("employerName").value = response[0].EMPLOYER_NAME;
            document.getElementById("officeAddress").value = response[0].OFFICE_ADDRESS;
            document.getElementById("empLoc").value = response[0].EMP_AREA_LOCALITY;
            document.getElementById("employerState").value = response[0].EMPLOYER_STATE; 
            document.getElementById("empSector").value = response[0].SECTOR;
            document.getElementById("empGradeLevel").value = response[0].GRADE_LEVEL;

            //nok details
            document.getElementById("nokLastname").value = response[0].NOK_LAST_NAME;
            document.getElementById("nokFirstname").value = response[0].NOK_FIRST_NAME;
            document.getElementById("nokRel").value = response[0].RELATIONSHIP;
            document.getElementById("nokGender").value = response[0].NOK_GENDER;
            document.getElementById("nokPhone").value = response[0].NOK_PHONE;
            document.getElementById("nokEmail").value = response[0].NOK_EMAIL;
            document.getElementById("nok_address").value = response[0].NOK_ADDRESS;
            document.getElementById("nokAreaLoc").value = response[0].NOK_AREA_LOCALITY;
            document.getElementById("nokState").value = response[0].NOK_STATE;
        
        },
    });

});