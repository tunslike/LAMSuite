<?php
class CustomerManager {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getUniqueID(){
            return $guid = bin2hex(openssl_random_pseudo_bytes(16));
        } 

        function generateCustomerNo($value){
            return str_pad($value, '6', '0', STR_PAD_LEFT);
        }

        function generateAccountNo($value){
            return str_pad($value, '6', '0', STR_PAD_LEFT);
        }
    
        //public funnction to create states
        public function createState($state, $user) {

            try {

                 // Prepared Statement
            $this->db->query("INSERT INTO LAM_STATES (STATE_ID, STATE_NAME, DATE_CREATED, CREATED_BY) VALUES  
            (:stateid, :stateName, :dateCreated, :createdBy)");
    
            $date =  date('Y-m-d H:i:s');
            $hashid = $this->getUniqueID();
            
            //Bind values
            $this->db->bind(':stateid', $hashid);
            $this->db->bind(':stateName', $state);
            $this->db->bind(':createdBy', $user);
            $this->db->bind(':dateCreated', $date);
        
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
        //end of function

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


           // function to create customer employer data
           public function createCustomerNOK($data, $custid) {

            try{

            // Prepared Statement
            $this->db->query("INSERT INTO LAM_NEXT_OF_KIN (CUSTOMER_ID, NOK_LAST_NAME, 
            NOK_FIRST_NAME, NOK_RELATIONSHIP, NOK_GENDER, NOK_PHONE, NOK_EMAIL_ADDRESS, NOK_ADDRESS, 
            NOK_AREA_LOCALITY, NOK_STATE, NOK_DATE_CREATED, NOK_CREATED_BY, NOK_IP_ADDRESS) VALUES  
            (:custid, :nok_lastname, :nok_firstname, :nok_rel, :nok_gender, :nok_phone,
            :nok_email, :nok_addr, :nok_area, :nok_state, :dateCreated, :createdBy, :ipaddress)");
    
            $date =  date('Y-m-d H:i:s');
            
            //Bind values
            $this->db->bind(':custid', $custid);
            $this->db->bind(':nok_lastname', $data['nokLastName']);
            $this->db->bind(':nok_firstname', $data['nokfirstName']);
            $this->db->bind(':nok_rel', $data['nok_Rel']);
            $this->db->bind(':nok_gender', $data['nok_gender']);
            $this->db->bind(':nok_phone', $data['nok_phone']);
            $this->db->bind(':nok_email', $data['nok_email']);
            $this->db->bind(':nok_addr', $data['nok_address']);
            $this->db->bind(':nok_area', $data['nokArea']);
            $this->db->bind(':nok_state', $data['nok_state']);
            $this->db->bind(':createdBy', $data['userid']);
            $this->db->bind(':ipaddress', $data['remoteIP']);
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


           // function to create customer employer data
           public function createCustomerEmployer($data, $custid) {

            try{

            // Prepared Statement
            $this->db->query("INSERT INTO LAM_CUSTOMER_EMPLOYERS (CUSTOMER_ID, EMPLOYER_NAME, 
            OFFICE_ADDRESS, AREA_LOCALITY, EMPLOYER_STATE, SECTOR, GRADE_LEVEL, DATE_CREATED, 
            CREATED_BY, IP_ADDRESS) VALUES  (:custid, :empName, :offAddr, :areaLoc, 
            :state, :sector, :gradeLevel, :dateCreated, :createdBy, :ipaddress)");
    
            $date =  date('Y-m-d H:i:s');
            
            //Bind values
            $this->db->bind(':custid', $custid);
            $this->db->bind(':empName', $data['employerName']);
            $this->db->bind(':offAddr', $data['officeAddress']);
            $this->db->bind(':areaLoc', $data['employerArea']);
            $this->db->bind(':state', $data['employerState']);
            $this->db->bind(':sector', $data['sector']);
            $this->db->bind(':gradeLevel', $data['gradeLevel']);
            $this->db->bind(':createdBy', $data['userid']);
            $this->db->bind(':ipaddress', $data['remoteIP']);
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

        // function to create new customer
        public function createNewCustomer($data) {

            try{

            // Prepared Statement
            $this->db->query("SELECT COUNT(*)COUNT FROM LAM_CUSTOMER WHERE STATUS = 0");

            $row = $this->db->single();

            $count = $row->COUNT;            
                
            $this->db->query("INSERT INTO LAM_CUSTOMER (CUSTOMER_ID, CUSTOMER_NO, SCHEME_TYPE, ACCOUNT_NO, KYC_STATUS, LAST_NAME, 
            FIRST_NAME, OTHER_NAME, DATE_OF_BIRTH, GENDER, PLACE_OF_BIRTH, PHONE_NUMBER, EMAIL_ADDRESS, 
            STATE_OF_ORIGIN, NATIONALITY, ADDRESS, AREA_LOCALITY, STATE, DATE_CREATED, CREATED_BY, 
            IP_ADDRESS) VALUES (:custid, :custNo, :acctType, :kycStatus, :lastName, :firstName, :otherName,
            :dob, :gender, :placeBirth, :phoneNumber, :emailAddress, :stateOrigin, :nationality, :addr, 
            :areaLocality, :stateName, :dateCreated, :createdBy, :ipaddress)");
    
            $date =  date('Y-m-d H:i:s');
            $hashid = $this->getUniqueID();
            $custNo = date('ynj').$this->generateCustomerNo($count + 1);
            
            //Bind values
            $this->db->bind(':custid', $hashid);
            $this->db->bind(':custNo', $custNo);
            $this->db->bind(':acctType', $data['accttype']);
            $this->db->bind(':kycStatus', $data['kycStatus']);
            $this->db->bind(':lastName', $data['lastname']);
            $this->db->bind(':firstName', $data['firstname']);
            $this->db->bind(':otherName', $data['othername']);
            $this->db->bind(':dob', $data['dob']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':placeBirth', $data['placebirth']);
            $this->db->bind(':phoneNumber', $data['phonenumber']);
            $this->db->bind(':emailAddress', $data['emailaddress']);
            $this->db->bind(':stateOrigin', $data['stateorigin']);
            $this->db->bind(':nationality', $data['nationality']);
            $this->db->bind(':areaLocality', $data['areaLocality']);
            $this->db->bind(':addr', $data['houseAddress']);
            $this->db->bind(':stateName', $data['state']);
            $this->db->bind(':createdBy', $data['userid']);
            $this->db->bind(':ipaddress', $data['remoteIP']);
            $this->db->bind(':dateCreated', $date);
    
            //Execute function
            if ($this->db->execute()) {

                //insert employer details
                $this->createCustomerEmployer($data, $hashid);

                //insert nok
                $this->createCustomerNOK($data, $hashid);

                return true;
            } else {
                return false;
            }
    
            }catch(PDOException $e){
                echo 'ERROR!';
                print_r( $e );
            }
        }// end of function

        // function to approve customer record
        public function approveCustomerRecord($data) {

            try {

                 // Prepared Statement
                $this->db->query("SELECT COUNT(*)COUNT FROM LAM_CUSTOMER WHERE ACCOUNT_NO 
                IS NOT NULL AND STATUS = 0");

                $row = $this->db->single();

                $count = $row->COUNT;   
                
                $this->db->query("UPDATE LAM_CUSTOMER SET ACCOUNT_NO = :acctNo, 
                DATE_APPORVED = :dateApproved, APPROVED_BY = :approvedBy, 
                COMMENT = :comment, STATUS = 1 
                WHERE CUSTOMER_ID = :customerid;");

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
            public function fetchCustomerDataApproval($customerid) {

                try {
        
                    //prepered statement
                    $this->db->query("SELECT C.*, E.*, N.* FROM LAM_CUSTOMER C 
                    LEFT JOIN LAM_CUSTOMER_EMPLOYERS E ON C.CUSTOMER_ID = E.CUSTOMER_ID
                    LEFT JOIN LAM_NEXT_OF_KIN N ON C.CUSTOMER_ID = N.CUSTOMER_ID
                    WHERE C.CUSTOMER_ID = :customerid;");

                    //Bind values
                    $this->db->bind(':customerid', $customerid);
                
                    $results = $this->db->resultSet();
                            
                    return $results;
        
                }catch (PDOException $e) {
                    echo 'ERROR!';
                    print_r( $e );
                }
            }
            // end of function


            // function to load manager CRM preview data
            public function loadCRMDataForApproval() {

                try {
        
                    //prepered statement
                    $this->db->query("SELECT C.STATUS, C.CUSTOMER_ID, C.ACCOUNT_NO,
                    C.CUSTOMER_NO, C.ACCOUNT_TYPE, C.LAST_NAME, C.FIRST_NAME, C.KYC_STATUS, 
                    C.PHONE_NUMBER, C.GENDER,C.DATE_OF_BIRTH, E.EMPLOYER_NAME, C.DATE_CREATED FROM LAM_CUSTOMER C 
                    LEFT JOIN LAM_CUSTOMER_EMPLOYERS E ON C.CUSTOMER_ID = E.CUSTOMER_ID WHERE 
                    C.STATUS = 0;");
                
                    $results = $this->db->resultSet();
                            
                    return $results;
        
                }catch (PDOException $e) {
                    echo 'ERROR!';
                    print_r( $e );
                }
        }
                // end of function

        // function to load manager CRM preview data
        public function loadManageCRMData() {

        try {

            //prepered statement
            $this->db->query("SELECT C.STATUS, C.CUSTOMER_ID, C.ACCOUNT_NO, C.CUSTOMER_NO, C.SCHEME_TYPE, C.LAST_NAME, C.FIRST_NAME, C.KYC_STATUS, 
                              C.PHONE_NUMBER, C.GENDER,C.DATE_OF_BIRTH, C.DATE_CREATED, 
                              (SELECT P.COMPANY_NAME FROM LAM_CUSTOMER_EMPLOYERS E LEFT JOIN LAM_COMPANY_PROFILE P ON E.EMPLOYER_ID = P.PROFILE_ID WHERE 
                              E.CUSTOMER_ID = C.CUSTOMER_ID)EMPLOYER_NAME FROM LAM_CUSTOMER C WHERE C.STATUS IN (0,1,2);");
        
            $results = $this->db->resultSet();
                    
            return $results;

        }catch (PDOException $e) {
            echo 'ERROR!';
            print_r( $e );
        }
        }
        // end of function

           //function to get validation data and pull customer name
           public function loadCustomerPersonalRecord($customer_id) {

            try {

                $this->db->query("SELECT * FROM LAM_CUSTOMER WHERE CUSTOMER_ID = :customer_id");

                //Bind values
                $this->db->bind(':customer_id', $customer_id);
            
                $row = $this->db->single();

                return $row;

            }catch (PDOException $e) {
                echo 'ERROR!';
                print_r( $e );
            }
        }
        //end of function

             //function to get validation data and pull customer name
             public function loadCustomerEmployerRecord($customer_id) {

                try {
    
                    $this->db->query("SELECT P.COMPANY_NAME, E.SECTOR, E.GRADE_LEVEL, E.SERVICE_LENGTH, 
                                    E.STAFF_ID_NUMBER, E.SALARY_PAYMENT_DATE, E.ANNUAL_SALARY FROM LAM_CUSTOMER_EMPLOYERS E 
                                    LEFT JOIN LAM_COMPANY_PROFILE P ON E.EMPLOYER_ID = P.PROFILE_ID WHERE E.CUSTOMER_ID = :customer_id;");
    
                    //Bind values
                    $this->db->bind(':customer_id', $customer_id);
                
                    $row = $this->db->single();
    
                    return $row;
    
                }catch (PDOException $e) {
                    echo 'ERROR!';
                    print_r( $e );
                }
            }
            //end of function

        
        //function to get validation data and pull customer name
        public function loadCustomerNOKRecord($customer_id) {

                try {
    
                    $this->db->query("SELECT * FROM LAM_NEXT_OF_KIN WHERE CUSTOMER_ID = :customer_id;");
    
                    //Bind values
                    $this->db->bind(':customer_id', $customer_id);
                
                    $row = $this->db->single();
    
                    return $row;
    
                }catch (PDOException $e) {
                    echo 'ERROR!';
                    print_r( $e );
                }
            }
            //end of function

        
               //function to get validation data and pull customer name
        public function checkCustomerLoanCard($customer_id) {

            try {

                $this->db->query("SELECT * FROM LAM_CUSTOMER_LOAN_REQUEST WHERE CUSTOMER_ID = :customer_id;");

                //Bind values
                $this->db->bind(':customer_id', $customer_id);
            
                $row = $this->db->single();

                return $row;

            }catch (PDOException $e) {
                echo 'ERROR!';
                print_r( $e );
            }
        }
        //end of function

        // function to load manager CRM preview data
        public function loadCustomerChannelData() {

                try {
        
                    //prepered statement
                    $this->db->query("SELECT E.CUSTOMER_ENTRY_ID, E.ACCOUNT_TYPE, E.FULL_NAME, 
                                      E.PHONE_NUMBER, E.EMAIL_ADDRESS, P.COMPANY_NAME,E.DATE_CREATED, E.STATUS FROM 
                                      LAM_CUSTOMER_ENTRY E LEFT JOIN LAM_COMPANY_PROFILE P ON E.EMPLOYER_PROFILE_ID = 
                                      P.PROFILE_ID WHERE E.STATUS IN (0,1)");
                
                    $results = $this->db->resultSet();
                            
                    return $results;
        
                }catch (PDOException $e) {
                    echo 'ERROR!';
                    print_r( $e );
                }
        }
        // end of function
        

        // function to check that customer exists
        public function checkCustomerExists($data) {

            try {

                $this->db->query("SELECT COUNT(*)COUNT FROM LAM_CUSTOMER WHERE 
                LAST_NAME = :lastName AND FIRST_NAME = :firstName AND 
                PHONE_NUMBER = :mobile");

                //Bind values
                $this->db->bind(':lastName', $data['lastname']);
                $this->db->bind(':firstName', $data['firstname']);
                $this->db->bind(':mobile', $data['phonenumber']);
            
                $row = $this->db->single();

                if($row->COUNT > 0) {
                    return true;
                }else {
                    return false;
                }

            }catch (PDOException $e) {
                echo 'ERROR!';
                print_r( $e );
            }
        }

}
