<?php

namespace SearchEngine\api\Controller;

use SearchEngine\api\Model\PackageModel;
use SearchEngine\api\View\PackageView;

class PackageController implements PackageControllerInterface
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
    
    public function __construct(PackageModel $model, PackageView $view)
     {
         $this->model = $model;
         $this->view = $view;
         $this->model->register($this->view);
     }
    public function execute()
    {
        try {
            $action = strtolower(filter_input(INPUT_SERVER, "REQUEST_METHOD"));
            if (method_exists($this->model, $action)){
                $package = filter_input(INPUT_GET, "package");
                if ($package) {
                    $this->model->package = $package;
                    //$this->model->get;
                    $this->model->{$action}();
                } else {
                     header("HTTP/1.1 412 Precondition Failed");
                }                
            } else {
                header("HTTP/1.1 405 Method Not Allowed");
            }
        } catch (\RuntimeException $e) {
            header("HTTP/1.1 404 No Found");
        } catch (Throwable $e) {
            header("HTTP/1.1 500 Internal server Error");
        }
        $this->view->update($this->model);                                      
        return $this->view->render();
    }
}
