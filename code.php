<?php
session_start();
require 'dbcon.php';
if(isset($_POST['delete_time'])){
   $idTime = mysqli_real_escape_string($con, $_POST['delete_time']);
   $query = "DELETE FROM tbtime WHERE idTime='$idTime' ";
   $query_run = mysqli_query($con, $query);
if($query_run) {
       $_SESSION['message'] = "Time excluido com sucesso";
       header("Location: index.php");
       exit(0);
   }   else   {
       $_SESSION['message'] = "Não foi possivel excluir o time";
       header("Location: index.php");
       exit(0);
   }
}
if(isset($_POST['update_time'])){
   $idTime = mysqli_real_escape_string($con, $_POST['idTime']);
   $time = mysqli_real_escape_string($con, $_POST['time']);
   $pais = mysqli_real_escape_string($con, $_POST['pais']);
   $numTitulo = mysqli_real_escape_string($con, $_POST['numTitulo']);
   $treinador = mysqli_real_escape_string($con, $_POST['treinador']);
   $corUniforme = mysqli_real_escape_string($con, $_POST['corUniforme']);
   $query = "UPDATE tbtime SET time='$time', pais='$pais', numTitulo='$numTitulo', treinador='$treinador', corUniforme='$corUniforme' WHERE idTime='$idTime' ";
   $query_run = mysqli_query($con, $query);
  if($query_run) {
       $_SESSION['message'] = "Time atualizado com sucesso";
       header("Location: index.php");
       exit(0);
   }   else   {
       $_SESSION['message'] = "Time não atualizado";
       header("Location: index.php");
       exit(0);
   }
}

 if(isset($_POST['save_time'])){
   $time = mysqli_real_escape_string($con, $_POST['time']);
   $pais = mysqli_real_escape_string($con, $_POST['pais']);
   $numTitulo = mysqli_real_escape_string($con, $_POST['numTitulo']);
   $treinador = mysqli_real_escape_string($con, $_POST['treinador']);
   $corUniforme = mysqli_real_escape_string($con, $_POST['corUniforme']);
   $query = "INSERT INTO tbtime (time,pais,numTitulo,treinador,corUniforme) VALUES ('$time','$pais','$numTitulo','$treinador','$corUniforme')";
   $query_run = mysqli_query($con, $query);
   if($query_run)  {
       $_SESSION['message'] = "Time cadastrado com sucesso!";
       header("Location: time-create.php");
       exit(0);
   }  else  {
       $_SESSION['message'] = "Time não cadastrado";
       header("Location: time-create.php");
       exit(0);
   }
}
?>