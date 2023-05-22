<?php

$input = 'page.html';

require_once 'RemoveTags.php';

if(file_exists('new.html')) {
    unlink('new.html');
}
$arr = preg_split("/(\r\n|\n|\r)/", file_get_contents($input));

$html = new RemoveTags($arr);

foreach ($html as $key => $value) {
    file_put_contents('new.html', $value . PHP_EOL, FILE_APPEND);
}

