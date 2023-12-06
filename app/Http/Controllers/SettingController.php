<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('setting.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('setting.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSettingRequest $request)
    {
        $setting = Setting::create([
            'key' => $request->key,
            'value' => $request->value,
            'description' => $request->description,
        ]);

        if ($setting) {
            return redirect()->route('settings.index')->with('success', 'Setting is created');
        } else {
            return redirect()->route('settings.index')->with('error', 'Setting failed to save');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        return view('setting.show', compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        return view('setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        $setting->update($request->all());

        if ($setting) {
            return redirect()->route('settings.index')->with('success', 'Setting is updated');
        } else {
            return redirect()->route('settings.index')->with('error', 'Setting failed to Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        $setting->delete();

        if ($setting) {
            return redirect()->route('settings.index')->with('success', 'Setting is deleted');
        } else {
            return redirect()->route('settings.index')->with('error', 'Setting failed to delete');
        }
    }

    // Display data for Datatables
    public function data()
    {
        $settings = Setting::orderBy('created_at', 'ASC');

        return datatables()->of($settings)
            ->addColumn('action', 'setting.action')
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }
}
