<?php

/** @var \Framework\Support\LinkGenerator $link */
/** @var \App\Models\Reservation[] $reservations */
$escape = static fn(string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
?>
<section class="reservation-page content-width">
    <div class="reservation-heading">
        <div>
            <p class="eyebrow">Villa Lúka · evidencia</p>
            <h1>Rezervácie</h1>
            <p>Prehľad predbežných rezervácií svadieb a podujatí.</p>
        </div>
        <a class="button" href="<?= $link->url('reservation.create') ?>">Pridať rezerváciu</a>
    </div>

    <?php if ($reservations === []): ?>
        <p class="reservation-empty">Zatiaľ nie sú evidované žiadne rezervácie.</p>
    <?php else: ?>
        <div class="reservation-table-wrap">
            <table class="reservation-table">
                <thead>
                <tr>
                    <th>Meno</th>
                    <th>E-mail</th>
                    <th>Termín</th>
                    <th>Hostia</th>
                    <th>Balík</th>
                    <th>Akcie</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($reservations as $reservation): ?>
                    <tr>
                        <td><?= $escape($reservation->customer_name) ?></td>
                        <td><?= $escape($reservation->email) ?></td>
                        <td><?= $escape($reservation->event_date) ?></td>
                        <td><?= $reservation->guest_count ?></td>
                        <td><?= $escape($reservation->package_name) ?></td>
                        <td class="reservation-actions">
                            <a class="reservation-edit" href="<?= $link->url('reservation.edit', ['id' => $reservation->id]) ?>">Upraviť</a>
                            <form method="post" action="<?= $link->url('reservation.delete') ?>"
                                  onsubmit="return confirm('Naozaj chcete vymazať túto rezerváciu?');">
                                <input type="hidden" name="id" value="<?= $reservation->id ?>">
                                <button class="reservation-delete" type="submit">Vymazať</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</section>
