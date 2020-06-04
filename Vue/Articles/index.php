<?php $this->titre = 'Le Blogue du prof'; ?>

<?php foreach ($autos as $auto):
    ?>
    <auto>
        <header>
            <a href="Autos/lire/<?= $this->nettoyer($auto['id']) ?>">
                <h1 class="titreAuto"><?= $this->nettoyer($auto['titre']) ?></h1>
            </a>
            <strong class=""><?= $this->nettoyer($auto['sous_titre']) ?></strong><br>
            par <?= $this->nettoyer($auto['nom']) ?><br>
            <time><?= $this->nettoyer($auto['date']) ?></time>
        </header>
    </auto>
    <hr />
<?php endforeach; ?>    
