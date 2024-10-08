<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestForHelp extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    const STATUS_UNVERIFIED = 'unverified';
    const STATUS_DONE = 'done';
}
