<?php

class Customer extends Controller {

    public function __construct(){

        error_reporting(E_ALL);
        ini_set('display_errors', 'On');

        $this->userModel = $this->model('CustomerManager');
    }

    // function to create an account type
    public function newAccount () {
     
          // check isLogged
          if(isLoggedIn()){
            
            $customerid = $_SESSION['user_id'];
            
        }else{

            header("Location: " . URLROOT . "?isLogged=0");
        }

        // data
        $data = [
            'title' => 'Create New Customer',
            'active' => 'newAccount',
            'parent' => 'account'
        ];

        $this->view('customer/newAccount', $data);
        
    }


    // function to create an account type
    public function createState () {

        $state = trim($_GET['state']);

        $create = $this->userModel->createState($state,'System');

        if($create) {
            echo 'State created successfully!';
        }else{
            echo 'State failed creating state';
        }
  }

    //function to create new customer
    public function newCustomer() {

        // check isLogged
        if(isLoggedIn()){
            
            $userid = $_SESSION['user_id'];
            
        }else{

            header("Location: " . URLROOT . "?isLogged=0");
        }

        //fetch states
        $states = $this->userModel->fetchStates();


        //Check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //data
            $data = [
                'accttype' => trim($_POST['accttype']),
                'kycStatus' => trim($_POST['kycStatus']),
                'lastname' => trim($_POST['lastname']),
                'firstname' => trim($_POST['firstname']),
                'othername' => trim($_POST['othernamme']),
                'gender' => trim($_POST['gender']),
                'dob' => trim($_POST['dob']),
                'placebirth' => trim($_POST['placebirth']),
                'phonenumber' => trim($_POST['phonenumber']),
                'emailaddress' => trim($_POST['emailaddress']),
                'stateorigin' => trim($_POST['stateorigin']),
                'nationality' => trim($_POST['nationality']),
                'houseAddress' => trim($_POST['houseAddress']),
                'areaLocality' => trim($_POST['areaLocality']),
                'state' => trim($_POST['state']),
                'employerName' => trim($_POST['employerName']),
                'officeAddress' => trim($_POST['officeAddress']),
                'employerArea' => trim($_POST['employerArea']),
                'employerState' => trim($_POST['employerState']),
                'sector' => trim($_POST['sector']),
                'gradeLevel' => trim($_POST['gradeLevel']),
                'nokLastName' => trim($_POST['nokLastName']),
                'nokfirstName' => trim($_POST['nokfirstName']),
                'nok_Rel' => trim($_POST['nok_Rel']),
                'nok_gender' => trim($_POST['nok_gender']),
                'nok_phone' => trim($_POST['nok_phone']),
                'nok_email' => trim($_POST['nok_email']),
                'nok_address' => trim($_POST['nok_address']),
                'nokArea' => trim($_POST['nokArea']),
                'nok_state' => trim($_POST['nok_state']),
                'userid' => $userid,
                'fieldError' => '',
                'remoteIP' => $this->getRealIPAddr(),
                'active' => 'home',
            ];

            //Check if all errors are empty
            if ($data['fieldError'] == '') {

                $check = $this->userModel->checkCustomerExists($data);

                //check if not customer exists
                if($check) {

                     // data
                    $data = [
                        'title' => 'Create New Customer',
                        'active' => 'customer',
                        'parent' => 'crm',
                        'fieldError' => 'Customer details already exists!'
                    ];

                    $this->view('customer/newCustomer', $data);

                    exit();
                }

                  //create new customer
                  $customer = $this->userModel->createNewCustomer($data);

                  if($customer) {

                        // data
                        $data = [
                            'title' => 'Create New Customer',
                            'active' => 'customer',
                            'parent' => 'crm',
                            'states' => $states,
                            'status' => 'true'
                        ];

                        $this->view('customer/newCustomer', $data);

                        exit();

                  }else{
                    
                     // data
                     $data = [
                        'title' => 'Create New Customer',
                        'active' => 'customer',
                        'parent' => 'crm',
                        'states' => $states,
                        'fieldError' => 'Unable to process your request, Please retry!'
                    ];

                    $this->view('customer/newCustomer', $data);

                    exit();
                  }

            }

        }

        // data
        $data = [
            'title' => 'Create New Customer',
            'active' => 'customer',
            'parent' => 'crm',
            'states' => $states,
        ];

        $this->view('customer/newCustomer', $data);

    }
    //end of function

    //function to manage customer CRM
    public function manageCRM () {

         // check isLogged
         if(isLoggedIn()){
            
            $userid = $_SESSION['user_id'];
            
        }else{

            header("Location: " . URLROOT . "?isLogged=0");
        }

        //fetch customers
        $customers = $this->userModel->loadManageCRMData();

                // data
                $data = [
                    'title' => 'Manage CRM Customer',
                    'active' => 'manage_crm',
                    'parent' => 'crm',
                    'customers' => $customers
                ];
        
                $this->view('customer/manageCRM', $data);

    }
    //end of function

    // function to approve customer record
    public function approveCustomerRecord() {

         // check isLogged
         if(isLoggedIn()){
           
            $userid = $_SESSION['user_id'];
            
        }else{
 
            header("Location: " . URLROOT . "?isLogged=0");
        }

         //check post
         if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
            
            $data = [
                'customerid' => trim($_POST['customerid']),
                'comment' => trim($_POST['comment']),
                'userid' => $userid
            ];

            // approve record
            $approve = $this->userModel->approveCustomerRecord($data);

            if($approve) {
                echo '1';
            }else{ 
                echo '0';
            }

        }

    }
    // end of function 


    //function to fetch customer data for approval
    public function fetchCustomerDataForApproval() {

        // check isLogged
        if(isLoggedIn()){
           
            $userid = $_SESSION['user_id'];
            
        }else{
 
            header("Location: " . URLROOT . "?isLogged=0");
        }

        //check post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
            $customerid = trim($_POST['customerid']);
            
            $result = $this->userModel->fetchCustomerDataApproval($customerid);
        }

        //response*********************************************
        echo json_encode($result);

    }
    //end of function

     //function to workflow crm
     public function crmWorkflow () {

        // check isLogged
        if(isLoggedIn()){
           
           $userid = $_SESSION['user_id'];
           
       }else{

           header("Location: " . URLROOT . "?isLogged=0");
       }

          //fetch customers
          $customers = $this->userModel->loadCRMDataForApproval();

               // data
               $data = [
                   'title' => 'Manage CRM Customer',
                   'active' => 'crmWorkflow',
                   'parent' => 'workflow',
                   'customers' => $customers,
               ];
       
               $this->view('workflow/crmWorkflow', $data);

   }
   //end of function


     // ******* Get IP Address ***************** //
     public function getRealIPAddr()
     {
     //check ip from share internet
     if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
     {
         $ip = $_SERVER['HTTP_CLIENT_IP'];
     }
     //to check ip is pass from proxy
     elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
     {
         $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
     }
     else
     {
         $ip = $_SERVER['REMOTE_ADDR'];
     }
     return $ip;
 }


}

?>