<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Question;
use App\Models\Status;
use App\Models\TypeTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function createEventForm() {
        $categories = Category::all();
        return view('createEvent', [
            'categories' => $categories
        ]);
    }

    public function event($id) {
        $event = Event::where('id_event', $id)
            ->where('id_status', Status::getIdByCode('PUBLISHED'))
            ->where('beg_date_event', '>', Carbon::now())
            ->with('category')
            ->with('organizer')
            ->first();

        if ($event) {
            $typeTickets = TypeTicket::where('id_event', $event->id_event)
                ->get();

            foreach ($typeTickets as $item) {
                $count_buy_tickets = DB::select("SELECT COUNT(t.id_ticket) as 'count_buy_tickets' FROM `ticket` as t
                    JOIN `type_ticket` as tt ON tt.id_type_ticket = t.id_type_ticket
                    WHERE t.id_type_ticket = ? AND tt.id_event = ?;", [$item->id_type_ticket, $event->id_event]);
                $item->count_buy_tickets = $count_buy_tickets[0]->count_buy_tickets;
            }

            $questions = Question::where('id_event', $event->id_event)
                ->with('user')
                ->orderByDesc('date_question')
                ->get();

            return view('event', [
                'event' => $event,
                'typeTickets' => $typeTickets,
                'questions' => $questions,
            ]);
        }
        return redirect(route('pageNotFound'));
    }

    public function eventEnd($id) {
        $event = Event::where('id_event', $id)
            ->where('id_status', Status::getIdByCode('PUBLISHED'))
            ->where('beg_date_event', '<', Carbon::now())
            ->with('category')
            ->with('organizer')
            ->first();

        if ($event) {
            $idUser = Auth::user()->id_user;
            $checkOrg = $event->id_user == $idUser;
            $checkUser = DB::select("SELECT t.id_ticket FROM `ticket` as t
                JOIN `type_ticket` as tt ON tt.id_type_ticket = t.id_type_ticket
                WHERE t.id_user = ? AND tt.id_event = ?
                LIMIT 1;", [$idUser, $event->id_event]);
            $checkUser = count($checkUser) > 0;

            if ($checkOrg || $checkUser) {
                $typeTickets = TypeTicket::where('id_event', $event->id_event)
                    ->get();

                $questions = Question::where('id_event', $event->id_event)
                    ->with('user')
                    ->orderByDesc('date_question')
                    ->get();

                return view('eventEnd', [
                    'event' => $event,
                    'typeTickets' => $typeTickets,
                    'questions' => $questions,
                ]);
            }
        }
        return redirect(route('pageNotFound'));
    }

    public function adminEventList() {
        $events = Event::with('category')
            ->with('status')
            ->with('organizer')
            ->get();
        return view('panel.event.list', [
            'events' => $events
        ]);
    }

    public function changeStatus(Request $request) {
        Event::where('id_event', $request->id_event)
            ->update([
                'id_status' => Status::getIdByCode($request->code_status)
            ]);
        return redirect(url()->previous());
    }

    public function create(Request $request) {
        $data = $request->all();

        $event = Event::create([
            'id_status' => Status::getIdByCode('SENT'),
            'id_category' => $data['id_category'],
            'id_user' => Auth::user()->id_user,
            'name_event' => $data['name_event'],
            'address_event' => $data['address_event'],
            'description_event' => $data['description_event'],
            'beg_date_event' => $data['beg_date_event'],
            'end_date_event' => $data['end_date_event'],
        ]);

        $main_img = $request->file('main_img');
        $typeImg = $main_img->extension();
        $uniqName = Str::random();
        $nameImg = $uniqName.'.'.$typeImg;
        $pathFolder = 'storage/events/';

        $main_img->move(public_path($pathFolder), $nameImg);

        Event::where('id_event', $event->id_event)->update([
            'url_event' => $pathFolder . $nameImg,
        ]);

        foreach (range(0, count($data['name_type_ticket']) - 1) as $key) {
            $img = $request->file('img_type_ticket');
            $typeImg = $img[$key]->extension();
            $uniqName = Str::random();
            $nameImg = $uniqName.'.'.$typeImg;
            $pathFolder = 'storage/tickets/';

            $img[$key]->move(public_path($pathFolder), $nameImg);

            TypeTicket::create([
                'id_event' => $event->id_event,
                'name_type_ticket' => $data['name_type_ticket'][$key],
                'price_type_ticket' => $data['price_type_ticket'][$key],
                'size_type_ticket' => $data['size_type_ticket'][$key],
                'url_type_ticket' => $pathFolder . $nameImg,
            ]);
        }

        return redirect(route('lkOrganizer'));
    }

    public function delete($id) {
        // fixme удалять еще и виды билетов + проверять доступ
        Event::where('id_event', $id)->delete();
        return redirect(url()->previous());
    }
}
