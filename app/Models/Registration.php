<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'registration_id',
        'name',
        'grade',
        'parents_name',
        'parents_phone',
        'email',
        'home_address',
        'school',
        'another_phone',
        'special_needs', // ✅ add this
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($registration) {
            if (empty($registration->registration_id)) {
                $registration->registration_id = self::generateRegistrationId();
            }
        });
    }

    public static function generateRegistrationId()
    {
        do {
            $id = 'ON-' . str_pad(random_int(0, 99999999), 8, '0', STR_PAD_LEFT);
        } while (self::where('registration_id', $id)->exists());

        return $id;
    }
}
