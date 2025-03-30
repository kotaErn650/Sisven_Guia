<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pais extends Model
{
    use HasFactory;
    protected $table = 'tb_pais';
    protected $primaryKey = 'pais_codi';
    public $timestamps = false;


    public function departamentos ()
    {
        return $this->hasMany(Departamento::class, 'pais_codi', 'pais_codi');
    }

}
