<?php

$request = $_SERVER['REQUEST_URI'];

$base_path = str_replace('/index.php', '', $_SERVER['PHP_SELF']);
$request = str_replace($base_path, '', $request);

$params = explode('/', $request);

$controller = isset($params[1]) && $params[1] != '' ? $params[1] : 'home';
$action = isset($params[2]) && $params[2] != '' ? $params[2] : 'index';
$id = isset($params[3]) && $params[3] != '' ? $params[3] : null;

$controllerName = ucfirst($controller) . 'Controller.php';
$controllerPath = 'controllers/' . $controllerName;


if (file_exists($controllerPath)) {
    require_once($controllerPath);

    $controllerClass = ucfirst($controller) . 'Controller';
    $controllerInstance = new $controllerClass();

    if (method_exists($controllerInstance, $action)) {
        if ($id !== null) {
            $controllerInstance->$action($id);
        } else {
            $controllerInstance->$action();
        }
    } else {
        echo "Ação não encontrada.";
    }
} else {
    echo "Controlador não encontrado.";
}
