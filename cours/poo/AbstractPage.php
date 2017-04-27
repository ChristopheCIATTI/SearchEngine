<?php

namespace Formation\Poo;

abstract class AbstractPage
{   
        protected $title;
        protected $link;
        protected $script;
    
    protected function __construct() 
    {    
        $this->title = "";
        $this->link = [];
        $this->script = [];
        var_dump(static::$foo);
    }

    public function __get(string $name)
    {
        return property_exists($this, $name) ? $this->$name : null;
    }
    public function __set(string $name, $value)
    {}
    
    public function setLink(string $rel, string $href, $key = null)
    {}
    
    public function getLink(int $key)
    {
        return array_key_exists($key, $this->link) ? $this->link[$key] : null;
    }
        public function setScript(string $src, string $type, $key = null)
    {}
    
    public function getScript(int $key)
    {
        return array_key_exists($key, $this->link) ? $this->script[$key] : null;
    }
    public function setTitle(string $name)
    {
        $this->title = $name;
    }
}