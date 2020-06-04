<?php $this->titre = 'Location Autos'; ?>

<a href="Adminautos/ajouter">
    <h2 class="titreAuto">Ajouter une auto</h2>
</a>
<?php foreach ($autos as $auto):
    ?>

    <auto>
        <header>
            <a href="Adminautos/lire/<?= $this->nettoyer($auto['id']) ?>">
                <h1 class="titreAuto"><?= $this->nettoyer($auto['marque']) ?> <?= $this->nettoyer($auto['modele']) ?></h1>
            </a>
             Année : <?= $this->nettoyer($auto['annee']) ?><br>
             Tarif horaire : <?= $this->nettoyer($auto['tarif_horaire']) ?>$<br>
             Tarif par jour : <?= $this->nettoyer($auto['tarif_jour']) ?>$<br>
            <a href="Adminautos/modifier/<?= $this->nettoyer($auto['id']) ?>"> [modifier l'auto]</a>
        </header>
    </auto>
    <hr />
<?php endforeach; ?>    
