<?php

namespace App\Controllers;

use App\Models\Message;
use App\Models\Package;
use App\Models\Photo;
use App\Models\PhotoAlbum;
use App\Models\Review;
use App\Models\User;
use Framework\Core\BaseController;
use Framework\Core\Model;
use Framework\Http\HttpException;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

class ManagerController extends BaseController
{
    private const DEFINITIONS = [
        'users' => [
            'title' => 'Používatelia',
            'singular' => 'používateľa',
            'model' => User::class,
            'fields' => [
                ['name' => 'full_name', 'label' => 'Meno a priezvisko', 'type' => 'text', 'required' => true],
                ['name' => 'nickname', 'label' => 'Prezývka', 'type' => 'text', 'required' => true],
                ['name' => 'email', 'label' => 'E-mail', 'type' => 'email', 'required' => true],
                ['name' => 'phone', 'label' => 'Telefón', 'type' => 'tel', 'required' => false],
                ['name' => 'role', 'label' => 'Rola', 'type' => 'select', 'required' => true, 'options' => [
                    'visitor' => 'Návštevník',
                    'customer' => 'Zákazník',
                    'admin' => 'Administrátor',
                ]],
            ],
        ],
        'packages' => [
            'title' => 'Balíky služieb',
            'singular' => 'balík',
            'model' => Package::class,
            'fields' => [
                ['name' => 'name', 'label' => 'Názov', 'type' => 'text', 'required' => true],
                ['name' => 'description', 'label' => 'Popis', 'type' => 'textarea', 'required' => true],
                ['name' => 'price', 'label' => 'Cena (€)', 'type' => 'number', 'step' => '0.01', 'min' => '0', 'required' => true],
                ['name' => 'max_guests', 'label' => 'Maximálny počet hostí', 'type' => 'number', 'min' => '1', 'required' => true],
            ],
        ],
        'reviews' => [
            'title' => 'Recenzie',
            'singular' => 'recenziu',
            'model' => Review::class,
            'fields' => [
                ['name' => 'author_name', 'label' => 'Autor', 'type' => 'text', 'required' => true],
                ['name' => 'rating', 'label' => 'Hodnotenie (1–5)', 'type' => 'number', 'min' => '1', 'max' => '5', 'required' => true],
                ['name' => 'comment', 'label' => 'Komentár', 'type' => 'textarea', 'required' => true],
                ['name' => 'review_date', 'label' => 'Dátum', 'type' => 'date', 'required' => true],
            ],
        ],
        'albums' => [
            'title' => 'Fotoalbumy',
            'singular' => 'album',
            'model' => PhotoAlbum::class,
            'fields' => [
                ['name' => 'title', 'label' => 'Názov', 'type' => 'text', 'required' => true],
                ['name' => 'description', 'label' => 'Popis', 'type' => 'textarea', 'required' => false],
            ],
        ],
        'photos' => [
            'title' => 'Fotografie',
            'singular' => 'fotografiu',
            'model' => Photo::class,
            'fields' => [
                ['name' => 'album_id', 'label' => 'Album', 'type' => 'select', 'required' => true, 'options' => []],
                ['name' => 'title', 'label' => 'Názov', 'type' => 'text', 'required' => true],
                ['name' => 'description', 'label' => 'Popis', 'type' => 'textarea', 'required' => false],
                ['name' => 'file_path', 'label' => 'Cesta k súboru', 'type' => 'text', 'required' => true],
                ['name' => 'position', 'label' => 'Poradie', 'type' => 'number', 'min' => '0', 'required' => true],
            ],
        ],
        'messages' => [
            'title' => 'Kontaktné správy',
            'singular' => 'správu',
            'model' => Message::class,
            'fields' => [
                ['name' => 'full_name', 'label' => 'Meno a priezvisko', 'type' => 'text', 'required' => true],
                ['name' => 'email', 'label' => 'E-mail', 'type' => 'email', 'required' => true],
                ['name' => 'phone', 'label' => 'Telefón', 'type' => 'tel', 'required' => false],
                ['name' => 'message', 'label' => 'Správa', 'type' => 'textarea', 'required' => true],
                ['name' => 'created_at', 'label' => 'Dátum prijatia', 'type' => 'datetime-local', 'required' => true],
                ['name' => 'status', 'label' => 'Stav', 'type' => 'select', 'required' => true, 'options' => [
                    'new' => 'Nová',
                    'read' => 'Prečítaná',
                    'answered' => 'Zodpovedaná',
                    'closed' => 'Uzavretá',
                ]],
            ],
        ],
    ];

