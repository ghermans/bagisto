<?php

namespace Webkul\GDPR\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Webkul\Customer\Models\CustomerProxy;
use Webkul\GDPR\Contracts\GDPRDataRequest as GDPRDataRequestContract;

class GDPRDataRequest extends Model implements GDPRDataRequestContract
{
    /**
     * The table associated with the model.
     */
    protected $table = 'gdpr_data_request';

    /**
     * Summary of fillable fields.
     */
    protected $fillable = [
        'customer_id',
        'email',
        'status',
        'type',
        'message',
    ];

    /**
     * Get the customer record associated with the address.
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(CustomerProxy::modelClass());
    }

    public function getCustomerFullNameAttribute(): string
    {
        return $this->customer_first_name.' '.$this->customer_last_name;
    }
}
