<?php

function dispatch($routing, $action_url)
{
    $controller = $routing[$action_url];
    $model = [];
    $view = $controller($model);
    build_response($view, $model);
}

function build_response($view, $model){
    if (strpos($view, "redirect:") === 0) {
        $url = substr($view, strlen("redirect:"));
        header("Location: " . $url);
        exit;

    } else {
        render($view, $model);
    }
}

function render($view, $model)
{
    global $routing;
    extract($model);
    require_once 'views/layout/header_nav.phtml';
    include 'views/' . $view . '.phtml';
}