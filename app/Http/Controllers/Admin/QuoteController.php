<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use App\Utilities\Constant;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Quote $quote)
    {
        $status = request()->query('status');
        $quotes = $quote->when($status, fn ($query) => $query->where('status', $this->getQuoteStatus($status)))->with('product')->latest()->get();
        return view('Admin.Panel.quotes.index', compact('quotes'));
    }

    protected function getQuoteStatus($status)
    {
        $quoteStatuses = Constant::QUOTE_STATUS;
        return array_key_exists($status, $quoteStatuses) ? $quoteStatuses[$status] : null;
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $quote = Quote::with('product.productImages', 'user')->findOrFail($id);
        return view('Admin.Panel.quotes.show', compact('quote'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function submitPrice(Request $request)
    {
        $quote = Quote::findOrFail($request->quote_id);
        $quote->price = $request->price;
        $quote->status = Constant::QUOTE_STATUS['Payment_pending'];
        $quote->save();

        return redirect()->route('admin.quotes')->with('success', 'Price submitted successfully');
    }
}
