
  <div class="content-wrapper">
    
    <section class="content-header">
  
      <h1>
      Administrar Casos
  
      </h1>
  
      <ol class="breadcrumb">
  
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
  
        <li class="active">Administrar Casos</li>
  
      </ol>
  
    </section>
  
  
  <section class="content">
  
      <div class="box">
  
        <div class="box-header with-border">
  
          <button class="btn btn-dark" data-toggle="modal" data-target="#modalAgregarCaso">
            
            
            Agregar Caso
  
          </button>
        
        </div>
  
  
          <div class="box-body">
          
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            
            <thead>
              
              <tr>
                
                <th style="width: 10px">#</th>
                <th>Codigo</th>
                <th>Descripción</th>
                <th>Empresa</th>
                <th>Tecnico</th>
                <th>Fecha</th>
                <th>Acciones</th>
  
              </tr>
  
            </thead>
  
            <tbody>
    
            <?php 
    
              $item = null;
              $valor = null;
            
              $respuesta = ControladorCasos::ctrMostrarCasos($item, $valor);
            
              
              foreach ($respuesta as $key => $value) {
            
                echo '  
                <tr> 
                <td>'.($key+1).'</td>
                <td>'.$value["codigo"].'</td>
                <td>'.$value["descripcion"].'</td>';
            
                $itemEmpresa = "emp_id"; 
                $valorEmpresa = $value["id_empresa"]; 
            
                $respuestaEmpresa = ControladorEmpresa::ctrMostrarEmpresas($itemEmpresa, $valorEmpresa);
            
                echo '<td>'.$respuestaEmpresa["emp_nombre"].'</td>';
            
                $itemTecnico = "tec_id"; 
                $valorTecnico = $value["id_tecnico"]; 
            
                $respuestaTecnico = ControladorTecnico::ctrMostrarTecnicos($itemTecnico, $valorTecnico);
            
                echo '<td>'.$respuestaTecnico["tec_nombre"].' '.$respuestaTecnico["tec_apellido"].'</td>
                
                <td>'.$value["fecha"].'</td>
                <td>
            
                <div class="btn-group">
            
                <button class="btn btn-warning btnEditarCaso" idCaso="'.$value["id_caso"].'" data-toggle="modal" data-target="#modalEditarCaso"><i class="fa fa-pencil"></i></button>
                <button class="btn btn-info btnImprimirInforme" codigoCaso="'.$value["codigo"].'"><i class="fa fa-print"></i></button>
               
               
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
             MODAL AGREGAR CASO
  ===========================================-->
  
  <div id="modalAgregarCaso" class="modal fade" role="dialog" >
  
  <div class="modal-dialog">
  
    
    <div class="modal-content">
  
        <form role="form" method="post">  
  <!-- =========================================
             CABEZA DEL MODAL
  ===========================================-->
  
      <div class="modal-header" style="background: #464646; color: white">
  
        <button type="button" class="close" data-dismiss="modal">&times;</button>
  
        <h4 class="modal-title">Agregar usuario</h4>
  
      </div>
  
  <!-- =========================================
             CUERPO DEL MODAL
  ===========================================-->
      <div class="modal-body">
      
      <div class=" box-body">
     
  
        <!-- ENTRADA PARA LA CODIGO -->
  
          <div class="form-group"> 
  
              <div class="input-group"> 
  
                  <span class="input-group-addon"><i class="fa fa-code"></i></span>
  
                    <?php

                    $item = null;
                    $valor = null;

                    $casos = ControladorCasos::ctrMostrarCasos($item, $valor);

                    if(!$casos){

                      echo '<input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" value="1001" readonly>';
                  

                    }else{

                      foreach ($casos as $key => $value) {
                        
                        
                      
                      }

                      $codigo = $value["codigo"] + 1;



                      echo '<input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" value="'.$codigo.'" readonly>';
                  

                    }

                    ?>
                    
  
              </div>
  
          </div>

            <!-- ENTRADA PARA LA DESCRIPCION -->
  
          <div class="form-group"> 
  
              <div class="input-group"> 
  
                  <span class="input-group-addon"><i class="fa  fa-pencil-square"></i></span>
  
                  <input type="text" class="form-control input-lg" name="nuevaDescripcion" id="nuevaDescripcion" placeholder="Ingresar Descripción" required>
  
              </div>
  
          </div>
  
          <!-- ENTRADA PARA LA EMPRESA -->
          
          <div class="form-group"> 
  
            <div class="input-group"> 
  
             <span class="input-group-addon"><i class="fa fa-sitemap"></i></span>
  
              <select class="form-control input-lg" name="nuevaEmpresa">
      
                <option value="">Seleccionar empresa</option>
  
                    <?php 
  
                      $item = null;
                      $valor = null;
  
                      $empresa = ControladorEmpresa::ctrMostrarEmpresas($item, $valor);
  
                      foreach ($empresa as $key => $value) {
                        
                        echo '<option value="'.$value["emp_id"].'">'.$value["emp_nombre"].'</option>';
  
                      }
  
                      ?>
               </select>
  
      </div>
  
  </div>
  
  
          <!-- ENTRADA PARA EL TECNICO -->
          
           <div class="form-group"> 
  
              <div class="input-group"> 
  
               <span class="input-group-addon"><i class="fa fa-male"></i></span>
  
                  <select class="form-control input-lg" name="nuevoTecnico">
                        
                      <option selected>Seleccione El tecnico</option>
            
                          <?php 
  
                            $item = null;
                            $valor = null;
  
                            $tecnico = ControladorTecnico::ctrMostrarTecnicos($item, $valor);
  
                            foreach ($tecnico as $key => $value) {
                              
                              echo '<option value="'.$value["tec_id"].'">'.$value["tec_nombre"].' '.$value["tec_apellido"].'</option>';
  
                            }
  
                            ?>
                        
                    </select>
  
        </div>
  
     </div>
  
  </div>  
  
  </div>
  <!-- =========================================
             PIE DEL MODAL
  ===========================================-->
      <div class="modal-footer">
  
        <a href="casos" class="btn btn-default pull-left">Cancelar</a>
  
        <button type="submit" class="btn btn-dark">Guardar Caso</button>
  
      </div>
  
      </form>
  
      <?php   
  
      $crearCaso = new ControladorCasos();
      $crearCaso -> ctrCrearCaso();
  
      ?>
  
    </div>
  
  </div>
  
  </div>
  
  
  <!-- =========================================
             MODAL EDITAR CASO
  ===========================================-->
  
  <div id="modalEditarCaso" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
  
  
  <div class="modal-content">
  
      <form role="form" method="post">  
  <!-- =========================================
           CABEZA DEL MODAL
  ===========================================-->
  
    <div class="modal-header" style="background: #464646; color: white">
  
      <button type="button" class="close" data-dismiss="modal">&times;</button>
  
      <h4 class="modal-title">Editar caso</h4>
  
    </div>
  
  <!-- =========================================
           CUERPO DEL MODAL
  ===========================================-->
    <div class="modal-body">
    
    <div class=" box-body">


       <!-- ENTRADA PARA EL CODIGO -->

          <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-code"></i></span>

                  <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" readonly required>

              </div>

          </div>
  
      <!-- ENTRADA PARA LA DESCRIPCION -->
  
        <div class="form-group"> 
  
            <div class="input-group"> 
  
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
  
                <input type="text" class="form-control input-lg" id="editarDescripcions" name="editarDescripcions"required>
               
            </div>
  
        </div>

  
        <!-- ENTRADA PARA LA EMPRESA -->
        
        <div class="form-group"> 
  
          <div class="input-group"> 
  
           <span class="input-group-addon"><i class="fa fa-lock"></i></span>
  
            <select class="form-control input-lg" name="editarEmpresa" readonly required>
    
              <option value="" id="editarEmpresa"></option>
  
              
             </select>
  
        </div>
      
      </div>
  
  
        <!-- ENTRADA PARA EL TECNICO -->
        
         <div class="form-group"> 
  
            <div class="input-group"> 
  
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
  
                <select class="form-control input-lg" name="editarTecnico" readonly required>
                      
                    <option value="" id="editarTecnico"></option>
          
                      
                  </select>
  
             </div>
  
         </div>
  
      </div>  
  
  </div>

  <!-- =========================================
           PIE DEL MODAL
  ===========================================-->
    <div class="modal-footer">
  
      <a href="casos" class="btn btn-default pull-left">Cancelar</a>
  
      <button type="submit" class="btn btn-dark">Guardar cambios</button>
  
    </div>
  
    </form>

     <?php   
  
      $editarCaso = new ControladorCasos();
      $editarCaso -> ctrEditarCaso();
  
      ?>
  
  </div>
  
  </div>
  
  </div>

 <?php   
  
      $eliminarCaso = new ControladorCasos();
      $eliminarCaso -> ctrEliminarCaso();
  
      ?>
  