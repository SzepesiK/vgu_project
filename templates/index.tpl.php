<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $ablakcim['cim'] . ((isset($ablakcim['mottó'])) ? ('|' . $ablakcim['mottó']) : '') ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="./styles/stilus.css" type="text/css">
	<?php if (file_exists('./styles/' . $keres['fajl'] . '.css')) { ?>
		<link rel="stylesheet" href="./styles/<?= $keres['fajl'] ?>.css" type="text/css"><?php } ?>
</head>

<body>
	<header>
		<div class="container-fluid">
			<div class="row pl-0 pt-0">
				<div class="p-0 col-sm-4">
					<img class="p-0 mb-0" src="./images/<?= $fejlec['kepbal'] ?>" alt="<?= $fejlec['balalt'] ?>">
				</div>
				<div class="p-0 col-sm-6">
					<img class="p-0 mb-0" src="./images/<?= $fejlec['kepkozep'] ?>" alt="<?= $fejlec['kozepalt'] ?>">
				</div>
			</div>
		</div>

	</header>


	<!--Csik -->
	<table name="csiktabla" style="text-align: left; width: 100%;" border="0" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td style="background-color: rgb(0, 0, 0); height: 2px;"> </td>
			</tr>
			<tr>
				<td style="background-color: rgb(253, 169, 31); height: 4px;"> </td>
			</tr>
		</tbody>
	</table>



	<div id="wrapper">
		<nav class="navbar navbar-expand-lg">
			<div class="container">
				<button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>

				<div id="navbarSupportedContent" class="collapse navbar-collapse">
					<ul class="navbar-nav mx-auto">
						<?php foreach ($oldalak as $url => $oldal) { ?>
							<li<?= (($oldal == $keres) ? ' class="active"' : '') ?>>
								<a href="<?= ($url == '/') ? '.' : ('?oldal=' . $url) ?>">
									<?= $oldal['szoveg'] ?></a>
								</li>
							<?php } ?>
					</ul>
				</div>
			</div>
		</nav>



		<div class="container-fluid pt-3">
			<?php include("./templates/pages/{$keres['fajl']}.tpl.php"); ?>
		</div>
	</div>

	<!--Csik -->
	<table name="csiktabla" style="text-align: left; width: 100%;" border="0" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td style="background-color: rgb(0, 0, 0); height: 2px;"> </td>
			</tr>
			<tr>
				<td style="background-color: rgb(253, 169, 31); height: 4px;"> </td>
			</tr>
		</tbody>
	</table>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
<footer class="text-center">

	<?php if (isset($lablec['ceg'])) { ?><?= $lablec['ceg']; ?><?php } ?>

</footer>

</html>