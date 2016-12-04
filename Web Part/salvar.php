<?php

require "db.php";

updateRotina($_POST['id'], $_POST['nome'], $_POST['desc'], $_POST['rotina']);
header('Location: index.php?id='.$_POST['id']);


?>