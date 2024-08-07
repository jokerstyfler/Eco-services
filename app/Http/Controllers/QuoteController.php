<?php
namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Service $service)
    {
        $this->authorize('read devis', Quote::class);

        $quotes = Quote::where('service_id', $service->id)->get();

        return view('quotes.index', compact('quotes', 'service'));
    }

    public function create(Service $service)
    {
        return view('quotes.create', compact('service'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'description' => 'nullable|string',
        ]);

        $quote = new Quote();
        $quote->service_id = $request->service_id;
        $quote->user_id = Auth::id();
        $quote->description = $request->description;
        $quote->save();

        return redirect()->route('services.show', $request->service_id)->with('success', 'Devis créé avec succès.');
    }

    public function destroy(Quote $quote)
    {
        $this->authorize('delete', $quote);

        $quote->delete();

        return back()->with('success', 'Devis supprimé avec succès.');
    }
}
