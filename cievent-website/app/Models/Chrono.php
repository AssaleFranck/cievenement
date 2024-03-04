<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chrono extends Model
{
    use HasFactory;

    public $fillble = ['event_id'];

    public function event()
    {
        return $this->hasOne(Event::class);
    }
}
