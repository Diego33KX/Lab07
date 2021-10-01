<?php
include_once 'db.php';
//INSERTAR DATOS
if(isset($_POST['save'])){
  $titulo = $MySQLiconn->real_escape_string($_POST['titulo']);
  $autor = $MySQLiconn->real_escape_string($_POST['autor']);
  $an = $MySQLiconn->real_escape_string($_POST['año']);
  $especialidad = $MySQLiconn->real_escape_string($_POST['especialidad']);
  $url = $MySQLiconn->real_escape_string($_POST['url']);
  $editorial = $MySQLiconn->real_escape_string($_POST['editorial']);

  $SQL = $MySQLiconn->query("INSERT INTO libro(titulo,autor,año,especialidad,url,editorial)
                            VALUES('$titulo','$autor','$an','$especialidad','$url','$editorial')");

  if(!$SQL){
    echo $MySQLiconn->error;
  }
}
//ELIMINACION DE DATOS
if(isset($_GET['del'])){
  $SQL = $MySQLiconn->query("DELETE FROM libro WHERE id=".$_GET['del']);
  header("Location: index.php");
}
//OBTENCION DE DATOS
if(isset($_GET['edit'])){
  $SQL = $MySQLiconn->query("SELECT * FROM libro WHERE id=".$_GET['edit']);
  $getROW = $SQL->fetch_array();
}
//ACTUALIZACIÓN DE DATOS
if(isset($_POST['update'])){
  $SQL = $MySQLiconn->query("UPDATE libro SET titulo='".$_POST['titulo']."',autor='".$_POST['autor']."',año='".$_POST['año']."',
  especialidad='".$_POST['especialidad']."', url='".$_POST['url']."', editorial='".$_POST['editorial']."' WHERE id=".$_GET['edit']);
  header("Location:index.php");
}

 ?>
