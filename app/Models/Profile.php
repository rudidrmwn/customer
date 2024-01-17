<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'birth_date', 'phone_number','email_address','province_address','city_address','street_address','zip_code','ktp_number','current_position_bank_account','bank_account'
    ];
}
