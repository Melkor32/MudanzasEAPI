<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'invoice_id',
        'date',
        'client_id',
        'concept',
        'amount',
        'advanced',
        'payment_type',
        'is_budget'
    ];
}
