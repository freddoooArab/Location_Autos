<?php $this->titre = 'Location Auto'; ?>

<?php foreach ($autos as $auto):
    ?>
    <article>
        <header>
            <a href="Autos/lire/<?= $this->nettoyer($auto['id']) ?>">
                <h1 class="titreAuto"><?= $this->nettoyer($auto['marque']) ?> <?= $this->nettoyer($auto['modele']) ?></h1>
            </a>par <?= $this->nettoyer($auto['nom']) ?><br>  
        </header>
    </article>
    <hr />
<?php endforeach; ?>    
