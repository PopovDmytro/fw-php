<?php

namespace vendor\widgets\Menu;

use vendor\libs\Cache;

class Menu
{
    protected $data;
    protected $tree;
    protected $menuHtml;
    protected $tpl;
    protected $container = 'ul';
    protected $class = 'menu';
    protected $table = 'categories';
    protected $cache = 3600;
    protected $cache_key = 'fw_menu';

    function __construct($options) {
        $this->tpl = __DIR__ . '/menu_tpl/menu.php';
        $this->getOptions($options);
        $this->run();
    }

    protected function output() {
        echo "<{$this->container} class=\"" . $this->class . "\" >";
        echo $this->menuHtml;
        echo "</{$this->container}>";
    }

    protected function run() {
        $cache = new Cache();
        $this->menuHtml = $cache->get($this->cache_key);
        if(!$this->menuHtml){
            $this->data = \R::getAssoc("SELECT * FROM {$this->table}");
            $this->tree = $this->getTree();
//        debug($this->tree);.
            $this->menuHtml = $this->getMenuHtml($this->tree);
            $cache->set($this->cache_key, $this->menuHtml, $this->cache);
        }
        $this->output();
    }

    protected function getOptions($options) {

        foreach ($options as $k => $v) {
            if (property_exists($this, $k)) {
                $this->$k = $v;
            }
        }
    }
    
    protected function getTree() {
        $three = [];
        $data = $this->data;
        foreach ($data as $id => &$node) {
            if (!$node['parent']) {
                $three[$id] = &$node;
            } else {
                $data[$node['parent']]['child'][$id] = &$node;
            }
        }
        return $three;
    }

    protected function getMenuHtml($tree, $tab = '') {
        $str = '';
        foreach ($tree as $id => $category) {
            $str .= $this->catToTemplate($category, $tab, $id);
        }
        return $str;
    }

    protected function catToTemplate($category, $tab, $id) {
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }

}