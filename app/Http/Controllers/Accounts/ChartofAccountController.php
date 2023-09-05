<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use App\Models\ChartofAccount;

use Illuminate\Http\Request;

class ChartofAccountController extends Controller
{
    public function index()
    {
        $chart_of_accounts = ChartofAccount::with('childs')->where('parent_id',0)->orderBy('order')->get();
        $chart_level0 = ChartofAccount::where('acc_level',0)->get();

        return view($this->backendTemplate['template']['path_name'].'.accountsmanagement.chart_of_account.index',compact('chart_of_accounts','chart_level0'));
    }
    public function create()
    {
        // return view('accountsmanagement.chart_of_accounts.index');
    }

    public function store(Request $request)
    {
        $chart_of_accounts = New ChartofAccount();
        $chart_of_accounts-> acc_code          =$request->acc_code;
        $chart_of_accounts-> acc_code_bn       =$request->acc_code_bn;
        $chart_of_accounts-> acc_head          =$request->acc_head;
        $chart_of_accounts-> acc_head_bangla   =$request->acc_head_bangla;
        $chart_of_accounts-> parent_id         =$request->parent_id;
        $chart_of_accounts-> acc_level         =$request->acc_level;

        $chart_of_accounts->save();

        $notification = array(
            'message' =>' Successfull ',
            'alert-type' =>'success'
        );
        return redirect()->route('chart-of-account.index')->with($notification);
    }
    public function edit($id)
    {

        $chart_of_accounts = ChartofAccount::findOrFail($id);
        return view($this->backendTemplate['template']['path_name'].'.accountsmanagement.chart_of_account.edit',compact('chart_of_accounts'));
    }
    public function update(Request $request,$id)
    {
        $chart_of_accounts = ChartofAccount::find($id);
        $chart_of_accounts-> acc_code          =$request->acc_code;
        $chart_of_accounts-> acc_code_bn       =$request->acc_code_bn;
        $chart_of_accounts-> acc_head          =$request->acc_head;
        $chart_of_accounts-> acc_head_bangla   =$request->acc_head_bangla;
        $chart_of_accounts-> parent_id         =$request->parent_id;
        $chart_of_accounts-> acc_level         =$request->acc_level;

        $chart_of_accounts->save();
        $notification = array(
            'message' =>'Update Successfull ',
            'alert-type' =>'success'
        );
        return redirect()->route('chart-of-account.index')->with($notification);
    }
    public function destroy($id)
    {
        $chart_of_accounts = ChartofAccount::find($id);

        $chart_of_accounts->childs()->delete();
        $chart_of_accounts->delete();
        $notification = array(
            'message' =>'Delete Successfull ',
            'alert-type' =>'success'
        );

        return redirect()->route('chart-of-account.index')->with($notification);
    }

    public function getParent($level){

        return ChartofAccount::where('acc_level', ($level-1))->get();
    }


    public function order(Request $request){
        $menuItemOrder = json_decode($request->get('order'));
        $this->ordermenu($menuItemOrder,null);
    }

    private function ordermenu(array $menuItems, $parentId){
        foreach ($menuItems as $index => $item){
            $menuItem = ChartofAccount::findOrFail($item->id);

            $menuItem->update([
               'order' => $index+1,
               'parent_id' => $parentId
            ]);
            if(isset($item->children)){
                $this->ordermenu($item->children,$menuItem->id);
            }
        }
    }

}
