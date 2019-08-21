<?php

namespace Corp;

use Illuminate\Database\Eloquent\Model;

class AdminMenu extends Model
{
    protected $fillable =
        [
            'title', 'path', 'parentId'
        ];
}
