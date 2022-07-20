<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Models\Master\District;

class OnlineApplication extends Model
{
    protected $guarded = ['id','token'];

    protected $fillable = [
        'user_id',
        'name',
        'dob',
        'father_name',
        'mother_name',
        'present_street_address_1',
        'present_street_address_2',
        'present_village_town_city',
        'present_district_id',
        'present_pin',
        'present_police_station',

        'permanent_street_address_1',
        'permanent_street_address_2',
        'permanent_village_town_city',
        'permanent_district_id',
        'permanent_pin',
        'permanent_police_station',

        'nationality',
        'employment_exchange_registered',
        'employment_exchange_number',
        
        'hslc_stream',
        'hslc_university',
        'hslc_percentage',
        'hslc_division',

        'hs_stream',
        'hs_university',
        'hs_percentage',
        'hs_division',

        'graduation_stream',
        'graduation_university',
        'graduation_percentage',
        'graduation_division',

        'others_stream',
        'others_university',
        'others_percentage',
        'others_division',

        'computer_knowledge',
        'experience',
        'experience_in_health',

        'assamese_read',
        'assamese_write',
        'assamese_speak',

        'hindi_read',
        'hindi_write',
        'hindi_speak',

        'english_read',
        'english_write',
        'english_speak',

        'hslc_admit_card',
        'hslc_marksheet',
        'hslc_certificate',
        'hs_marksheet',
        'hs_certificate',
        'computer_certificate',
        'exp_certificate',
        'recent_photo',
        'signature',

        'submission_date',
        'ip_address',
        'unique_code',

    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function present_district(){
        return $this->belongsTo(District::class,'present_district_id');
    }

    public function permanent_district(){
        return $this->belongsTo(District::class,'permanent_district_id');
    }
}
