<?php
// Register component on container
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig('view/template', [
        'cache' => false//'view/cache'
    ]);
    
    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    $view->getEnvironment()->addFilter(new Twig_SimpleFilter('env', 'env'));

    return $view;
};