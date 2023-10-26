<?php

namespace App\Http\Controllers\User;

use App\Models\Quote;
use App\Models\Product;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Order;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Quote $quote)
    {
        $quotes = $quote->where('user_id', auth()->user()->id)->with('product')->latest()->get();
        return view('user.quotes.index', compact('quotes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.quotes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $product =  Product::create([
                'name' => $request->name,
                'product_category' => $request->product_category,
                'product_quantity' => $request->quantity,
                'product_type' => $request->product_type,
                'attributes' => json_encode($request['attributes']),
                'status' => 1
            ]);
            $this->createQuote($product, $request);

            if ($request['attachments']) {
                foreach ($request['attachments'] as $file) {
                    $product->productImages()->create([
                        'image' => storeFiles('products', $file)
                    ]);
                }
            }
            DB::commit();

            return redirect()->route('quotes.index')->with('success', 'Quote created successfully.');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong.' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $quote = Quote::with('product.productImages', 'user')->findOrFail($id);

        return view('user.quotes.show', compact('quote'));
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

    public function createQuote($product, $request)
    {
        Quote::create([
            'product_id' => $product->id,
            'user_id' => auth()->user()->id,
            'price' => $request->price,
            'instruction_notes' => $request->instruction_notes,
            'status' => 1
        ]);
    }

    public function createEmboridedPatches()
    {
        return view('user.quotes.emborided-patches');
    }

    public function acceptQuote(Request $request)
    {
        try {
            DB::beginTransaction();
            $quote = Quote::findOrFail($request->quote_id);
            $quote->update([
                'status' => Constant::QUOTE_STATUS['Accepted']
            ]);

            Order::create([
                'user_id' => auth()->id(),
                'order_number' => rand(1333, 100000) . $quote->product_id,
                'product_id' => $quote->product_id,
                'price' => $quote->price,
                'description' => $quote->instruction_notes,
                'status' => Constant::ORDER_STATUS['Pending']
            ]);
            DB::commit();

            return redirect()->route('quotes.index')->with('success', 'Status updated successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong please try again.' . $th->getMessage());
        }
    }

    public function rejectQuote(Request $request)
    {
        $quote = Quote::findOrFail($request->quote_id);
        $quote->update([
            'status' => Constant::QUOTE_STATUS['Rejected']
        ]);

        return redirect()->route('quotes.index')->with('success', 'Status updated successfully.');
    }
}
