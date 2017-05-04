<?php

class Index_controller {
    function index($param = null){
        if(empty($param)){
            $param = 'Tu';
        }
        echo 'Hola '.$param.'!';
    }
}

