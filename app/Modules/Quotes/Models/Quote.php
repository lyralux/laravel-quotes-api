<?php

namespace App\Modules\Quotes\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    //
    protected $table = "quotes";
    protected $guarded = ['id'];

    public function author()
    {
        return $this->belongsTo('App\Modules\Quotes\Models\Author');
    }

    public function source()
    {
        return $this->belongsTo('App\Modules\Quotes\Models\Source');
    }
}
