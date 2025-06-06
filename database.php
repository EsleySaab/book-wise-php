<?php

class DB
{

  private $db;

  public function __construct()
  {
    $this->db = new PDO('sqlite:database.sqlite');
  }


  public function livros($pesquisa = null)
  {

    $prepare = $this->db->prepare("select * from livros where usuario_id = 1 and titulo like :pesquisa");
    $prepare->bindValue(':pesquisa', "%$pesquisa%");
    $prepare->execute();

    $items = $prepare->fetchAll();

    return array_map(fn($item) => Livro::make($item), $items);
  }

  public function livro($id)
  {

    $prepare = $this->db->prepare("select * from livros where id = :id");
    $prepare->bindValue('id', $id);
    $prepare->execute();

    $items = $prepare->fetch();


    return array_map(fn($item) => Livro::make($item), $items)[0];
  }
}
