<?php require 'header.php' ?>



	<div class="contenedor">

		

			

				<article class=post>

					

					

					<?php foreach($posts as $post): ?>

					<table class="post">

						<caption></caption>

						<tr align="center">

							<td><h1 class="titulo"><?php echo $post['PuestoG'] ?></h1></td>

							<td>

							<div class="fecha">

							<a href="single.php?id=<?php echo $post['Numero']; ?>">

						    <p><?php echo ($post['Nombre']); ?></p></a> 

							</div></td>

							<!--<td><img src="./imagenes/logo250x160.png" width="65" height="50"></td>-->

					<?php endforeach; ?>		

					</table>	

				</article>

			

		



		<?php require 'paginacion.php'; ?>



	</div>



<?php require 'footer.php'; ?>