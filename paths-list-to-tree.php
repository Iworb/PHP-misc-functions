<?php
function explodePaths($paths) {
    $result = array();
    foreach ($paths as $path => $file) {
        $current = &$result;
        $cleanPath = str_replace('\\', '/', !is_numeric($path) ? trim($path, '\\/') . '/' . trim($file, '\\/') : trim($file, '\\/'));
        $clearPath = preg_replace('/^[A-Z]+:\//', '', $cleanPath);
        $parts = explode('/', $clearPath);
        foreach ($parts as $idx => $part) {
            if ($idx == count($parts) - 1) {
                $current[] = $part;
                break;
            }
            else if (!isset($current[$part]))
                $current[$part] = array();
            $current = &$current[$part];
        }
    }
    return $result;
}

$files = array(
    'D:/folder1/child1/test.txt',
    'D:/folder2' => 'abc.mp3',
    'D:/folder2/' => 'baka.mp3',
    'folder2/child1/abc.txt',
    'folder2/child1/def.txt'
);
    
var_dump(explodePaths($files));