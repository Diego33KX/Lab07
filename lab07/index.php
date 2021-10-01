<?php
  include_once 'crud.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>CRUD Biblioteca</title>
  </head>
  <body>
    <center>
        <div class="container-fluid form" >
          <div class="container py-3">
              <h1>REGISTRO DE LIBROS</h1>
          </div><hr>
            <form method="post">

                <table class="marco" width="50%" cellpadding="5">

                    <tr>
                        <td>Título: </td>
                        <td>
                            <input type="text" class="form-control" name="titulo" value="<?php if(isset($_GET['edit'])) echo $getROW['titulo']; ?>" placeholder="Titulo">
                        </td>
                    </tr>
                    <tr>
                        <td>Autor: </td>
                        <td>
                            <input type="text" class="form-control" name="autor" value="<?php if(isset($_GET['edit'])) echo $getROW['autor']; ?>" placeholder="Autor">
                        </td>
                    </tr>
                    <tr>
                        <td>Año: </td>
                        <td>
                            <input type="text" class="form-control" name="año" value="<?php if(isset($_GET['edit'])) echo $getROW['año']; ?>" placeholder="Año">

                        </td>
                    </tr>
                    <tr>

                        <td>Especialidad: </td>
                        <td>
                            <input type="text" class="form-control" name="especialidad" value="<?php if(isset($_GET['edit'])) echo $getROW['especialidad']; ?>" placeholder="Especialidad">
                        </td>
                    </tr>
                    <tr>
                        <td>URL: </td>
                        <td>
                            <input type="text" class="form-control" name="url" value="<?php if(isset($_GET['edit'])) echo $getROW['url']; ?>" placeholder="URL">
                        </td>
                    </tr>
                    <tr>
                        <td>Editorial: </td>
                        <td>
                            <input type="text" class="form-control" name="editorial" value="<?php if(isset($_GET['edit'])) echo $getROW['editorial']; ?>" placeholder="Editorial">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <?php
                                if (isset($_GET['edit'])) {
                                  ?>
                                      <button type="submit" name="update" class="btn btn-warning form-control">Editar</button>
                                  <?php
                                }else{
                                  ?>
                                      <button type="submit" name="save" class="btn btn-warning form-control">Registrar</button>
                                  <?php
                                }
                             ?>
                        </td>
                    </tr>
                </table>
            </form><hr>
            <table class="table table-dark table-hover table-striped" width="50%" border="1" cellpadding="5" align="center">
                <?php
                    $resultado = $MySQLiconn->query("SELECT * FROM libro");
                    ?>
                    <header class="table" >
                      <tr>
                        <td>ID</td>
                        <td>Título</td>
                        <td>Autor</td>
                        <td>Año</td>
                        <td>Especialidad</td>
                        <!--<td>URL</td>-->
                        <td>Editar</td>
                        <td colspan="3">Acciones</td>

                      </tr>
                    </header>

                    <?php
                    //SE LLAMA A LOS DATOS DE LA BASE DE DATOS
                    while ($row = $resultado->fetch_array()) {
                      ?>
                        <tr class="table-light">
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['titulo'] ?></td>
                            <td><?php echo $row['autor'] ?></td>
                            <td><?php echo $row['año'] ?></td>
                            <td><?php echo $row['especialidad'] ?></td>
                            <!--<td><?php echo $row['url'] ?></td>-->
                            <td><?php echo $row['editorial'] ?></td>
                            <td><a href="?edit=<?php echo $row['id'];?>" onclick="return confirm('Confirmar edicion')" class="btn btn-primary">Editar</a></td>
                            <td><a href="?del=<?php echo $row['id']; ?>" onclick="return confirm('Confirmar eliminacion')" class="btn btn-danger">X</a></td>
                            <td><a href="<?php echo $row['url'] ?>" target = "_blank" class="btn btn-warning">Leer Libro</a></td>
                        </tr>

                      <?php
                    }
                 ?>
            </table>
        </div>
    </center>

  </body>
</html>
