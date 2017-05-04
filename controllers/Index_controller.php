<?php

class Index_controller extends Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index($param = null){
        if(empty($param)){
            $param = 'Tu';
        }
        echo 'Hola '.$param.'!';
    }
}

