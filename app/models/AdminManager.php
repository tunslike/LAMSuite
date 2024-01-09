<?php
    class AdminManager {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getUniqueID(){
            return $guid = bin2hex(openssl_random_pseudo_bytes(16));
        } 


        // function to load super users
        public function loadWorkflowSetups() {
            
                try {
    
                    //Prepared statement
                    $this->db->query("SELECT WORKFLOW_TYPE, 
                    (SELECT CONCAT_WS(' ', FIRST_NAME,LAST_NAME) FROM LAM_ENTRY E WHERE E.ENTRY_ID = W.APPROVAL_ONE)APPROVAL_ONE, 
                    (SELECT CONCAT_WS(' ', FIRST_NAME,LAST_NAME) FROM LAM_ENTRY E WHERE E.ENTRY_ID = W.APPROVAL_TWO)APPROVAL_TWO, DATE_CREATED, 
                    (SELECT CONCAT_WS(' ', FIRST_NAME,LAST_NAME) FROM LAM_ENTRY E WHERE E.ENTRY_ID = W.CREATED_BY)CREATED_BY, 
                    STATUS FROM LAM_WORKFLOW_SETUP W WHERE W.STATUS = 1;");
            
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
                                  WHERE ROLE_ID IN (SELECT ROLE_ID FROM LAM_ROLES WHERE ROLE_ID = '6d4f062779be27f4d75e1fc421067b7d');");
        
                $results = $this->db->resultSet();
        
                return $results;

            }catch (PDOException $e) {

                echo 'ERROR!';
                print_r( $e );
            }
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

                    $this->db->query("INSERT INTO LAM_WORKFLOW_SETUP (WORKFLOW_ID, WORKFLOW_TYPE, APPROVAL_ONE, APPROVAL_TWO, DATE_CREATED, CREATED_BY, IP_ADDRESS) 
                    VALUES(:workflwid, :workflowType, :approvalOne, :approvalTwo, :dateCreated, :createdBy, :ipaddress)");

                    $date =  date('Y-m-d H:i:s');
                    $workflwid = $this->getUniqueID();
        
                    //Bind values
                    $this->db->bind(':workflwid', $workflwid);
                    $this->db->bind(':workflowType', $data['fundtype']);
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

                    $this->db->query("UPDATE LAM_WORKFLOW_SETUP SET VIEWS = :viewCount WHERE EVENT_ID = :eventid");
        
                    //Bind values
                    $this->db->bind(':viewCount', $viewCount);
                    $this->db->bind(':eventid', $eventid);
                
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
}

?>