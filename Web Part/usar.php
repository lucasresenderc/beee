<?php

require "db.php";

usarRotina( $_GET['id'] );
header('Location: index.php?id='.$_GET['id']);


?>