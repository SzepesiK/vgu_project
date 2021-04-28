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

    <h5>Feltöltés a galériába:</h5>
<?php
if (!empty($uzenet)) 
{ 
echo '<ul>';
foreach($uzenet as $u)
echo "<li>$u</li>";
echo '</ul>';
}
?>
<div>
<form action="feltolt.php" method="post" 
enctype="multipart/form-data">

<label>Első:
<input type="file" name="elso" required>
</label>
<label>Második:
<input type="file" name="masodik">
</label>
<label>Harmadik:
<input type="file" name="harmadik">
</label>
<input type="submit" name="kuld">
</form>
</div>

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
</div>