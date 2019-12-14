<?php

namespace Kamal\NotificationsModule\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $guarded = ['id'];

    /**
     * A Relation with the user who has this device
     * model_path is the path of the Eloquent Model of the user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function user()
    {
        $model_path = config('mobileNotification.relation.model', \App\User::class);
        $column = config('mobileNotification.relation.column', 'user_id');

        return $this->belongsTo($model_path, $column);
    }
}
