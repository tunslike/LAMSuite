<?php
    class LoanManagement {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

    // function to load loan profile for approval
    public function loanLoanRequestForApproval() {

        try {
            
                //prepered statement
                $this->db->query("SELECT L.LOAN_ID, C.LAST_NAME, C.FIRST_NAME, L.LOAN_NUMBER FROM LAM_CUSTOMER_LOAN_REQUEST L 
                                  LEFT JOIN LAM_CUSTOMER C ON L.CUSTOMER_ID = C.CUSTOMER_ID WHERE L.STATUS = 0");
    

                $results = $this->db->resultSet();

                return $results;
            
                }catch (PDOException $e) {
                        echo 'ERROR!';
                        print_r( $e );
                }
            }
         // end of function


        // function to approve customer record
        public function approveCustomerRecord($data) {

            try {

                 // Prepared Statement   
                $this->db->query("UPDATE LAM_CUSTOMER SET ACCOUNT_NO = :acctNo, DATE_APPORVED = :dateApproved, APPROVED_BY = :approvedBy, 
                                  COMMENT = :comment, STATUS = 1 WHERE CUSTOMER_ID = :customerid;");

                $date =  date('Y-m-d H:i:s');
                $acctNo = '31'.date('y').$this->generateAccountNo($count + 1);

                //Bind values
                $this->db->bind(':acctNo', $acctNo);
                $this->db->bind(':customerid', $data['customerid']);
                $this->db->bind(':comment', $data['comment']);
                $this->db->bind(':dateApproved', $date);
                $this->db->bind(':approvedBy', $data['userid']);
            
                //Execute function
                if ($this->db->execute()) { 
                    return true;
                } else {
                    return false;
                }
    
            }catch (PDOException $e) {
                echo 'ERROR!';
                print_r( $e );
            }

        }
        // end of function

        // function to load manager CRM preview data
        public function loadManageCustomerLoans() {

            try {
    
                //prepered statement
                $this->db->query("SELECT L.LOAN_STATUS, L.LOAN_ID, L.LOAN_NUMBER, C.FIRST_NAME, C.LAST_NAME, L.LOAN_AMOUNT, L.LOAN_TENOR, L.LOAN_PURPOSE, 
                (SELECT P.COMPANY_NAME FROM LAM_COMPANY_PROFILE P WHERE P.PROFILE_ID = E.EMPLOYER_ID)EMPLOYER_NAME, L.DATE_CREATED
                FROM LAM_CUSTOMER_LOAN_REQUEST L LEFT JOIN LAM_CUSTOMER C ON L.CUSTOMER_ID = C.CUSTOMER_ID LEFT JOIN LAM_CUSTOMER_EMPLOYERS E ON L.CUSTOMER_ID = E.CUSTOMER_ID;");
            
                $results = $this->db->resultSet();
                        
                return $results;
    
            }catch (PDOException $e) {
                echo 'ERROR!';
                print_r( $e );
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
               'profileid' => trim($_POST['profileid']),
               'comment' => trim($_POST['comment']),
               'userid' => $userid
           ];

           // approve record
           $approve = $this->userModel->approveCompanyProfile($data);

           if($approve) {
               echo '1';
           }else{ 
               echo '0';
           }

       }

   }
   // end of function 

    // function to load manager CRM preview data
        public function loadCustomerLoanProfileDetails($loanid) {

            try {
                
                    //prepered statement
                    $this->db->query("SELECT L.LOAN_STATUS, L.LOAN_ID, L.LOAN_NUMBER, C.FIRST_NAME, C.LAST_NAME, C.PHONE_NUMBER, C.EMAIL_ADDRESS, 
                    L.LOAN_AMOUNT, L.LOAN_TENOR, L.LOAN_PURPOSE, L.MONTHLY_REPAYMENT, L.TOTAL_REPAYMENT, L.INTEREST_RATE,
                    (SELECT P.COMPANY_NAME FROM LAM_COMPANY_PROFILE P WHERE P.PROFILE_ID = E.EMPLOYER_ID)EMPLOYER_NAME, L.DATE_CREATED, L.CREATED_BY,
                       A.BANK_NAME, A.ACCOUNT_NUMBER 
                    FROM LAM_CUSTOMER_LOAN_REQUEST L LEFT JOIN LAM_CUSTOMER C ON L.CUSTOMER_ID = C.CUSTOMER_ID LEFT JOIN LAM_CUSTOMER_EMPLOYERS E 
                    ON L.CUSTOMER_ID = E.CUSTOMER_ID 
                    LEFT JOIN LAM_CUSTOMER_BANK_ACCOUNTS A ON L.ACCOUNT_DETAILS_ID = A.BANK_ACCOUNT_ID
                    WHERE L.LOAN_ID = :loadid AND A.IS_ACTIVE = 1");
        
                    //Bind values
                    $this->db->bind(':loadid', $loanid);
    
                    $results = $this->db->resultSet();
    
    
                    return $results;
                
                    }catch (PDOException $e) {
                            echo 'ERROR!';
                            print_r( $e );
                    }
     }
    // end of function     

    // function to load manager CRM preview data
    public function loadCustomerLoanRequest($loanid) {

        try {
            
                //prepered statement
                $this->db->query("SELECT L.LOAN_STATUS, L.LOAN_ID, L.LOAN_NUMBER, C.FIRST_NAME, C.LAST_NAME, L.LOAN_AMOUNT, L.LOAN_TENOR, L.LOAN_PURPOSE, 
                (SELECT P.COMPANY_NAME FROM LAM_COMPANY_PROFILE P WHERE P.PROFILE_ID = E.EMPLOYER_ID)EMPLOYER_NAME, L.DATE_CREATED
                FROM LAM_CUSTOMER_LOAN_REQUEST L LEFT JOIN LAM_CUSTOMER C ON L.CUSTOMER_ID = C.CUSTOMER_ID LEFT JOIN LAM_CUSTOMER_EMPLOYERS E 
                ON L.CUSTOMER_ID = E.CUSTOMER_ID WHERE L.LOAN_ID = 'b5ef3f44-18b8-4562-a154-a007e5048c49';");
    
                //Bind values
                $this->db->bind(':loadid', $loanid);

                $results = $this->db->resultSet();


                return $results;
            
                }catch (PDOException $e) {
                        echo 'ERROR!';
                        print_r( $e );
                }
            }
         // end of function

    }
