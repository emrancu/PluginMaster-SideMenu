<?php


namespace PluginMaster\Routing\base;


trait OptionFormatter
{


    public function namespace($options)
    {
        $exp = explode('@', $options);
        $class = "App" . "\\controller\\" . "sidenav\\" . $exp[0];
        return [new $class(), $exp[1]];
    }


}
