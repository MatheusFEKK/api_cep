<?php

    Class ViaCepAPI 
    {
        private static $baseURL = "https://viacep.com.br/ws/";


        public static function getCEP($cep)
        {


            $url = self::$baseURL . $cep. '/json/';

            $curl = curl_init($url);

            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_TIMEOUT, 10);

            $response = curl_exec($curl);

            if (curl_errno($curl))
            {
                return ['error' => 'Error trying to acess the API'. curl_error($curl)];
            }
            curl_close($curl);
            
            return json_decode($response, true); 

        }
    }