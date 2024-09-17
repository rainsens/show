<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Question;
use App\Models\Questionnaire;

class QuestionController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Questionnaire $questionnaire)
    {
        return view('questions.create', compact('questionnaire'));
    }

    public function store(StoreQuestionRequest $request, Questionnaire $questionnaire)
    {
        $questionnaire->questions()->create([
            'question' => $request->question,
            'is_open' => (bool)$request->open,
        ]);
        session()->flash('success', 'Question created successfully.');
        return redirect(route('questionnaires.show', $questionnaire));
    }

    public function show(Question $question)
    {
        //
    }

    public function edit(Question $question)
    {
        return view('questions.edit', compact('question'));
    }

    public function update(UpdateQuestionRequest $request, Question $question)
    {
        $question->update([
            'question' => $request->question,
            'is_open' => (bool)$request->open,
        ]);
        session()->flash('success', 'Question updated successfully.');
        return redirect(route('questionnaires.show', $question->questionnaire));
    }

    public function destroy(Question $question)
    {
        //
    }
}
