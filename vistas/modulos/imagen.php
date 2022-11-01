

 <div class="content-wrapper">
    
    <section class="content-header">

      <h1>
      Administrar Imagen 

      </h1>

      <ol class="breadcrumb">

        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

        <li class="active">Administrar Imagen</li>

      </ol>

    </section>


  <section class="content">

      <div class="box">

        <div class="box-header with-border">

          <button class="btn btn-dark " data-toggle="modal" data-target="#modalAgregarImagen">
            
            Agregar Imagen

          </button>
        
        </div>


          <div class="box-body">
          
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            
            <thead>
              
              <tr>
                
                <th style="width: 10px">#</th>
                <th>Estado</th>
                <th>Caso</th>
                <th style="width: 10px">Acciones</th>

              </tr>

            </thead>

            <tbody>
              
            <?php 
    
    $item = null;
    $valor = null;
  
    $respuesta = ControladorImagen::ctrMostrarImagen($item, $valor);
  
    
    foreach ($respuesta as $key => $value) {
  
      echo '  
               <tr>  
                      <td>'.($key+1).'</td>';

                    $itemEstado = "ec_id"; 
                    $valorEstado = $value["img_estado"]; 
                
                    $respuestaEstado = ControladorEstado::ctrMostrarEstado($itemEstado, $valorEstado);

                     echo '<td>'.$respuestaEstado["ec_descripcion"].'</td>';

                      
                    $itemCaso = "id_caso"; 
                    $valorCaso = $value["img_caso"]; 
                
                    $respuestaCaso = ControladorCasos::ctrMostrarCasos($itemCaso, $valorCaso);

                     echo '<td>'.$respuestaCaso["descripcion"].'</td>
                      
                      <td>
                    
                       <div class="btn-group">
                    

                                   <button class="btn btn-danger btnEliminarImagen" idImagen="'.$value["img_id"].'"><i class="fa fa-times"></i></button>
                    
                 
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
             MODAL AGREGAR CLIENTE
  ===========================================-->

 
<!-- Modal -->
<div id="modalAgregarImagen" class="modal fade" role="dialog">

  <div class="modal-dialog">

    
    <div class="modal-content">

       <form role="form" method="post" enctype="multipart/form-data">

  <!-- =========================================
             CABEZA DEL MODAL
  ===========================================-->

      <div class="modal-header" style="background: #464646; color: white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Agregar imagen</h4>

      </div>

<!-- =========================================
             CUERPO DEL MODAL
  ===========================================-->\
      <div class="modal-body">
      
      <div class=" box-body">
         
           <!-- ENTRADA PARA EL CASO -->
          
           <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-suitcase"></i></span>

                  <select class="form-control input-lg" name="nuevoCasos">
                    
                      <option value="">Seleccionar Caso</option>

                      <?php 
  
                      $item = null;
                      $valor = null;
  
                      $casos = ControladorCasos::ctrMostrarCasos($item, $valor);
  
                      foreach ($casos as $key => $value) {
                        
                        echo '<option value="'.$value["id_caso"].'">'.$value["descripcion"].'</option>';
  
                      }
  
                      ?>

                  </select>

              </div>

          </div>

           <!-- ENTRADA PARA EL ESTADO -->
          
           <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-minus"></i></span>

                  <select class="form-control input-lg" name="nuevoEstado">
                    
                      <option value="">Seleccionar Estado</option>

                     <?php 
  
                      $item = null;
                      $valor = null;
  
                      $estado = ControladorEstado::ctrMostrarEstado($item, $valor);
  
                      foreach ($estado as $key => $value) {
                        
                        echo '<option value="'.$value["ec_id"].'">'.$value["ec_descripcion"].'</option>';
  
                      }
  
                      ?>

                  </select>

              </div>

          </div>


           <!-- ENTRADA PARA SUBIR IMAGEN -->

             <div class="form-group">
              
              Selecciones la imagen a subir:
              <input type="file" name="nuevaImagen">

            </div>
      </div>  


</div>
<!-- =========================================
             PIE DEL MODAL
  ===========================================-->
      <div class="modal-footer">

        <button type="button" class="btn btn-default  pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" name="submit" class="btn btn-default">Guardar Imagen</button>

      </div>

      </form>

    </div>

   
  </div>

</div>  
