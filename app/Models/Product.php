<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'desc', 'color', 'image', 'unit', 'count', 'price', 'discount', 'rating', 'trade_mark', 'country_origin', 'collection_id', 'created_at', 'updated_at'];
    
    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }
    
    public function stocks()
    {        
        return $this->hasMany(Stock::class);
    }

}
