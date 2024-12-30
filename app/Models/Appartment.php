<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appartment extends Model
{
    use HasFactory;
    protected $fillable = ['appartment_name', 'location', 'price', 'client_id'];
    
    public function client()
    {
        return $this->belongsTo(Clients::class, 'client_id');
    }
}
