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
    $view->getEnvironment()->addFilter(new Twig_SimpleFilter('asset', function ($file) {
        return '/view/assets/'.$file;
    }));
    $view->getEnvironment()->addFilter(new Twig_SimpleFilter('is_required', function ($fields) {               
        $fields = explode('|', $fields);
        $required = [];

        foreach ($fields as $field) {
            $required = (isset($required[$field])) ? isset($required[$field]) : false;
        }

        if (isset($required['required'][0]) && $required['required'][0] === true) return '<span class="required">*</span>';
    }));
    $view->getEnvironment()->addFilter(new Twig_SimpleFilter('disable', function ($status) {               
        if ($status) return 'disabled';
    }));

    return $view;
};