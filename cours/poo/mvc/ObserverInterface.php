<?php

namespace Formation\MVC;

interface ObserverInterface
{
    /**
     * Update
     * Update on subject notification
     * 
     * @param unknown $subject
     */
    public function update(SubjectInterface $subject);
}
