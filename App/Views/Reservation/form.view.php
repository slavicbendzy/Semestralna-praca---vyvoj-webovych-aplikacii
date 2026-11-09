<?php

/** @var \Framework\Support\LinkGenerator $link */
/** @var \App\Models\Reservation $reservation */
/** @var string $formAction */
/** @var string $pageTitle */
/** @var string $submitLabel */
$escape = static fn(string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
?>
<section class="reservation-page content-width">
    <div class="reservation-heading">
        <div>
            <p class="eyebrow">Villa Lúka · evidencia</p>
            <h1><?= $escape($pageTitle) ?></h1>
            <p>Zadajte údaje o podujatí a kontaktné informácie.</p>
        </div>
    </div>

    <form class="reservation-form" method="post" action="<?= $formAction ?>">
        <label for="customer_name">Meno a priezvisko</label>
        <input id="customer_name" name="customer_name" type="text" required maxlength="150"
               value="<?= $escape($reservation->customer_name) ?>">

        <label for="email">E-mail</label>
        <input id="email" name="email" type="email" required maxlength="190"
               value="<?= $escape($reservation->email) ?>">

        <label for="event_date">Termín podujatia</label>
        <input id="event_date" name="event_date" type="date" required
               value="<?= $escape($reservation->event_date) ?>">

        <label for="guest_count">Počet hostí</label>
        <input id="guest_count" name="guest_count" type="number" min="1" required
               value="<?= $reservation->guest_count > 0 ? $reservation->guest_count : '' ?>">

        <label for="package_name">Zvolený balík</label>
        <input id="package_name" name="package_name" type="text" required maxlength="150"
               value="<?= $escape($reservation->package_name) ?>">

        <div class="reservation-form-actions">
            <button class="button" type="submit"><?= $escape($submitLabel) ?></button>
            <a class="reservation-cancel" href="<?= $link->url('reservation.index') ?>">Späť na zoznam</a>
        </div>
    </form>
</section>
