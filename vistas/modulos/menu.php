<aside class="main-sidebar">
	
	<section class="sidebar">
		
		<ul class="sidebar-menu">

			<li class="active">
				
				<a href="inicio">
					
					<i class="fa fa-home"></i>
					<span>Inicio</span>

				</a>


			</li>
				<?php 


				if($_SESSION["tec_rol"] == "Administrador"){
		
			echo	'<li>

					<a href="tecnico">
						
						<i class="fa fa-male"></i>
						<span>Usuarios</span>

					</a>

				</li>';

				}	

				if($_SESSION["tec_rol"] == "Administrador" || $_SESSION["tec_rol"] == "Tecnico"){

			echo '<li>

					<a href="empresa">
						
						<i class="fa fa-sitemap"></i>
						<span>Empresa</span>

					</a>


				</li>

				<li>
					
					<a href="casos">
						
						<i class="fa fa-suitcase"></i>
						<span>Casos</span>

					</a>

				</li>


					<li>
					
					<a href="imagen">
						
						<i class="fa fa-file-photo-o"></i>
						<span>Imagen</span>

					</a>

				</li>';


			}

			?>

			</ul>

		</section>

</aside>