    public function index(Request $request): Response
    {
        $entity = $request->get('entity');
        if ($entity === null || $entity === '') {
            return $this->html(['entities' => self::DEFINITIONS], 'overview');
        }

        $definition = $this->definition($entity);
        /** @var class-string<Model> $modelClass */
        $modelClass = $definition['model'];

        return $this->html([
            'entity' => $entity,
            'definition' => $definition,
            'fields' => $this->fields($entity, $definition),
            'records' => $modelClass::getAll(null, [], 'id DESC'),
        ]);
    }

    public function create(Request $request): Response
    {
        $entity = $this->entity($request);
        $definition = $this->definition($entity);
        /** @var class-string<Model> $modelClass */
        $modelClass = $definition['model'];
        $record = new $modelClass();

        if ($request->isPost()) {
            $this->fill($record, $request, $definition);
            $record->save();

            return $this->redirect($this->url('manager.index', ['entity' => $entity]));
        }

        return $this->form($entity, $definition, $record);
    }

    public function edit(Request $request): Response
    {
        $entity = $this->entity($request);
        $definition = $this->definition($entity);
        $record = $this->findRecord($definition['model'], $request->value('id'));

        if ($request->isPost()) {
            $this->fill($record, $request, $definition);
            $record->save();

            return $this->redirect($this->url('manager.index', ['entity' => $entity]));
        }

        return $this->form($entity, $definition, $record);
    }

    public function delete(Request $request): Response
    {
        if (!$request->isPost()) {
            throw new HttpException(405);
        }

        $entity = $this->entity($request);
        $definition = $this->definition($entity);
        $this->findRecord($definition['model'], $request->post('id'))->delete();

        return $this->redirect($this->url('manager.index', ['entity' => $entity]));
    }

    private function form(string $entity, array $definition, Model $record): Response
    {
        $isEdit = $record->id !== null;

        return $this->html([
            'entity' => $entity,
            'definition' => $definition,
            'fields' => $this->fields($entity, $definition),
            'record' => $record,
            'formAction' => $this->url(
                $isEdit ? 'manager.edit' : 'manager.create',
                $isEdit ? ['entity' => $entity, 'id' => $record->id] : ['entity' => $entity]
            ),
            'pageTitle' => ($isEdit ? 'Upraviť: ' : 'Pridať: ') . $definition['singular'],
        ], 'form');
    }

    private function fields(string $entity, array $definition): array
    {
        $fields = $definition['fields'];
        if ($entity === 'photos') {
            $albums = PhotoAlbum::getAll(null, [], 'title ASC');
            foreach ($fields as &$field) {
                if ($field['name'] === 'album_id') {
                    $field['options'] = [];
                    foreach ($albums as $album) {
                        $field['options'][(string)$album->id] = $album->title;
                    }
                    break;
                }
            }
            unset($field);
        }

        return $fields;
    }

    private function fill(Model $record, Request $request, array $definition): void
    {
        foreach ($definition['fields'] as $field) {
            $value = $request->post($field['name']);
            if (!is_scalar($value)) {
                $value = '';
            }

            $value = trim((string)$value);
            if ($field['type'] === 'datetime-local' && $value !== '') {
                $value = str_replace('T', ' ', $value);
                if (strlen($value) === 16) {
                    $value .= ':00';
                }
            }

            $record->{$field['name']} = $field['type'] === 'number'
                ? (str_contains($value, '.') ? (float)$value : (int)$value)
                : $value;
        }
    }

    /** @param class-string<Model> $modelClass */
    private function findRecord(string $modelClass, mixed $id): Model
    {
        $validatedId = filter_var($id, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
        $record = $validatedId === false ? null : $modelClass::getOne($validatedId);

        if ($record === null) {
            throw new HttpException(404);
        }

        return $record;
    }

    private function entity(Request $request): string
    {
        $entity = $request->value('entity');
        if (!is_string($entity) || !isset(self::DEFINITIONS[$entity])) {
            throw new HttpException(404);
        }

        return $entity;
    }

    private function definition(mixed $entity): array
    {
        if (!is_string($entity) || !isset(self::DEFINITIONS[$entity])) {
            throw new HttpException(404);
        }

        return self::DEFINITIONS[$entity];
    }
}
