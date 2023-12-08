<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestResponseLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'user_ip',
        'method',
        'url',
        'request_parameters',
        'status_code',
        'response_content'
    ];
}
