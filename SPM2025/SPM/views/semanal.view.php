<?php require 'header.php' ?>

	<div class="contenedor">
		
			<article>
					
					
					
						<table class="post">
							<tr align="center"><td>
							<div class="fecha">
							<a href="semanal.php?id=<?php echo $post2['Numero']; ?>">
							<p> Clasificación Semanal</p></a></div>
						</td>
						<td>
							<div class="fecha">
							<a href="mensual.php?id=<?php echo $post2['Numero']; ?>">
							<p> Clasificación Mensual</p></a></div>
						</td>	
						<td>
							<div class="fecha">
							<a href="general.php?id=<?php echo $post2['Numero']; ?>">
							<p> Clasificación General</p></a></div>
						</td>
					</tr>
							</table>

						<table class="post">
							
							<tr align="center"><td>
							<p></p>
						</td>
						<td>													
							<p style="color:#FF0000"> Clasificación Semanal</p>
						</td>	
						<td>							
							<p> </p>
						</td>
					</tr>
							</table>
							
						<table class="post">	
							
							<tr align="center">
								<td><p style="color:#FF0000">Puesto</p></td>
								<td><p style="color:#FF0000">Equipo</p></td>
								<td><p style="color:#FF0000">Puntos</p></td></tr>	

							
							<?php foreach($posts as $post2): ?>	
							<tr align="center">
								<td><p class="titulo"><?php echo $post2[$sem] ?></p></td>
								<td><div class="fecha">
							<a href="single.php?id=<?php echo $post2['Numero']; ?>">
								<p class="titulo"><?php echo $post2['Nombre'] ?></p></a></div></td>
								<td><p class="titulo"><?php echo $post2[$semP] ?></p></td></tr>
							<?php endforeach; ?>
					
				</article>
			</table>
		
	</div>

<?php require 'footer.php'; ?>