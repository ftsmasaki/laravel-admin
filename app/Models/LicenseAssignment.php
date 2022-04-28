<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenseAssignment extends Model
{
    use HasFactory;

    public function License()
    {
        return $this->belongsTo(License::class);
    }

    public function Asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
