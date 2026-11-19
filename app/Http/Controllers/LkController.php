<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LkController extends Controller
{
    public function lk() {
        if (Auth::user()->checkOrganizer()) return redirect(route('lkOrganizer'));
        $idUser = Auth::user()->id_user;

        $nextEventDate = DB::select("SELECT DATEDIFF(e.beg_date_event, NOW()) as beg_date_event FROM `ticket` as t
            JOIN `type_ticket` as tt ON tt.id_type_ticket = t.id_type_ticket
            JOIN `event` as e ON e.id_event = tt.id_event
            WHERE t.id_user = ? AND e.beg_date_event > NOW()
            ORDER BY e.beg_date_event
            LIMIT 1;", [$idUser]);

        $ticketsEvents = DB::select("SELECT * FROM `event` as e
            JOIN `type_ticket` as tt ON tt.id_event = e.id_event
            JOIN `ticket` as t ON t.id_type_ticket = tt.id_type_ticket
            WHERE t.id_user = ? AND e.end_date_event > NOW()
            ORDER BY e.beg_date_event DESC;", [$idUser]);

        $arrayTicketsEvents = json_decode(json_encode($ticketsEvents), true);

        $ticketsEventsFilters = [];
        foreach ($arrayTicketsEvents as $row)
        {
            $ticketsEventsFilters[$row['id_event']][] = $row;
        }

        $eventsEnd = DB::select("SELECT e.id_event, e.url_event, e.name_event, e.address_event, e.beg_date_event, e.end_date_event FROM `event` as e
            JOIN `type_ticket` as tt ON tt.id_event = e.id_event
            JOIN `ticket` as t ON t.id_type_ticket = tt.id_type_ticket
            WHERE t.id_user = ? AND e.beg_date_event < NOW()
            GROUP BY e.id_event
            ORDER BY e.beg_date_event DESC;", [$idUser]);

        $buyTypeTickets = DB::select("SELECT id_type_ticket, COUNT(id_type_ticket) as buy_ticket FROM `ticket`
            WHERE id_user = ?
            GROUP BY id_type_ticket", [$idUser]);

        return view('lk', [
            'next_beg_date_event' => isset($nextEventDate[0]->beg_date_event) ? $nextEventDate[0]->beg_date_event : '-',
            'ticketsEvents' => $ticketsEventsFilters,
            'eventsEnd' => $eventsEnd,
            'buyTypeTickets' => $buyTypeTickets
        ]);
    }

    public function lkOrganizer() {
        if (!Auth::user()->checkOrganizer()) return redirect(route('lk'));
        $idUser = Auth::user()->id_user;

        $nextEventDate = DB::select("SELECT DATEDIFF(e.beg_date_event, NOW()) as beg_date_event FROM `ticket` as t
            JOIN `type_ticket` as tt ON tt.id_type_ticket = t.id_type_ticket
            JOIN `event` as e ON e.id_event = tt.id_event
            WHERE e.id_user = ? AND e.beg_date_event > NOW()
            ORDER BY e.beg_date_event
            LIMIT 1;", [$idUser]);

        $eventsInfo = Event::where('id_user', $idUser)
            ->where('id_status', '<>', Status::getIdByCode('PUBLISHED'))
            ->with('status')
            ->get();

        $events = DB::select("SELECT e.id_event, e.url_event, e.name_event, e.address_event, e.beg_date_event, e.end_date_event FROM `event` as e
            JOIN `type_ticket` as tt ON tt.id_event = e.id_event
            LEFT JOIN `ticket` as t ON t.id_type_ticket = tt.id_type_ticket
            WHERE e.id_user = ? AND e.beg_date_event > NOW() AND e.id_status = 3
            GROUP BY e.id_event
            ORDER BY e.beg_date_event ASC;", [$idUser]);

        $eventsEnd = DB::select("SELECT e.id_event, e.url_event, e.name_event, e.address_event, e.beg_date_event, e.end_date_event FROM `event` as e
            JOIN `type_ticket` as tt ON tt.id_event = e.id_event
            LEFT JOIN `ticket` as t ON t.id_type_ticket = tt.id_type_ticket
            WHERE e.id_user = ? AND e.beg_date_event < NOW() AND e.id_status = 3
            GROUP BY e.id_event
            ORDER BY e.beg_date_event DESC;", [$idUser]);

        $buyTypeTickets = DB::select("SELECT e.id_event, t.id_type_ticket, tt.name_type_ticket, tt.url_type_ticket, tt.price_type_ticket, COUNT(t.id_type_ticket) as buy_ticket FROM `ticket` as t
            JOIN `type_ticket` as tt ON tt.id_type_ticket = t.id_type_ticket
            JOIN `event` as e ON e.id_event = tt.id_event
            WHERE e.id_user = ? AND e.beg_date_event > NOW() AND e.id_status = 3
            GROUP BY t.id_type_ticket;", [$idUser]);

        $buyTypeTicketsEnd = DB::select("SELECT e.id_event, t.id_type_ticket, tt.name_type_ticket, tt.url_type_ticket, tt.price_type_ticket, COUNT(t.id_type_ticket) as buy_ticket FROM `ticket` as t
            JOIN `type_ticket` as tt ON tt.id_type_ticket = t.id_type_ticket
            JOIN `event` as e ON e.id_event = tt.id_event
            WHERE e.id_user = ? AND e.beg_date_event < NOW() AND e.id_status = 3
            GROUP BY t.id_type_ticket;", [$idUser]);

        return view('lkOrganizer', [
            'next_beg_date_event' => isset($nextEventDate[0]->beg_date_event) ? $nextEventDate[0]->beg_date_event : '-',
            'events' => $events,
            'eventsEnd' => $eventsEnd,
            'eventsInfo' => $eventsInfo,
            'buyTypeTickets' => $buyTypeTickets,
            'buyTypeTicketsEnd' => $buyTypeTicketsEnd
        ]);
    }
}
