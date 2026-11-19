<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    public function create(Request $request) {
        Question::create([
                'id_event' => $request->id_event,
                'id_user' => Auth::user()->id_user,
                'name_question' => $request->name_question,
            ]);
        return redirect(url()->previous().'#questionForm')
            ->with(['msg' => 'Вопрос добавлен']);
    }

    public function reply(Request $request, $id) {
        // fixme? добавить проверку, чтобы только на своих мероприятиях можно было отвечать на вопросы

        Question::where('id_question', $id)
            ->update([
                'reply_question' => $request->reply_question,
            ]);

        return redirect(url()->previous().'#questionReply')
            ->with(['msg' => 'Ответ добавлен']);
    }
}
