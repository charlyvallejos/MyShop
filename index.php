<?php 
require_once('./config.php');
$url = (isset($_GET['url'])) ? $_GET['url'] : 'Index/index';

$url = explode('/', $url);

//print_r($url);
$controller = (isset($url[0])) ? $url[0].'_controller' : 'Index_controller';
$method = ($url[1] != null) ? $url[1] : 'index';
$params = (isset($url[2]) && $url[2] != null) ? $url[2] : null;

spl_autoload_register(function($class){
    if(file_exists(LIBS.$class.'.php')){
        require_once(LIBS.$class.'.php');
    } else if(file_exists(MODELS.$class.'.php')){
        require_once(MODELS.$class.'.php');
    } else if(file_exists(BS.$class.'.php')){
        require_once(BS.$class.'.php');
    } else {
        exit("La clase $class no ha sido definida");
    }
});

//print_r($params);

$path = './controllers/'.$controller.'.php';

if(file_exists($path))
{
    require_once($path);
    $controller = new $controller();
    if(method_exists($controller, $method))
    {
        if(!empty($params))
            $controller->{$method}($params);
        else
            $controller->{$method}();
    }
    else
    {
        exit('Invalid method');
    }
}
else
{
    exit('Invalid controller');
}
?>
