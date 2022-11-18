<?php 
    require "../dao/pdo.php";
    require "../dao/taikhoan.php";

    header('Access-Control-Allow-Origin: *'); header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, PATCH, DELETE'); header('Access-Control-Allow-Headers: Content-Type') ;
    $data = json_decode(urldecode(file_get_contents('php://input')));
    // var_dump(!empty($data->action) && $data->action == 'login');

    if (!empty($data->action) && $data->action == 'login') {
        // var_dump('here');
        $email = $data->email;
        $password = $data->password;
        // var_dump(login_user($email, $password));
        var_dump(123);
        echo json_encode([
            'data' => login_user($email, $password),
            'code' => 200
        ]);
        exit();
    }
?>