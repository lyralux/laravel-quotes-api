<?php

namespace App\Modules\Quotes\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $source = null;
        if($this->source) {
            $source = $this->source->name;
        }
        return [
            'id' => $this->id,
            'text' => $this->text,
            'author' => $this->author->name,
            'source' => $source
        ];
    }
}
