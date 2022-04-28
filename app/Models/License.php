<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }

    public function LicenseAssignment()
    {
        return $this->hasOne(LicenseAssignment::class);
    }
}
