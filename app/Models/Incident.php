<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    protected $table = 'ms_incident';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
