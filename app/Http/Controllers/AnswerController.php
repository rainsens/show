<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnswerRequest;
use App\Http\Requests\UpdateAnswerRequest;
use App\Models\Answer;
use App\Models\Questionnaire;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    public function participant(Questionnaire $questionnaire)
    {
        $participants = $questionnaire->answers()
            ->select('user_id', DB::raw('COUNT(*) as count'))
            ->groupBy('user_id')
            ->with('user')
            ->paginate();
        return view('answers.participant', compact('questionnaire', 'participants'));
    }

    public function index(Questionnaire $questionnaire, User $user)
    {
        $answers = $questionnaire->answers()->where('user_id', $user->id)->get();
        return view('answers.index', compact('questionnaire', 'user', 'answers'));
    }

    public function create()
    {
        //
    }

    public function store(StoreAnswerRequest $request, Questionnaire $questionnaire)
    {
        $questionIds = $request->question_ids;
        $answers = $request->answers;
        for ($i = 0; $i < count($questionIds); $i++) {
            $request->user()->answers()->create([
                'questionnaire_id' => $questionnaire->id,
                'question_id' => $questionIds[$i],
                'answer' => $answers[$i],
            ]);
        }
        session()->flash('success', 'Answered successfully');
        return redirect()->route('questionnaires.show', ['questionnaire' => $questionnaire]);
    }

    public function show(Answer $answer)
    {
        //
    }

    public function edit(Answer $answer)
    {
        //
    }

    public function update(UpdateAnswerRequest $request, Answer $answer)
    {
        //
    }

    public function destroy(Answer $answer)
    {
        //
    }
}
