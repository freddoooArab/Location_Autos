<?php
if (isset($_GET['test'])) {
    if ($_GET['test'] == 'modeleAuto') {
        require 'Tests/Modeles/testAuto.php';
    } else if ($_GET['test'] == 'modeleReservation') {
        require 'Tests/Modeles/testReservation.php';
    } else if ($_GET['test'] == 'vueAutos') {
        require 'Tests/Vues/testVueAutos.php';
    } else if ($_GET['test'] == 'vueConfirmer') {
        require 'Tests/Vues/testVueConfirmer.php';
    } else if ($_GET['test'] == 'vueErreur') {
        require 'Tests/Vues/testVueErreur.php';
    } else {
        echo '<h3>Test inexistant!!!</h3>';
    }
}
?>
<h3>Tests de Modèles</h3>
<ul>
    <li>
        <a href="tests.php?test=modeleAuto">Auto</a>
    </li>
    <li>
        <a href="tests.php?test=modeleReservation">Reservation</a>
    </li>
</ul>
<h3>Tests de Vues</h3>
<ul>
    <li>
        <a href="tests.php?test=vueAutos">Autos</a>
    </li>
    <li>
        <a href="tests.php?test=vueConfirmer">Confirmer</a>
    </li>
    <li>
        <a href="tests.php?test=vueErreur">Erreur</a>
    </li>
</ul>
