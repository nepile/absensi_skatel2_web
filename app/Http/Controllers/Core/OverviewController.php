<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    protected function showOverview()
    {
        $data = [
            'title'         => 'Overview',
            'id_page'       => 1,
            'count_teacher' => User::with('level')->whereHas('level', function ($query) {
                $query->where('level_id', 2);
            })->count(),
            'count_student' => User::with('level')->whereHas('level', function ($query) {
                $query->where('level_id', 3);
            })->count(),
            'students'      => User::with('level')->where('level_id', 3)->orderBy('name', 'DESC')->get()
        ];

        return view('core.overview', $data);
    }
}
