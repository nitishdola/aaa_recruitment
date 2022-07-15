<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $guarded = ['id','token'];

    protected $fillable = [
        'applied_for',
        'name',
        'mobile_number',
        'email',
        'experience',
        'cv_path',
        'submission_date',
        'ip_address',
        'unique_code',
        'email_verification_key',
    ];
}
