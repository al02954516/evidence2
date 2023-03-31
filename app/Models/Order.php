<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 *
 * @property Status[] $statuses
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Order extends Model
{
    
    public static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['invoice_number', 'customer_id', 'status_id', 'delivery_address', 'notes', 'loaded_photo', 'delivered_photo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statuses()
    {
        return $this->hasMany('App\Models\Status', 'order_id', 'id');
        return $this->belongsTo(Status::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }


    public function customer()
{
    return $this->belongsTo(Customer::class);
    $order = Order::find(1);
    $customer = $order->customer;
}


}

