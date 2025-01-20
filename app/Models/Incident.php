<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Incident extends Model
{
    protected $table = 'ms_incident';
    protected $primaryKey = 'id';
    // public $timestamps = false;

    /**
     * Get the post that owns the comment.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'report_by', 'id');
    }

    public function pic(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_pic', 'id');
    }

    public function solved(): BelongsTo
    {
        return $this->belongsTo(User::class,'solved_by', 'id');
    }
    
    protected $fillable = [
        'incident_name', // Tambahkan kolom ini
        'division', // Kolom lain yang diizinkan
        'description', // Kolom lain yang diizinkan
        'notes',
        'report_by',
        'incident_date',
        'user_pic',
        'created_at',
        'created_by',
        'cause_incident',
        'solution',
        'incident_finish_date',
        'incident_handler_date',
        'approve_by',
        'approve_date',
        'solved_by',
        'status',
    ];
}
