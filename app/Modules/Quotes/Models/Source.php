<?php

namespace App\Modules\Quotes\Models;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    //
    protected $fillable = ['name', 'source_id'];
    public static function firstOrCreateBySourceName($sourceName, $authorId)
    {
        $source = self::firstOrNew([
            'name' => $sourceName,
        ]);
        if (!$source->id)
        {
            $source->name = $sourceName;
            $source->author_id = $authorId;
            $source->save();
            return self::find($source->id);
        }
        return $source;
    }
}
