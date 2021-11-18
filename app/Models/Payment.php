<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    // Date Filtering
    public function scopeFilter($query, array $filters){

        // Search filtering datefrom
        $query->when($filters['datefrom'] ?? false, fn ($query, $datefrom) =>
            $query->where(fn($query) =>
                $query->where('updated_at', '>=', $datefrom)
            )
        );

        // Search filtering dateto
        $query->when($filters['dateto'] ?? false, fn ($query, $dateto) =>
            $query->where(fn($query) =>
                $query->where('updated_at', '<=', $dateto)
            )
        );
    }

    // Client relationship
    public function client()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
