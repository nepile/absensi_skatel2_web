<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogActivityController extends Controller
{
    protected function showLogActivity()
    {
        $data = [
            'title'     => 'User Activity',
            'id_page'   => 5,
        ];

        return view('core.user_activity', $data);
    }
}
