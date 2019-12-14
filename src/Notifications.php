<?php

namespace Kamal\NotificationsModule;

class Notifications
{

    /**
     * The mobile notification model class name.
     *
     * @var string
     */

    public static $notificationModel = 'Kamal\NotificationsModule\Models\MobileNotification';

    /**
     * The device model class name.
     *
     * @var string
     */

    public static $deviceModel = 'Kamal\NotificationsModule\Models\Device';

    /**
     * The deleted notification model class name.
     *
     * @var string
     */

    public static $deletedNotificationModel = 'Kamal\NotificationsModule\Models\DeletedNotification';

    /**
     * Get a new mobile notification model instance.
     *
     * @return \Kamal\NotificationsModule\Models\MobileNotification
     */
    public static function mobileNotification()
    {
        return new static::$notificationModel;
    }

    /**
     * Get a new mobile notification model instance.
     *
     * @return \Kamal\NotificationsModule\Models\Device
     */
    public static function device()
    {
        return new static::$deviceModel;
    }

    /**
     * Get a new mobile notification model instance.
     *
     * @return \Kamal\NotificationsModule\Models\DeletedNotification
     */
    public static function deletedNotification()
    {
        return new static::$deletedNotificationModel;
    }

}