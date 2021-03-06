<?php

namespace Kamal\NotificationsModule;

trait HasNotifications
{

    /**
     * Get all devices / device of the user depends on the config.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * OR
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function devices()
    {
        return config('mobileNotification.has_many_devices', true)
            ? $this->hasMany(Notifications::device(),
                config('mobileNotification.relation.column', 'user_id'))
            : $this->hasOne(Notifications::device(),
                config('mobileNotification.relation.column', 'user_id'));
    }

    /**
     * Get all notifications without the deleted ones of the user.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notifications()
    {
        /**
         * The related column ID
         */
        $column = config('mobileNotification.relation.column', 'user_id');
        $deletedNotifications = $this->deletedNotifications()->pluck('notification_id')->toArray();

        /**
         * OS Header Can Be Android / IOS or Empty for General
         */
        $os_header = request()->header('OS-Header');
        $os = isset($os_header) && in_array(strtolower(trim($os_header)), ['ios', 'android'])
                ? strtolower(trim($os_header)) : 'general' ;

        return $this->hasMany(Notifications::mobileNotification(), $column)
            ->OrWhere(function ($query) use ($column, $os){
                $query->where($column, null)->where('topic', $os);
            })
            ->whereNotIn('id', $deletedNotifications)
            ->orderBy('created_at', 'desc');
    }

    /**
     * Get all the deleted notification of the user
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deletedNotifications()
    {
        $column = config('mobileNotification.relation.column', 'user_id');
        return $this->hasMany(Notifications::deletedNotification(), $column);
    }

}