<?php
include_once("conexao/db_banco.php");

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

    <link href="css/software.css" rel="stylesheet">

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
                <h3>Software </h3>
              </div>

              <div class="container">

<!-- Corpo -->

    <br/><br /><br /><br /><br />
    <div id="software" >
      <center><h3>Distribuição</h3></center>
      <br />
      <div class="row">
      <form action="dados/reg_software.php" method="POST">
        <div class="col-xs-4">
          <label >Programa:</label>
           <select  class="form-control" name="programa" id="programa" onchange="changeSelect();">
            <option value="1">Selecione opção</option>
            <option value="Windows">Windows</option>
            <option value="Office">Office</option>
            <option value="Windows Server">Windows Server</option>
           </select>
        </div>
        <!-- Select Descrição- - - - - - - - -  -->
        <div class="col-xs-2"></div>
        <div class="col-xs-5">
        <label >Descrição:</label>
           <select class="form-control" name="descricao" id="descricao">
            <option value="">Selecione opção</option>
           </select>
        </div>
        <!-- Select Quantidade- - - - - - - - -  -->
       
        <div class="col-xs-2">
          <br />
          <label for="comment">Quantidade:</label>
           <select class="form-control" name="quant" id="quant" onchange="changeSelect();">
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

        <div class="col-xs-4"></div>
        <div class="col-xs-5">
        <br />
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
        <br /><br /><br /><br /><br />
        
        </div>
        <br /><br /><br /><br />
        <center>
        <div class="button">
          <input type="submit" class="btn btn-primary btn-lg" value="Enviar" id="btn_enviar" name="enviar">
        </div>
        </center>
        
      </form>
<!-- Fim Corpo -->
      <!-- footer content -->
    </div>
  </div>
        <footer>
          <div class="pull-right">
            Estoque TI - <a href="https://escolamontessori.com.br">Montessori</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->    
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script language="javascript" src="js/subdescricao.js"></script>
    <script >
      $(document).ready(function(){

        $('#btn_enviar').click(function(){

          var campo_vazio = false;

          if ($('#programa').val() == '1'){
            $('#programa').css({'border-color': 'red'})
            alert('Selecione um Programa!')
            campo_vazio = true;
          }

          if ($('#setor').val() == ''){
            $('#setor').css({'border-color': 'red'})
            alert('Selecione um setor!')
            campo_vazio = true;
          }

          if (campo_vazio) return false;
        })
      })  
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
    <script src=".vendors/dropzone/dist/min/dropzone.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
  </body>
</html>