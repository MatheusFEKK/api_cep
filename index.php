<?php
    require_once'models/cep_api.php';
    require_once'models/cep_model.php';


    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            $cep = $_GET['cepUser'];
            $dados = json_decode(file_get_contents('php://input'));
            if (isset($cep))
            {
                $requestingAPI = ViaCepAPI::getCEP($cep);

                if (!isset($requestingAPI['Error']))
                {
                    cepModel::insertCEP($cep, $requestingAPI);
                }else {
                    echo http_response_code(400);
                    echo json_encode(['Error' => 'CEP não fornecido']);
                }
                echo json_encode(['Success' => 'CEP cadastrado com sucesso']);
            }
            break;
        
        default:
            # code...
            break;
    }

?>