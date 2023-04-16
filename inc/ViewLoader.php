<?php

namespace inc;

class ViewLoader
{
    public static function LoadView( $folder , $path )
    {
        $target = plugin_dir_path(dirname(__FILE__)) . 'view/' . $folder . '/' . $path . '.php';
        if ( file_exists($target) ){
            include_once( $target );
        }
    }
}