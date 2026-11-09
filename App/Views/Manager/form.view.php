<?php

/** @var \Framework\Support\LinkGenerator $link */
/** @var string $entity */
/** @var array $definition */
/** @var array $fields */
/** @var \Framework\Core\Model $record */
/** @var string $formAction */
/** @var string $pageTitle */
$escape = static fn(string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
?>
<section class="reservation-page content-width">
    <div class="reservation-heading">
        <div>
            <p class="eyebrow">Villa Lúka · <?= $escape($definition['title']) ?></p>
            <h1><?= $escape($pageTitle) ?></h1>
            <p>Vyplňte údaje a uložte záznam do databázy.</p>
        </div>
    </div>
    <form class="reservation-form" method="post" action="<?= $formAction ?>">
        <?php foreach ($fields as $field): ?>
            <?php
            $name = $field['name'];
            $value = (string)$record->{$name};
            if ($field['type'] === 'datetime-local' && $value !== '') {
                $value = date('Y-m-d\TH:i', strtotime($value));
            }
            ?>
            <label for="<?= $escape($name) ?>"><?= $escape($field['label']) ?></label>
            <?php if ($field['type'] === 'textarea'): ?>
                <textarea id="<?= $escape($name) ?>" name="<?= $escape($name) ?>" rows="4"
                          <?= $field['required'] ? 'required' : '' ?>><?= $escape($value) ?></textarea>
            <?php elseif ($field['type'] === 'select'): ?>
                <select id="<?= $escape($name) ?>" name="<?= $escape($name) ?>" <?= $field['required'] ? 'required' : '' ?>>
                    <option value="">Vyberte možnosť</option>
                    <?php foreach ($field['options'] as $optionValue => $label): ?>
                        <option value="<?= $escape((string)$optionValue) ?>"
                            <?= (string)$record->{$name} === (string)$optionValue ? 'selected' : '' ?>>
                            <?= $escape($label) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?php if ($entity === 'photos' && $field['name'] === 'album_id' && $field['options'] === []): ?>
                    <small>Najskôr vytvorte fotoalbum.</small>
                <?php endif; ?>
            <?php else: ?>
                <input id="<?= $escape($name) ?>" name="<?= $escape($name) ?>"
                       type="<?= $escape($field['type']) ?>"
                       value="<?= $escape($value) ?>"
                       <?= isset($field['step']) ? 'step="' . $escape($field['step']) . '"' : '' ?>
                       <?= isset($field['min']) ? 'min="' . $escape($field['min']) . '"' : '' ?>
                       <?= isset($field['max']) ? 'max="' . $escape($field['max']) . '"' : '' ?>
                       <?= $field['required'] ? 'required' : '' ?>>
            <?php endif; ?>
        <?php endforeach; ?>
        <div class="reservation-form-actions">
            <button class="button" type="submit">Uložiť</button>
            <a class="reservation-cancel" href="<?= $link->url('manager.index', ['entity' => $entity]) ?>">Späť na zoznam</a>
        </div>
    </form>
</section>
