<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';
    protected $fillable = ['user_id', 'order_code', 'session_id', 'ip_adress', 'fullname', 'mobile_num', 'state', 'city', 'adress', 'notes', 'status', 'total', 'paymentMethod', 'shipping'];
}
