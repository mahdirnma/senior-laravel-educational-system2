<?php

namespace App\Services;

use App\Models\Course;

class TryService
{
    public function __invoke(\Closure $action)
    {
        try {
            $actionResult=$action();
        }
        catch (\Exception $exception) {
            return new ResponseService(false,$exception->getMessage());
        }
        return new ResponseService(true,$actionResult);
    }
}
