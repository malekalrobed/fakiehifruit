<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'sections';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'image'];

    public function collections()
    {        
        return $this->hasMany(Collection::class);
    }
}
