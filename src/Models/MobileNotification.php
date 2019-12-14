<?php

namespace Kamal\NotificationsModule\Models;

use Illuminate\Database\Eloquent\Model;

class MobileNotification extends Model
{
    protected $guarded = ['id'];
    protected $table = 'mobile_notifications';

    /**
     * A Relation with the user who has this notification
     * model_path is the path of the Eloquent Model of the user
     * column is the column id in the table of mobile_notifications
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {

        $model_path = config('mobileNotification.relation.model', \App\User::class);
        $column = config('mobileNotification.relation.column', 'user_id');

        return $this->belongsTo($model_path, $column);
    }
}
