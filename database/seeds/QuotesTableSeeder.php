<?php

use Illuminate\Database\Seeder;
use App\Modules\Quotes\Models\Quote;
use App\Modules\Quotes\Models\Author;
use App\Modules\Quotes\Models\Source;

class QuotesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $url = 'http://quotes.brandonjs.dev.com/quotes.json';
        $data = file_get_contents($url);
        $quotesJson = json_decode($data);

        $quotes = $quotesJson->data;

        foreach ($quotes as $quote) {
            $input = [];

            $input['text'] = $quote->quote;
            $input['author_id']  = Author::firstOrCreateByAuthorName($quote->author)->id;

            if($quote->source) {
                $input['source_id']  = Source::firstOrCreateBySourceName($quote->source, $input['author_id'])->id;
            }
            if($quote->comment) {
                $input['comments'] = $quote->comment;
            }

            $quote = Quote::create($input);
        }
    }
}
