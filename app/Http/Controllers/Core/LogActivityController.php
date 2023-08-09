<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\UserActivity;
use Illuminate\Http\Request;

class LogActivityController extends Controller
{
    protected function showLogActivity()
    {
        $data = [
            'title'         => 'User Activity',
            'id_page'       => 5,
            'activities'    => UserActivity::orderBy('activity_id', 'DESC')->get(),
        ];

        return view('core.user_activity', $data);
    }
}
