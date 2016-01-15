<?
//load all models
foreach (scandir('models') as $filename) {
    $path = 'models/' . $filename;
    if (is_file($path)) 
        require_once $path;
}