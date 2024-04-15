<?php

class Loan extends Controller {

    public function __construct(){

        error_reporting(E_ALL);
        ini_set('display_errors', 'On');

        $this->userModel = $this->model('LoanManagement');
    }

      // ************** MANAGE LOAN REQUESTS ******************* //
      public function manageLoans() {

        if(isLoggedIn()){
            
            $customerid = $_SESSION['user_id'];
            
        }else{

            header("Location: " . URLROOT . "?isLogged=0");
        }

        //load customer loan request
        $loanRequest = $this->userModel->loadManageCustomerLoans();

        $data = [
            'title' => 'Loan Dashboard Page',
            'parent' => 'loan',
            'active' => 'manageLoan',
            'loanRequests' => $loanRequest,
        ];

        $this->view('loans/manageLoans', $data);
    }
// ************* END OF FUNCTION ****************** //


// function to validate employer signature
public function employerLoanValidation() {

      //check post
      if($_SERVER['REQUEST_METHOD'] == 'GET') {
   
        $verifyID = trim($_GET['verify_id']);

        // approve record
        $customerName = $this->userModel->validateCustomerVerification($verifyID);

        if($customerName) {

            //data
            $data = [
                'title' => 'Employer Loan Verification',
                'validate' => 'true',
                'customerName' => $customerName,
                'otp' => 'false',
                'authorized' => 'false'
            ];

            $_SESSION['loanID'] = $customerName->LOAN_ID;
            $_SESSION['customerName'] = $customerName->FULL_NAME;
            $_SESSION['customerID'] = $customerName->CUSTOMER_ENTRY_ID;
        
            $this->view('employer/employerVerification', $data);

        }else {

             //data
             $data = [
                'title' => 'Employer Loan Verification',
                'validate' => 'false',
                'customerName' => $customerName,
                'otp' => 'false',
                'authorized' => 'false'
            ];

            $this->view('employer/notValidemployerVerification', $data);
        }

        exit();
    }

    $data = [
        'title' => 'Employer Loan Verification',
        'validate' => 'false',
        'authorized' => 'false',
        'otp' => 'false'
    ];

    $this->view('employer/employerVerification', $data);
 
}// end of function

public function sendOTPEmployerVerification() {

     //check post
     if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $_SESSION['otpToken'] = '123456';

        $data = [
            'title' => 'Loan Dashboard Page',
            'validate' => 'true',
            'parent' => 'loan',
            'active' => 'manageLoan',
            'otp' => 'sent',
            'authorized' => 'false'
        ];

        $this->view('employer/employerVerification', $data);
    }
}

