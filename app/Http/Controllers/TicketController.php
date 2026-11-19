<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TicketController extends Controller
{
    public function create(Request $request) {
        $data = $request->all();
        $fields = Validator::make($data,[
            'type_tickets' => 'required|array',
        ]);
        if ($fields->fails()) {
            return redirect(url()->previous())
                ->withErrors($fields)
                ->withInput();
        }

        $firstCodeTicket = NULL;
        if (count($data['type_tickets']) > 0) {
            foreach ($data['type_tickets'] as $id_type_ticket => $count) {
                if ($count > 0) {
                    foreach (range(1, $count) as $number) {
                        $firstCodeTicket = Str::random();
                        Ticket::create([
                            'id_type_ticket' => $id_type_ticket,
                            'id_user' => Auth::user()->id_user,
                            'code_ticket' => $firstCodeTicket,
                        ]);
                    }
                }
            }

            if ($firstCodeTicket) {
                $ticket = DB::select("SELECT e.name_event, e.beg_date_event, u.last_name, u.name, u.patronymic, u.email FROM `ticket` as t
                    JOIN `type_ticket` as tt ON tt.id_type_ticket = t.id_type_ticket
                    JOIN `event` as e ON e.id_event = tt.id_event
                    JOIN `user` as u ON u.id_user = e.id_user
                    WHERE t.code_ticket = ?;", [$firstCodeTicket]);

                $orgEmail = $ticket[0]->email;
                $buyEmail = Auth::user()->email;

                MailerController::send($orgEmail, 'У вас купили билеты на мероприятие', view('mailer.org', [
                    'name_event' => $ticket[0]->name_event,
                    'beg_date_event' => $ticket[0]->beg_date_event,
                    'last_name' => Auth::user()->last_name,
                    'name' => Auth::user()->name,
                    'patronymic' => Auth::user()->patronymic,
                    'email' => $buyEmail,
                ]));
                MailerController::send($buyEmail, "Вы купили билеты на мероприятие: ".$ticket[0]->name_event, "<p>Посмотреть свои билеты <a href='".route('login')."'>Авторизация</a></p>");
            } else {
                return redirect(url()->previous())
                    ->withErrors(['error' => 'Нужно выбрать хотябы один билет'])
                    ->withInput();
            }

            return redirect(route('lk'));
        }

        return redirect(url()->previous())
            ->withErrors(['error' => 'Нужно выбрать хотябы один билет'])
            ->withInput();
    }

    public function delete($id) {
        $ticket = Ticket::where('id_ticket', $id)->first();
        if ($ticket) {
            $ticket->delete();
            return redirect(url()->previous());
        }
        return 'Билет не найден';
    }
}
