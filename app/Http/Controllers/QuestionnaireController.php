<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionnaireRequest;
use App\Http\Requests\UpdateQuestionnaireRequest;
use App\Models\Questionnaire;
use Illuminate\Support\Facades\Storage;

class QuestionnaireController extends Controller
{
    public function index()
    {
        $questionnaires = Questionnaire::query()->orderByDesc('id')->paginate();
        return view('questionnaires.index', compact('questionnaires'));
    }

    public function create()
    {
        return view('questionnaires.create');
    }

    public function store(StoreQuestionnaireRequest $request)
    {
        $file = $request->file('cover');
        $cover = Storage::disk('public')->putFile('upload', $file);
        $request->user()->questionnaires()->create([
            'title' => $request->title,
            'cover' => $cover,
            'description' => $request->description,
            'is_open' => (bool)$request->open,
        ]);
        session()->flash('success', 'Questionnaire created successfully.');
        return redirect(route('questionnaires.index'));
    }

    public function show(Questionnaire $questionnaire)
    {
        $questions = $questionnaire->questions()->orderByDesc('id')->get();
        return view('questionnaires.show', compact('questionnaire', 'questions'));
    }

    public function edit(Questionnaire $questionnaire)
    {
        return view('questionnaires.edit', compact('questionnaire'));
    }

    public function update(UpdateQuestionnaireRequest $request, Questionnaire $questionnaire)
    {
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'is_open' => (bool)$request->open,
        ];
        if ($file = $request->file('cover')) {
            $cover = Storage::disk('public')->putFile('upload', $file);
            $data['cover'] = $cover;
        }
        $questionnaire->update($data);
        session()->flash('success', 'Questionnaire updated successfully.');
        return redirect(route('questionnaires.show', $questionnaire));
    }

    public function destroy(Questionnaire $survey)
    {
        //
    }
}