// function to validate employer signature
public function validateAuthoriseOTP() {

    //check post
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        if(isset($_SESSION['otpToken'])) {

            $tokenOtp = $_SESSION['otpToken'];
        }
        
        $data = [
            'otpValue' => trim($_POST['otpValue']),
            'customerid' => $_SESSION['customerID'],
            'loanid' => $_SESSION['loanID'],
            'authorizedBy' => 'Employer'
        ];

        if($tokenOtp == $data['otpValue']) {

             // approve record
            $authorize = $this->userModel->authorizeEmployerVerification($data);

            if($authorize) {

                $data = [
                    'title' => 'Loan Dashboard Page',
                    'authorized' => 'true'
                ];
            
                $this->view('employer/employerVerification', $data);
    
                exit();

            }

        }

    }

    $data = [
        'title' => 'Loan Dashboard Page',
        'otp' => 'notValid',
        'authorized' => 'false'
    ];

    $this->view('employer/employerVerification', $data);

}// end of function

  // function to approve customer record
  public function authorizeLoanDisbursement() {

    // check isLogged
    if(isLoggedIn()){
      
       $userid = $_SESSION['user_id'];
       
   }else{

       header("Location: " . URLROOT . "?isLogged=0");
   }

    //check post
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
   
       $data = [
           'loadid' => trim($_POST['loadid']),
           'disAmount' => trim($_POST['disAmount']),
           'payMethod' => trim($_POST['payMethod']),
           'comment' => trim($_POST['comment']),
           'userid' => $userid
       ];

       // approve record
       $approve = $this->userModel->authorizeCustomerLoanDisbursement($data);

       if($approve) {
           echo '1';
       }else{ 
           echo '0';
       }
   }
}
// end of function 


 // function to approve customer record
 public function postCustomerLoanRepayment() {

    // check isLogged
    if(isLoggedIn()){
      
       $userid = $_SESSION['user_id'];
       
   }else{

       header("Location: " . URLROOT . "?isLogged=0");
   }

    //check post
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
   
       
       $data = [
           'loanid' => trim($_POST['loanID']),
           'repayAmount' => trim($_POST['repayAmount']),
           'repayType' => trim($_POST['repayType']),
           'repayChannel' => trim($_POST['repayChannel']),
           'repayDate' => trim($_POST['repayDate']),
           'repayNarration' => trim($_POST['repayNarration']),
           'userid' => $userid
       ];

       // approve record
       $approve = $this->userModel->postCustomerLoanRepayment($data);

       if($approve) {
           echo '1';
       }else{ 
           echo '0';
       }

   }

}
// end of function 

    // function to approve customer record
    public function approveCustomerLoanRequest() {

        // check isLogged
        if(isLoggedIn()){
          
           $userid = $_SESSION['user_id'];
           
       }else{

           header("Location: " . URLROOT . "?isLogged=0");
       }

        //check post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
       
           
           $data = [
               'loanid' => trim($_POST['loanid']),
               'comment' => trim($_POST['comment']),
               'userid' => $userid
           ];

           // approve record
           $approve = $this->userModel->approveCustomerLoanRequest($data);

           if($approve) {
               echo '1';
           }else{ 
               echo '0';
           }

       }

   }
   // end of function 

        // ************** HOME DASHBOARD ******************* //
        public function approveNewLoan() {

            if(isLoggedIn()){
                
                $customerid = $_SESSION['user_id'];
                
            }else{
    
                header("Location: " . URLROOT . "?isLogged=0");
            }

            $loanProfiles = $this->userModel->loanLoanRequestForApproval();
       
            $data = [
                'title' => 'Approve New Loan',
                'active' => 'approveLoan',
                'parent' => 'workflow',
                'loanProfiles' => $loanProfiles
            ];
    
            $this->view('workflow/approveNewLoan', $data);
        }
    // ************* END OF FUNCTION ****************** //


       //function to load customer loan data
       public function customerLoanApproval() {
        
        // check isLogged
        if(isLoggedIn()){
           
            $userid = $_SESSION['user_id'];
            
        }else{
 
            header("Location: " . URLROOT . "?isLogged=0");
        }

        //check post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
            $profileid = trim($_POST['profileid']);
            
            $result = $this->userModel->loadCustomerLoanProfileDetails($profileid);
        }

        //response*********************************************
        echo json_encode($result);

    }
    //end of function

        // ************** manage loan page ******************* //
        public function manageCard() {

            if(isLoggedIn()){
                
                $customerid = $_SESSION['user_id'];
                
            }else{
    
                header("Location: " . URLROOT . "?isLogged=0");
            }

            if(isset($_GET['loan_id'])) {
                $loanid = $_GET['loan_id'];
            }

            $loanDetails = $this->userModel->loadCustomerLoanRequest($loanid);
            $bankDetails = $this->userModel->loadCustomerAccountDetails($loanid);
        
            $data = [
                'title' => 'Loan Dashboard Page',
                'parent' => 'loan',
                'active' => 'manageLoan',
                'loanDetails' => $loanDetails,
                'bankDetails' => $bankDetails,
                'activeTab' => 'manage'
            ];
    
            $this->view('loans/manageLoanCard', $data);
        }
    // ************* END OF FUNCTION ****************** //

    // ************** manage loan page ******************* //
      public function Repayment() {

        if(isLoggedIn()){
            
            $customerid = $_SESSION['user_id'];
            
        }else{

            header("Location: " . URLROOT . "?isLogged=0");
        }

        if(isset($_GET['loan_id'])) {
            $loanid = $_GET['loan_id'];
        }

        $loanDetails = $this->userModel->loadCustomerLoanRequest($loanid);

        $data = [
            'title' => 'Loan Dashboard Page',
            'parent' => 'loan',
            'active' => 'manageLoan',
            'loanDetails' => $loanDetails,
            'activeTab' => 'repayment'
        ];

        $this->view('loans/loanRepayment', $data);
    }
    // ************* END OF FUNCTION ****************** //

     // ************** manage loan page ******************* //
     public function History() {

        if(isLoggedIn()){
            
            $customerid = $_SESSION['user_id'];
            
        }else{

            header("Location: " . URLROOT . "?isLogged=0");
        }

        if(isset($_GET['loan_id'])) {
            $loanid = $_GET['loan_id'];
        }

        $loanDetails = $this->userModel->loadCustomerLoanRequest($loanid);
        $loanHistory = $this->userModel->fetchLoanHistory($loanid);

        $data = [
            'title' => 'Loan Dashboard Page',
            'parent' => 'loan',
            'active' => 'manageLoan',
            'history' => $loanHistory,
            'loanDetails' => $loanDetails,
            'activeTab' => 'history'
        ];

        $this->view('loans/loanHistory', $data);
    }
    // ************* END OF FUNCTION ****************** //

         // ************** manage loan page ******************* //
         public function RepaymentCard() {

            if(isLoggedIn()){
                
                $customerid = $_SESSION['user_id'];
                
            }else{
    
                header("Location: " . URLROOT . "?isLogged=0");
            }
    
            if(isset($_GET['loan_id'])) {
                $loanid = $_GET['loan_id'];
            }
    
            $loanDetails = $this->userModel->loadCustomerLoanRequest($loanid);
            $repaymentDetails = $this->userModel->loadCustomerLoanRepayment($loanid);
            
            $data = [
                'title' => 'Loan Dashboard Page',
                'parent' => 'loan',
                'active' => 'manageLoan',
                'loanDetails' => $loanDetails,
                'repaymentDetails' => $repaymentDetails,
                'activeTab' => 'repayment'
            ];
    
            $this->view('loans/loanRepayCard', $data);
        }
        // ************* END OF FUNCTION ****************** //


             // ************** manage loan page ******************* //
             public function repaymentSchedule() {

                if(isLoggedIn()){
                    
                    $customerid = $_SESSION['user_id'];
                    
                }else{
        
                    header("Location: " . URLROOT . "?isLogged=0");
                }
        
                if(isset($_GET['loan_id'])) {
                    $loanid = $_GET['loan_id'];
                }
        
                $loanDetails = $this->userModel->loadCustomerLoanRequest($loanid);
            
                // get breakdowns
                $loanAmount = $loanDetails[0]->LOAN_AMOUNT;
                $interestRate = $loanDetails[0]->INTEREST_RATE;
                $loanTenor = $loanDetails[0]->LOAN_TENOR;

                $repaymentDetails = $this->userModel->calculateAmortizedRepaymentSchedule($loanAmount, $interestRate, $loanTenor);

                $data = [
                    'title' => 'Loan Dashboard Page',
                    'parent' => 'loan',
                    'active' => 'manageLoan',
                    'loanDetails' => $loanDetails,
                    'repaymentDetails' => $repaymentDetails,
                    'activeTab' => 'schedule'
                ];
        
                $this->view('loans/repaymentSchedule', $data);
            }
            // ************* END OF FUNCTION ****************** //
    


     // ************** manage loan page ******************* //
     public function Approvals() {

        if(isLoggedIn()){
            
            $customerid = $_SESSION['user_id'];
            
        }else{

            header("Location: " . URLROOT . "?isLogged=0");
        }

        if(isset($_GET['loan_id'])) {
            $loanid = $_GET['loan_id'];
        }

        $loanDetails = $this->userModel->loadCustomerLoanRequest($loanid);
        $employerAuth = $this->userModel->loadEmployerDetailsAuthorization($loanid);

        $data = [
            'title' => 'Loan Dashboard Page',
            'parent' => 'loan',
            'active' => 'manageLoan',
            'loanDetails' => $loanDetails,
            'employerAuth' => $employerAuth,
            'activeTab' => 'approvals'
        ];

        $this->view('loans/loanApprovals', $data);
    }
    // ************* END OF FUNCTION ****************** //

     // ************** manage loan page ******************* //
     public function Settings() {

        if(isLoggedIn()){
            
            $customerid = $_SESSION['user_id'];
            
        }else{

            header("Location: " . URLROOT . "?isLogged=0");
        }

        if(isset($_GET['loan_id'])) {
            $loanid = $_GET['loan_id'];
        }

        $loanDetails = $this->userModel->loadCustomerLoanRequest($loanid);

        $data = [
            'title' => 'Loan Dashboard Page',
            'parent' => 'loan',
            'active' => 'manageLoan',
            'loanDetails' => $loanDetails,
            'activeTab' => 'settings'
        ];

        $this->view('loans/loanSettings', $data);
    }
    // ************* END OF FUNCTION ****************** //

     // ************** manage loan page ******************* //
     public function disburseLoan() {

        if(isLoggedIn()){
            
            $customerid = $_SESSION['user_id'];
            
        }else{

            header("Location: " . URLROOT . "?isLogged=0");
        }

        $loanProfiles = $this->userModel->loanLoanRequestForApproval();

        $data = [
            'title' => 'Loan Dashboard Page',
            'parent' => 'loan',
            'active' => 'disburseLoan',
            'loanProfiles' => $loanProfiles,
        ];

        $this->view('loans/disburseLoan', $data);
    }
    // ************* END OF FUNCTION ****************** //

      // ************** manage loan page ******************* //
      public function loanRepayment() {

        if(isLoggedIn()){
            
            $customerid = $_SESSION['user_id'];
            
        }else{

            header("Location: " . URLROOT . "?isLogged=0");
        }

        $loanProfiles = $this->userModel->loanLoanRequestForRepayment();
        
        $data = [
            'title' => 'Loan Dashboard Page',
            'parent' => 'loan',
            'active' => 'repayLoan',
            'loanProfiles' => $loanProfiles,
        ];

        $this->view('loans/loanRepayment', $data);
    }
    // ************* END OF FUNCTION ****************** //

}

?>