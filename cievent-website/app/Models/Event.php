<?php

namespace App\Models;

use App\Models\Invite;
use App\Models\Registed;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'vip',
        'standard',
        'img',
        'date',
        'time',
        'place',
        'website',
        'name_invit',
        'surname_invit',
        'compagny_invit',
        'img_invit',
    ];

    protected $dates = ['date', 'time'];

    public function registeds()
    {
        return $this->hasMany(Registed::class);
    }

    
    public function invites()
    {
        return $this->hasMany(Invite::class);
    }
    
    public function chrono()
    {
        return $this->hasOne(Chrono::class);
    }
}
