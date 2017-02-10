# PHP-misc-functions
1. **paths-list-to-tree.php**
Converts structure like this:
```php
$files = array(
    'D:/folder1/child1/test.txt',
    'D:/folder2' => 'abc.mp3',
    'D:/folder2/' => 'baka.mp3',
    'folder2/child1/abc.txt',
    '/folder2/child1/def.txt'
);
```
to array like that:
```php
array(
  "folder1" => array(
    "child1" => array("test.txt")
  ),
  "folder2" => array(
    "abc.mp3",
    "baka.mp3",
    "child1" => array(
      "abc.txt",
      "def.txt"
    )
  )
)
```