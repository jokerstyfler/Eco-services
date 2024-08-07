<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create service')->only('store');
        $this->middleware('can:edit service')->only('edit', 'update');
        $this->middleware('can:delete service')->only('destroy');
    }
    /**
     * Affiche la liste des services.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    /**
     * Enregistre un nouveau service.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'nullable|numeric',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = null;
        }

        Service::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath
        ]);

        return redirect()->route('service');
    }


    /**
     * Affiche le formulaire pour éditer un service existant.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\View\View
     */
    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    /**
     * Met à jour un service existant.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'nullable|numeric',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $service->image = $imagePath;
        }

        $service->update($request->only('name', 'description', 'price', 'image'));

        return redirect()->route('service');
    }

    /**
     * Supprime un service existant.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('service');
    }
}
