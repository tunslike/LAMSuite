<?php
class Pages extends Controller {
    
    public function __construct() {
        $this->userModel = $this->model('UserAccount');
    }

    public function forgotPassword() {

        $data = [
            'title' => 'Home page'
        ];

        $this->view('forgotPassword', $data);
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

    public function index() {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

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

                    $data['fieldError'] = 'Password or username is incorrect. Please try again.';
                    $data['loginStat'] = 'false';
                    $this->view('index', $data);
                }

                exit();

            }else {

                $this->view('index', $data);
            }
        }

        $data = [
            'title' => 'Home page'
        ];

        $this->view('index', $data);
    }
}
