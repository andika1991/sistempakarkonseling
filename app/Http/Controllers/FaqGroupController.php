<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqGroup;

class FaqGroupController extends Controller
{
    public function index()
    {
        $faqGroups = FaqGroup::all();
        return view('faq', compact('faqGroups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:faq_groups',
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:faq_groups,id',
        ]);

        FaqGroup::create($request->all());
        return redirect()->route('faq')->with('success', 'FAQ Group created successfully.');
    }

    public function edit($id)
    {
        $faqGroup = FaqGroup::findOrFail($id);
        $faqGroups = FaqGroup::where('id', '!=', $id)->get();
        return view('faq.edit', compact('faqGroup', 'faqGroups'));
    }

    public function update(Request $request, $id)
    {
        $faqGroup = FaqGroup::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:faq_groups,slug,' . $faqGroup->id,
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:faq_groups,id',
        ]);

        $faqGroup->update($request->all());
        return redirect()->route('faq')->with('success', 'FAQ Group updated successfully.');
    }

    public function destroy($id)
    {
        FaqGroup::destroy($id);
        return redirect()->route('faq')->with('success', 'FAQ Group deleted successfully.');
    }
}
