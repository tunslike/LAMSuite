<?php
class Pages extends Controller {
    
    public function __construct() {
        //$this->userModel = $this->model('User');
    }

    public function aboutUs() {
        echo 'hello here';
    }

    public function auths() {

        echo 'jdkjdkjd';
        exit();

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
            if ($data['fieldError'] == '') {

                $loggedInUser = $this->userModel->login($data['username'], $data['password'], $data['remoteIP']);

                if ($loggedInUser) {

                    $this->createUserSession($loggedInUser);

                } else {

                    $data['passwordError'] = 'Password or username is incorrect. Please try again.';
                    $this->view('index', $data);
                }

            }else {

                $this->view('index', $data);
            }

        }

        $data = [
            'title' => 'Sign In'
        ];

        $this->view('index', $data);
    }

    public function index() {

        $data = [
            'title' => 'Home page'
        ];

        $this->view('index', $data);
    }
}
