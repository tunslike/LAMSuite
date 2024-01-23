<?php

class Scheme extends Controller {

    public function __construct(){

        error_reporting(E_ALL);
        ini_set('display_errors', 'On');

        $this->userModel = $this->model('SchemeManagement');
    }


    // ******* New Funds ***************** //
    public function newScheme () {

        if(isLoggedIn()){
            
            $userid = $_SESSION['user_id'];
            
        }else{

            header("Location: " . URLROOT . "?isLogged=0");
        }

        //company profiles
        $profiles = $this->userModel->loadActiveCompanyProfile();

         //Check for post
         if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [

                'fundname' => trim($_POST['fundname']),
                'fundtype' => trim($_POST['fundtype']),
                'fundBudget' => trim($_POST['fundBudget']),
                'fundSubcriber' => trim($_POST['fundSubcriber']),
                'userid' => $userid,
                'fieldError' => '',
                'remoteIP' => $this->getRealIPAddr(),
                'active' => 'home',
                'profiles' => $profiles,
            ];

            //Validate username
            if (empty($data['fundname'])) {
                $data['fieldError'] = 'Please provide a fund name!';
            }

            //Validate username
            if (empty($data['fundtype'])) {
                $data['fieldError'] = 'Please select fund type';
            }

            //Check if all errors are empty
            if ($data['fieldError'] == '') {

                $checkFundExist = $this->userModel->checkFundExists($data['fundname'], $data['fundtype']);

                if(!$checkFundExist) {

                     //get fund number
                        $fundCount = $this->userModel->countFundType($data['fundtype']) + 1;

                        $fundNo = $data['fundtype'].addLeadingZero($fundCount);
                        
                        $createFund = $this->userModel->createNewFund($data, $fundNo);

                        if($createFund) {

                            $data = [
                                'title' => 'Funds Management',
                                'active' => 'newfund',
                                'parent' => 'funds',
                                'status' => 'true',
                                'profiles' => $profiles,
                            ];

                            $this->view('scheme/newScheme', $data);
                        }

                }else {

                    $data = [
                        'title' => 'Funds Management',
                        'active' => 'newfund',
                        'parent' => 'funds',
                        'notFound' => 'exist',
                        'profiles' => $profiles,
                    ];

                    $this->view('scheme/newScheme', $data);

                }

                exit();

            }else {

                $this->view('scheme/newScheme', $data);
                exit();
            }

        }

        $data = [
            'title' => 'Funds Management',
            'active' => 'newfund',
            'parent' => 'funds',
            'profiles' => $profiles,
        ];

        $this->view('scheme/newScheme', $data);
    }

    // ******* Manage Funds ***************** //
    public function workflow () {

        if(isLoggedIn()){
            
            $userid = $_SESSION['user_id'];
            
        }else{

            header("Location: " . URLROOT . "?isLogged=0");
        }

        $funds = $this->userModel->loadPendingFundsApproval($userid);
    
         $data = [
            'title' => 'Manage Funds',
            'active' => 'workflow',
            'parent' => 'fund',
            'funds' => $funds
         ];

        $this->view('workflow/funds', $data);
 }  

    // ******* Manage Funds ***************** //
    public function manageScheme () {

        if(isLoggedIn()){
            
            $userid = $_SESSION['user_id'];
            
        }else{

            header("Location: " . URLROOT . "?isLogged=0");
        }

        $schemes = $this->userModel->loadManagedFund();
    
         $data = [
         'event' => '',
         'title' => 'Manage Funds',
         'active' => 'managefund',
         'parent' => 'funds',
         'schemes' => $schemes
         ];

        $this->view('scheme/manageScheme', $data);
 }  

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