<?php
namespace Formation\Poo;
          
class PageHTML extends AbstractPage implements PageInterface
{

    public static $foo = "foo";
    
    
    /**
     * @var string doctype
     */    
    protected $doctype;

    protected $page;

    /**
     * Constructor
     * return nulll
     */
    public function __construct()
    {
        
        parent::__construct();
        $this->doctype = "<!DOCTYPE html>";
        $this->page = [];
        var_dump(static::$foo);
    }

    public function __destruct()
    {}

    /**
     *
     * @param string $name
     *            return mixed attribute value or null
     */
   

    public function setLink(string $rel, string $href, $key = null)
    {
        $link = "<link rel=\"" . $rel . "\" href=\"" . $href . "\"/>";
        if (null !== $key) {
            $this->link[$key] = $link;
        } else {
            $this->link[] = $link;
        }
        // Ajoute un element au tableau
        // var_dump($this->link);
    }

    public function getLink(int $key)
    {
        return array_key_exists($key, $this->link) ? $this->link[$key] : null;
    }

    public function setScript(string $src, string $type, $key = null)
    {
        $script = "<script type=\"" . $type . "\" src=\"" . $src . "\"></script>";
        if (null !== $key) {
            $this->script[$key] = $script;
        } else {
            $this->script[] = $script;
        }
        // var_dump($this->script);
    }

    public function getScript(int $key)
    {
        return array_key_exists($key, $this->link) ? $this->script[$key] : null;
    }

    

    public function setJQueryPage(string $id, string $theme = "b")
    {
        $page = "<div data-role=\"page\" id=\"" . $id . "\" data-theme=\"" . $theme . "\">\n";
        $page .= "\t\t\t" . "<div data-role=\"header\">\n";
        $page .= "\t\t\t\t" . "<a href=\"#qux\" data-role=\"button\">&#9776;</a>\n";
        $page .= "\t\t\t\t" . "<h1>PHP</h1>\n";
        $page .= "\t\t\t\t" . "<a href=\"https://github.com/jeancia\">\n";
        $page .= "\t\t\t\t\t" . "<img src=\"https://img.shields.io/github/stars/badges/shields.svg?style=social&label=Star\"/>\n" . "\t\t\t\t" . "</a>\n" . "\t\t\t</div>\n" . "\t\t</div>";
        $this->page[] = $page;
    }

    public function __toString()
    {
        $page = $this->doctype;
        $page .= "\n" . "<html>" . "\n";
        $page .= "\t" . "<head>" . "\n";
        
        $page .= "\t\t" . "<meta charset=\"utf-8\">" . "\n";
        $page .= "\t\t" . "<title>" . $this->title . "</title>" . "\n";
        
        foreach ($this->link as $value) {
            $page .= "\t\t" . $value . "\n";
        }
        foreach ($this->script as $value) {
            $page .= "\t\t" . $value . "\n";
        }
        
        $page .= "\t" . "</head>" . "\n";
        $page .= "\t" . "<body>" . "\n";
        
        foreach ($this->page as $value) {
            $page .= "\t\t" . $value . "\n";
        }
        
        $page .= "\t" . "</body>" . "\n";
        $page .= "</html>" . "\n";
        return $page;
    }
}
