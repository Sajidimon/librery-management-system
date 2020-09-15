<?php
 
 require_once "../database.php";


 $id = base64_decode($_GET['book_delete']);

if (isset($id)) {
  echo $id;


  mysqli_query($conn, "DELETE FROM `books` WHERE `id` = '$id'");

  header('location:manage-books.php');




}
