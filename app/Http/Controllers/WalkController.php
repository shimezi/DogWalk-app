<?php

namespace App\Http\Controllers;

use App\Models\Walk;
use Illuminate\Http\Request;
use App\Http\Requests\StoreWalkRequest;
use App\Http\Requests\UpdateWalkRequest;

class WalkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $walks = Walk::orderBy('date', 'desc')->get();
        return view('walks.index', compact('walks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('walks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWalkRequest $request)
    {
        Walk::create($request->validated());
        return redirect()->route('walks.index')->with('success', '散歩記録を登録しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Walk  $walk
     * @return \Illuminate\Http\Response
     */
    public function show(Walk $walk)
    {
        return view('walks.show', compact('walk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Walk  $walk
     * @return \Illuminate\Http\Response
     */
    public function edit(Walk $walk)
    {
        return view('walks.edit', compact('walk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Walk  $walk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWalkRequest $request, Walk $walk)
    {
        $walk->update($request->validated());
        return redirect()->route('walks.index')->with('success', '散歩記録を更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Walk  $walk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Walk $walk)
    {
        $walk->delete();
        return redirect()->route('walks.index')->with('success', '散歩記録を削除しました。');
    }
}
