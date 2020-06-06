<?php $this->titre = "Location Autos - " . $this->nettoyer($auto['marque']); ?>

<header>
    <h1 id="titreReponses">Modifier une auto de l'utilisateur 1 :</h1>
</header>
<form action="Adminautos/miseAJour" method="post">
    <h2>Modifier une auto</h2>
    <p>
        <label for="auteur">Titre</label> : <input type="text" name="titre" id="titre" value="<?= $this->nettoyer($auto['titre']) ?>" /> <br />
        <label for="sous_titre">Sous-titre</label> :  <input type="text" name="sous_titre" id="sous_titre" value="<?= $this->nettoyer($auto['sous_titre']) ?>" /><br />
        <label for="texte">Texte de l'auto</label> :  <textarea name="texte" id="texte" ><?= $this->nettoyer($auto['texte']) ?></textarea><br />
        <label for="type">Sujet</label> : <input type="text" name="type" id="auto" value="<?= $this->nettoyer($auto['type']) ?>" /> <br />
        <input type="hidden" name="utilisateur_id" value="<?= $idUtilisateur ?>" /><br />
        <input type="hidden" name="id" value="<?= $this->nettoyer($auto['id']) ?>" /><br />
        <input type="submit" value="Modifier" />
    </p>
</form>


