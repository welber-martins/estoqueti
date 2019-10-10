<?php
//including the database connection file
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
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
             <?php
              include 'menu.php';
             ?>
            <br />
          </div>
          </div>
          <?php
            include 'nav.php';
          ?>
        </div>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Painel de Controle </h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Dispositivo</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Dispositivo</th>
                          <th>Opção</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php   
                        $result_usuarios = "SELECT * FROM categoria";
                        $resultado_usuarios = mysqli_query($conn, $result_usuarios);
                        while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
                              echo '<tr>';
                              echo '<td> '.utf8_encode($row_usuario["categoria_nome"]).'';
                              echo '<td width=230>';

                              echo "<a type='button' class='btn btn-success' data-toggle='modal' data-target='#exampleModal' data-whatever= ".$row_usuario['id']." data-whatevernome= ".$row_usuario['categoria_nome'].">Editar</a> ";

                              echo " <a class='btn btn-danger' href='dados/del_dispo.php?id=".$row_usuario['id']."#modaldel'>Apagar</a> ";
                              echo '<tr>'; };


                          ?>
                          <!-- Inicio Modal -->
                          <div class="modal fade" id="myModal<?php echo $row_usuario['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title text-center" id="myModalLabel"><?php echo $row_usuario['categoria_nome']; ?></h4>
                                </div>
                                <div class="modal-body">
                                  <p><?php echo $row_usuario['categoria_nome']; ?></p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- Fim Modal -->
                     
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>

            <!-- Tabela Categoria -->

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Categoria</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-fixed-header" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Categoria</th>
                          <th>Opção</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php   
                        $result_usuarios = "SELECT * FROM subcategoria";
                        $resultado_usuarios = mysqli_query($conn, $result_usuarios);
                        while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
                               echo '<tr>';
                              echo '<td> '.utf8_encode($row_usuario["nome_subcategoria"]).'';
                              echo '<td width=230>';

                              echo "<a type='button' class='btn btn-success' data-toggle='modal' data-target='#exampleModal' data-whatever= ".$row_usuario['id']." data-whatevernome= ".$row_usuario['nome_subcategoria'].">Editar</a> ";

                              echo " <a class='btn btn-danger' href='dados/del_sub.php?id=".$row_usuario['id']."#modaldel'>Apagar</a> ";
                              echo '<tr>'; };

                          ?>

                          <!-- Inicio Modal -->
                          <div class="modal fade" id="myModal<?php echo $row_usuario['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title text-center" id="myModalLabel"><?php echo $row_usuario['nome_subcategoria']; ?></h4>
                                </div>
                                <div class="modal-body">
                                  <p><?php echo $row_usuario['nome_subcategoria']; ?></p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- Fim Modal -->
                       
                      </tbody>


                      <!-- MODAL EDITAR -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Categorias</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              
                              <form method="POST" action="dados/processa.php" enctype="multipart/form-data">
                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Dispositivo:</label>
                                  <input type="text" name="nome" class="form-control" id="recipient-name">
                                </div>
                                <input type="hidden" id="id_categoria " name="id">
                                <!--<div class="form-group">
                                  <label for="message-text" class="col-form-label">Message:</label>
                                  <textarea class="form-control" id="message-text"></textarea>
                                </div>-->

                                <div class="modal-footer">
                                  <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                  <button type="button" type="submit" class="btn btn-danger">Altera</button>
                                </div>


                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                  <!--FIM MODAL EDITAR -->


                      </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- /page content -->



        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Estoque TI - Montessori 
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>

    </div>



    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
    <script type="text/javascript">
      $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') 
        var recipientnome = button.data('whatevernome') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('ID ' + recipient)
        modal.find('#id_categoria').val(recipient)
        modal.find('#recipient-name').val(recipientnome)
      })
    </script>
  </body>
</html>