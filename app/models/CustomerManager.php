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
    

        // function to fetch states
        public function fetchStates() {

            try {

                //Prepared statement
                $this->db->query("SELECT * FROM LAM_STATE WHERE STATUS = 0");
            
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
            $this->db->query("INSERT INTO LAM_NEXT_OF_KIN (CUSTOMER_ID, LAST_NAME, 
            FIRST_NAME, RELATIONSHIP, GENDER, PHONE, EMAIL_ADDRESS, ADDRESS, 
            AREA_LOCALITY, STATE, DATE_CREATED, CREATED_BY, IP_ADDRESS) VALUES  
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
            OFFICE_ADDRESS, AREA_LOCALITY, STATE, SECTOR, GRADE_LEVEL, DATE_CREATED, 
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
                
            $this->db->query("INSERT INTO LAM_CUSTOMER (CUSTOMER_ID, CUSTOMER_NO, ACCOUNT_TYPE, KYC_STATUS, LAST_NAME, 
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
        }


        // function to load manager CRM preview data
        public function loadManageCRMData() {

        try {

            //prepered statement
            $this->db->query("SELECT C.STATUS, C.CUSTOMER_ID, C.ACCOUNT_NO,
            C.CUSTOMER_NO, C.ACCOUNT_TYPE, C.LAST_NAME, C.FIRST_NAME, C.KYC_STATUS, 
            C.PHONE_NUMBER, C.GENDER,C.DATE_OF_BIRTH, E.EMPLOYER_NAME, C.DATE_CREATED FROM LAM_CUSTOMER C 
            LEFT JOIN LAM_CUSTOMER_EMPLOYERS E ON C.CUSTOMER_ID = E.CUSTOMER_ID WHERE 
            C.STATUS IN (0,1,2);");
        
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
