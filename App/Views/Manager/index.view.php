<?php

/** @var \Framework\Support\LinkGenerator $link */
/** @var string $entity */
/** @var array $definition */
/** @var array $fields */
/** @var \Framework\Core\Model[] $records */
$escape = static fn(string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
?>
<section class="reservation-page content-width">
    <div class="reservation-heading">
        <div>
            <p class="eyebrow">Villa Lúka · správa obsahu</p>
            <h1><?= $escape($definition['title']) ?></h1>
            <p>Prehľad záznamov uložených v databáze.</p>
        </div>
        <a class="button" href="<?= $link->url('manager.create', ['entity' => $entity]) ?>">Pridať záznam</a>
    </div>
    <p class="manager-back"><a href="<?= $link->url('manager.index') ?>">← Všetky evidencie</a></p>

    <?php if ($records === []): ?>
        <p class="reservation-empty">Zatiaľ nie sú evidované žiadne záznamy.</p>
    <?php else: ?>
        <div class="reservation-table-wrap">
            <table class="reservation-table">
                <thead>
                <tr>
                    <?php foreach ($fields as $field): ?>
                        <th><?= $escape($field['label']) ?></th>
                    <?php endforeach; ?>
                    <th>Akcie</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($records as $record): ?>
                    <tr>
                        <?php foreach ($fields as $field): ?>
                            <?php
                            $value = (string)$record->{$field['name']};
                            if ($field['type'] === 'select') {
                                $value = $field['options'][$value] ?? $value;
                            } elseif ($field['type'] === 'datetime-local' && $value !== '') {
                                $value = date('d.m.Y H:i', strtotime($value));
                            }
                            ?>
                            <td><?= $escape($value) ?></td>
                        <?php endforeach; ?>
                        <td class="reservation-actions">
                            <a class="reservation-edit" href="<?= $link->url('manager.edit', ['entity' => $entity, 'id' => $record->id]) ?>">Upraviť</a>
                            <form method="post" action="<?= $link->url('manager.delete', ['entity' => $entity]) ?>"
                                  onsubmit="return confirm('Naozaj chcete vymazať tento záznam?');">
                                <input type="hidden" name="id" value="<?= $record->id ?>">
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
