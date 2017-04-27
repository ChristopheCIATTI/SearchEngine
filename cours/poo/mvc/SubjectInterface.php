<?php

namespace Formation\MVC;

interface SubjectInterface
{
    /**
     * Register observer
     * Add an observer for notification 
     * 
     * @param ObserverInterface $observer
     */
    public function register(ObserverInterface $observer);
    
    /**
     * Unregister observer
     * Remove an observer of notification 
     * 
     * @param ObserverInterface $observer
     */
    public function unregister(ObserverInterface $observer);
    
    /**
     * Notify observer
     * update observer collection
     */
    public function notify();
}
