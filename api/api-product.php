<?php 
    require "../dao/pdo.php";
    require "../dao/sanpham.php";

    header('Access-Control-Allow-Origin: *'); header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, PATCH, DELETE'); header('Access-Control-Allow-Headers: Content-Type') ;
    $data = json_decode(urldecode(file_get_contents('php://input')));

    if (!empty($data->action) && $data->action == 'get-product') {
        
        header('Content-Type: application/json; charset=utf-8');

        try {
            $data = getListProduct();

            if (!empty($data)) {
                echo json_encode([
                    'data' => $data,
                    'code' => 200,
                    'message' => 'Get list successfully'
                ]);
                exit();
            }
    
            echo json_encode([
                'data' => false,
                'code' => 100,
                'message' => 'Get list product error'
            ]);
            exit();
        } catch (\Exception $error) {
            echo json_encode([
                'data' => false,
                'code' => 100,
                'message' => 'Get list product error'
            ]);
            exit();
        }
    }
?>