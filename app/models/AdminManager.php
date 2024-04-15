<?php
    class AdminManager {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getUniqueID(){
            return $guid = bin2hex(openssl_random_pseudo_bytes(16));
        } 


        // function to fetch states
        public function fetchStates() {

                    try {
        
                        //Prepared statement
                        $this->db->query("SELECT * FROM LAM_STATES WHERE STATUS = 0");
                    
                        $results = $this->db->resultSet();
                    
                        return $results;
        
                    }catch(PDOException $e) {
                        echo 'ERROR!';
                        print_r( $e );
                    }
        }
         // end of function

                 // function to load manager CRM preview data
        public function loadCustomerLoanRequest() {

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


    //function to get validation data and pull customer name
    public function loadUserProfile($userid) {
    
        try {
        
                        $this->db->query("SELECT * FROM LAM_ENTRY WHERE ENTRY_ID = :userid;");
        
                        //Bind values
                        $this->db->bind(':userid', $userid);
                    
                        $row = $this->db->single();
        
                        return $row;
        
                    }catch (PDOException $e) {
                        echo 'ERROR!';
                        print_r( $e );
                    }
    }
    //end of function

        // function to approve company profile
        public function approveCompanyProfile ($data) {
            
            try {
        
                $this->db->query("UPDATE LAM_COMPANY_PROFILE SET STATUS = 1, DATE_APPROVED = :dateApprove, 
                                APPROVED_BY = :approveBy, COMMENTS = :comment WHERE PROFILE_ID = :profileid");

                $date =  date('Y-m-d H:i:s');
            
                //Bind values
                $this->db->bind(':comment', $data['comment']);
                $this->db->bind(':approveBy', $data['userid']);
                $this->db->bind(':dateApprove', $date);
                $this->db->bind(':profileid', $data['profileid']);
                
            
                //Execute function
                if ($this->db->execute()) { 
                    return true;
                } else {
                   return false;
                }

            }catch(PDOException $e) {
                echo 'ERROR!';
                print_r( $e );
            }

        }

        // end of function 

        // function to load super users
        public function loadWorkflowSetups() {
            
                try {
    
                    //Prepared statement
                    $this->db->query("SELECT WORKFLOW_TYPE, WORKFLOW_POLICY,
                    (SELECT CONCAT_WS(' ', FIRST_NAME,LAST_NAME) FROM LAM_ENTRY E WHERE E.ENTRY_ID = W.APPROVAL_ONE)APPROVAL_ONE, 
                    (SELECT CONCAT_WS(' ', FIRST_NAME,LAST_NAME) FROM LAM_ENTRY E WHERE E.ENTRY_ID = W.APPROVAL_TWO)APPROVAL_TWO, DATE_CREATED, 
                    (SELECT CONCAT_WS(' ', FIRST_NAME,LAST_NAME) FROM LAM_ENTRY E WHERE E.ENTRY_ID = W.CREATED_BY)CREATED_BY, 
                    STATUS FROM LAM_WORKFLOW_SETUP W WHERE W.STATUS = 0;");
            
                    $results = $this->db->resultSet();
            
                    return $results;
    
                }catch (PDOException $e) {
    
                    echo 'ERROR!';
                    print_r( $e );
                }
        }
        // end of function


        // function to load super users
        public function loadSuperUsers() {

            try {

                //Prepared statement
                $this->db->query("SELECT ENTRY_ID, FIRST_NAME, LAST_NAME FROM LAM_ENTRY 
                                  WHERE ROLE_ID IN (SELECT ROLE_ID FROM LAM_ROLES WHERE ROLE_ID = '9c2d12ab1ea274bf50f45694e9e740f2');");
        
                $results = $this->db->resultSet();
        
                return $results;

            }catch (PDOException $e) {

                echo 'ERROR!';
                print_r( $e );
            }
        }
        // end of function

             //function to load company profile list
             public function loadCompanyProfileApproval ($profileid) {

                try {
    
                    $this->db->query("SELECT P.*, L.*, (P.DATE_CREATED)PROFILE_DATE_CREATED, E.FIRST_NAME, E.LAST_NAME FROM 
                    LAM_COMPANY_PROFILE P LEFT JOIN LAM_ENTRY E ON P.CREATED_BY = E.ENTRY_ID LEFT JOIN LAM_COMPANY_LOAN_SETUP L 
                    ON P.PROFILE_ID = L.COMPANY_PROFILE_ID WHERE P.PROFILE_ID = :profileid AND P.STATUS = 0;");
    
                    //Bind values
                    $this->db->bind(':profileid', $profileid);
            
                    $results = $this->db->resultSet();
            
                    return $results;
    
                }catch (PDOException $e) {
    
                    echo 'ERROR!';
                    print_r( $e );
                }
            }
            //end of function

        //function to load company profile list
        public function loadCompanyProfile ($type) {

            try {

                if($type == 'list') {

                    //Prepared statement
                    $this->db->query("SELECT * FROM LAM_COMPANY_PROFILE;");

                }else if($type == 'approval') {

                    //Prepared statement
                    $this->db->query("SELECT * FROM LAM_COMPANY_PROFILE WHERE STATUS = 0;");

                }else if($type== 'workflow') {

                    $this->db->query("SELECT * FROM LAM_COMPANY_PROFILE WHERE 
                    PROFILE_ID = :profileid AND STATUS = 0;");

                }
        
                $results = $this->db->resultSet();
        
                return $results;

            }catch (PDOException $e) {

                echo 'ERROR!';
                print_r( $e );
            }
        }
        //end of function

         //function to create company loan Setup
         public function createCompanyLoanSetup ($profileid, $data) {
            try{
                
            $this->db->query("INSERT INTO LAM_COMPANY_LOAN_SETUP( COMPANY_PROFILE_ID, NO_OF_STAFF, LOAN_LIMIT_PERCENT, LOAN_INTEREST_RATE, LOAN_TENOR, 
                                                                 REPAYMENT_STRUCTURE, DATE_CREATED, CREATED_BY)
                             VALUES(:profileid, :staffNo, :loanLimit, :loanInterest, :loanTenor, :repayment, :dateCreated, :createdBy)");
    
            $date =  date('Y-m-d H:i:s');
        
            //Bind values
            $this->db->bind(':profileid', $profileid);
            $this->db->bind(':staffNo', $data['no_staff']);
            $this->db->bind(':loanLimit', $data['loan_percent']);
            $this->db->bind(':loanInterest', $data['loanInterest']);
            $this->db->bind(':loanTenor', $data['loanTenor']);
            $this->db->bind(':repayment', $data['repayStructure']);
            $this->db->bind(':createdBy', $data['userid']);
            $this->db->bind(':dateCreated', $date);
    
            //Execute function
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
    
            }catch(PDOException $e){
                echo 'ERROR!';
                print_r( $e );
            }
    }
    //end of function

       //function to create company loan Setup
       public function updateBankAccountDetails($data) {

        try{

             // Prepared Statement
             $this->db->query("SELECT COUNT(*)COUNT FROM LAM_BANK_DETAILS WHERE STATUS = 0;");
         
             $row = $this->db->single();
         
             $count = $row->COUNT;

             if($count == 0) {

                    $this->db->query("INSERT INTO LAM_BANK_DETAILS (BANK_ID, BANK_NAME, ACCOUNT_NUMBER, ACCOUNT_NAME, 
                                      DATE_CREATED, CREATED_BY) VALUES (:bankid, :bankName, :acctNumber, :acctName, 
                                      :dateCreated, :createdBy)");

                    $date =  date('Y-m-d H:i:s');
                    $hashid = $this->getUniqueID();

                    //Bind values
                    $this->db->bind(':bankid', $hashid);
                    $this->db->bind(':bankName', $data['bankName']);
                    $this->db->bind(':acctNumber', $data['acctNumber']);
                    $this->db->bind(':acctName', $data['acctName']);
                    $this->db->bind(':createdBy', $data['userid']);
                    $this->db->bind(':dateCreated', $date);

                    //Execute function
                    if ($this->db->execute()) {
                    return true;
                    } else {
                    return false;
                    }

             }else {

                    $this->db->query("UPDATE LAM_BANK_DETAILS SET BANK_NAME = :bankName, ACCOUNT_NUMBER = :acctNumber, 
                                     ACCOUNT_NAME = :acctName, DATE_UPDATED = :dateUpdated, UPDATED_BY = :updatedBy WHERE STATUS = 0");

                    $date =  date('Y-m-d H:i:s');

                    //Bind values
                    $this->db->bind(':bankName', $data['bankName']);
                    $this->db->bind(':acctNumber', $data['acctNumber']);
                    $this->db->bind(':acctName', $data['acctName']);
                    $this->db->bind(':updatedBy', $data['userid']);
                    $this->db->bind(':dateUpdated', $date);

                    //Execute function
                    if ($this->db->execute()) {
                    return true;
                    } else {
                    return false;
                    }

             }
        

        }catch(PDOException $e){
            echo 'ERROR!';
            print_r( $e );
        }
}
//end of function

        //function to create company profile
        public function createCompanyProfile ($data) {
                try{
                    
                $this->db->query("INSERT INTO LAM_COMPANY_PROFILE (PROFILE_ID, COMPANY_NAME, ADDRESS, AREA_LOCALITY, 
                                                                STATE, CONTACT_PERSON, 
                                                                CONTACT_PHONE_NUMBER, CONTACT_EMAIL, DATE_CREATED, CREATED_BY, 
                                                                IP_ADDRESS) 
                                 VALUES(:profileid, :companyName, :address, :areaLoc, :state, :contactPerson,
                                 :contactPhone, :contactEmail, :dateCreated, :createdBy, :ipaddress)");
        
                $date =  date('Y-m-d H:i:s');
                $hashid = $this->getUniqueID();
            
                //Bind values
                $this->db->bind(':profileid', $hashid);
                $this->db->bind(':companyName', $data['employerName']);
                $this->db->bind(':address', $data['empAddress']);
                $this->db->bind(':areaLoc', $data['employerArea']);
                $this->db->bind(':state', $data['employerState']);
                $this->db->bind(':contactPerson', $data['clientFullname']);
                $this->db->bind(':contactPhone', $data['phonenumber']);
                $this->db->bind(':contactEmail', $data['emailaddress']);
                $this->db->bind(':createdBy', $data['userid']);
                $this->db->bind(':ipaddress', $data['remoteIP']);
                $this->db->bind(':dateCreated', $date);
        
                //Execute function
                if ($this->db->execute()) {

                    $loanSetup = $this->createCompanyLoanSetup($hashid, $data);

                    if($loanSetup) {
                        return true;
                    }
                   
                } else {
                    return false;
                }
        
                }catch(PDOException $e){
                    echo 'ERROR!';
                    print_r( $e );
                }
        }
        //end of function

         //function to load user
         public function loadActiveUser() {

            //Prepared statement
            $this->db->query("SELECT ENTRY_ID, USERNAME, LAST_NAME, FIRST_NAME, MOBILE_PHONE, 
                             EMAIL_ADDRESS, ROLE_ID, DATE_CREATED,CREATED_BY, FIRST_LOGIN_DATE, IS_LOGGED, STATUS FROM LAM_ENTRY;");
    
            $results = $this->db->resultSet();
    
            return $results;
        }

         //function to load user
         public function loadDashboardDetails() {

            //Prepared statement
            $this->db->query("SELECT (SELECT COUNT(*) FROM LAM_CUSTOMER WHERE STATUS IN (0,1))TOTAL_CUSTOMERS, 
                             (SELECT COUNT(*) FROM LAM_CUSTOMER WHERE STATUS IN (0,1))TOTAL_ACCOUNTS, 
                             (SELECT COUNT(*) FROM LAM_CUSTOMER_LOAN_REQUEST WHERE LOAN_STATUS IN (1,2,3))TOTAL_LOAN_ACCOUNTS;");
    
            $results = $this->db->single();
    
            return $results;
        }

        // load customer CRM
        public function loadCustomerCRMDashboard() {

              //Prepared statement
              $this->db->query("SELECT C.CUSTOMER_ID, CUSTOMER_NO, SCHEME_TYPE,ACCOUNT_NO, LAST_NAME, FIRST_NAME, 
                                OTHER_NAME, GENDER, PHONE_NUMBER, EMAIL_ADDRESS, DATE_CREATED, C.STATUS,
                                (SELECT COMPANY_NAME FROM LAM_COMPANY_PROFILE WHERE PROFILE_ID = E.EMPLOYER_ID)EMPLOYER_NAME 
                                FROM LAM_CUSTOMER C LEFT JOIN LAM_CUSTOMER_EMPLOYERS E ON C.CUSTOMER_ID = E.CUSTOMER_ID;");

            $results = $this->db->resultSet();

              return $results;
        }
        // end of customer CRM

        //function to load loan dashboard
        public function loadLoanDashboardDetails () {

             //Prepared statement
             $this->db->query("SELECT (SELECT COUNT(*) FROM LAM_CUSTOMER_LOAN_REQUEST WHERE LOAN_STATUS = 3)ACTIVE_LOANS,
                             (SELECT SUM(AMOUNT_DISBURSED) FROM LAM_CUSTOMER_LOAN_REQUEST WHERE LOAN_STATUS = 3)AMOUNT_DISBURSED,
                             (SELECT SUM(REPAYMENT_AMOUNT) FROM LAM_CUSTOMER_LOAN_REPAYMENT)TOTAL_REPAYMENT;");

            $results = $this->db->single();

            return $results;
        }
        // end of function

        // function to update approval workflow setup 
        public function updateWorkflowApproval($data) {

            try{

                // Prepared Statement
                $this->db->query("SELECT COUNT(*)COUNT FROM LAM_WORKFLOW_SETUP WHERE WORKFLOW_TYPE = :workflowType;");

                //Bind values
                $this->db->bind(':workflowType', $data['fundtype']);
            
                $row = $this->db->single();
            
                $count = $row->COUNT;

                if($count == 0) {


                    $this->db->query("INSERT INTO LAM_WORKFLOW_SETUP (WORKFLOW_ID, WORKFLOW_TYPE, WORKFLOW_POLICY, APPROVAL_ONE, APPROVAL_TWO, DATE_CREATED, CREATED_BY, IP_ADDRESS) 
                    VALUES(:workflwid, :workflowType, :workflowPolicy, :approvalOne, :approvalTwo, :dateCreated, :createdBy, :ipaddress)");

                    $date =  date('Y-m-d H:i:s');
                    $workflwid = $this->getUniqueID();
        
                    //Bind values
                    $this->db->bind(':workflwid', $workflwid);
                    $this->db->bind(':workflowType', $data['fundtype']);
                    $this->db->bind(':workflowPolicy', $data['policyType']);
                    $this->db->bind(':approvalOne', $data['apprv1']);
                    $this->db->bind(':approvalTwo', $data['apprv2']);
                    $this->db->bind(':dateCreated', $date);
                    $this->db->bind(':createdBy', $data['userid']);
                    $this->db->bind(':ipaddress', $data['remoteIP']);
                
                    //Execute function
                    if ($this->db->execute()) { 
                        return true;
                    } else {
                       return false;
                    }

                    exit();

                }else{

                    $this->db->query("UPDATE LAM_WORKFLOW_SETUP SET WORKFLOW_TYPE = :workflowType,  WORKFLOW_POLICY = :workflowPolicy,
                                      APPROVAL_ONE = :approvalOne, APPROVAL_TWO = :approvalTwo, DATE_UPDATED = :dateCreated,  
                                      UPDATED_BY = :createdBy WHERE WORKFLOW_TYPE = :workflowType;");
        
                    //Bind values
                    $this->db->bind(':workflowType', $data['fundtype']);
                    $this->db->bind(':workflowPolicy', $data['policyType']);
                    $this->db->bind(':approvalOne', $data['apprv1']);
                    $this->db->bind(':approvalTwo', $data['apprv2']);
                    $this->db->bind(':dateCreated', $date);
                    $this->db->bind(':createdBy', $data['userid']);
                    $this->db->bind(':ipaddress', $data['remoteIP']);
                
                    //Execute function
                    if ($this->db->execute()) { 
                        return true;
                    } else {
                        return false;
                    }

                }
        
                }catch(PDOException $e){
                    var_dump($e);
                }

        }
}

?>