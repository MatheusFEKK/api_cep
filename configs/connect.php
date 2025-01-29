<?php


    class Connection extends mysqli
    {
        public function __construct()
        {
            parent::__construct('localhost', 'root', '123456', 'cep_database',3316);
            $this->set_charset('utf8');
            if ($this->connect_error)
            {
                die('Occured an error trying to connect with the database'. $this->connect_error);
            }
        }
    }