<?php
include_once("conexao/db_banco.php");

mysqli_set_charset($conn, 'utf8');
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/mont.ico" type="image/ico" />
    <title>Estoque TI</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Dropzone.js -->
    <link href="vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">

    <link href="css/hardware.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php
          include 'menu.php';
        ?>
        <!-- top navigation -->
        <?php
          include 'nav.php';
        ?>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Admin </h3>
              </div>

              <div class="container">
    

<!-- Corpo -->

    <br/><br/><br/><br/><br/>
  <div id="nota">
      <br/>
              <center><h3>Distribuição</h3></center>
              <br />
            <div class="row">
            <form method="POST" action="categoria/cat.php">
        <div class="row">
        <div class="col-xs-5">
          <label for="categoria_nome">Dispositivo:</label><br/>
          <input type="text" name="categoria_nome" required="required" id="nome" class="form-control">
        </div>
        <br/>
        <div class="col-xs-2"></div>
          <div class="col-xs-1">
          <div class="form-actions">
            <input type="submit" value="Adicionar Dispositivo"  class='btn btn-primary'>
          </div>
        </div>
        </div>
      </form>
    </div>
  </div>
      <!-- //////////// FIM-CATEGORIA//////////// -->



      <!-- //////////// SUBCATEGORIA//////////// -->
        </br></br></br></br>

        <div id="nota">
          <center><h3>Categoria</h3></center>
          <form method="POST" action="categoria/sub.php">
            <div class="row"> 
            
              <div class="col-xs-5">
                <label >Dispositivo:</label>
                 <select  class="form-control" name="categoria_id" id="categoria_id">
                  <option value="">Selecione</option>
                    <?php
                      $result_cat_post = "SELECT * FROM categoria ORDER BY categoria_nome";
                    $resultado_cat_post = mysqli_query($conn, $result_cat_post);
                    while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
                      echo '<option value="'.$row_cat_post['id'].'">'.$row_cat_post['categoria_nome'].'</option>';
                    }
                    ?>
                 </select>
              </div>
              <div class="col-xs-2"></div>
              <div class="col-xs-5">
                  <label for="nome_subcategoria">Nova Categoria:</label><br/>
                <input type="text" name="nome_subcategoria" required="required" id="nome" class="form-control">
              </div>
            </br></br></br></br></br>
              <div class="col-xs-4"></div>
                <div class="col-xs-4">
                <div class="button">
                  <input type="submit" value="Nova Categoria" class='btn btn-primary btn-lg'/>
                </div>
              </div>
            </div>
          </form>

    </div>
      <!-- //////////// FIM-SUBCATEGORIA//////////// -->
    </div>
<!-- Fim Corpo -->    
    </div>
    </script>
    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- Dropzone.js -->
    <script src="vendors/dropzone/dist/min/dropzone.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
  </body>
</html>