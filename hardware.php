<?php
include_once("conexao/db_banco.php");

mysqli_set_charset($conn, 'utf8');
?>
<!DOCTYPE html>
<html lang="pt-br">

  <head>
   
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/mont.ico" type="image/ico" />
    <title>Estoque TI </title>
    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Dropzone.js -->
    <link href="vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">

    <link  href="css/bootstrap-datepicker.css">

    <link href="css/hardware.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">

    <script src="js/pt-br.js"></script> 

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
                <h3>Hardware </h3>
              </div>

              <div class="container">
    

<!-- Corpo -->

          
          
          <div id="hardware" >
            <center><h3>Entrada</h3></center>
            <br />
            <div class="row">
            <form action="dados/reg_entrada.php" method="POST">
              <div class="col-xs-4">
                <label >Dispositivo:</label>
                 <select  class="form-control" name="dispositivos" id="dispositivos";">
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
              <div class="col-xs-4">
              <label >Descrição:</label>
                <span class="carregando">Cadastre uma categoria</span>
                 <select class="form-control" name="descricao" id="descricao">
                    <option value="">Selecione opção</option>
                 </select>
              </div>

              <script type="text/javascript" src="https://www.google.com/jsapi"></script>
              <script type="text/javascript">
                google.load("jquery", "1.4.2");
              </script>
                
              <div class="col-xs-2">
                <label for="comment">Quantidade:</label>
                 <select class="form-control" name="quant" required>
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
               <div class='col-sm-3'>
                    <br />
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

              <br /><br /><br /><br /><br />
              <div class="col-xs-10">
                <label for="comment">Observação:</label>
                <textarea class="form-control" name="obsrvacao" rows="5" ></textarea>
              </div>
              </div>
              <br /><br />
              <center>
              <div class="button">
              <input type="submit" class="btn btn-primary btn-lg" id="btn_enviar" value="Enviar" name="enviar">
              </div>

              </center>
            </form> 
          </div>

          </div>
        </div>
      </div>
    </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Estoque TI - <a href="https://escolamontessori.com.br">Montessori</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
       
    
    <script src="js/subcategoria.js"></script>

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
            $('.data_formato').datepicker({
              weekStart: 1,
              todayBtn: 1,
              autoclose: 1,
              todayHighlight: 1,
              forceParse: 0,
              showMeridian: 1,
              language:"pt-BR"
            });
       </script>
    <!--<script >
      $(document).ready(function(){

        $('#btn_enviar').click(function(){

          var campo_vazio = false;

          if ($('#dispositivo').val() == '11'){
            $('#dispositivo').css({'border-color': 'red'})
            alert('Selecione um Dispositivo!')
            campo_vazio = true;
          }

          if ($('#quant').val() == ''){
            $('#quant').css({'border-color': 'red'})
            alert('Selecione a Quantidade!')
            campo_vazio = true;
          } 


          if (campo_vazio) return false;
        })
      })  
    </script>-->
    
    <script type="text/javascript">
      $(function(){
        $('#dispositivos').change(function(){
          if( $(this).val() ) {
            $('#descricao').hide();
            $('.carregando').show();
            $.getJSON('sub_categoria.php?search=',{dispositivos: $(this).val(), ajax: 'true'}, function(j){
              var options = '<option value="">Escolha Subcategoria</option>'; 
              for (var i = 0; i < j.length; i++) {
                options += '<option value="' + j[i].id + '">' + j[i].nome_subcategoria + '</option>';
              } 
              $('#descricao').html(options).show();
              $('.carregando').hide();
            });
          } else {
            $('#descricao').html('<option value="">– Escolha Subcategoria –</option>');
          }
        });
      });
    </script>
  </body>
</html>