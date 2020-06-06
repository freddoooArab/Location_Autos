<?php $this->titre = "Location Autos - ajouter une auto"; ?>

<header>
    <h1 id="titreReponses">Ajouter un auto au nom de <u><?= $utilisateur ?></u> :</h1>
</header>
<form action="Adminautos/nouvelAuto" method="post">
    <h2>Ajouter un auto</h2>
    <p>
        <label for="auteur">Titre</label> : <input type="text" name="titre" id="titre" /> <br />
        <label for="sous_titre">Sous-titre</label> :  <input type="text" name="sous_titre" id="sous_titre" /><br />
        <label for="texte">Texte de l'auto</label> :  <textarea type="text" name="texte" id="texte" >Écrivez votre auto ici</textarea><br />
        <label for="type">Sujet</label> : <input type="text" name="type" id="auto" /> <br />
        <input type="hidden" name="utilisateur_id" value="<?= $idUtilisateur ?>" /><br />
        <input type="submit" value="Envoyer" />
    </p>
</form>


