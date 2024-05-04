<?php

namespace View;

class View{
    public function __construct(public $path){}
    
    public function renderHtml(string $templateName, $vars = []){
        extract($vars);
        require($this->path.$templateName);
    }
}