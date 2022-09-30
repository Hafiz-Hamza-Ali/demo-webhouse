<?php

namespace App\Traits;

trait ControllerHelper
{
    protected function getRequest()
    {
        if (!isset($this->validation)) {
            return request();
        }

        return resolve($this->validation);
    }

    public function getUser()
    {
        return auth()->user() ? auth()->user() : null;
    }

    public function checkAuthUser()
    {
        return $this->getUser() ? true : false;
    }
}
