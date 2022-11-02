<?php 

if($_SESSION["tec_rol"] == "Tecnico" ){

  echo '<script>


  window.location = "inicio";

  </script>';

  return;

}

?>
  
  <div class="content-wrapper">
    
    <section class="content-header">

      <h1>
      Administrar Tecnicos

      </h1>

      <ol class="breadcrumb">

        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

        <li class="active">Administrar tecnicos</li>

      </ol>

    </section>


  <section class="content">

      <div class="box">

        <div class="box-header with-border">

          <button class="btn btn-dark " data-toggle="modal" data-target="#modalAgregarTecnico">
            
            Agregar Tecnico

          </button>
        
        </div>


          <div class="box-body">
          
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            
            <thead>
              
              <tr>
                
                <th style="width: 10px">#</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
                <th>Usuario</th>
                <th>Rol</th>
                <th style="width: 10px">Acciones</th>

              </tr>

            </thead>

            <tbody>
              
            <?php 
    
    $item = null;
    $valor = null;
  
    $respuesta = ControladorTecnico::ctrMostrarTecnicos($item, $valor);
  
    
    foreach ($respuesta as $key => $value) {
  
      echo '  
            <tr>  
                      <td>'.($key+1).'</td>
                      <td>'.$value["tec_nombre"].'</td>
                      <td>'.$value["tec_apellido"].'</td>
                      <td>'.$value["tec_telefono"].'</td>
                      <td>'.$value["tec_user"].'</td>
                      <td>'.$value["tec_rol"].'</td>
                       

    <td>
  
     <div class="btn-group">
  
                 <button class="btn btn-warning btnEditarTecnico" idTecnico="'.$value["tec_id"].'" data-toggle="modal" data-target="#modalEditarTecnico">
                 <i class="fa fa-pencil"></i></button>

                  <button class="btn btn-danger btnEliminarTecnico" idTecnico="'.$value["tec_id"].'"><i class="fa fa-times"></i></button>

                
     
      </div>
  
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
           MODAL AGREGAR TECNICOS
  ===========================================-->

 
<!-- Modal -->
<div id="modalAgregarTecnico" class="modal fade" role="dialog">

  <div class="modal-dialog">

    
    <div class="modal-content">

        <form role="form" method="post">  
  <!-- =========================================
             CABEZA DEL MODAL
  ===========================================-->

      <div class="modal-header" style="background: #464646; color: white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Agregar Tecnico</h4>

      </div>

<!-- =========================================
             CUERPO DEL MODAL
  ===========================================-->
      <div class="modal-body">
      
      <div class=" box-body">

        <!-- ENTRADA PARA EL NOMBRE -->

          <div class="form-group"> 

              <div class="input-group"> 

                 <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>

                  <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Nombre" required>

              </div>

          </div>

          <!-- ENTRADA PARA EL APELLIDO -->

           <div class="form-group"> 

              <div class="input-group"> 

              <span class="input-group-addon"></span>

                  <input type="text" class="form-control input-lg" name="nuevoApellido" placeholder="Apellido" required>

              </div>

          </div>

             <!-- ENTRADA PARA EL TELEFONO -->
          
           <div class="form-group"> 

              <div class="input-group"> 

                 <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Teléfono" data-inputmask="'mask':'(999) 9999-9999'" data-mask required>

              </div>

          </div>

          
            <!-- ENTRADA PARA EL USUARIO -->

            <div class="form-group"> 

            <div class="input-group"> 

            <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoUsuario" id="nuevoUsuario" placeholder="Usuario" required>

            </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

            <div class="form-group"> 

            <div class="input-group"> 

            <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Contraseña" required>

            </div>

            </div>


           <!-- ENTRADA PARA EL ROL -->
          
           <div class="form-group"> 

              <div class="input-group"> 

                 <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                  <select class="form-control input-lg" name="nuevoRol">
                    
                      <option value="">Seleccionar rol</option>

                      <option value="Administrador">Administrador</option>

                      <option value="Tecnico">Tecnico</option>

                  </select>

              </div>

          </div>

      </div>  


</div>
<!-- =========================================
             PIE DEL MODAL
  ===========================================-->
      <div class="modal-footer">

        <a href="tecnico" class="btn btn-default pull-left">Cancelar</a>
        <button type="submit" class="btn btn-dark">Guardar cambios</button>

      </div>

      </form>

    </div>

    <?php   

    $crearUsuario = new ControladorTecnico();
    $crearUsuario -> ctrCrearTecnico();

    ?>

  </div>

</div>

<!-- =========================================
           MODAL EDITAR TECNICOS
  ===========================================-->

 
<!-- Modal -->
<div id="modalEditarTecnico" class="modal fade" role="dialog">

  <div class="modal-dialog">

    
    <div class="modal-content">

        <form role="form" method="post">  
  <!-- =========================================
             CABEZA DEL MODAL
  ===========================================-->

      <div class="modal-header" style="background: #464646; color: white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Agregar Tecnico</h4>

      </div>

<!-- =========================================
             CUERPO DEL MODAL
  ===========================================-->
      <div class="modal-body">
      
      <div class=" box-body">

        <!-- ENTRADA PARA EL NOMBRE -->

          <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>

                  <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>

              </div>

          </div>

          <!-- ENTRADA PARA EL APELLIDO -->

           <div class="form-group"> 

              <div class="input-group"> 

              <span class="input-group-addon"></span>

                  <input type="text" class="form-control input-lg" id="editarApellido"  name="editarApellido" value="" required>

              </div>

          </div>

               </div>

              <!-- ENTRADA PARA EL TELEFONO -->
          
           <div class="form-group"> 

              <div class="input-group"> 

                <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>

                <input type="text" class="form-control input-lg" id="editarTelefono" name="editarTelefono" data-inputmask="'mask':'(999) 9999-9999'" data-mask required>

              </div>

          </div>

          
            <!-- ENTRADA PARA EL USUARIO -->

            <div class="form-group"> 

            <div class="input-group"> 

            <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" class="form-control input-lg" name="editarUsuario" id="editarUsuario" value="" readonly>

            </div>

          </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

            <div class="form-group"> 

            <div class="input-group"> 

           <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input type="password" class="form-control input-lg" id="editarPassword" name="editarPassword" value="" >
                <input type="hidden" id="passwordActual" name="passwordActual">

            </div>

            </div>

           <!-- ENTRADA PARA EL ROL -->
          
           <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-users" aria-hidden="true"></i></span>

                  <select class="form-control input-lg" name="editarRol">
                    
                      <option value="" id="editarRol"></option>

                      <option value="Administrador">Administrador</option>

                      <option value="Tecnico">Tecnico</option>

                  </select>

              </div>

          </div>

</div>
<!-- =========================================
             PIE DEL MODAL
  ===========================================-->
      <div class="modal-footer">

        <a href="tecnico" class="btn btn-default pull-left">Cancelar</a>

        <button type="submit" class="btn btn-dark">Guardar cambios</button>

      </div>

      </form>

    </div>

    <?php   

        $editarTecnico = new ControladorTecnico();
        $editarTecnico -> ctrEditarUsuario();

        ?>


  </div>

</div>

 <?php   

        $eliminarTecnico = new ControladorTecnico();
        $eliminarTecnico -> ctrEliminarTecnico();

        ?>