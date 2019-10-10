<?php
//including the database connection file

include_once("conexao/db_banco.php");

$sql = "SELECT * FROM software ORDER BY id DESC";
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
    <title>Estoque </title>

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
                <h3>Hardware </h3>
              </div>

              <div class="container">
    

<!-- Corpo -->

    
    <div id="">
      <br/><br/><br/><br/><br/><br/>
              <center><h3>Total Software</h3></center>
              <br />
            <div class="row">
      <form action="total_sof.php" method="POST">
          <div class="col-xs-3">
              <label >Programa:</label>
             <select  class="form-control" name="programa" id="programa" onchange="changeSelect();">
                <option value="1">Selecione opção</option>
                <option value="Windows">Windows</option>
                <option value="Office">Office</option>
                <option value="Windows Server">Windows Server</option>
             </select>
          </div>
          <!-- Data inicio / Fim-->
          
          <br />
          
          <input type="submit" class="btn btn-primary" id="btn_enviar" value="Pesquisar" name="enviar">
        </form>
          <form method="POST" action="excel/gerar_excel_esp.php">
            <div class="row espaco">
              <div class="pull-right">
                <a href="excel/excel_soft.php"><button type='button' class='btn btn-success'>Gerar Excel Total</button></a>         
                <input type="submit" value="Gerar Excel" class='btn btn-success'>
              </div>
            </div>
              <br /><br /><br />
          </div>

          
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>programa</th>
                <th>Descrição</th>
                <th>Qtd</th>
                <th>Setor</th>
                <th>Observação</th>
              </tr>
            </thead>
            
              <!--Começa o CRUD -->
               <?php 
            if (isset($_REQUEST['programa']) && $_REQUEST['programa'] == "1") {
                echo "<h1>Selecione um dispositivo</h1>";
                }
            elseif ($_SERVER['REQUEST_METHOD']=='POST') {
            
                $programa = $_POST['programa'];
              
                $pagina = 1;
                $_SESSION['programa'] = $programa;
                
                listar($programa, $pagina, $conn);

                }
                elseif((isset($_SESSION['programa']))){
                  $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
                  listar($_SESSION['programa'], $pagina, $conn);
                }

                function listar($programa, $pagina, $conn){
                  
                  $result_empresa = "SELECT * FROM software WHERE programa LIKE  '$programa'";        
                  $resultado_empresa = mysqli_query($conn, $result_empresa);
                  
                  
                  $total_empresas = mysqli_num_rows($resultado_empresa);
                  
                  
                  $qnt_result_pg = 10;
                  
                  
                  $inicio = ($qnt_result_pg*$pagina)-$qnt_result_pg;
                  
                  mysqli_set_charset($conn, 'utf8');
                  
                  $result_empresas = "SELECT * FROM software WHERE programa LIKE  '$programa' limit $inicio, $qnt_result_pg";   

                  $resultado_empresas = mysqli_query($conn, $result_empresas);
                  
                  while ($row_empresas = mysqli_fetch_assoc($resultado_empresas)){
                        echo '<tr>';
                        echo '<td> '.$row_empresas["id"].'';
                        echo '<td> '.$row_empresas["programa"].'';
                        echo '<td> '.$row_empresas["descricao"].'';
                        echo '<td> '.$row_empresas["quant"].'';
                        echo '<td> '.$row_empresas['setor'].'';
                        echo '<td width=230>';
                        //echo "<a class='btn btn-success' href=\"cliente/editar_contato.php?id=".$aux_query['id']."\">Editar</a> ";
                        echo " <a class='btn btn-danger' href=\"dados/del_software.php?id=".$row_empresas['id']."#modaldel\">Deletar</a> ";;
                        echo '<tr>'; }
            ?>
          
          </table>
        </form>
      <?php  
                //************* INICIO PAGINAÇÂO **************/
                //Qunatidade de paginas
                $quantidade_pg = ceil($total_empresas / $qnt_result_pg);
                
                //Limite de link antes e depois 
                $MaxLinks = 6;
                
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                
                echo "<a href='total_sof.php?pagina=1'>Primeira</a> ";
                
                for($iPag = $pagina - $MaxLinks; $iPag <= $pagina - 1; $iPag++){
                  if($iPag >= 1){
                    echo "<a href='total_sof.php?pagina=$iPag'>$iPag</a> ";
                  }
                }
                
                echo " $pagina ";
                
                for($dPag = $pagina + 1; $dPag <= $pagina + $MaxLinks; $dPag++){
                  if($dPag <= $quantidade_pg){
                    echo "<a href='total_sof.php?pagina=$dPag'>$dPag</a> ";
                  }
                }
                
                echo "<a href='total_sof.php?pagina=$quantidade_pg'>Última</a>";
              }


      ?>

        
    </div>
    
    
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
    <script>
      $('.input-daterange').datepicker({
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