<?php

namespace App\Http\Controllers;

use App\Models\PvMapping;
use App\Models\PronounOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PvMappingController extends Controller
{
    public function index()
    {
        $pvMappings = PvMapping::all();
        // Fetch pronoun options from the database
        $pronounOptions = PronounOption::all()->pluck('pronoun', 'id');

        return view('pv-mappings.index', compact('pvMappings', 'pronounOptions'));
    }

    public function create()
    {
        $pronounOptions = PronounOption::pluck('pronoun', 'id'); // Fetch pronoun options from the database
        return view('pv-mappings.create', compact('pronounOptions'));
        
    }

    public function store(Request $request)
    {
        //dd($request->all());

        // Validate the request
        // $request->validate([
        //     'pronoun' => 'required',
        //     'verb' => 'required',
        // ]);
       
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'verb' => 'required',
            'pronouns' => 'required|array',
        ]);

        // Check if the validation fails
        if ($validator->fails()) {
            // If validation fails, redirect back with error messages
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $verb = $request->input('verb');
        $pronounGroups = $request->input('pronouns');
        // Convert the array of numbers to a comma-separated string
        $pronounString = implode(',', $pronounGroups);
        //dd($verb);
        
        // Create a new PvMapping instance
        $pvMapping = new PvMapping();

        // Assign values to the model properties
        $pvMapping->verb = $verb;
        $pvMapping->pronoun = $pronounString;

        // Save the PvMapping instance to the database
        $pvMapping->save();
        
        return redirect()->route('pv-mappings.index')->with('success', 'PvMapping created successfully.');
    }

    public function edit($id)
    {
        $pronounOptions = PronounOption::pluck('pronoun', 'id'); // Fetch pronoun options from the database
        
        $pvMapping = PvMapping::findOrFail($id);
        return view('pv-mappings.edit', compact('pvMapping', 'pronounOptions'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'verb' => 'required|string|max:255',
            'pronouns' => 'required|array',
        ]);

        // Find the PvMapping instance based on its ID
        $pvMapping = PvMapping::findOrFail($id);

        // Update the PvMapping instance with the validated data
        $pvMapping->update([
            'verb' => $request->verb,
            'pronoun' => implode(',', $request->pronouns), // Convert the array of pronoun IDs to a comma-separated string
        ]);
        // Redirect back with success message
        return redirect()->route('pv-mappings.index')->with('success', 'PvMapping created successfully.');

        //return redirect()->back()->with('success', 'Verb to pronoun mapping updated successfully.');
    }

    public function destroy($id)
    {
        // Delete the PvMapping
        PvMapping::findOrFail($id)->delete();

        return redirect()->route('pv-mappings.index')->with('success', 'PvMapping deleted successfully.');
    }
}
