<?php

namespace SearchEngine\api\View;

use Formation\MVC\ObserverInterface;
use Formation\MVC\SubjectInterface;

class PackageView implements ObserverInterface, ViewInterface
{
    public $template;
    
    public function __construct()
    {
        $this->template = "{}";
    }
    /**
     *
     * {@inheritDoc}
     * @see \Formation\MVC\ObserverInterface::update()
     */
    public function update(SubjectInterface $subject)
    {
        $this->template = json_encode($subject, JSON_PRETTY_PRINT);
    }
    public function render()
    {
        return $this->template;
    }
}
