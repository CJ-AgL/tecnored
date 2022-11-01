
  <div class="content-wrapper">
    
    <section class="content-header">

      <h1>
      Tablero

        <small>Panel de control</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

        <li class="active">Tablero</li>

      </ol>

    </section>

  <!-- Main content -->
  <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          
          <?php

          if($_SESSION["tec_rol"] =="Tecnico"){

             echo '<div class="box box-success">

             <div class="box-header">

             <h1>Bienvenido - @' .$_SESSION["tec_user"].'</h1>

             </div>

             </div>';

          }

          ?>
            


            </div>
         
       
    </div>
      
  </section>
  
</div>
 
