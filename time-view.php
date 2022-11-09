<?php
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
    <title>Detalhes do time</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Dados do time
                            <a href="index.php" class="btn btn-danger float-end">VOLTAR</a>
                        </h4>
                    </div>


                    <div class="card-body">
                        <?php
                       if(isset($_GET['idTime'])) {
                           $idTime = mysqli_real_escape_string($con, $_GET['idTime']);
                           $query = "SELECT * FROM tbtime WHERE idTime='$idTime' ";
                           $query_run = mysqli_query($con, $query);
                           if(mysqli_num_rows($query_run) > 0) {
                               $time = mysqli_fetch_array($query_run);
                               ?>0000
                        <div class="mb-3">
                            <label>Time</label>
                            <p class="form-control">
                                <?=$time['time'];?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>País</label>
                            <p class="form-control">
                                <?=$time['pais'];?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Num Titulos</label>
                            <p class="form-control">
                                <?=$time['numTitulo'];?>
                            </p>
                        </div>



                        <div class="mb-3">
                            <label>treinador</label>
                            <p class="form-control">
                                <?=$time['treinador'];?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Cor Uniforme</label>
                            <p class="form-control">
                                <?=$time['corUniforme'];?>
                            </p>
                        </div>
                        <?php
                           }
                           else
                           {
                              echo "<h4>Nenhum ID encontrado</h4>";
                           }
                       }
                       ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>