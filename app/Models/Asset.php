<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    public function Customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function LicenseAssignment()
    {
        return $this->hasOne(LicenseAssignment::class);
    }
}
