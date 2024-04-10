<?php

class Dashboard extends Controller {

    public function __construct(){

        error_reporting(E_ALL);
        ini_set('display_errors', 'On');

        $this->userModel = $this->model('AdminManager');
    }


    //public function to show company profile list
    public function systemWorkflow() {

        if(isLoggedIn()){
                
            $userid = $_SESSION['user_id'];
            
        }else{

            header("Location: " . URLROOT . "?isLogged=0");
        }

        // company profile
        $profiles = $this->userModel->loadCompanyProfile('approval');

        // page data
        $data = [
                'title' => 'Company Profile',
                'active' => 'systemWorkflow',
                'parent' => 'workflow',
                'profiles' => $profiles
        ];
    
        $this->view('workflow/systemWorkflow', $data);
    }
    //end of function

       // function to approve customer record
       public function approveCompanyProfile() {

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

    //function to load customer profile data
    public function companyProfileForApproval () {
        
        // check isLogged
        if(isLoggedIn()){
           
            $userid = $_SESSION['user_id'];
            
        }else{   
 
            header("Location: " . URLROOT . "?isLogged=0");
        }

        //check post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
            $profileid = trim($_POST['profileid']);
            
            $result = $this->userModel->loadCompanyProfileApproval($profileid);
        }

        //response*********************************************
        echo json_encode($result);

    }
    //end of function

           // function to create role
           public function manageUsers() {

            if(isLoggedIn()){
            
                $userid = $_SESSION['user_id'];
                
            }else{
    
                header("Location: " . URLROOT . "home?isLogged=0");
            }
    
          
            $userList = $this->userModel->loadActiveUser();
    
            $data = [
                'event' => '',
                'title' => 'Manage Users',
                'active' => 'manageUser',
                'parent' => 'user',
                'users' => $userList
            ];
    
            $this->view('user/manageUsers', $data);
    
        }


    //public function to show company profile list
    public function companyProfileList() {

        if(isLoggedIn()){
                
            $userid = $_SESSION['user_id'];
            
        }else{

            header("Location: " . URLROOT . "?isLogged=0");
        }

        // company profile
        $profiles = $this->userModel->loadCompanyProfile('list');

        // page data
        $data = [
                'title' => 'Company Profile',
                'active' => 'companyprofile',
                'parent' => 'admin',
                'profiles' => $profiles
        ];
    
        $this->view('setup/companyProfileList', $data);
    }
    //end of function

//function to show company profile
public function companyProfile () {

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

                'employerName' => trim($_POST['employerName']),
                'empAddress' => trim($_POST['empAddress']),
                'employerArea' => trim($_POST['employerArea']),
                'employerState' => trim($_POST['employerState']),
                'clientFullname' => trim($_POST['clientFullname']),
                'phonenumber' => trim($_POST['phonenumber']),
                'emailaddress' => trim($_POST['emailaddress']),
                'no_staff' => trim($_POST['no_staff']),
                'loan_percent' => trim($_POST['loan_percent']),
                'loanInterest' => trim($_POST['loanInterest']),
                'loanTenor' => trim($_POST['loanTenor']),
                'repayStructure' => trim($_POST['repayStructure']),
                'userid' => $userid,
                'fieldError' => '',
                'remoteIP' => $this->getRealIPAddr(),
                'active' => 'home',
            ];

            //validate error and post 
            if ($data['fieldError'] == '') {

                //
                $create = $this->userModel->createCompanyProfile($data);
                
                if($create) {

                        // page data
                        $data = [
                            'title' => 'Company Profile',
                            'active' => 'companyprofile',
                            'parent' => 'admin',
                            'states' => $states,
                            'status' => 'true',
                        ];

                        $this->view('setup/companyProfile', $data);

                }else{

                       // page data
                       $data = [
                        'title' => 'Company Profile',
                        'active' => 'companyprofile',
                        'parent' => 'admin',
                        'states' => $states,
                        'status' => 'true',
                    ];

                    $this->view('setup/companyProfile', $data);

                }
            }
     }

        // page data
        $data = [
            'title' => 'Company Profile',
            'active' => 'companyprofile',
            'parent' => 'admin',
            'states' => $states
        ];

    $this->view('setup/companyProfile', $data);

}
//end of function
     // ************** HOME DASHBOARD ******************* //
     public function workflowSetup() {

        if(isLoggedIn()){
            
            $userid = $_SESSION['user_id'];
            
        }else{

            header("Location: " . URLROOT . "?isLogged=0");
        }

        //Check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [

                'fundtype' => trim($_POST['fundtype']),
                'policyType' => trim($_POST['policyType']),
                'apprv1' => trim($_POST['apprv1']),
                'apprv2' => trim($_POST['apprv2']),
                'userid' => $userid,
                'fieldError' => '',
                'remoteIP' => $this->getRealIPAddr(),
                'active' => 'home',
            ];

            //validate error and post 
            if ($data['fieldError'] == '') {

                //
                $create = $this->userModel->updateWorkflowApproval($data);

                if($create) {
                   
                     //LOAD USERS FOR WORKFLOW SETUP
                        $superUsers = $this->userModel->loadSuperUsers();

                        //load workflow setup 
                        $loadApprovals = $this->userModel->loadWorkflowSetups();

                        // page data
                        $data = [
                            'title' => 'Workflow Setup',
                            'active' => 'workflow',
                            'parent' => 'admin',
                            'users' => $superUsers,
                            'approvals' => $loadApprovals,
                            'status' => 'true',
                        ];

                        $this->view('setup/workflowSetup', $data);
                }else{

                }
            }
        }

        //LOAD USERS FOR WORKFLOW SETUP
        $superUsers = $this->userModel->loadSuperUsers();

        //load workflow setup 
        $loadApprovals = $this->userModel->loadWorkflowSetups();

        // page data
        $data = [
            'title' => 'Workflow Setup',
            'active' => 'workflow',
            'parent' => 'admin',
            'users' => $superUsers,
            'approvals' => $loadApprovals,
        ];

        $this->view('setup/workflowSetup', $data);
    }

    // ************* END OF FUNCTION ****************** //

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

    // ************** HOME DASHBOARD ******************* //
    public function home() {

        if(isLoggedIn()){
            
            $customerid = $_SESSION['user_id'];
            
        }else{

            header("Location: " . URLROOT . "?isLogged=0");
        }

        $data = [
            'title' => 'Dashboard Page'
        ];

        $this->view('dashboard/dashboard', $data);
    }
    // ************* END OF FUNCTION ****************** //

    // ************** HOME DASHBOARD ******************* //
        public function loan() {

            if(isLoggedIn()){
                
                $customerid = $_SESSION['user_id'];
                
            }else{
    
                header("Location: " . URLROOT . "?isLogged=0");
            }

            //load customer loan request
            $loanRequest = $this->userModel->loadCustomerLoanRequest();
    
            $data = [
                'title' => 'Loan Dashboard Page',
                'loanRequests' => $loanRequest,
            ];
    
            $this->view('dashboard/dashboard_loan', $data);
        }
    // ************* END OF FUNCTION ****************** //

}

?>