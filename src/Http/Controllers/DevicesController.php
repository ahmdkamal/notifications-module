<?php

namespace Kamal\NotificationsModule\Http\Controllers;

use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Kamal\NotificationsModule\Http\Services\DevicesService;

class DevicesController
{

    /**
     * @var ValidationFactory
     */
    private $validation;

    /**
     * @var DevicesService
     */
    private $service;

    /**
     * Configurable Variables
     * @var \Illuminate\Config\Repository|mixed
     */
    private $user_column, $user_table;

    /**
     * DevicesController constructor.
     * @param ValidationFactory $validation
     * @param DevicesService $service
     */

    public function __construct(ValidationFactory $validation, DevicesService $service)
    {
        $this->user_column = config('mobileNotification.relation.column', 'user_id');
        $this->user_table = config('mobileNotification.relation.table', 'users');

        $this->validation = $validation;
        $this->service = $service;
    }

    /**
     * @api to add or update devices
     * @param array $attributes
     * @return mixed
     */
    public function addOrUpdate(array $attributes)
    {

        $this->validation->make($attributes, [
            'device_token' => 'required|max:250',
            'device_id' => 'required|max:150',
            'device_type' => 'required|in:ios,android',
            $this->user_column => "required|exists:$this->user_table,id"
        ])->validate();

        return $this->service->addOrUpdate($attributes);
    }

}