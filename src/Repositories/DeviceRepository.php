<?php

namespace Kamal\NotificationsModule\Http\Repositories;

use Kamal\NotificationsModule\Models\Device;

class DeviceRepository
{
    /**
     * Configurable Variables
     * @var Device
     */
    private $model, $user_column;

    /**
     * DeviceRepository constructor.
     * @param Device $model
     */
    public function __construct(Device $model)
    {
        $this->model = $model;
        $this->user_column = config('mobileNotification.relation.column', 'user_id');

    }

    /**
     * Add or Update if has_many_devices is true in config file
     * @param array $attributes
     * @return mixed
     */
    public function manyDevices(array $attributes)
    {
        try {
            return $this->model->updateOrCreate([
                $this->user_column => $attributes[$this->user_column],
                'device_id' => $attributes['device_id'],
            ], [
                'device_token' => $attributes['device_token'],
                'device_type' => $attributes['device_type'],
            ]);
        } catch (\InvalidArgumentException $exception) {
            throw new $exception;
        }
    }

    /**
     * Add or Update if has_many_devices is false in config file
     * @param array $attributes
     * @return mixed
     */
    public function oneDevice(array $attributes)
    {
        try {
            return $this->model->updateOrCreate([
                $this->user_column => $attributes['id'],
            ], [
                'device_id' => $attributes['device_id'],
                'device_token' => $attributes['device_token'],
                'device_type' => $attributes['device_type'],
            ]);
        } catch (\InvalidArgumentException $exception) {
            throw new $exception;
        }
    }

}