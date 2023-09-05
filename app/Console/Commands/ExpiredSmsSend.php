<?php

namespace App\Console\Commands;

use App\Models\Institution;
use App\Services\DomainExpiredSmsService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ExpiredSmsSend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expired-sms:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sms Send Successfully';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $institutes = Institution::with('seller')->get();

        foreach($institutes as $institute){
            $today   = Carbon::now();

            $start =  Carbon::parse($today);
            $end   =  Carbon::parse($institute->expire_date);

            $difDay = $end->diffInDays($start) + 1;

            if($difDay == 7){
                $array = [
                    'institute'  => $institute,
                    'expired_in' => $difDay
                ];
                $sendSmsService = new DomainExpiredSmsService();
                $sendSmsService->sendSms($array);
            }
            elseif ($difDay == 1){
                $array = [
                    'institute'  => $institute,
                    'expired_in' => $difDay
                ];
                $sendSmsService = new DomainExpiredSmsService();
                $sendSmsService->sendSms($array);
            }
        }

        return true;
    }
}
