<?php

namespace OnlineStoreProject\Controllers;

use OnlineStoreProject\App\View;

abstract class A_Controller implements I_Controller
{
    protected View $view;

    public function __construct(View $view)
    {
        $this->view = $view;
    }

    public function __call($name, $args)
    {
        if (method_exists($this, $name)) {
            $this->view->setActionNameForViews(str_replace('Action', '', $name));
            $this->view->setClassNameForViews(str_replace('Controller', '', get_class($this)));
            return call_user_func_array(array($this, $name), $args);
        }
    }
}
