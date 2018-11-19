<?php

namespace App\Modules\Quotes\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Quotes\Models\Quote;
use App\Modules\Quotes\Models\Author;
use App\Modules\Quotes\Models\Source;
use Illuminate\Http\Request;
use App\Modules\Quotes\Requests\QuoteStoreRequest;
use App\Modules\Quotes\Resources\QuoteResource;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url = './quotes.json';
        $data = file_get_contents($url);
        $quotes = json_decode($data);

//        return var_dump($quotes);

        return view('quotes.test', ['quotes' => $quotes->data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('quotes.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuoteStoreRequest $request)
    {
        $input = $request->except(['author_name', 'source_name']);

        $input['author_id']  = Author::firstOrCreateByAuthorName($request->input('author_name'))->id;
        if($request->input('source_name')) {
            $input['source_id']  = Source::firstOrCreateBySourceName($request->input('source_name'), $input['author_id'])->id;
        }

        $quote = Quote::create($input);
        return response()->json(['id' => $quote->id], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param   $quoteId
     * @return \Illuminate\Http\Response
     */
    public function show($quoteId)
    {
        //
        return new QuoteResource(Quote::find($quoteId));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function edit(Quote $quote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quote $quote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quote $quote)
    {
        //
    }
}
