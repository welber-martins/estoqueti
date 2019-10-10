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

    <style type="text/css">
      .carregando{
        color: #ff0000;
        display: none;
      } 
    </style>
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
  <div id="nota" >
      <center><h3>Adiciona Nota</h3></center>
      <br />
      <!-- //////////// CATEGORIA//////////// -->
      <form method="POST" action="categoria/notacat.php">
        <div class="row">
        <div class="col-xs-5">
          <label for="num_nota">Número da nota:</label><br/>
          <input type="text" name="num_nota" required="required" id="nome" class="form-control">
        </div>
        <div class='col-sm-1'></div>
        <div class='col-sm-4'>
              <label >Data:</label>
                  <div class="form-group" >
                      <div class='input-group date data_formato'  data-provide="datepicker" >
                          <input type='text' class="form-control" name="data" id="data" />
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                      </div>
                  </div>
             
              </div>
          </br></br></br></br></br>
        <div class="col-xs-4"></div>
          <div class="col-xs-3">
          <div class="form-actions">
            <input type="submit" value="Adicionar Nota"  class='btn btn-primary'>
          </div>
        </div>
        </div>

      </form>
      
      <!-- //////////// FIM-CATEGORIA//////////// -->

    </div>

      <!-- //////////// SUBCATEGORIA//////////// -->
        </br></br></br></br>
      <div id="nota" >
        <center><h3>Distribuição</h3></center>
      <br />
      <form method="POST" action="categoria/sub_nota.php">
        <div class="row"> 
        
          <div class="col-xs-3">
            <label >Notas Fiscais:</label>
             <select  class="form-control" name="nota_fiscal_id" id="nota_fiscal_id">
              <option value="">Selecione</option>
                <?php
                  $result_cat_post = "SELECT * FROM nota_fiscal ORDER BY num_nota";
                $resultado_cat_post = mysqli_query($conn, $result_cat_post);
                while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
                  echo '<option value="'.$row_cat_post['id'].'">'.$row_cat_post['num_nota'].'</option>';
                }
                ?>
             </select>
          </div>
          
          <div class="col-xs-3">
            <label >Dispositivo:</label>
             <select  class="form-control" name="categorias" id="categorias";">
              <option value="">Selecione opção</option>
            <?php
              $result_cat_post = "SELECT * FROM categoria ORDER BY categoria_nome";
              $resultado_cat_post = mysqli_query($conn, $result_cat_post);
              while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
                echo '<option value="'.$row_cat_post['id'].'">'.$row_cat_post['categoria_nome'].'</option>';
              }
            ?>
             </select>
          </div>
          <div class="col-xs-3">
            <label >Descrição:</label>
              <span class="carregando">Nada Cadastrado</span>
               <select class="form-control" name="sub_categoria" id="sub_categoria">
                  <option value="">Selecione opção</option>
               </select>
          </div>
          <div class="col-xs-2">
          <label for="comment">Quantidade:</label>
           <select class="form-control" name="quantidade" required>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="14">15</option>
              <option value="14">16</option>
              <option value="14">17</option>
              <option value="14">18</option>
              <option value="14">19</option>
              <option value="14">20</option>
           </select>
        </div>
        </br></br></br></br>
          <div class="col-xs-4"></div>
            <div class="col-xs-3">
            <div class="button">
              <input type="submit" value="Adicionar" class='btn btn-primary btn-lg'/>
            </div>
          </div>
          
        </div>
      </form>
    </div>
    </div>
    </div>
  </div>
      <!-- //////////// FIM-SUBCATEGORIA//////////// -->
    </div>
<!-- Fim Corpo -->    
    </div>
    </script>
    <!-- jQuery -->
    
      <script type="text/javascript">
    $(function(){
      $('#categorias').change(function(){
        if( $(this).val() ) {
          $('#sub_categoria').hide();
          $('.carregando').show();
          $.getJSON('sub_categoria.php?search=',{dispositivos: $(this).val(), ajax: 'true'}, function(j){
            var options = '<option value="">Escolha Subcategoria</option>'; 
            for (var i = 0; i < j.length; i++) {
              options += '<option value="' + j[i].id + '">' + j[i].nome_subcategoria + '</option>';
            } 
            $('#sub_categoria').html(options).show();
            $('.carregando').hide();
          });
        } else {
          $('#sub_categoria').html('<option value="">– Escolha Subcategoria –</option>');
        }
      });
    });
    </script>
    <script src="js/jquery-3.2.1.min.js"></script>

    <script src="js/pt-br.js"></script>
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
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/locales/bootstrap-datepicker.pt-BR.min.js"></script>

     <script>
      $('.input-group').datepicker({
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        forceParse: 0,
        showMeridian: 1,
        language:"pt-BR"
      })
    </script>
  </body>
</html>