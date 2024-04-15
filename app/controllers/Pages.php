<?php
class Pages extends Controller {
    
    public function __construct() {
        $this->userModel = $this->model('UserAccount');
    }


    public function changePassword() {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            if(!isset($_SESSION['ENTRY_ID_CHANGED'])) {
                header("Location: " . URLROOT . "/signin");
                exit();
            }

            $data = [
                'new_pwd' => trim($_POST['new_access_code']),
                'confirm_pwd' => trim($_POST['confirm_pwd']),
                'entry_id' => $_SESSION['ENTRY_ID_CHANGED'],
            ];

            $data['password'] = password_hash($data['new_pwd'], PASSWORD_DEFAULT);

            $changePwd = $this->userModel->updatePassword($data);

            if($changePwd) {
                
                $_SESSION['pwd_change_status'] = 1;

                header("Location: " . URLROOT . "/signin?response=1");

                exit();
            }

        }

        $data = [
            'title' => 'Change Password',
        ];

        $this->view('changePassword', $data);
    }


    public function forgotPassword() {

        $data = [
            'title' => 'Forget Password'
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
        $_SESSION['role'] = $user->ROLE_ID;
        $_SESSION['last_login_date'] = $user->LAST_LOGIN_DATE;

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

            unset($_SESSION['pwd_change_status']);

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

                if($loggedInUser->IS_PASSWORD_CHANGED == 0) {

                    $_SESSION['ENTRY_ID_CHANGED'] = $loggedInUser->ENTRY_ID;
                    $_SESSION['FIRSTNAME_CHANGED'] = $loggedInUser->FIRST_NAME;

                    header('location:' . URLROOT . '/pages/changePassword');

                    exit();
                }


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
