<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\Mood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Store all entries in cache for 1 hour (3600 seconds)
        $entries = Cache::remember('entries', 3600, function() {
            return Entry::orderBy('date', 'ASC')->get();
        });

        return view('entries.index')
            ->with('entries', $entries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $moods = Cache::remember('moods', 3600, function() {
            return Mood::all();
        });

        return view('entries.create')
            ->with('moods', $moods);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // Date must be in format Y-M-D. Must also not already exist in entries table date column
        // Selected mood_id must exist in the moods table under column id
        $request->validate([
            'date' => 'required|date_format:Y-m-d|unique:entries,date,',
            'notes' => 'string|nullable',
            'mood_id' => 'required|exists:moods,id',
        ]);

        Entry::create($request->all());

        return redirect()->route('entries.index')
            ->with('success', 'Entry created.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function show(Entry $entry)
    {
        return view('entries.show')
        ->with('entry', $entry);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function edit(Entry $entry)
    {
        $moods = Cache::remember('moods', 3600, function() {
            return Mood::all();
        });

        return view('entries.edit', compact('entry', 'moods'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entry $entry)
    {
        // Date must be in format Y-M-D. Must also not already exist in entries table date column
        // Selected mood_id must exist in the moods table under column id
        $request->validate([
            'date' => 'required|date_format:Y-m-d|unique:entries,date,'. $entry->id,
            'notes' => 'string|nullable',
            'mood_id' => 'required|exists:moods,id',
        ]);

        $updatedEntry = $request->all(); 
        $entry->update($updatedEntry);

        return redirect()->route('entries.show', [$entry->id])
            ->with('success', 'Entry updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entry $entry)
    {
        $entry->delete();

        return redirect()->route('entries.index')
            ->with('success', 'Entry deleted.');
    }
}