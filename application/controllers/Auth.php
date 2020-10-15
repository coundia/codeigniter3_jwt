<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    /**
     *
     */
    public function login()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method != 'POST') {
            reponse(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {

            $check_auth_client = $this->MyModel->check_auth_client();

            if ($check_auth_client == true) {
                //in func
                $params = file_get_contents("php://input");
                $params = (Object)json_decode($params, true);

                $username = $params->username;
                $password = $params->password;

                $response = $this->MyModel->login($username, $password);

                reponse($response['status'], $response);
            } else {
                reponse(400, array('status' => 400, 'message' => 'Bad auth.'));

            }
        }
    }

    public function logout()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            reponse(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            $check_auth_client = $this->MyModel->check_auth_client();
            if ($check_auth_client == true) {
                $response = $this->MyModel->logout();
                reponse($response['status'], $response);
            }
        }
    }

}
