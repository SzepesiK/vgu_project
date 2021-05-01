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
	<script type="text/javascript" src="includes/ellenoriz.js"></script>
	<link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />

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
					<ul class="nav navbar-nav navbar-right ml-auto" id="loggedIn">
						<li class="nav-item">
							<?php
							if (isset($_SESSION['userId'])) {
								echo '<b class="nav-link">Bejelentkezett: ' . $_SESSION['userVeznev'] . ' ' . $_SESSION['userKernev'] . '</b>';
							}
							?>
						</li>
						<li class="nav-item">
							<?php
							if (isset($_SESSION['userId'])) {
								echo '
                                    <a class="nav-link" href="includes/logout.inc.php"> Kijelentkezés</a>
                                    <form style="display: none;" class="login-form" method="post">
                                    </form>';
							} else {
								echo '<a class="nav-link" data-toggle="modal" data-target="#myModal">Bejelentkezés/Regisztráció</a>';
							}
							?>
						</li>
					</ul>
				</div>
			</div>
		</nav>


		<?php
		//sql hiba
		if (isset($_GET['error']) && $_GET['error'] == "sqlerror") {
			echo '
		<div class="alert alert-danger" role="alert">
		<p style="text-align: center; font-size:18px;">SQL hiba!</p>
		</div>';
		}
		//login
		if (isset($_GET['login']) && $_GET['login'] == "success") {
			echo '
		<div class="alert alert-success" role="alert">
		<p style="text-align: center; font-size:18px;">A bejeletkezés sikeres volt!</p>
		</div>';
		}
		if (isset($_GET['error']) && $_GET['error'] == "emptyfields") {
			echo '
			<div class="alert alert-danger" role="alert">
			<p style="text-align: center; font-size:18px;">Felhasználónév és jelszó megadása kötelező!</p>
			</div>';
		}
		if (isset($_GET['error']) && $_GET['error'] == "wrongpwd") {
			echo '
		<div class="alert alert-danger" role="alert">
		<p style="text-align: center; font-size:18px;">Hibás jelszó vagy felhasználónév!</p>
		</div>';
		}
		if (isset($_GET['error']) && $_GET['error'] == "nouser") {
			echo '
		<div class="alert alert-danger" role="alert">
		<p style="text-align: center; font-size:18px;">Nincs ilyen felhasználó!</p>
		</div>';
		}
		//signup
		if (isset($_GET['signup']) && $_GET['signup'] == "success") {
			echo '
		<div class="alert alert-success" role="alert">
		<p style="text-align: center; font-size:18px;">A regisztráció sikeres volt</p>
		</div>';
		}
		if (isset($_GET['error']) && $_GET['error'] == "emptyInput") {
			echo '
		<div class="alert alert-danger" role="alert">
		<p style="text-align: center; font-size:18px;">Nincs minden mező kitöltve!</p>
		</div>';
		}
		if (isset($_GET['error']) && $_GET['error'] == "invalidUid") {
			echo '
		<div class="alert alert-danger" role="alert">
		<p style="text-align: center; font-size:18px;">Nem megfelelő felhasználónév formátum!</p>
		</div>';
		}
		if (isset($_GET['error']) && $_GET['error'] == "invalidEmail") {
			echo '
		<div class="alert alert-danger" role="alert">
		<p style="text-align: center; font-size:18px;"Nem megfelelő e-mail formátum!</p>
		</div>';
		}
		if (isset($_GET['error']) && $_GET['error'] == "pwdNotMatch") {
			echo '
		<div class="alert alert-danger" role="alert">
		<p style="text-align: center; font-size:18px;">A megadott jelszavak nem egyeznek!</p>
		</div>';
		}
		if (isset($_GET['error']) && $_GET['error'] == "usernameTaken") {
			echo '
		<div class="alert alert-danger" role="alert">
		<p style="text-align: center; font-size:18px;">A felhasználónév foglalt!</p>
		</div>';
		}
		?>

		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Bejelentkezés/Regisztráció</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">

						<div class="container">
							<div class="row">
								<div class="col-sm login">
									<H2>Bejelentkezés</h2>
									<form class="form-inline login-form" action="includes/login.inc.php" method="post">
										<input type="text" name="mailuid" id="mailuid" placeholder="Felhasználónév">
										<input type="password" name="pwd" id="pwd" placeholder="Jelszó">
										<button type="submit" name="login-submit" id="login-submit">Bejelentkezés</button>
									</form>
								</div>
								<div class="col-sm signup">
									<H2>Regisztráció</h2>
									<form action="includes/signup.inc.php" method="post">
										<input type="text" name="veznev" id="veznev" placeholder="Vezetéknév">
										<input type="text" name="kernev" id="kernev" placeholder="Keresztnév">
										<input type="text" name="email" id="email" placeholder="E-mail">
										<input type="text" name="uid" id="uid" placeholder="Felhasználói név">
										<input type="password" name="pwd" id="pwd" placeholder="Jelszó">
										<input type="password" name="pwdrepeat" id=pwdrepeat placeholder="Jelszó ismét">
										<button type="submit" name="submit" id="submit">Regisztráció</button>
									</form>
								</div>
							</div>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Bezárás</button>
					</div>
				</div>

			</div>
		</div>

		<div class="p-4 col-sm-12">
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