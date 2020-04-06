<?php

namespace PluginMaster\SideMenu;

use PluginMaster\SideMenu\base\SideMenuRegister;

class SideMenu extends SideMenuRegister
{

    /**
     * @param $nav
     * @param $options
     * @param null $closure
     * @return SideMenu
     */
    public function mainMenu($nav, $options)
    {
        $this->currentMain = $nav;
        $this->controller = $options['as'];
        $this->position = isset($options['position']) ? $options['position'] : 500;
        $this->icon = $options['icon'];
        $this->removeSubMenu = isset($options['removeFirstSubmenu']) ? true : false;
        $this->addMainMenu();

        return $this;
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
