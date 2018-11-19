<?php

namespace App\Modules\Quotes\Requests;
use Illuminate\Foundation\Http\FormRequest;

class QuoteStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function attributes()
    {
        return [
            'text'              => 'Text',
            'author_name'       => 'Author',
            'author_id'         => 'Author Id',
            'source_name'       => 'Source',
            'source_id'         => 'Source Id'

        ];
    }
    public function rules()
    {
        return [
            'text'               => 'required',
            'author_name'        => 'required',
        ];
    }
}

