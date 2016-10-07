<html>
<head>
<title>Buscador de servicios</title>
<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
<?php
require_once('config.php');
?>
<center>
<form method="GET" action="">
<input type="text" name="contiene" size="52" value="<?php if(isset($_GET['contiene'])){echo htmlentities($_GET['contiene']);}?>">
<input type="submit" value="Buscar">
</form>
<?php
###################################################
if(isset($_GET['contiene']))
{
	$buscar = $mysqli->real_escape_string($_GET['contiene']);

	$query = "SELECT * FROM puertos WHERE respuesta LIKE '%$buscar%' ORDER by id DESC";
	$resultado = $mysqli->query($query);
	$total = $resultado->num_rows;

	$num_filas = $resultado->num_rows;

	if (isset($_GET['page']))
	{
		if (is_numeric($_GET['page']) && $_GET['page'] >= 1)
		{
			$limite_1 = $_GET['page']-1;
		} else
		{
			$limite_1 = 0;
		} 
	} else
		{
			$limite_1 = 0;
		}
	
		$limite_1 = 5 * $limite_1;
		$limite_1 = $mysqli->real_escape_string($limite_1);
		$query = "SELECT * FROM puertos WHERE respuesta LIKE '%$buscar%' GROUP BY id ORDER BY id DESC LIMIT 5 OFFSET $limite_1";

		if ($resultado = $mysqli->query($query))
		{
		} else
		{
		}
		echo "Total resultado: $total<br><br><table><tr><td><b>IP</b></td><td><b>Puerto</b></td><td><b>Banner</b></td></tr>";
		while ($fila = mysqli_fetch_array($resultado))
		{
			$ip = $mysqli->query("SELECT * FROM ips WHERE id = '".$fila['idip']."'");
			$fila2 = mysqli_fetch_assoc($ip);
			echo "<tr><td align=\"center\">".htmlentities($fila2['ip'])."</td><td align=\"center\">".htmlentities($fila['puerto'])."</td><td><pre>".htmlentities($fila['respuesta'])."</pre></td></tr>"; 
		}
	}
	echo "</table>";
if(isset($_GET['contiene']))
{
	if (isset($_GET['page']))
	{
		$page = $_GET['page'];
	} else
	{
		$page = 1;
	}
	print " <br><a href=\"index.php?contiene=".htmlentities($_GET['contiene'])."&page=".($page-1)."\"><--</a> ";
	print "  $page  ";
print " <a href=\"index.php?contiene=".htmlentities($_GET['contiene'])."&page=".($page+1)."\">--></a> ";
echo "</p>";
	}




###################################################
?>
			<br>
			<br>
			<pre>Powered by v4char</pre>
		</center>
	</body>
</html>
