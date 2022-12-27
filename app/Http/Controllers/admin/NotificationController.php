<?php

namespace App\Http\Controllers\admin;

use App\Events\OrderNotification;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function send(){
        return event(new OrderNotification('test test test'));
    }
}
