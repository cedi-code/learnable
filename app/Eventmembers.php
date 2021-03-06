<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Notifications\Notifiable;

class Eventmembers extends Model
{
    use Notifiable;

    protected $table = 'eventmembers';

    protected $fillable = [
        'user', 'event'
    ];
    public function userdata()
    {
        return $this->belongsTo(User::class,  'user');
    }

    const UPDATED_AT = null;
    const CREATED_AT = null;
}
