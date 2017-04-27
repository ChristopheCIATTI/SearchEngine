<?php

namespace Formation\MVC;

class Controller
{
    /**
     * 
     * @var SubjectInterface model
     */
    private $model;
    /**
     * 
     * @var ObserverInterface view
     */
    private $view;
    
    public function __construct(Model $model, View $view)
    {
        $this->model = $model;
        $this->view = $view;
        $this->model->register($this->view);
    }
    public function execute() 
    {
        $this->model->get();
        return $this->view->render();
    }
}
