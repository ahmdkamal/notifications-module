<?php

namespace Kamal\NotificationsModule\Models;

use Illuminate\Database\Eloquent\Model;
use Kamal\NotificationsModule\Notifications;

class DeletedNotification extends Model
{
    protected $guarded = ['id'];

    /**
     * A Relation with the notification
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function notification()
    {
        return $this->belongsTo(Notifications::mobileNotification());
    }

    /**
     * A relation with the deleted notifications
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        $model_path = config('mobileNotification.relation.model', \App\User::class);
        $column = config('mobileNotification.relation.column', 'user_id');

        return $this->belongsTo($model_path, $column);
    }
}
