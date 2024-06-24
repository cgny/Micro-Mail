<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailQueue extends Model
{
    use HasFactory;
	
protected $table = 'email_queue';

    // Define the primary key
    protected $primaryKey = 'e_id';

    // Disable timestamps management by Laravel
    public $timestamps = false;

    // Define the fillable properties
    protected $fillable = [
        'e_account_id',
        'e_to',
        'e_from',
        'e_subject',
        'e_body',
        'e_cc',
        'e_bcc',
        'e_attachment',
        'e_sent',
        'e_success',
        'e_created',
        'e_attempt_date',
        'e_sent_date',
    ];

    // Cast attributes to their native types
    protected $casts = [
        'e_id' => 'integer',
        'e_account_id' => 'integer',
        'e_sent' => 'boolean',
        'e_success' => 'boolean',
        'e_created' => 'datetime',
        'e_attempt_date' => 'datetime',
        'e_sent_date' => 'datetime',
    ];

	
}
