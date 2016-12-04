<?php

require "db.php";

novaRotina();
header('Location: index.php?id='.retornarUltimoId());


?>