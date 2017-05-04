<?php 

$url = (isset($_GET['url'])) ? $_GET['url'] : 'index/index';

$url = explode('/', $url);

//print_r($url);
$controller = (isset($url[0])) ? $url[0].'_controller' : 'index_controller';
$method = ($url[1] != null) ? $url[1] : 'index';
$params = (isset($url[2]) && $url[2] != null) ? $url[2] : null;

//print_r($controller.' '. $method.' '. $params);

$path = './controllers/'.$controller.'.php';

if(file_exists($path))
{
    require_once($path);
    $controller = new $controller();
    if(method_exists($controller, $method))
    {
        if($params != null)
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
