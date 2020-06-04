<?php $this->titre = 'Le Blogue du prof'; ?>

<a href="Adminautos/ajouter">
    <h2 class="titreAuto">Ajouter un auto</h2>
</a>
<?php foreach ($autos as $auto):
    ?>

    <auto>
        <header>
            <a href="Adminautos/lire/<?= $this->nettoyer($auto['id']) ?>">
                <h1 class="titreAuto"><?= $this->nettoyer($auto['titre']) ?></h1>
            </a>
            <strong class=""><?= $this->nettoyer($auto['sous_titre']) ?></strong><br>
            par <?= $this->nettoyer($auto['nom']) ?><br>
            <time><?= $this->nettoyer($auto['date']) ?></time><br>
            <a href="Adminautos/modifier/<?= $this->nettoyer($auto['id']) ?>"> [modifier l'auto]</a>
        </header>
    </auto>
    <hr />
<?php endforeach; ?>    
