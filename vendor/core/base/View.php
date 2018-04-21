<?php

namespace vendor\core\base;

class View
{
    //current route
    private $route = [];
    //current view
    private $view;
    //current layout
    private $layout;
    //
    public $scripts = [];
    //
    public static $meta = ['title' => '', 'desc' => '', 'keywords' => ''];

    function __construct($route, $layout = '', $view = '') {
        $this->route = $route;
        if($layout === false) {
            $this->layout = false;
        } else {
            $this->layout = $layout ?: LAYOUT;
        }
        $this->view = $view;
    }

    function render($vars) {
        if(is_array($vars)){
            extract($vars);
        }
        $file_view = APP . "/views/{$this->route['controller']}/{$this->view}.php";
        ob_start();
        if(is_file($file_view)){
            require $file_view;
        } else {
            echo "<p>Not found view file <b>{$file_view}</b></p>";
        }
        $content = ob_get_clean();

        if(false !== $this->layout) {
            $file_layout = APP . "/views/layouts/{$this->layout}.php";
            if(is_file($file_layout)) {
                $content = $this->getScripts($content);
                $scripts = [];
                if(!empty($this->scripts[0])){
                    $scripts = $this->scripts[0];
                }
                require $file_layout;
            } else {
                echo "<p>Not found layout file <b>{$file_layout}</b></p>";
            }
        }
    }

    protected function getScripts($content) {
        $pattern = "#<script.*?>.*?</script>#si";
        preg_match_all($pattern, $content, $this->scripts);
        if(!empty($this->scripts)){
            $content = preg_replace($pattern, '', $content);
        }
        return $content;
    }

    static function getMeta() {
        echo '<title>' . self::$meta['title'] . '</title>' .
             '<meta name="description" content="' . self::$meta['desc'] . '" />' .
             '<meta name="keywords" content="' . self::$meta['keywords'] . '" />';
    }

    static function setMeta($title = '', $desc = '', $keywords = '') {
        self::$meta['title'] = $title;
        self::$meta['desc'] = $desc;
        self::$meta['keywords'] = $keywords;
    }
}