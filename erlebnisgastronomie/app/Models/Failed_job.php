<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Failed_job extends Model
{
    use HasFactory;

    protected $table = 'failed_jobs';
    protected $primaryKey = 'job_id';
    public $timestamps = false; // so, we don't need created_at and updated_at columns

    protected $fillable = [
        'connection',// Question what is with date_arrived ?
        'queue',
        'payload',
        'exception',
    ];

    public function index() {
        // return view('allergens');
    }
}
