<?php

class Account extends Controller {

    public function __construct(){

        error_reporting(E_ALL);
        ini_set('display_errors', 'On');

        $this->userModel = $this->model('UserAccount');
    }


    // function to create role
    public function createUserRole() {


        $data = [
            'roleName' => 'Supervisor',
            'roleDesc' => "Super User Operation and features functionalities",
            'userid' => "System",
            'remoteIP' => $this->getRealIPAddr(),
            'status' => 'false'
        ];

        $create = $this->userModel->createUserRole($data);

        if($create) {
            echo 'Role has been created successfully!';
        }else {
            echo 'Unable to create role';
        }

    }

    // function to create user
    public function createUser() {

        if($_SERVER['REQUEST_METHOD'] == 'GET') {

            /*
            $data = [
                'firstname' => trim($_POST['fname']),
                'lastname' => trim($_POST['lname']),
                'email' => trim($_POST['email']),
                'mobile' => trim($_POST['phone']),
                'state' => trim($_POST['state']),
                'password' => '',
                'errorMessage' => '',
                'remoteIP' => $this->getRealIPAddr(),
                'status' => 'false'
            ]; */

            $data = [
                'username' => 'dele@finserve.com',
                'firstname' => "Dele",
                'lastname' => "Balogun",
                'email' => "dele@finserve.com",
                'mobile' => "0910330093",
                'password' => '',
                'roleid' => '6d4f062779be27f4d75e1fc421067b7d',
                'errorMessage' => '',
                'remoteIP' => $this->getRealIPAddr(),
                'status' => 'false'
            ];

      
           // Hash password
           $data['password'] = password_hash('1234567', PASSWORD_DEFAULT);

           //Register user from model function
           if ($this->userModel->register($data)) { 

               $data['status'] = 'true';

               //Redirect to the login page
               $this->view('account/register', $data);

           } else {

               die('Something went wrong.');
           }

        }

        $data = [
            'event' => '',
            'title' => 'Create a New Account',
            'errorMessage' => '',
            'status' => '',
            'active' => 'home',
        ];


        $this->view('account/register', $data);
    }

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

    public function createUserSession($user) {

        //set session values
        $_SESSION['user_id'] = $user->ENTRY_ID;
        $_SESSION['username'] = $user->USERNAME;
        $_SESSION['firstname'] = $user->FIRST_NAME;
        $_SESSION['mobile'] = $user->MOBILE_PHONE;
        $_SESSION['email'] = $user->EMAIL_ADDRESS;

        //redirect to home page
        header('location:' . URLROOT . '/dashboard/home');

    }

    public function authenticateUser() {

        //Check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['entry']),
                'fieldError' => '',
                'remoteIP' => $this->getRealIPAddr(),
                'active' => 'home',
            ];

            //Validate username
            if (empty($data['username'])) {
                $data['fieldError'] = 'Username or password cannot be empty!';
            }

            //Validate username
            if (empty($data['entry'])) {
                $data['fieldError'] = 'Username or password cannot be empty!';
            }

            //Check if all errors are empty
            if ($data['fieldError'] != '') {

                $loggedInUser = $this->userModel->login($data['username'], $data['password'], $data['remoteIP']);

                if ($loggedInUser) {

                    $this->createUserSession($loggedInUser);

                } else {

                    $data['passwordError'] = 'Password or username is incorrect. Please try again.';
                    $this->view('index', $data);
                }

                exit();

            }else {

                $this->view('index', $data);
            }

        }

        $data = [
            'event' => '',
            'title' => 'Account Login',
            'active' => 'home',
        ];

        $this->view('index', $data);
        
    }

}

?>