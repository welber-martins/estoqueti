<?php
include_once("conexao/db_banco.php");

mysqli_set_charset($conn, 'utf8');
?>
<!DOCTYPE html>
<html lang="pt-br">

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
        <!-- top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Hardware</h3>
              </div>

              <div class="container">
    

<!-- Corpo -->

    
    <div id="hardware">
              <center><h3>Saída</h3></center>
              <br />
            <div class="row">
              <form action="dados/red_saida.php" method="POST">
                <div class="col-xs-4">
                    <label >Dispositivo:</label>
                   <select  class="form-control" name="dispositivo" id="dispositivo" onchange="changeSelect();">
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
                  <span class="carregando">Cadastre uma Categoria</span>
                  <select class="form-control" name="descricao" id="descricao">
                    <option value="">Selecione opção</option>
                 </select>
                </div>

                <script type="text/javascript" src="https://www.google.com/jsapi"></script>
                <script type="text/javascript">
                  google.load("jquery", "1.4.2");
                </script>

                <div class="col-xs-2">
                  <label >Quantidade:</label>
                   <select class="form-control" name="quant" id="quant">
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
                
                      <div class='col-sm-4'>
                    <br />
                    <label >Data:</label>
                        <div class="form-group" >
                            <div class='input-group date'  data-provide="datepicker" >
                                <input type='text' class="form-control" name="data" id="dataSolicitacao" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                  
                    </div>
                      <br /><br /><br /><br />
                      <div class="col-xs-4">
                    <label >Setor:</label>
                     <select class="form-control" name="setor" id="setor">
                        <option value="">Selecione opção</option>
                        <option value="Almoxerifado">Almoxerifado</option>
                        <option value="Area Externa">Área Externa</option>
                        <option value="Assessoria Pedagógica Fund.">Assessoria Pedagógica Fundamental</option>
                        <option value="Assessoria Pedagógica Infa.">Assessoria Pedagógica Infantil</option>
                        <option value="Capela">Capela</option>
                        <option value="Contabilidade">Contabilidade</option>
                        <option value="Coordenação do Fund.">Coordenação do Fundamental</option>
                        <option value="Coordenação do Inf.">Coordenação do Infantil</option>
                        <option value="Copa">Copa</option>
                        <option value="Diretoria Geral">Diretoria Geral</option>
                        <option value="Diretoria Pedagógica">Diretoria Pedagógica</option>
                        <option value="Enfermaria Fund.">Enfermaria Fundamental</option>
                        <option value="Enfermaria Infan.">Enfermaria Infantil</option>
                        <option value="Financeiro">Financeiro</option>
                        <option value="Gerência Financeira">Gerência Financeira</option>
                        <option value="Gerência Operacional">Gerência Operacional</option>
                        <option value="Laboratório de Infor. do Fund.">Laboratório de Informática do Fundamental</option>
                        <option value="Laboratório de Infor. do Infa.">Laboratório de Informática do Infantil</option>
                        <option value="Psicologia">Psicologia</option>
                        <option value="Recepção do Fund.">Recepção do Fundamental</option>
                        <option value="Recepção do Infa.">Recepção do Infantil</option>
                        <option value="Recursos Humanos">Recursos Humanos</option>s
                        <option value="Reprografia">Reprografia</option>
                        <option value="Sala de Artes do Fund.">Sala de Artes do Fundamental</option>
                        <option value="Sala de Leitura do Fund.">Sala de Leitura do Fundamental</option>
                        <option value="Sala de Leitura do Infan.">Sala de Leitura do Infantil</option>
                        <option value="Sala de Reuniões do Ginásio">Sala de Reuniões do Ginásio</option>
                        <option value="Sala de Reuniões do Infan.">Sala de Reuniões do Infantil</option>
                        <option value="Sala de Vídeo do Fund.">Sala de Vídeo do Fundamental</option>
                        <option value="Sala de Vídeo do Infan.">Sala de Vídeo do Infantil</option>
                        <option value="Sala dos Professores do Fund.">Sala dos Professores do Fundamental</option>
                        <option value="Sala dos Professores do Infan.">Sala dos Professores do Infantil</option>
                        <option value="Secretaria Administrativa">Secretaria Administrativa</option>
                        <option value="Secretaria Geral">Secretaria Geral</option>
                        <option value="Segurança">Segurança</option>
                        <option value="Suprimentos">Suprimentos</option>
                        <option value="T.I">T.I</option>
                     </select>
                  </div>
                  <br /><br /><br />
                  <div class="col-xs-10">
                    <label for="comment">Observação:</label>
                    <textarea class="form-control" name="observacao" rows="5"></textarea>
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
  

  <script >    
      $(document).ready(function(){

        $('#btn_enviar').click(function(){

          var campo_vazio = false;

          if ($('#dispositivo').val() == ''){
            $('#dispositivo').css({'border-color': 'red'})
            alert('Selecione um Dispositivo!')
            campo_vazio = true;
          }

          if ($('#quant').val() == ''){
            $('#quant').css({'border-color': 'red'})
            alert('Selecione a Quantidade!')
            campo_vazio = true;
          } 

          if ($('#setor').val() == ''){
            $('#setor').css({'border-color': 'red'})
            alert('Selecione um Setor!')
            campo_vazio = true;
          }

          if (campo_vazio) return false;
        })
      })  
    </script>

    <script type="text/javascript">
    $(function(){
      $('#dispositivo').change(function(){
        if( $(this).val() ) {
          $('#descricao').hide();
          $('.carregando').show();
          $.getJSON('sub_cat_sai.php?search=',{dispositivo: $(this).val(), ajax: 'true'}, function(j){
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