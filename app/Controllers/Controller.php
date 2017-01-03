<?php
namespace App\Controllers;

use Interop\Container\ContainerInterface;

class Controller {
    protected $ci;
    
    public function __construct(ContainerInterface $ci) {
        $this->ci = $ci;
    }

    /**
     * Load View
     * @param  \Psr\Http\Message\ResponseInterface $response
     * @param  string $file     use dot notation (eg. path.to.file will load path/to/file.phtml)
     * @param  array  $args 
     * @return void
     */
    public function view($response, $file, $args = [])
    {
        $file = str_replace('.', '/', $file);
        $this->ci->view->render($response, $file.'.html', $args);
    }
}