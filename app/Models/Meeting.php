<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Meeting extends Model {
    use HasFactory;
    protected $fillable = ['client_id', 'user_id', 'date_time', 'location', 'status', 'notes', 'attachment_path'];
    public function client() { return $this->belongsTo(Client::class); }
    public function followUps() { return $this->hasMany(FollowUp::class); }
}