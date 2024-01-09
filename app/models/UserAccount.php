
<?php
class UserAccount {

    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function getCustomerID(){
        return $guid = bin2hex(openssl_random_pseudo_bytes(16));
    } 


    // function to create user role
    public function createUserRole($data) {
        
        try{
            
            $this->db->query("INSERT INTO LAM_ROLES (ROLE_ID, ROLE_NAME, ROLE_DESCRIPTION, DATE_CREATED, CREATED_BY, IP_ADDRESS)
                            VALUES(:roleid, :roleName, :roleDesc, :dateCreated, :createdBy, :ipaddress)");
    
            $date =  date('Y-m-d H:i:s');
            $roleid = $this->getCustomerID();
    
            //Bind values
            $this->db->bind(':roleid', $roleid);
            $this->db->bind(':roleName', $data['roleName']);
            $this->db->bind(':roleDesc', $data['roleDesc']);
            $this->db->bind(':dateCreated', $date);
            $this->db->bind(':createdBy', $data['userid']);
            $this->db->bind(':ipaddress', $data['remoteIP']);
    
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

    // function to registry user
    public function register($data) {

        try{
            
        $this->db->query("INSERT INTO LAM_ENTRY (ENTRY_ID, USERNAME, FIRST_NAME, LAST_NAME, MOBILE_PHONE, EMAIL_ADDRESS, ROLE_ID, CREATED_BY, IP_ADDRESS) 
                        VALUES (:accountid, :username, :fname, :lname, :mobile, :email, :roleid, :dateCreated, :ipaddress) ");

        $date =  date('Y-m-d H:i:s');
        $accountid = $this->getCustomerID();
        
        //Bind values
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':fname', $data['firstname']);
        $this->db->bind(':lname', $data['lastname']);
        $this->db->bind(':mobile', $data['mobile']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':roleid', $data['roleid']);
        $this->db->bind(':ipaddress', $data['remoteIP']);
        $this->db->bind(':dateCreated', $date);
        $this->db->bind(':accountid', $accountid);
        

        //Execute function
        if ($this->db->execute()) {

            //generate password
            $this->setupPassword($accountid, $data['password']);

            $fullname = $data['firstname'].' '.$data['lastname'];
            $newpass = $data['password'];
            $email = $data['email'];
            $username = $data['username'];

            //send notification
           // sendRegistrationNotification($fullname, '123456', $email, $username);

        return true;
        } else {
        return false;
        }

        }catch(PDOException $e){
            echo 'ERROR!';
            print_r( $e );
        }
    }

    public function setupPassword($customerid, $password) {

        try{
            
        $this->db->query("INSERT INTO LAM_ACCESS (ACCESS_ID, ENTRY_ID, ACCESS_CODE, DATE_CREATED) 
                        VALUES(:accessid, :customerid, :accessid, :dateCreated)");

        $date =  date('Y-m-d H:i:s');
        $accessid = $this->getCustomerID();

        //Bind values
        $this->db->bind(':accessid', $accessid);
        $this->db->bind(':customerid', $customerid);
        $this->db->bind(':accessid', $password);
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

    public function login($username, $password, $ipaddr) {

        $this->db->query('SELECT ENTRY_ID, USERNAME, FIRST_NAME, LAST_NAME, MOBILE_PHONE, EMAIL_ADDRESS, 
                          FIRST_LOGIN_DATE FROM LAM_ENTRY 
                          WHERE STATUS = 0 AND USERNAME = :username');

        //Bind value
        $this->db->bind(':username', $username);

        $rowData = $this->db->single();

        $accountid = $rowData->ENTRY_ID;
        $email = $rowData->EMAIL_ADDRESS;
        $firstLogin = $rowData->FIRST_LOGIN_DATE;  

        //get password
        $this->db->query('SELECT ACCESS_CODE FROM LAM_ACCESS 
                        WHERE STATUS = 0 AND ENTRY_ID = :accountid');

        //Bind value
        $this->db->bind(':accountid', $accountid);

        $row = $this->db->single();

        $hashedPassword = $row->ACCESS_CODE;

        if (password_verify($password, $hashedPassword)) {

            $this->ActivateUserLogin($accountid, $firstLogin, $ipaddr);

            return $rowData;
            
        } else {
            return false;
        }
     }

    //update user login details
    public function ActivateUserLogin($accountid, $firstLogin, $ipaddr){
        
        if($firstLogin == ''){
            $sql = "UPDATE LAM_ENTRY SET FIRST_LOGIN_DATE = :logindate, LAST_LOGIN_DATE = :logindate, IP_ADDRESS = :ipaddress, IS_LOGGED = 1 WHERE ENTRY_ID = :accountid";
        }else{
            $sql = "UPDATE LAM_ENTRY SET LAST_LOGIN_DATE = :logindate, IP_ADDRESS = :ipaddress, IS_LOGGED = 1 WHERE ENTRY_ID = :accountid";
        }

        //update access login
        $this->db->query($sql);

        $date =  date('Y-m-d H:i:s');

        //Bind values
        $this->db->bind(':accountid', $accountid);
        $this->db->bind(':logindate', $date);
        $this->db->bind(':ipaddress', $ipaddr);
        
        //Execute function
        $this->db->execute();
    }



}
?>