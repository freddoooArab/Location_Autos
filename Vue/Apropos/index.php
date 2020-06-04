<?php $titre = 'Location Autos'; ?>

<ul>
    <li>Frédéric Arab</li>

    <li>420-4A4 MO Web et Bases de données</li>
    <li>Hiver 2020, Collège Montmorency</li>
</ul>
<h3>Vente Auto</h3>
<ul>
    <li>L'application "Location_Autos" permet de gérer un système de location de véhicule.</li>
    <li>La page d'Accueil présente la liste des véhicules pouvant être loués.</li>
    <li>L'utilisateur régulier peut seulement consulté les véhicules et faire la location de celui qui'il veut.</li>
    <li>L'utilisateur en session peut ajouter, modifier et supprimer des véhicules dans le système.</li>
    <li>Il peut aussi cancéler une location et voir combien combien de temps ça fait que le locataire à le véhicule en sa possesion.</li>
        <li>
            <form action="<?= $utilisateur != '' ? 'Admin' : ''; ?>autos" method="post">
                <input type="submit" value="Changer de controleur d'accueil">
            </form>
        </li>
    </ul>
 <br>

<table>
    <tr>
        <td>
            <h4>Base de données utilisée par l'application :</h4>
                <img src="Contenu/images/BD_Location_Autos.png"  height="400" width="500" alt=""/>
            <br/>
        </td>
    </tr>
    <tr>
        <td>
            <h4>Basé sur ce modèle original :</h4>
                <img src="Contenu/images/BD_Vente_Auto.png"  height="400" width="500" alt=""/>
            <br/>
        </td>
    </tr>
</table>