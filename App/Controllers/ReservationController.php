<?php

namespace App\Controllers;

use App\Models\Reservation;
use Framework\Core\BaseController;
use Framework\Http\HttpException;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

class ReservationController extends BaseController
{
    public function index(Request $request): Response
    {
        return $this->html([
            'reservations' => Reservation::getAll(null, [], 'event_date ASC, id DESC'),
        ]);
    }

    public function create(Request $request): Response
    {
        $reservation = new Reservation();

        if ($request->isPost()) {
            $this->fillReservation($reservation, $request);
            $reservation->save();

            return $this->redirect($this->url('reservation.index'));
        }

        return $this->html([
            'reservation' => $reservation,
            'formAction' => $this->url('reservation.create'),
            'pageTitle' => 'Nová rezervácia',
            'submitLabel' => 'Uložiť rezerváciu',
        ], 'form');
    }

    public function edit(Request $request): Response
    {
        $reservation = $this->findReservation($request->value('id'));

        if ($request->isPost()) {
            $this->fillReservation($reservation, $request);
            $reservation->save();

            return $this->redirect($this->url('reservation.index'));
        }

        return $this->html([
            'reservation' => $reservation,
            'formAction' => $this->url('reservation.edit', ['id' => $reservation->id]),
            'pageTitle' => 'Upraviť rezerváciu',
            'submitLabel' => 'Uložiť zmeny',
        ], 'form');
    }

    public function delete(Request $request): Response
    {
        if (!$request->isPost()) {
            throw new HttpException(405);
        }

        $this->findReservation($request->post('id'))->delete();

        return $this->redirect($this->url('reservation.index'));
    }

    private function fillReservation(Reservation $reservation, Request $request): void
    {
        $reservation->customer_name = $this->postString($request, 'customer_name');
        $reservation->email = $this->postString($request, 'email');
        $reservation->event_date = $this->postString($request, 'event_date');
        $reservation->guest_count = (int)$this->postString($request, 'guest_count');
        $reservation->package_name = $this->postString($request, 'package_name');
    }

    private function postString(Request $request, string $key): string
    {
        $value = $request->post($key);
        return is_scalar($value) ? trim((string)$value) : '';
    }

    private function findReservation(mixed $id): Reservation
    {
        $validatedId = filter_var($id, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
        $reservation = $validatedId === false ? null : Reservation::getOne($validatedId);

        if ($reservation === null) {
            throw new HttpException(404);
        }

        return $reservation;
    }
}
