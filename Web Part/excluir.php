<?php

require "db.php";

excluirRotina( $_GET['id'] );
header('Location: index.php');


?>