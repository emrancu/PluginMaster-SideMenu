<?php
namespace PluginMaster\SideMenu;

use PluginMaster\SideMenu\base\SideMenuRegister;

class SideMenu extends SideMenuRegister
{

    /**
     * @param $nav
     * @param $options
     * @param null $closure
     */
    public function mainMenu($nav, $options, $closure = null)
    {
        global $mainMenu;
        $mainMenu = $nav;

        $this->currentMain = $nav;
        $this->controller = $this->namespace($options['as']);
        $this->position = isset($options['position']) ? $options['position'] : 500;
        $this->icon = $options['icon'];
        $this->addMainMenu();

        if ($closure instanceof \Closure) {
            call_user_func($closure, $this);
        }

        if (isset($options['removeFirstSubmenu']) && $options['removeFirstSubmenu']) {
            $this->removeFirstSubMenu($nav);
        }

    }



    /**
     * @param $nav
     * @param $options
     */
    public function subMenu($nav, $options)
    {

        $this->subMenu = $nav;
        $this->subController = $options['as'];
        $this->subTitle = isset($options['title']) ? $options['title'] : $nav;

        $this->addSubMenu();

    }


}
