<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use App\Models\Holiday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    public function index()
    {
        return view($this->backendTemplate['template']['path_name'].'.attendance.holiday.index');
    }


    public function getHoliday()
    {
        $holidays = Holiday::select('id', 'title', 'start', 'type')->get()->toArray();
        $array = [];

        foreach ($holidays as $item) {

            if ($item['type'] == 'weekday') {
                $color = '#FF0000';
            }

            $data = [
                'id'    => $item['id'],
                'title' => $item['title'],
                'start' => $item['start'],
                'color' => $color ?? ''
            ];
            array_push($array, $data);
        }

        //dd($holidays);
        return response()->json(($array));
    }


    public function postHoliday(Request $request)
    {

        $data = $request->data;

        //dd($data);
        $holiday = Holiday::where('start', $data['start'])->get();

        if ($holiday->count() > 0) {

            Holiday::where('start', $data['start'])->delete();

            if (@$data['title']) {
                $holiday =   Holiday::create([
                    'title' => $data['title'],
                    'type'  => "holiday",
                    'start' => $data['start'],
                ]);
            } else {
                $holiday =   Holiday::create([
                    'title' => "Weekday",
                    'type'  => "weekday",
                    'start' => $data['start'],
                ]);
            }
        } else {

            if (@$data['title']) {
                $holiday =   Holiday::create([
                    'title' => $data['title'],
                    'type'  => "holiday",
                    'start' => $data['start'],
                ]);
            } else {
                $holiday =   Holiday::create([
                    'title' => "Weekday",
                    'type'  => "weekday",
                    'start' => $data['start'],
                ]);
            }
        }





        return response()->json($holiday);
    }


    public function deleteHoliday(Request $request)
    {
        Holiday::find($request->id)->delete();
        $response = ['message' => 'Delete Successfully'];
        return response()->json($response);
    }
}
