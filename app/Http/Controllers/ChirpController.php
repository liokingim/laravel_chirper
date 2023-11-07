<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Chirp;
use Inertia\Response;
use Illuminate\View\View;
// use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ChirpPostRequest;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(): View
    public function index(): Response
    {
        // return view('chirps.index', [
        //     'chirps' => Chirp::with('user')->latest()->get(),
        //     // 'chirps' => Chirp::with('user')->orderBy('created_at', 'desc')->paginate(20),
        // ]);
        return Inertia::render('Chirps/Index', [
            'chirps' => Chirp::with('user:id,name')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChirpPostRequest $request):RedirectResponse
    {
        // $validated = $request->validate([
        //     'message' => 'required|string|max:255',
        // ]);

        $validated = $request->validated();

        $validated = $request->safe()->only(['message']);

        $request->user()->chirps()->create($validated);

        return redirect(route('chirps.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp): View
    {
        $this->authorize('update', $chirp);

        return view('chirps.edit', [
            'chirp' => $chirp,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChirpPostRequest $request, Chirp $chirp): RedirectResponse
    {
        $this->authorize('update', $chirp);

        // $validated = $request->validate([
        //     'message' => 'required|string|max:255',
        // ]);

        $validated = $request->validated();

        $validated = $request->safe()->only(['message']);

        $chirp->update($validated);

        return redirect(route('chirps.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp): RedirectResponse
    {
        $this->authorize('delete', $chirp);

        $chirp->delete();

        return redirect(route('chirps.index'));
    }
}
