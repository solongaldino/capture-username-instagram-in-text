<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$path = "./files/";
$dir = dir($path);

$handle = file_get_contents($path . 'list.txt');

$dir->close();

preg_match_all('/@(.*?):/', $handle, $result);

// remove dois pontos
foreach ($result[0] as $key => $value) {
  $result[0][$key] = str_replace(":","",$value);
}

$list = array();

// remove duplicidade
foreach ($result[0] as $key => $value) {

  if (in_array($value, $list)) {
    continue;
  }else {
    array_push($list, $value);
  }

}

// exibe lista
foreach ($list as $key => $value) {
  echo $value . '</br>';
}

exit;

?>
