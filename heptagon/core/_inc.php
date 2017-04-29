<?php

function import(string $classpath) {
    include_once(str_replace('.', '/', $classpath) . '.php');
}

$directory = new RecursiveDirectoryIterator('./',RecursiveDirectoryIterator::SKIP_DOTS);
$iterator = new RecursiveIteratorIterator($directory,RecursiveIteratorIterator::SELF_FIRST);

$newPath = get_include_path();
foreach($iterator as $entry) {
    if ($entry->isDir()) {
        $newPath .= ';' . $entry->getPathname();
    }
}
set_include_path($newPath);

spl_autoload_register(function ($class_name) {
    include_once($class_name . '.php');
});

define('CORE_LESS','core/assets/less');
define('CORE_CSS','core/assets/css');
define('CORE_JS','core/assets/js');
define('CORE_ASSETS','core/assets');
define('CUSTOM','custom');
define('VIEWS','views');
?>