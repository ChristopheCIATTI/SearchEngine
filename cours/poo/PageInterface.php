<?php

namespace Formation\Poo;

interface PageInterface
{
    /**
     * 
     * @param string $rel
     * @param string $href
     * @param unknown $key
     */
    public function setLink(string $rel, string $href, $key = null);
    /**
     * 
     * @param int $key
     */
    public function getLink(int $key);
    /**
     * 
     * @param string $src
     * @param string $type
     * @param unknown $key
     */
    public function setScript(string $src, string $type, $key = null);
    /**
     * 
     * @param int $key
     */
    public function getScript(int $key);
    /**
     * 
     * @param string $id
     * @param string $theme
     * 
     */
    public function __toString();  
}
