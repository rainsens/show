<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInquiryRequest;
use App\Http\Requests\UpdateInquiryRequest;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function index()
    {
        $inquiries = Inquiry::orderByDesc('id')->paginate();
        return view('inquiries.index', compact('inquiries'));
    }

    public function create()
    {
        return view('inquiries.create');
    }

    public function store(StoreInquiryRequest $request)
    {
        $request->user()->inquiries()->create([
            'question' => $request->question,
        ]);
        session()->flash('success', 'Question created successfully.');
        return redirect(route('inquiries.index'));
    }

    public function show(Inquiry $inquiry)
    {
        return view('inquiries.show', compact('inquiry'));
    }

    public function edit(Inquiry $inquiry)
    {
        return view('inquiries.edit', compact('inquiry'));
    }

    public function update(UpdateInquiryRequest $request, Inquiry $inquiry)
    {
        $inquiry->update([
            'answer' => $request->answer,
        ]);
        session()->flash('success', 'Question answered successfully.');
        return redirect(route('inquiries.index'));
    }

    public function destroy(Inquiry $inquiry)
    {
        //
    }
}
