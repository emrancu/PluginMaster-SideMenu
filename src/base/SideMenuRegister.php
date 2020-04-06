<?php


namespace PluginMaster\SideMenu\base;

use PluginMaster\SideMenu\base\SideMenuBase;

class SideMenuRegister implements SideMenuBase
{

    protected $currentMain;
    protected $controller;
    protected $position;
    protected $icon;
    protected $removeSubMenu;

    protected $subMenu;
    protected $subController;
    protected $subTitle;


    /**
     * @return mixed
     */
    public function addMainMenu()
    {
        return add_menu_page(
            $this->currentMain,
            $this->currentMain,
            'manage_options',
            $this->currentMain,
            $this->functionArray($this->controller),
            $this->icon,
            $this->position
        );
    }

    public function functionArray($options)
    {
        $exp = explode('@', $options);
        $class = "App" . "\\controller\\" . "sidenav\\" . $exp[0];
        return [new $class(), $exp[1]];
    }

    /**
     * @param $nav
     */
    public function removeFirstSubMenu()
    {
        if ($this->removeSubMenu) {
            remove_submenu_page($this->currentMain, $this->currentMain);
        }
    }

    /**
     * @return mixed
     */
    public function addSubMenu()
    {
        return add_submenu_page(
            $this->currentMain,
            $this->subTitle,
            $this->subTitle,
            'manage_options',
            $this->subMenu,
            $this->functionArray($this->subController)
        );
    }


}
