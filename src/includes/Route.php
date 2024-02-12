<?php

namespace Src\Includes;

class Route
{
    public string  $method;
    public string $path;
    public string $controller;
    public $action;
    public $params = [];

    public function __construct(
        string $method,
        string $path, 
        string $controller, 
        string $action)
    {
        $this->method = $method;
        $this->path = $path;
        $this->controller = $controller;
        $this->action = $action;
    }

    public function simpleRoute($pathURI, $requestURI): bool
    {
        if ($pathURI === $requestURI) {
            return true;
        }
       
        if (strpos($requestURI, $pathURI) === 0 && $pathURI !== "/") {
            $this->params[] = substr($requestURI, strlen($pathURI));
            
            return true;
        }

        return false;
    }

    public function queryRoute($pathURI, $requestURI): bool
    {
        $parsedUrl = parse_url($requestURI);
        $actionPath = $parsedUrl['path'];

        if (isset($parsedUrl['query']) && $actionPath === $pathURI) {
            parse_str($parsedUrl['query'], $params);
            $this->setParams($params);

            return true;
        }

        return false;
    }

    public function setParams($params): void
    {
        $this->params = $params;
    }

    public function getParams(): array
    {
        return $this->params;
    }
}