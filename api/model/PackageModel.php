<?php

namespace SearchEngine\api\Model;

use Formation\MVC\SubjectInterface;
use Formation\MVC\AbstractSubject;

class PackageModel extends AbstractSubject 
implements SubjectInterface, PackageModelInterface
{
    public 
        $distribuable,
        $testable,
        $langage,
        $vendor,
        $repository,
        $package,
        $description,
        $keywords,
        $type,
        $homepage,
        $dependencies,
        $devDependencies,
        $version,
        $license,
        $name,
        $author;

    public function __construct()
    {
        parent::__construct();
        $this->name = "";
        $this->distribuable = false;
        $this->testable = false;
        $this->langage = "";
        $this->vendor = "";
        $this->repository = "";
        $this->package = "";
        $this->description = "";
        $this->keywords = [];
        $this->type = "library";
        $this->homepage = "";
        $this->dependencies = [];
        $this->devDependencies = [];
        $this->version = [];
        $this->license = "";
        $this->author = "";
    }   
    private function consume($url, $ping = false)
    {
        $filename = __DIR__ . "/cache/" .md5($url);
//         if (file_exists($filename)) {
//             $ouput = file_get_contents($filename);
//         } else {
            $code = "404";
            $ouput = @file_get_contents($url);
            
            if(isset($http_response_header)) {        
                $tab = explode(" ", $http_response_header[0]);        
                $code = $tab[1];        
            }
            if ($code === "200") {
                file_put_contents($filename, $ping ? $url : $ouput);
            } else {
                $ping = false;
            }
            
//         }
        return $ping ? $ping : json_decode($ouput);
    }

    /**
     * jsonLoader
     * 
     * @return boolean
     */
    private function jsonLoader() 
    {
        $url= "https://raw.githubusercontent.com/"
            . $this->package . "/master/package.json";     
            $obj = $this->consume($url);
        if ($obj) {
            
            $this->npm();
            $this->consumeTravis();
            $this->langage = "js";
            /*Verifier si u attribut existe sans notice ou warning*/
            $this->description = isset($obj->description) ? $obj->description : "";
            $this->keywords = isset($obj->keywords) ? $obj->keywords : [];
            $this->license = isset($obj->license) ? $obj->license : "";
            $this->name = isset($obj->name) ? $obj->name : "";
            $this->dependencies= isset($obj->dependencies) ? $obj->dependencies: [];
            $this->devDependencies= isset($obj->devDependencies) ? $obj->devDependencies: [];
            $this->author = isset($obj->author) ? $obj->author: "";
            if (isset($obj->version)) {
                $this->version[] = $obj->version;
            }
            return true;
        }
        return false;
    }
    private function jsonComposer() 
    {
        $url= "https://raw.githubusercontent.com/"
            . $this->package . "/master/composer.json";
            $obj = $this->consume($url);
//             var_dump($obj);
            if ($obj) {
                $this->packagist();
            $this->langage = "php";
            $this->description = isset($obj->description) ? $obj->description : "";
            $this->keywords = isset($obj->keywords) ? $obj->keywords : "";
            $this->license = isset($obj->license) ? $obj->license : "";
            $this->name = isset($obj->name) ? $obj->name : "";
            $this->dependencies= isset($obj->require) ? $obj->require: [];
            $this->devDependencies= isset($obj->{"require-dev"}) ? $obj->{"require-dev"}: [];
            if (isset($obj->version)) {
                $this->version[] = $obj->version;
            }
            if (isset($obj->authors)
             && is_array($obj->authors)
             && array_key_exists(0, $obj->authors)
             && isset($obj->authors[0]->name)) {
                 $this->author = ($obj->authors[0]->name);
            }
            $this->packagist();
            $this->consumeTravis();
            return true;
        }
        return false;
    }    
    private function packagist() 
    {
//         https://packagist.org/packages/seeren/view.json
        $url= "https://packagist.org/packages/"
        . $this->package . ".json";
        $obj = $this->consume($url, true);
        if ($obj === true) {
            $this->distribuable = true;
            return true;
        } 
        return false;
    }
    private function npm()
    {
//         https://www.npmjs.com//packages/seeren/view.json
        $url= "https:///www.npmjs.com/packages/"
            . $this->name;
            $obj = $this->consume($url, true);
            if ($obj === true) {
                $this->distribuable = true;
                return true;
            }
            return false;
    }
    private function consumeTravis ()
    {
        ($this->consume(
            "https://raw.githubusercontent.com/"
            . $this->package . "/master/.travis.yml", true));
        
        $this->testable = (bool) $this->consume(
            "https://raw.githubusercontent.com/"
             . $this->package . "/master/.travis.yml", true);
    }
    public function get()
    {
        if (!$this->jsonLoader()
         && !$this->jsonComposer()) {
        throw new \RuntimeException();
        
            }
    }
}