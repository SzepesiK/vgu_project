<?php
$kepek = array();
$olvaso = opendir($MAPPA);
while (($fajl = readdir($olvaso)) !== false) {
    if (is_file($MAPPA . $fajl)) {
        $vege = strtolower(substr($fajl, strlen($fajl) - 4));

        if (in_array($vege, $TIPUSOK))
            $kepek[$fajl] = filemtime($MAPPA . $fajl);
    }
}
closedir($olvaso);
?>

<title>Salgótarjáni Ebrendészeti telep és Menhely</title>
<div id="galeria">
    <center>
        <h3>Salgótarjáni Ebrendészeti telep és Menhely</h3>
    </center>

    <?php
    arsort($kepek);

    foreach ($kepek as $fajl => $datum) {
    ?>
        <div class="kep">

            <a href="<?php echo $MAPPA . $fajl ?>">
                <img src="<?php echo $MAPPA . $fajl ?>">
            </a>

            <p>Név: <?php echo $fajl; ?></p>
            <p>Dátum: <?php echo date($DATUMFORMA, $datum); ?></p>

        </div>
    <?php
    }
    ?>
    <?php
    if (isset($_SESSION['userId'])) {
        echo '<div class="col-sm-2 col-md-12">
        <div class="card">
            <div class="card-header">
                <center><b>Feltöltés a galériába:</b></center>
            </div>
                <div class="card-body">
                    <center>
                        <form method="POST" action="feltolt.php" enctype="multipart/form-data">
                            <table id="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            <p>
                                                <ul class="noDots">
                                                    <li><label>Első:
                                                        <input type="file" name="elso" required>
                                                    </label><br></li>
                                                    <li><label>Második:
                                                        <input type="file" name="masodik">
                                                    </label><br></li>
                                                    <li><label>Harmadik:
                                                        <input type="file" name="harmadik">
                                                    </label><br></li>
                                                </ul>
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        
                            <input type="submit" name="kuld">
                        </form>
                    </center>
                </div>
            </div>
        </div>';
    }
    ?>
</div>