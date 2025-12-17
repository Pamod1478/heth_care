<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'medicines',
        'price',
    ];

    protected $casts = [
        'medicines' => 'array',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}