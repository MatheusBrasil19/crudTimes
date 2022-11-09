<?php
   session_start();
   require 'dbcon.php';
?>
<!doctype html>
<html lang="pt-BR">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>COPA PHP</title>
</head>

<body>
    <div class="container mt-4">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detalhes do time
                            <a href="time-create.php" class="btn btn-primary float-end">Adicionar Time</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Time</th>
                                    <th>País</th>
                                    <th>Num Titulos</th>
                                    <th>treinador</th>
                                    <th>Cor Uniformes</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                   $query = "SELECT * FROM tbtime";
                                   $query_run = mysqli_query($con, $query);
                                 if(mysqli_num_rows($query_run) > 0)  {
                                           foreach($query_run as $time)    {
                                           ?>
                                <tr>
                                    <td><?= $time['idTime']; ?></td>
                                    <td><?= $time['time']; ?></td>
                                    <td><?= $time['pais']; ?></td>
                                    <td><?= $time['numTitulo']; ?></td>
                                    <td><?= $time['treinador']; ?></td>
                                    <td><?= $time['corUniforme']; ?></td>
                                    <td>




                                        <a href="time-view.php?idTime=<?= $time['idTime']; ?>"
                                            class="btn btn-info btn-sm">Visualizar</a>
                                        <a href="time-edit.php?idTime=<?= $time['idTime']; ?>"
                                            class="btn btn-success btn-sm">Editar</a>
                                        <form action="code.php" method="POST" class="d-inline">
                                            <button type="submit" name="delete_time" value="<?=$time['idTime'];?>"
                                                class="btn btn-dark btn-sm">Deletar</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                       }
                                   }
                                   else
                                   {
                                       echo "<h5> Nenhum time cadastrado </h5>";
                                   }
                               ?>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>