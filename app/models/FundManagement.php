<?php
    class FundManagement {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getUniqueID(){
            return $guid = bin2hex(openssl_random_pseudo_bytes(16));
        } 

        public function countFundType($type) {

            try {

                $this->db->query("SELECT COUNT(*)COUNT FROM LAM_FUNDS WHERE FUND_TYPE = :fundType;");

                //Bind values
                $this->db->bind(':fundType', $type);
            
                $row = $this->db->single();
            
                return $row->COUNT;

            }catch (PDOException $e) {
                echo 'ERROR!';
                print_r( $e );
            }
        }

        public function checkFundExists($fundname, $fundtype) {

            try {

                $this->db->query("SELECT COUNT(*)COUNT FROM LAM_FUNDS WHERE FUND_NAME = :fundname AND FUND_TYPE = :fundType;");

                //Bind values
                $this->db->bind(':fundname', $fundname);
                $this->db->bind(':fundType', $fundtype);
            
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


        public function loadManagedFund() {

                //Prepared statement
                $this->db->query("SELECT * FROM LAM_FUNDS WHERE STATUS IN (0,1,2) ORDER BY DATE_CREATED DESC");
        
                $results = $this->db->resultSet();
        
                return $results;
        }

        public function loadPendingFundsApproval($userid) {

             //Prepared statement
             $this->db->query("SELECT * FROM LAM_FUNDS WHERE STATUS IN (0,1,2) ORDER BY DATE_CREATED DESC");
        
             $results = $this->db->resultSet();
     
             return $results;

        }
    
        public function createNewFund($data, $fundNo) {

            try{
                
            $this->db->query("INSERT INTO LAM_FUNDS (FUND_ID, FUND_NUMBER, FUND_NAME, FUND_TYPE, FUND_BUDGET, SUBSCRIBER_COUNT, DATE_CREATED, CREATED_BY, IP_ADDRESS) 
                                               VALUES(:fundid, :fundNumber, :fundname, :fundtype, :fundBudget, :subscriberNo, :dateCreated, :createdBy, :ipaddress)");
    
            $date =  date('Y-m-d H:i:s');
            $hashid = $this->getUniqueID();
        
            //Bind values
            $this->db->bind(':fundid', $hashid);
            $this->db->bind(':fundNumber', $fundNo);
            $this->db->bind(':fundname', $data['fundname']);
            $this->db->bind(':fundtype', $data['fundtype']);
            $this->db->bind(':fundBudget', $data['fundBudget']);
            $this->db->bind(':subscriberNo', $data['fundSubcriber']);
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
    
    }
