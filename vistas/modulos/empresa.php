

  <div class="content-wrapper">
    
    <section class="content-header">
  
      <h1>
      Administrar Empresas
  
      </h1>
  
      <ol class="breadcrumb">
  
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
  
        <li class="active">Administrar Empresas</li>
  
      </ol>
  
    </section>
  
  
  <section class="content">
  
      <div class="box">
  
        <div class="box-header with-border">
  
          <button class="btn btn-dark" data-toggle="modal" data-target="#modalAgregarEmpresa">
            
            
            Agregar Empresa
  
          </button>
        
        </div>
  
  
          <div class="box-body">
          
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            
            <thead>
              
              <tr>
                
                <th style="width: 10px">#</th>
                <th>Empresa</th>
                <th style="width: 10px">Acciones</th>
  
              </tr>
  
            </thead>
  
            <tbody>
    
            <?php 
    
    $item = null;
    $valor = null;
  
    $respuesta = ControladorEmpresa::ctrMostrarEmpresas($item, $valor);
  
    
    foreach ($respuesta as $key => $value) {
  
      echo '  
      <tr> 
      <td>'.($key+1).'</td>
      <td>'.$value["emp_nombre"].'</td>     
      <td>
  
      <div class="btn-group">
  
        <button class="btn btn-warning btnEditarEmpresa" idEmpresa="'.$value["emp_id"].'" data-toggle="modal" data-target="#modalEditarEmpresa"><i class="fa fa-pencil"></i></button>';

           if ($_SESSION["tec_rol"] == "Administrador") {
                     

              echo ' <button class="btn btn-danger btnEliminarEmpresa" idEmpresa="'.$value["emp_id"].'"><i class="fa fa-times"></i></button>';
          
             }
        
       
        echo '</div>
    
          </td>
            
        </tr>';
      
        }
              ?>
  
            </tbody>
  
          </table>
  
        </div>
    
    </div>
  
  </section>
  
  </div>
    <!-- =========================================
               MODAL AGREGAR EMPRESA
    ===========================================-->

   
  <!-- Modal -->
  <div id="modalAgregarEmpresa" class="modal fade" role="dialog">

    <div class="modal-dialog">

      
      <div class="modal-content">

          <form role="form" method="post">  
    <!-- =========================================
               CABEZA DEL MODAL
    ===========================================-->

        <div class="modal-header" style="background: #464646; color: white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar empresa</h4>

        </div>

<!-- =========================================
             CUERPO DEL MODAL
  ===========================================-->
      <div class="modal-body">
      
      <div class=" box-body">

        <!-- ENTRADA PARA EL NOMBRE -->

          <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-sitemap"></i></span>

                  <input type="text" class="form-control input-lg" id="nuevaEmpresa" name="nuevaEmpresa" placeholder="Ingresar empresa" required>

              </div>

          </div>

      </div>  


</div>
<!-- =========================================
             PIE DEL MODAL
  ===========================================-->
      <div class="modal-footer">

        <a href="empresas" class="btn btn-default pull-left">Cancelar</a>

        <button type="submit" class="btn btn-primary">Guardar empresa</button>

      </div>

      <?php 

      $crearEmpresa = new ControladorEmpresa();
      $crearEmpresa -> ctrCrearEmpresa();

       ?>

      </form>

    </div>

  </div>

</div>

  
  <!-- =========================================
             MODAL EDITAR EMPRESA
  ===========================================-->
  
  <div id="modalEditarEmpresa" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
  
    
    <div class="modal-content">
  
        <form role="form" method="post">  
  <!-- =========================================
             CABEZA DEL MODAL
  ===========================================-->
  
      <div class="modal-header" style="background: #464646; color: white">
  
        <button type="button" class="close" data-dismiss="modal">&times;</button>
  
        <h4 class="modal-title">Editar empresa</h4>
  
      </div>
  
  <!-- =========================================
             CUERPO DEL MODAL
  ===========================================-->
      <div class="modal-body">
      
      <div class=" box-body">
  
        <!-- ENTRADA PARA EL NOMBRE -->
  
          <div class="form-group"> 
  
              <div class="input-group"> 
  
                   <span class="input-group-addon"><i class="fa fa-sitemap"></i></span>
  
                  <input type="text" class="form-control input-lg" name="editarEmpresa" id="editarEmpresa" required>
                  <input type="hidden" name="idEmpresa" id="idEmpresa" required>
  
              </div>
  
          </div>         
  
    </div>  
  
  </div>
  <!-- =========================================
             PIE DEL MODAL
  ===========================================-->
      <div class="modal-footer">
  
        <a href="empresas" class="btn btn-default pull-left">Cancelar</a>
  
        <button type="submit" class="btn btn-dark">Guardar Cambios</button>
  
      </div>

      
      <?php 

    $editarEmpresa = new ControladorEmpresa();
    $editarEmpresa -> ctrEditarEmpresa();

    ?>
  
      </form>
    
    </div>
  
  </div>
  
  </div>

  <?php 

$eliminarEmpresa = new ControladorEmpresa();
$eliminarEmpresa -> ctrEliminarEmpresa();

?>
