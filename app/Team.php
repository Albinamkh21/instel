<?php

namespace Corp;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
   protected $table = 'team';
    protected $fillable = [
        'name', 'position', 'text', 'img'
    ];
}
