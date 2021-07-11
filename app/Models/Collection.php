<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $table = 'collections';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'section_id', 'image'];

    public function products()
    {        
        return $this->hasMany(Product::class);
    }

    public function Section()
    {        
        return $this->belongsTo(Section::class);
    }
}
