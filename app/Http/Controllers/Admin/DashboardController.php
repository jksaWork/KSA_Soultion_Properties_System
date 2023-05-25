<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Offer;
use App\Models\Owner;
use App\Models\Realstate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data['charttwo'] = DB::select('SELECT Count(id) as `Data` ,status as label FROM `realstates`   GROUP by status');
        $data['chartOne'] = DB::select('SELECT DAYNAME(created_at) as label , Count(id) as Data FROM offers  GROUP BY DAYNAME(created_at)');
        $sum = collect([Realstate::count(), Client::count(), Owner::count()]);
        $data['recored'] = $sum->map(fn ($el) => floor($el / $sum->sum() * 100));
        // dd('Hello', $data['charttwo']);
        $data['activety']  = [
            ['text-warnnig', 'تمت اضافه عقار جديد', '3:00'],
            ['text-success', 'تمت اضافه منطقه جديده', '9:00'],
            ['text-primary', '   تسديد رسوم عقد', '1:00'],
            ['text-danger', 'تمت تغير حاله العقار ', '21:00'],
            ['text-success', 'تمت اضافه عقد  ', '3:00'],
            ['text-info', 'تمت اضافه مالك ', '3:00'],
            ['text-light', 'تمت ربط العقد بي وحدات سكنيه ', '3:00'],
        ];
        return view('admin.dashboard.index', $data);
    }

    public function getIndex()
    {
        return  redirect()->route('admin.login');
    }
}
