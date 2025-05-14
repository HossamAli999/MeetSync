<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FollowUp extends Model {
    use HasFactory;
    protected $fillable = ['meeting_id', 'task', 'due_date', 'is_done', 'created_by'];
    public function meeting() { return $this->belongsTo(Meeting::class); }
}
