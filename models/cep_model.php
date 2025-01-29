<?php
    require_once'configs/connect.php';


    Class cepModel {
        public static function insertCEP($cep, $dados)
        {
            $db = new Connection();
            $sql = "INSERT INTO ceps (cep, rua, bairro) VALUES ('$cep', '{$dados['logradouro']}', '{$dados['bairro']}')";
            $db->query($sql);

            return $db->affected_rows > 0;
        } 
    }