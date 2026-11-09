<?php

/** @var \Framework\Support\LinkGenerator $link */
/** @var array $entities */
?>
<section class="reservation-page content-width">
    <div class="reservation-heading">
        <div>
            <p class="eyebrow">Villa Lúka · administrácia</p>
            <h1>Správa obsahu</h1>
            <p>Vyberte evidenciu, ktorú chcete zobraziť alebo upraviť.</p>
        </div>
    </div>
    <div class="manager-grid">
        <?php foreach ($entities as $key => $definition): ?>
            <a class="manager-card" href="<?= $link->url('manager.index', ['entity' => $key]) ?>">
                <h2><?= htmlspecialchars($definition['title'], ENT_QUOTES, 'UTF-8') ?></h2>
                <span>Otvoriť evidenciu ↗</span>
            </a>
        <?php endforeach; ?>
        <a class="manager-card" href="<?= $link->url('reservation.index') ?>">
            <h2>Rezervácie</h2>
            <span>Otvoriť evidenciu ↗</span>
        </a>
    </div>
</section>
