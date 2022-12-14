<?php 
    require "../dao/pdo.php";
    require "../dao/taikhoan.php";

    header('Access-Control-Allow-Origin: *'); header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, PATCH, DELETE'); header('Access-Control-Allow-Headers: Content-Type') ;
    $data = json_decode(urldecode(file_get_contents('php://input')));

    if (!empty($data->action) && $data->action == 'login') {
        $email = $data->email;
        $password = $data->password;
        $data = login_user($email, $password);

        header('Content-Type: application/json; charset=utf-8');
        if ($data) {
            echo json_encode([
                'data' => login_user($email, $password),
                'code' => 200,
                'message' => 'Login successfully'
            ]);
            exit();
        }

        echo json_encode([
            'data' => false,
            'code' => 100,
            'message' => 'Login error, email hoặc password ko chính xác'
        ]);
        exit();
    }

    if (!empty($data->action) && $data->action == 'register') {
        $fullname = !empty($data->fullname) ? $data->fullname : '';
        $email = !empty($data->email) ? $data->email : '';
        $password = !empty($data->password) ? $data->password : '';
        $username = !empty($data->username) ? $data->username : '';

        header('Content-Type: application/json; charset=utf-8');

        $checkAccountExist = checkAccoutnExist($email, $username);
        if ($checkAccountExist) {
            echo json_encode([
                'data' => false,
                'code' => 100,
                'message' => 'Email or Username is used !!!'
            ]);
            die();
        }

        try {
            $data = registerAcount($fullname, $email, $password, $username);
            echo json_encode([
                'data' => $data,
                'code' => 200,
                'message' => 'Register successfully'
            ]);
            exit();
        } catch (\Exception $ex) {
            echo json_encode([
                'data' => false,
                'code' => 100,
                'message' => 'Register fail !!!'
            ]);
            exit();
        }
    }
?>