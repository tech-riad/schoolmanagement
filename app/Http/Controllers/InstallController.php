<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\AcademicSetting;
use App\Models\AssignTeacher;
use App\Models\Ataglance;
use App\Models\AutosmsSetting;
use App\Models\Banner;
use App\Models\Branch;
use App\Models\Category;
use App\Models\ChartofAccount;
use App\Models\ClassRoutine;
use App\Models\Designation;
use App\Models\Exam;
use App\Models\Fees;
use App\Models\FeesType;
use App\Models\Getintouch;
use App\Models\Group;
use App\Models\InsClass;
use App\Models\Institution;
use App\Models\LeaveTemplate;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\PeriodTime;
use App\Models\SchoolInfo;
use App\Models\Section;
use App\Models\Session;
use App\Models\Shift;
use App\Models\Sociallink;
use App\Models\Student;
use App\Models\StudentFees;
use App\Models\Subject;
use App\Models\SubjectType;
use App\Models\Teacher;
use App\Models\User;
use Database\Seeders\ColorSeeder;
use Database\Seeders\FrontSectionSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class InstallController extends Controller
{

    public function dataSeed(Request $request){

        $data = $request->asc_model::where('institute_id',Helper::getInstituteId())->get();

        if($data){
            foreach ($data as $item){
                $item->delete();
            }
        }


        Artisan::call('db:seed --class='.$request->name.' --force');



        //notification
        $notification = array(
            'message' =>'Data Seed Successfully ',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function importData(){

        $file       = file_get_contents(base_path().'/database/seeders/DatabaseSeeder.php');
        $getClasses = explode(' ',$file);

        $classes = [];
        foreach ($getClasses as $class){
            if(str_starts_with($class,'$this')){
                array_push($classes,$class);
            }
        }

        $seederClasses = [];
        foreach ($classes as $cls){

            $search  = '$this->call(' ;
            $trimmed = str_replace($search, '', $cls) ;
            $search  = '::class);' ;
            $trimmed = str_replace($search, '', $trimmed) ;
            $str     = str_replace("\n","",$trimmed);
            array_push($seederClasses,$str);

        }

        $seeders = collect($seederClasses);

        $seederMap = $seeders->map(function ($item){
                        return [
                            'name'      => $item,
                            'asc_model' => $this->getAscModel($item)
                        ];
                    });

        //remove empty array
        $array = [];
        foreach ($seederMap as $item){
            if(!empty($item['asc_model'])){
                array_push($array,$item);
            }
        }


        $collection = collect($array);

        $data = $collection->map(function ($item){
            return [
                'name' => $item['name'],
                'asc_model' => $item['asc_model'],
                'count' => $this->dataCount($item['asc_model'])
            ];
        });
        //$sortData = $data->sortBy('count');
        $response = $data->chunk(3);

        return view($this->backendTemplate['template']['path_name'].'.software-settings.import-data.index',compact('response'));

    }


    public function getAscModel($seeder){
        $seeder = trim($seeder);

        $file = file_get_contents(base_path().'/database/seeders/'.$seeder.'.php');
        $getClass = explode(' ',$file);

        $model = [];

        foreach ($getClass as $class){
            if(str_starts_with($class,'App\Models')){
                $str = preg_replace("/[\r\n]*/","",$class);
                $search  = ';use';
                $trimmed = str_replace($search, "", $str);
                $model   = $trimmed;
            }
        }
        return $model;
    }

    public function dataCount($model){
        if($model == 'App\Models\Section'){
            return $model::where('institute_id',Helper::getInstituteId())->count();
        }
        else{
            return $model::all()->count();
        }
    }

    public function install()
    {
        $currentUrl = $_SERVER['HTTP_HOST'];
        $institute = Institution::where('domain', $currentUrl)->first();
        //dd($institute);
        $user = User::where('email', $institute->email)->first();
        if (!$user) {

            //create user for school
            User::updateOrCreate([
                'name' => "Admin",
                'institute_id' => $institute->id,
                'email' => $institute->email,
                'password' => Hash::make('87654321')
            ]);

            //create school info
            SchoolInfo::create([
                'name'          =>  $institute->title,
                'logo'          => 'logo.jpg',
                'eiin_no'       =>  $institute->eiin ?? 12850,
                'school_photo'  =>  'event.png',
                'founded_at'    =>  2000,
                'about'         => 'Formed in 1898, the Educational Committee (Anjuman-i Ma arf) was the first organized program to promote educational reform not funded by the state.[8] The committee was composed of members of foreign services, ulama, wealthy merchants, physicians, and other prominent people.',
                'address'       =>  $institute->address ?? 'Dhaka-1216'
            ]);

            //create academic settings data
            AcademicSetting::updateOrCreate([
                'admit_content'=>'<P>This Is Admit Content</P>',
                'id_card_content'=>'<P>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s</P> ',

                'transfer_certificate_content'=>'<p>This is to consenting that :name, :mother, :father of Village – :village, Post Office: Post, :thana, District –:District. His date of birth is : and had been studying in :class in this school up to the dated : 31/12/88. All the dues from him was received with understanding up to the dated : 31/12/88. He was passed the add mission test examination of :classI. At present he is Studying at…………………….. Remarks of Student Study progress Satisfactory I with all his Success in life.</p> ',
                'school_name'=> $institute->title,
                'image'=>' image_1671299514.jpg ',
                'testimonial_content'=>'<p>This is to consenting that :name, :mother, :father of Village – :village, Post Office: Post, :thana, District –:District. His date of birth is : and had been studying in :class in this school up to the dated : 31/12/88. All the dues from him was received with understanding up to the dated : 31/12/88. He was passed the add mission test examination of :classI. At present he is Studying at…………………….. Remarks of Student Study progress Satisfactory I with all his Success in life.</p> ',
            ]);


            //notification
            $notification = array(
                'message' =>'School Setup Successfully',
                'alert-type' =>'success'
            );
            return redirect('/')->with($notification);
        } else {
            return redirect('/');
        }
    }


}
