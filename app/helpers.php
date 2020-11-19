<?php

function list_dirs($path)
{
    $dirs = [];
    if(is_dir($path)) {
        if($dir = opendir($path)) {
            while (($file = readdir($dir)) != false) {
                if(is_dir($path."/".$file) && $file != "." && $file != "..") {
                    array_push($dirs,$file);
                    list_dirs($path."/".$file."/");
                }
            }
        }
        closedir($dir);
    }

    return $dirs;
}

function delete_dir($path)
{
    $it = new \RecursiveDirectoryIterator($path, \FilesystemIterator::SKIP_DOTS);
    $it = new \RecursiveIteratorIterator($it, \RecursiveIteratorIterator::CHILD_FIRST);
    foreach($it as $file) {
        if ($file->isDir()) rmdir($file->getPathname());
        else unlink($file->getPathname());
    }
    return rmdir($path) ? true : false;
}

function register($url="", $newplugin="")
{
    $properties_plugin = [];
    if( !empty($url) && empty($newplugin)) {
        // captura el nombre del plugin de la url
        $url_plugin_name = preg_split("/\//",$url)[4];
        $name_module = preg_split("/\./",$url_plugin_name)[0];

        // clona el plugin en el core
        shell_exec('cd ../Modules; git clone ' . $url); // by machine unix   
        //$output = shell_exec('cd ..\\Modules && git clone ' . $url);   // by machine windows
        // captura las propiedades del nuevo plugin agregado para guardarlo en la bd
        $path_plugin_add = base_path() . "/Modules" . "/" . $name_module;
    }else {
        $path_plugin_add = base_path() . "/Modules" . "/" . $newplugin;
    }

    $plugin = require($path_plugin_add . '/Config/config.php');

    $properties_plugin = [
        'name' => $plugin['name'],
        'description' => $plugin['description'],
        'author' => $plugin['author'],
        'version' => $plugin['version']
    ];

    if( !empty($url) && empty($newplugin) ) {
        // Dejar desactivado por defecto el plugin
        shell_exec("cd ../Modules; mv ".$name_module." .".$name_module);
    }else {
        shell_exec("cd ../Modules; mv ".$newplugin." .".$newplugin);
    }

    return $properties_plugin;
}

function makeInvisible($module)
{
    $output = shell_exec("cd ../Modules; mv ".$module." .".$module);
    echo "<pre>$output</pre>";
}

function makeVisible($module)
{
    $output = shell_exec("cd ../Modules; mv .".$module." ".$module);
    echo "<pre>$output</pre>";
}

function object_to_array($data)
{
    $result = array();

    foreach ($data as $value) {
        $name = $value->name;
        array_push($result,$name);
    }
    return $result;
}