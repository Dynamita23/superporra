<?php require 'header.php' ?>



	<div class="contenedor">

		

			<article>

			            <table class="post">

					     <tr align="center">

					            <td><p class="titulo"><?php echo $post['Nombre'] ?></p></td>

								<td><p class="titulo"><?php echo $post['Usuario'] ?></p></td></tr>	

					

						<table class="post">

						

								

							<tr align="center">

								<td><p style="color:#FF0000">Moto GP</p></td>

								<td><p style="color:#FF0000">F1</p></td></tr>				

							<tr align="center">

								<td><p class="titulo"><?php echo $post['MGP1'] ?></p></td>

								<td><p class="titulo"><?php echo $post['F11'] ?></p></td></tr>

							<tr align="center">

								<td><p class="titulo"><?php echo $post['MGP2'] ?></p></td>

								<td><p class="titulo"><?php echo $post['F12'] ?></p></td></tr>

							<tr align="center">

								<td><p class="titulo"><?php echo $post['MGP3'] ?></p></td>

								<td><p class="titulo"><?php echo $post['F13'] ?></p></td></tr>

							<tr align="center">

								<td><p class="titulo"><?php echo $post['MGP4'] ?></p></td>

								<td><p class="titulo"><?php echo $post['F14'] ?></p></td></tr>

							<tr align="center">

								<td><p class="titulo"><?php echo $post['MGP5'] ?></p></td>

								<td><p class="titulo"><?php echo $post['F15'] ?></p></td></tr>

							<tr align="center">  

								<td><p class="titulo"><?php echo $post['MGP6'] ?></p></td>

								<td><p class="titulo"><?php echo $post['F16'] ?></p></td></tr>

							<tr align="center">

								<td><p class="titulo"><?php echo $post['MGP7'] ?></p></td>

								<td><p class="titulo"><?php echo $post['F17'] ?></p></td>

							</tr>



					<table class="post">

						

						<tr  class="post" align="center"><td>

							<div class="fecha">

							<a href="general.php?id=<?php echo $post['Numero']; ?>">

							<p>General</p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['General'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PuestoG']); ?></p></a> 

							</td></div>

							

						</tr>		</table>



						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="single.php?id=<?php echo $post['Numero']; ?>">

							<p>Moto GP</p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['MotoGP'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PuestoM']); ?></p></a> 

							</td></div></tr></table>



						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="single.php?id=<?php echo $post['Numero']; ?>">

							<p>Formula 1</p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['Formula 1'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PuestoF']); ?></p></a> 

							</td></div>

							

						</tr>		</table>



						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="mensual.php?id=<?php echo $post['Numero']; ?>">

							<p>Mes 1</p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['Mes 1'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PuestoM1']); ?></p></a> 

							</td></div>

							

						</tr>		</table>



					 	<table class="post"> 



						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="mensual.php?id=<?php echo $post['Numero']; ?>">

							<p>Mes 2</p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['Mes 2'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PuestoM2']); ?></p></a> 

							</td></div>

							

						</tr>		</table>



						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="mensual.php?id=<?php echo $post['Numero']; ?>">

							<p>Mes 3</p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['Mes 3'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PuestoM3']); ?></p></a> 

							</td></div>

							

						</tr>		</table>


						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="mensual.php?id=<?php echo $post['Numero']; ?>">

							<p>Mes 4</p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['Mes 4'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PuestoM4']); ?></p></a> 

							</td></div>

							

						</tr>		</table>



						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="mensual.php?id=<?php echo $post['Numero']; ?>">

							<p>Mes 5</p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['Mes 5'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PuestoM5']); ?></p></a> 

							</td></div>

							

						</tr>		</table>


						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="mensual.php?id=<?php echo $post['Numero']; ?>">

							<p>Mes 6</p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['Mes 6'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PuestoM6']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="mensual.php?id=<?php echo $post['Numero']; ?>">

							<p>Mes 7</p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['Mes 7'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PuestoM7']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="mensual.php?id=<?php echo $post['Numero']; ?>">

							<p>Mes 8</p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['Mes 8'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PuestoM8']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cm1 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CM1'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['M1']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cf1 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CF1'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PF1']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cm2 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CM2'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['M2']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cf2 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CF2'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PF2']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cm3 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CM3'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['M3']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cf3 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CF3'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PF3']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cm4 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CM4'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['M4']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cf4 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CF4'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PF4']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cm5 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CM5'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['M5']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cf5 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CF5'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PF5']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cm6 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CM6'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['M6']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cf6 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CF6'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PF6']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cm7 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CM7'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['M7']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cf7 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CF7'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PF7']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cm8 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CM8'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['M8']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cf8 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CF8'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PF8']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cm9 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CM9'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['M9']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cf9 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CF9'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PF9']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cm10 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CM10'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['M10']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cf10 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CF10'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PF10']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cm11 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CM11'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['M11']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cf11 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CF11'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PF11']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cm12 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CM12'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['M12']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cf12 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CF12'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PF12']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cm13 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CM13'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['M13']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cf13 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CF13'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PF13']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cm14 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CM14'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['M14']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cf14 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CF14'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PF14']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cm15 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CM15'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['M15']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cf15 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CF15'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PF15']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cm16 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CM16'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['M16']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cf16 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CF16'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PF16']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cm17 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CM17'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['M17']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cf17 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CF17'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PF17']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cm18 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CM18'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['M18']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cf18 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CF18'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PF18']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cm19 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CM19'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['M19']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cf19 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CF19'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PF19']); ?></p></a> 

							</td></div>

							

						</tr>		</table>
						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cm20 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CM20'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['M20']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cm21 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CM21'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['M21']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cf20 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CF20'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PF20']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cf21 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CF21'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PF21']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cf22 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CF22'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PF22']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

						<table class="post">

						

						<tr class="post" align="center"><td>

						<div class="fecha">

							<a href="semanal.php?id=<?php echo $post['Numero']; ?>">

							<p><?php echo $cf23 ?></p></a></div>

						</td>

						<td>

						<p>Puesto</p>

						</td>

						</tr>

						<tr align="center">

							

							<td><h1 class="titulo"><?php echo $post['CF23'] ?></h1></td>

							<td>

							<div class="fecha">

						    <p><?php echo ($post['PF23']); ?></p></a> 

							</td></div>

							

						</tr>		</table>

				</article>

			</table>

		

	</div>



<?php require 'footer.php'; ?>