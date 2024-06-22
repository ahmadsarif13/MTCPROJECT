<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestPerbaikan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function employee(){
        return $this->belongsTo(employee::class, 'employees_id', 'id');
    }
}
