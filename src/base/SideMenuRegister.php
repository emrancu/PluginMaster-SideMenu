<?php


namespace PluginMaster\SideMenu\base;


use PluginMaster\Routing\base\OptionFormatter;

class SideMenuRegister implements SideMenuBase
{
    use OptionFormatter;

    protected $currentMain;
    protected $controller;
    protected $subMenu;
    protected $subController;
    protected $subTitle;
    protected $position;
    protected $icon;


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
            $this->namespace($this->controller),
            $this->icon,
            $this->position
        );
    }

    /**
     * @param $nav
     */
    public function removeFirstSubMenu($nav)
    {
        remove_submenu_page($nav, $nav);
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
            $this->namespace($this->subController)
        );
    }

}
