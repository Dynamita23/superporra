<?php require 'header.php' ?>

	<div class="contenedor">
		<h2><?php echo $titulo; ?></h2>
		
			
				<article class="post">
					<?php foreach($resultados as $post): ?>
						
					
					
					
					
						<table class="post">
						<caption></caption>
						<tr align="center">
							<td><h2 class="titulo"><?php echo $post['Numero'] ?></h2></td>
							<td>
							<div class="fecha">
							<a href="single.php?id=<?php echo $post['Numero']; ?>">
						    <p><?php echo ($post['Nombre']); ?></p></a> 
							</div></td>
							<td><img src="./imagenes/logo250x160.png" width="65" height="50"></td>
						</tr>	
				</article>
			</table>
				<?php endforeach; ?>
					
			</div>
		

		<?php require 'paginacion.php'; ?>

	</div>

<?php require 'footer.php'; ?>