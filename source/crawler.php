<?php
  $botin = file($urlFile);
  $ganado = array();
  foreach ($botin as $tesoro) {
    if(!(strpos($tesoro,"pageParams.contentUrl =") === false)){
      $string = str_split($tesoro);
      $atesorado = "";
      $slash = 0;
      foreach($string as $char){
        if($char == "/")
          $slash++;
        if($slash >= 5 && $char != '"' && $char != ";")
          $atesorado = $atesorado.$char;
      }
      list($basename,$ext) = explode(".",$atesorado);
      $atesorado = $basename.".jpg";
      array_push($ganado,$atesorado);
    }
  }
  //
  echo "#!/bin/bash\n";
  foreach ($ganado as $url) {
    echo "wget ".$url."\n";
  }
?>
