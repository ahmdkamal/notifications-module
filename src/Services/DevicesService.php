<?php

namespace Kamal\NotificationsModule\Http\Services;


use Kamal\NotificationsModule\Http\Repositories\DeviceRepository;

class DevicesService
{

    /**
     * @var DeviceRepository
     */
    private $repo;

    /**
     * @var \Illuminate\Config\Repository|mixed
     */
    private $has_many_devices;

    /**
     * DevicesService constructor.
     * @param DeviceRepository $repo
     */
    public function __construct(DeviceRepository $repo)
    {
        $this->repo = $repo;
        $this->has_many_devices = config('mobileNotification.has_many_devices',true);
    }

    /**
     * Add Or Update Device depends on has_many_devices in config file
     * @param $attributes
     * @return mixed
     */
    public function addOrUpdate($attributes)
    {
        return $this->has_many_devices
            ? $this->repo->manyDevices($attributes)
            : $this->repo->oneDevice($attributes);
    }

}
