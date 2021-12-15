<?php

namespace App\Http\Controllers\Frontend\User;

use App\Services\AppointmentService;

/**
 * Class DashboardController.
 */
class DashboardController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $doctorPending = AppointmentService::doctorPending();
        $myActive      = AppointmentService::myActive();


        $count = [
            'waiting'   => 0,
            'doctor'    => 0,
            'pharmacy'  => 0,
            'completed' => 0
        ];

        return view('home.dashboard', compact('doctorPending', 'myActive', 'count'));
    }
}
