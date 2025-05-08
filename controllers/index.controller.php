<?php

$db = new DB();
$pesquisar = $_REQUEST['pesquisar'] ?? '';
$livros = $db->livros($pesquisar);

view('index', compact('livros'));
