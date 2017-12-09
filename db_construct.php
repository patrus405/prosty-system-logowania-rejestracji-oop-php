<?php

abstract class db_construct{

  public function __construct(){ //połączenie się z bazą danych

    SESSION_START();
    $connect = new mysqli('localhost', 'root', '', 'shop');

    if($connect->connect_errno != 0)
        echo "<span style='color:red; text-align:center'>".$connect->connect_errno."</span>";
    else{
      $this->connect = $connect;
    }

  }

  protected function add($where, $field, $what){ //dodanie wartości do bazy danych
    if($this->connect->query("INSERT INTO $where $field VALUES ($what)"))return true;
    else return false;
  }

  protected function select($select, $from, $where){ //wybranie wartości z bazy danych

    $select_row = $this->connect->query("SELECT $select FROM $from WHERE $where");
    $this->num_select = mysqli_num_rows($select_row);
    $this->row = mysqli_fetch_assoc($select_row);

  }

  protected function edit($from, $what, $where){ //edycja wartości w bazie danych
    if($this->connect->query("UPDATE $from SET $what WHERE $where"))return true;
    else return false;
  }

  protected function delate($from, $where){ //usunięci wartości z bazy danych
    if($this->connect->query("DELETE FROM $from WHERE $where"))return true;
    else false;
  }

  public function __destruct(){ //zakończenie połączenia z bazą danych
    $this->connect->close();
  }

}
