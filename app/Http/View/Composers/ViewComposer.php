<?php 
namespace App\Http\View\Composers;

use App\Models\Color;
use App\Models\FrontSection;
use Illuminate\View\View;

class ViewComposer
{



    public function compose(View $view)
    {
        $frontsections = FrontSection::with('color')->get();
        // dd($frontsections->toArray());

        $view->with('FrontSection',$frontsections);
    }
}
