<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TVSeries;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class TVSeriesController extends Controller
{
    public function index()
    {
        $tvseries = TVSeries::all();
        return view('tvseries.index', compact('tvseries'));
    }

    public function create()
    {
        return view('tvseries.create');
    }

    public function store(Request $request)
    {
        // Create a new TVSeries instance
        $series = new TVSeries;
        $series->name = $request->input('name');
        $series->stream = $request->input('stream');
        $series->language = $request->input('language');
        $series->country = $request->input('country');
        $series->genre = $request->input('genre');
        $series->complete_season = $request->input('complete_season');
        $series->is_stream_over = $request->input('is_stream_over');
        $series->short_intro = $request->input('short_intro');
    
        // Handle file upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/tvseries/'), $filename); // Corrected folder path
            $series->image = $filename;
        }
    
        // Save the TV Series
        $series->save();
    
        return redirect()->route('tvseries.index')->with('success', 'TV Series added successfully!');
    }
    
    public function show($id)
    {
        $series = TVSeries::findOrFail($id);
        return view('tvseries.show', compact('series'));
    }

    public function edit($id)
    {
        $series = TVSeries::findOrFail($id);
        return view('tvseries.edit', compact('series'));
    }

    public function update(Request $request, $id)
    {
        $series = TVSeries::findOrFail($id);

        $series->name = $request->input('name');
        $series->stream = $request->input('stream');
        $series->language = $request->input('language');
        $series->country = $request->input('country');
        $series->genre = $request->input('genre');
        $series->complete_season = $request->input('complete_season');
        $series->is_stream_over = $request->input('is_stream_over');
        $series->short_intro = $request->input('short_intro');
    
        
        if ($request->hasFile('image')) {
            $detination='uploads/tvseries/'.$series->image;
            if(File::exists('image'))
            {
                File::delete($detination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/tvseries/', $filename);
            $series->image = $filename;
        }

        

        $series->update();

        return redirect()->route('tvseries.index')->with('success', 'TV Series updated successfully!');
    }

    public function destroy($id)
    {
        $series = TVSeries::findOrFail($id);

        if ($series->image) {
            Storage::delete('public/' . $series->image);
        }

        $series->delete();

        return redirect()->route('tvseries.index')->with('success', 'TV Series deleted successfully!');
    }
}
