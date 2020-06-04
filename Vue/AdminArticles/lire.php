<?php $this->titre = "Le Blogue du prof - " . $this->nettoyer($auto['titre']); ?>

<auto>
    <header>
        <h1 class="titreAuto"><?= $this->nettoyer($auto['titre']) ?></h1>
        <time><?= $this->nettoyer($auto['date']) ?></time>, par <?= $this->nettoyer($auto['nom']) ?>
        <h3 class=""><?= $this->nettoyer($auto['sous_titre']) ?></h3>
    </header>
    <p><?= $this->nettoyer($auto['texte']) ?></p>
    <p><?= $this->nettoyer($auto['type']) ?></p>
</auto>
<hr />
<header>
    <h1 id="titreReponses">Réponses à <?= $this->nettoyer($auto['titre']) ?> :</h1>
</header>
<?= ($reservations->rowCount() == 0) ? '<p class="message">Pas encore de reservations pour cet auto.</p>' : '' ?>
<?php
foreach ($reservations as $reservation):
    ?>
    <?php if ($reservation['efface'] == '0') : ?>
        <?= $this->nettoyer($reservation['prive']) ? '<p class="prive">' : '<p>'; ?>
        <a href="AdminReservations/confirmer/<?= $this->nettoyer($reservation['id']) ?>" >
            [Effacer]</a>
        <?= $this->nettoyer($reservation['date']) ?>, <?= $this->nettoyer($reservation['auteur']) ?> dit : <?= $this->nettoyer($reservation['prive']) ? '(EN PRIVÉ)' : '' ?><br/>
        <strong><?= $this->nettoyer($reservation['titre']) ?></strong><br/>
        <?= $this->nettoyer($reservation['texte']) ?>
        </p>
    <?php else : ?>
        <p class="efface"><a href="AdminReservations/retablir/<?= $this->nettoyer($reservation['id']) ?>" >
                [Rétablir]</a>
            Reservation du <?= $this->nettoyer($reservation['date']) ?>, par <?= $this->nettoyer($reservation['auteur']) ?> <?= $this->nettoyer($reservation['prive']) ? '(EN PRIVÉ)' : '' ?> effacé!
        </p>
    <?php endif; ?>
<?php endforeach; ?>



