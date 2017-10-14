<?php
  require_once '../view/src/Twig/lib/Twig/Autoloader.php';
  Twig_Autoloader::register();
  $loader= new Twig_Loader_Filesystem('../view/templates');
  $twig= new Twig_Environment($loader, array('cache' => false));
?>
