<?php
    class LoanManagement {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

    public function getUniqueID(){
        return $guid = bin2hex(openssl_random_pseudo_bytes(16));
    } 

    // function to load loan profile for approval
    public function loanLoanRequestForApproval() {

        try {
            
                //prepered statement
                $this->db->query("SELECT L.LOAN_ID, C.LAST_NAME, C.FIRST_NAME, L.LOAN_NUMBER FROM LAM_CUSTOMER_LOAN_REQUEST L 
                                  LEFT JOIN LAM_CUSTOMER C ON L.CUSTOMER_ID = C.CUSTOMER_ID WHERE L.LOAN_STATUS = 2");
    

                $results = $this->db->resultSet();

                return $results;
            
                }catch (PDOException $e) {
                        echo 'ERROR!';
                        print_r( $e );
                }
            }
         // end of function

    // function to load loan profile for approval
    public function loadCustomerLoanRepayment($loanid) {

        try {
            
                //prepered statement
                $this->db->query("SELECT * FROM LAM_CUSTOMER_LOAN_REPAYMENT WHERE LOAN_ID = :loanid");

                $this->db->bind(':loanid', $loanid);

                $results = $this->db->resultSet();

                return $results;
            
                }catch (PDOException $e) {
                        echo 'ERROR!';
                        print_r( $e );
                }
            }
         // end of function


    // function to load loan profile for approval
    public function loanLoanRequestForRepayment() {

        try {
            
                //prepered statement
                $this->db->query("SELECT L.LOAN_ID, C.LAST_NAME, C.FIRST_NAME, L.LOAN_NUMBER FROM LAM_CUSTOMER_LOAN_REQUEST L 
                                  LEFT JOIN LAM_CUSTOMER C ON L.CUSTOMER_ID = C.CUSTOMER_ID WHERE L.LOAN_STATUS = 3");
    

                $results = $this->db->resultSet();

                return $results;
            
                }catch (PDOException $e) {
                        echo 'ERROR!';
                        print_r( $e );
                }
            }
         // end of function


          // function to authorize disbursement payment
        public function authorizeCustomerLoanDisbursement($data) {

            try {

                 // Prepared Statement   
                $this->db->query("UPDATE LAM_CUSTOMER_LOAN_REQUEST SET LOAN_STATUS = 3, AMOUNT_DISBURSED = :amountDisbursed,
                                AUTHORISE_DISBURSE_DATE = :disburseDate, AUTHORISE_DISBURSE_BY = :disburseBy, 
                                AUTHORISE_DISBURSE_COMMENT = :disburseCommt, PAYMENT_METHOD = :paymentMethod 
                                WHERE LOAN_ID = :loadid;");

                $date =  date('Y-m-d H:i:s');
            
                //Bind values
                $this->db->bind(':loadid', $data['loadid']);
                $this->db->bind(':amountDisbursed', $data['disAmount']);
                $this->db->bind(':paymentMethod', $data['payMethod']);
                $this->db->bind(':disburseCommt', $data['comment']);
                $this->db->bind(':disburseDate', $date);
                $this->db->bind(':disburseBy', $data['userid']);
            
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


        // function to authorize disbursement payment
           public function postCustomerLoanRepayment($data) {

            try {

                 // Prepared Statement   
                $this->db->query("INSERT INTO LAM_CUSTOMER_LOAN_REPAYMENT (TRANSACTION_NO, REPAYMENT_ID, LOAN_ID, 
                                REPAYMENT_AMOUNT, REPAYMENT_TYPE, NARRATION, REPAYMENT_CHANNEL, 
                                REPAYMENT_DATE, REPAYMENT_BY, POSTED_BY, DATE_POSTED) 
                                VALUES (:trans_no, :repayid, :loanid, :repayAmount, :repayType, :repayNarration, :repayChannel, :repayDate,
                                :repayBy, :postedBy, :datePosted);");

                $date =  date('Y-m-d H:i:s');
                $hashid = $this->getUniqueID();
                $loanNumber = generateCustomerNo();
            
                //Bind values
                $this->db->bind(':trans_no', $loanNumber);
                $this->db->bind(':repayid', $hashid);
                $this->db->bind(':loanid', $data['loanid']);
                $this->db->bind(':repayAmount', $data['repayAmount']);
                $this->db->bind(':repayType', $data['repayType']);
                $this->db->bind(':repayNarration', $data['repayNarration']);
                $this->db->bind(':repayChannel', $data['repayChannel']);
                $this->db->bind(':repayDate', $data['repayDate']);
                $this->db->bind(':repayBy', $data['loanid']);
                $this->db->bind(':datePosted', $date);
                $this->db->bind(':postedBy', $data['userid']);
            
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

              //function to get validation data and pull customer name
              public function loadCustomerAccountDetails($loanid) {
    
                try {
    
                    $this->db->query("SELECT * FROM LAM_CUSTOMER_BANK_ACCOUNTS WHERE 
                    CUSTOMER_ID = (SELECT CUSTOMER_ID FROM LAM_CUSTOMER_LOAN_REQUEST WHERE LOAN_ID = :loanid)");
    
                    //Bind values
                    $this->db->bind(':loanid', $loanid);
                
                    $row = $this->db->single();
    
                    return $row;
    
                }catch (PDOException $e) {
                    echo 'ERROR!';
                    print_r( $e );
                }
            }
            //end of function

            //function to get validation data and pull customer name
            public function fetchTotalRepayment($loanid) {
    
                try {
            
                    $this->db->query("SELECT SUM(REPAYMENT_AMOUNT)TOTAL_REPAYMENT FROM LAM_CUSTOMER_LOAN_REPAYMENT 
                                     WHERE LOAN_ID = :loanid;");
            
                            //Bind values
                            $this->db->bind(':loanid', $loanid);
                        
                            $row = $this->db->single();
            
                            return $row;
            
                    }catch (PDOException $e) {
                            echo 'ERROR!';
                            print_r( $e );
                    }
            }
            //end of function
        
              //function to get validation data and pull customer name
              public function loadEmployerDetailsAuthorization($loanid) {
    
                try {
    
                    $this->db->query("SELECT P.COMPANY_NAME, P.CONTACT_PERSON, L.EMPLOYER_AUTHORISED_BY, L.EMPLOYER_AUTHORISED_DATE FROM LAM_COMPANY_PROFILE P LEFT JOIN LAM_CUSTOMER_EMPLOYERS E ON P.PROFILE_ID = E.EMPLOYER_ID
                    LEFT JOIN LAM_CUSTOMER_LOAN_REQUEST L ON E.CUSTOMER_ID = L.CUSTOMER_ID
                    WHERE L.LOAN_ID = :loanid;");
    
                    //Bind values
                    $this->db->bind(':loanid', $loanid);
                
                    $row = $this->db->single();
    
                    return $row;
    
                }catch (PDOException $e) {
                    echo 'ERROR!';
                    print_r( $e );
                }
            }
            //end of function

        //function to get validation data and pull customer name
        public function validateCustomerVerification($token) {

            try {

                $getUrl = lamSuiteAPIUrl.'verifyCustomerVerification?CipherText='.$token;

                $loan_id = file_get_contents($getUrl);

                $this->db->query("SELECT L.LOAN_ID, E.CUSTOMER_ENTRY_ID, E.FULL_NAME, E.PHONE_NUMBER, 
                                 E.EMAIL_ADDRESS FROM LAM_CUSTOMER_LOAN_REQUEST L LEFT JOIN LAM_CUSTOMER_ENTRY E 
                                 ON L.CUSTOMER_ID = E.CUSTOMER_ENTRY_ID WHERE LOAN_ID = :loanid AND LOAN_STATUS = 0;");

                //Bind values
                $this->db->bind(':loanid', $loan_id);
            
                $row = $this->db->single();

                return $row;

            }catch (PDOException $e) {
                echo 'ERROR!';
                print_r( $e );
            }
        }
        //end of function

        // function to calculate amortized repayment schedule
public function calculateAmortizedRepaymentSchedule($loanAmount, $loanInterest, $tenor) {

    //Loan parameters
    $loanAmount = $loanAmount; // Principal amount
    $annualInterestRate = $loanInterest / 100; // Annual interest rate (2.5%)
    $loanTermInMonths = $tenor; // Loan term in months

    // Calculate monthly interest rate
    $monthlyInterestRate = $annualInterestRate / 12;

    // Calculate number of payments
    $numberOfPayments = $loanTermInMonths;

    // Calculate monthly payment
    $monthlyPayment = ($loanAmount * $monthlyInterestRate) /
        (1 - pow(1 + $monthlyInterestRate, -$numberOfPayments));

    // Print header
    //echo "Monthly Payment: $" . number_format($monthlyPayment, 2) . "\n";
    //echo "Payment #\tPrincipal\tInterest\tBalance\n";

    // Calculate amortization schedule
    $balance = $loanAmount;

    $loan_schedule = array(); 
    $i = 0;

    for ($i = 1; $i <= $numberOfPayments; $i++) {

        $interest = $balance * $monthlyInterestRate;
        $principal = $monthlyPayment - $interest;
        $balance -= $principal;

        $loan_schedule [$i]["Payment"] = $i;
        $loan_schedule [$i]["Repayment"]= number_format(($principal + $interest), 2);
        $loan_schedule [$i]["Principal"]= number_format($principal, 2);
        $loan_schedule [$i]["Interest"]= number_format($interest, 2);
        $loan_schedule [$i]["Balance"]= number_format($balance, 2);

            //echo $i . "\t\t$" . number_format($principal, 2) . "\t\t$" .
            //number_format($interest, 2) . "\t\t$" . number_format($balance, 2) . "\n";
    }

    return $loan_schedule;

}
// end of function

           //function to get validation data and pull customer name
           public function fetchLoanHistory($loanid) {

            try {

                $this->db->query("SELECT LOAN_NUMBER, LOAN_AMOUNT, LOAN_TENOR, LOAN_PURPOSE, LOAN_STATUS, 
                                 TOTAL_REPAYMENT, SUM(R.REPAYMENT_AMOUNT)REPAYMENT_AMOUNT, AUTHORISE_DISBURSE_DATE 
                                 FROM LAM_CUSTOMER_LOAN_REQUEST L LEFT JOIN LAM_CUSTOMER_LOAN_REPAYMENT R ON 
                                 L.LOAN_ID = R.LOAN_ID WHERE L.LOAN_ID = :loanid;");

                //Bind values
                $this->db->bind(':loanid', $loanid);
            
                $results = $this->db->resultSet();
                        
                return $results;

            }catch (PDOException $e) {
                echo 'ERROR!';
                print_r( $e );
            }
        }
        //end of function

           // function to approve customer record
           public function authorizeEmployerVerification($data) {

            try {

                 // Prepared Statement   
                $this->db->query("UPDATE LAM_CUSTOMER_LOAN_REQUEST SET LOAN_STATUS = 2, EMPLOYER_AUTHORISED_BY = :authorizedBy, 
                                EMPLOYER_AUTHORISED_DATE = :authorizedDate WHERE LOAN_ID = :loanid AND CUSTOMER_ID = :customerid");

                $date =  date('Y-m-d H:i:s');
                
                //Bind values
                $this->db->bind(':authorizedBy', $data['authorizedBy']);
                $this->db->bind(':customerid', $data['customerid']);
                $this->db->bind(':authorizedDate', $date);
                $this->db->bind(':loanid', $data['loanid']);
            
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

    // function to load manager CRM preview data
        public function loadCustomerLoanProfileDetails($loanid) {

            try {
                
                    //prepered statement
                    $this->db->query("SELECT L.LOAN_STATUS, L.LOAN_ID, L.LOAN_NUMBER, C.FIRST_NAME, C.LAST_NAME, C.PHONE_NUMBER, C.EMAIL_ADDRESS, 
                    L.LOAN_AMOUNT, L.LOAN_TENOR, L.LOAN_PURPOSE, L.MONTHLY_REPAYMENT, L.TOTAL_REPAYMENT, L.INTEREST_RATE,
                    (SELECT P.COMPANY_NAME FROM LAM_COMPANY_PROFILE P WHERE P.PROFILE_ID = E.EMPLOYER_ID)EMPLOYER_NAME, L.DATE_CREATED, L.CREATED_BY,
                    L.APPROVAL_ONE_BY, L.APPROVAL_ONE_DATE, L.APPROVAL_TWO_BY, APPROVAL_TWO_DATE, A.BANK_NAME, A.ACCOUNT_NUMBER, 
                    (SELECT WORKFLOW_POLICY FROM LAM_WORKFLOW_SETUP WHERE STATUS = 0)APPROVAL_POLICY, A.BANK_NAME, A.ACCOUNT_NUMBER,
                    (SELECT SUM(REPAYMENT_AMOUNT)TOTAL_REPAYMENT FROM LAM_CUSTOMER_LOAN_REPAYMENT WHERE LOAN_ID = L.LOAN_ID)TOTAL_LOAN_REPAYMENT
                    FROM LAM_CUSTOMER_LOAN_REQUEST L LEFT JOIN LAM_CUSTOMER C ON L.CUSTOMER_ID = C.CUSTOMER_ID LEFT JOIN LAM_CUSTOMER_EMPLOYERS E 
                    ON L.CUSTOMER_ID = E.CUSTOMER_ID LEFT JOIN LAM_CUSTOMER_BANK_ACCOUNTS A ON L.ACCOUNT_DETAILS_ID = A.BANK_ACCOUNT_ID
                    WHERE L.LOAN_ID = :loadid");
        
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
                $this->db->query("SELECT L.LOAN_STATUS, L.LOAN_ID, L.LOAN_NUMBER, C.FIRST_NAME, C.LAST_NAME, L.LOAN_AMOUNT, L.MONTHLY_REPAYMENT, 
                L.TOTAL_REPAYMENT, L.LOAN_PURPOSE, L.INTEREST_RATE, L.LOAN_TENOR, L.AUTHORISE_DISBURSE_DATE, 
                (SELECT CONCAT(FIRST_NAME, ' ', LAST_NAME) AS FULL_NAME FROM LAM_ENTRY WHERE ENTRY_ID = L.AUTHORISE_DISBURSE_BY)DISBURSE_BY,
                (SELECT P.COMPANY_NAME FROM LAM_COMPANY_PROFILE P WHERE P.PROFILE_ID = E.EMPLOYER_ID)EMPLOYER_NAME, L.DATE_CREATED, L.CREATED_BY,
                (SELECT SUM(REPAYMENT_AMOUNT)TOTAL_REPAYMENT FROM LAM_CUSTOMER_LOAN_REPAYMENT WHERE LOAN_ID = L.LOAN_ID)TOTAL_LOAN_REPAYMENT
                FROM LAM_CUSTOMER_LOAN_REQUEST L LEFT JOIN LAM_CUSTOMER C ON L.CUSTOMER_ID = C.CUSTOMER_ID LEFT JOIN LAM_CUSTOMER_EMPLOYERS E 
                ON L.CUSTOMER_ID = E.CUSTOMER_ID WHERE L.LOAN_ID = :loadid;");
    
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
