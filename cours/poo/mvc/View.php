<?php

namespace Formation\MVC;

class View implements ObserverInterface
{
    public $template;
    
    public function __construct()
    {
        $this->template = "";
    }
    /**
     * 
     * {@inheritDoc}
     * @see \Formation\MVC\ObserverInterface::update()
     */
    public function update(subjectInterface $subject)
    {
        $this->template = "<h1>" . $subject->title . "</h1>";
    }
    public function render()
    {
        return $this->template;
    }
}
