<?php

namespace Formation\MVC;

abstract class AbstractSubject
{
    /**
     * @var ObserverInterface observer
     */
    protected $observer;
    
    protected function __construct()
    {
        $this->observer = [];
    }
    /**
     * Register observer
     * Add an observer for notification
     *
     * @param ObserverInterface $observer
     */
    public function register(ObserverInterface $observer)
    {
        $this->observer[] = $observer;
    }
    
    /**
     * Unregister observer
     * Remove an observer of notification
     *
     * @param ObserverInterface $observer
     */
    public function unregister(ObserverInterface $observer)
    {
        $key = array_search($observer, $this->observer);
        if (is_int($key)) {
            unset($this->observer[$key]);
        }
    }
    
    /**
     * Notify observer
     * update observer collection
     */
    public function notify()
    {
        foreach ($this->observer as $observer) {
            $observer->update($this);
        }
    }
}
