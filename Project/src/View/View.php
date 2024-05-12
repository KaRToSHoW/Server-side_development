<?php

namespace View;

class View{
    public function __construct(public $path){}
    
    public function renderHtml(string $templateName, $vars = [], int $code=200){
        http_response_code($code);
        extract($vars);
        require($this->path.$templateName);
    }
}