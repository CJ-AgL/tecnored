<header class="main-header">

		<!--=========================================
   		             	LOGOTIPO
 		 ===========================================-->

	<a href="inicio" class="logo">
	
		<!-- logo mini -->
		<span class="logo-mini">
		
			<img src="vistas/img/usuarios/tecnologia.png" class="img-responsive" style="padding: 10px;">

		</span>

		<!-- logo normal -->

			<span class="logo-lg">
			
				<img src="vistas/img/plantilla/tecno.png" class="img-responsive" style="padding: 10px 0px;">

		</span>

	</a> 

	<!--=========================================
                	BARRA DE NAVEGACIÓN
 	 ===========================================-->

 	 <nav class="navbar navbar-static-top" role="navegation">

 	 	<!-- boton de navegación -->
 	 	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
 	 		<span class="sr-only">Toogle navigation</span>
 	 			</a>

 	 			<!-- perfil de usuario -->

 	 			<div class="navbar-custom-menu">
		
					<ul class="nav navbar-nav">
			
						<li class="dropdown user user-menu">
				
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">

								<img src="vistas/img/usuarios/jugador.png" class="user-image">
 
								<span class="hidden-xs"><?php echo $_SESSION["tec_user"];?> | <?php echo $_SESSION["tec_rol"];?></span>

							</a>

							<!-- Dropdown-toggle -->

			 				<ul class="dropdown-menu">
			 					
			 					<li class="user-body">
			 						
			 						<div class="pull-right">
			 							
			 							<a href="salir" class="btn btn-default btn-flat">Salir</a>	

			 						</div>

			 					</li>

			 				</ul>

						</li>

					</ul> 	 		

 				</div>



 			</nav>

</header>