[![Build Status](https://travis-ci.org/jeancia/SearchEngine.svg?branch=master)](https://travis-ci.org/jeancia/SearchEngine)

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/39433365f76148d4890cc61f88497538)](https://www.codacy.com/app/jeancia/SearchEngine?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=jeancia/SearchEngine&amp;utm_campaign=Badge_Grade)

[![DUB](https://img.shields.io/dub/l/vibe-d.svg?style=flat-square)]()

#SearchEngine

SearchEngine is simple search engine for package.json in a github, npm and packagist  
 
 
 #API Demo 
http://ccdu13.alwaysdata.net

#How to use : 

in the address bar writen "yourRepository/"yourpackage"  follow http://ccdu13.alwaysdata.net

exemple for using 
http://ccdu13.alwaysdata.net/"yourRepository/"yourpackage"  

#Code example  

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

#Result example 

distribuable	true
testable	true
langage	"php"
vendor	""
repository	""
package	"jeancia/SearchEngine"
description	""
keywords	""
type	"library"
homepage	""
dependencies	
psr/log	"1.0.2"
phpunit/phpunit	"6.1"
devDependencies	
version	
license	""
name	"administrateur/formation-php"
author	""



#Jeancia author

Jeancia author

#licence

Jeancia MIT

