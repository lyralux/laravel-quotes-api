<?php

namespace App\Modules\Quotes\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    protected $fillable = ['name'];
    public static function firstOrCreateByAuthorName($authorName)
    {
        $author = self::firstOrNew([
            'name' => $authorName,
        ]);
        if (!$author->id)
        {
            $author->name = $authorName;
            $author->save();
            return self::find($author->id);
        }
        return $author;
    }
}
