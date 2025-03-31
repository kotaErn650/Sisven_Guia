<?php

namespace App\Models;


use App\Models\categories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class categories extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'created_at',
        'updated_at'
    ];

    public function categories()
    {
        return $this->belongsTo(categories::class, 'id', 'id');
    }

}
