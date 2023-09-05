<?php

namespace App\Http\Controllers\SMS;

use App\Http\Controllers\Controller;

use App\Helper\Helper;
use App\Models\Institution;
use App\Models\SellerSmsPackage;
use App\Models\SmsOrder;
use Illuminate\Http\Request;
use Svg\Tag\Rect;

class SmsOrderController extends Controller
{
    public function index()
    {
        $institute = Institution::find(Helper::getInstituteId());
        $packages = SellerSmsPackage::where('seller_id', $institute->seller_id)->get();
        $orders = SmsOrder::with('package')->where('seller_id', $institute->seller_id)->get();
        
        return view($this->backendTemplate['template']['path_name'].'.smsmanagement.orders.index', compact('packages','orders'));
    }


    public function store(Request $request){

        $institute = Institution::find(Helper::getInstituteId());
        $package = SellerSmsPackage::find($request->package_id);

        SmsOrder::create([
            'seller_id' => $package->seller_id,
            'institute_id' => $institute->id,
            'seller_sms_package_id' => $package->id,
            'total_sms' => $package->total_sms,
            'amount' => $package->amount,
        ]);

        //notification
        $notification = array(
            'message' =>'Package Order Successfully ',
            'alert-type' =>'success'
        );

        return redirect()->back()->with($notification);
    }
}
