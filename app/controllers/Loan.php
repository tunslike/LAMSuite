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

        // ************** HOME DASHBOARD ******************* //
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
    
            $data = [
                'title' => 'Loan Dashboard Page',
                'loanDetails' => $loanDetails,
            ];
    
            $this->view('loans/manageLoanCard', $data);
        }
    // ************* END OF FUNCTION ****************** //


}

?>