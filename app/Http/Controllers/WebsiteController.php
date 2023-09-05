<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\Ataglance;
use Illuminate\Http\Request;
use App\Models\FrontLanding;
use App\Models\Notice;
use App\Models\Banner;
use App\Models\Video;
use App\Models\Event;
use App\Models\Exam;
use App\Models\ExamRoutine;
use App\Models\Group;
use App\Models\InsClass;
use App\Models\Institutephoto;
use App\Models\Sociallink;
use App\Models\Messages;
use App\Models\SchoolInfo;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Page;
use App\Models\PeriodTime;
use App\Models\Subject;

use App\Models\ClassRoutine as Routine;
use App\Models\ContactUs;
use App\Models\Institution;
use App\Models\MeritStudent;
use App\Models\News;
use App\Models\Website;
use App\Traits\FileSaver;
use Carbon\Carbon;

class WebsiteController extends Controller
{
    use FileSaver;
    public $template = 'theme1';

    public function __construct()
    {
        parent::__construct();
        $path_name = Helper::getTemplate();

        if($path_name){
            $this->template = $path_name;
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getGroup(Request $request){

        $class_id = $request->class_id;
        $data = Group::where('ins_class_id',$class_id)->get();
        return response()->json($data);
    }
    public function getStudent(Request $request){
        $query = Student::with('class','group');
        if($request->class_id){
            $query->where('class_id',$request->class_id);
       }
        if($request->group_id){
            $query->where('group_id',$request->group_id);
       }
       $data = $query->get();
       return response()->json($data);
    }

    public function index()
    {
        $data['banners']       = Banner::orderBy('sl_no','ASC')->get();
        $data['notices']       = Notice::latest('id')->get();
        $data['videos']        = Video::latest('id')->get();
        $data['events']        = Event::latest('id')->get();
        $data['ins_photos']    = Institutephoto::latest('id')->get();
        $data['social_links']  = Sociallink::find(1);
        $data['messages']      = Messages::where('status', 1)->get();
        $data['info']          = SchoolInfo::where('institute_id',Helper::getInstituteId())->first();
        $data['teachers']      = Teacher::all();
        $data['students']      = Student::all();
        $data['ataglance']     = Ataglance::orderBy('created_at','DESC')->first();
        $data['meritstudent']  = MeritStudent::with('student')->get()->take(5);

        $data['commitees']     = Teacher::where('type', 'committee')->get();
        $data['news']          = News::all();

        return view("frontent.".$this->template.".index",$data);

    }



    public function merit_student_list()
    {
        $meritStudents = MeritStudent::all();
        $data['banners']       = Banner::orderBy('sl_no','ASC')->get();
        $data['messages']      = Messages::where('status', 1)->get();
        $data['events']        = Event::latest('id')->get();
        return view("frontent.".$this->template.".merit_student",$data,compact('meritStudents'));
    }

    public function gallery()
    {
        $galleries = Institutephoto::all();
        $data['banners']       = Banner::orderBy('sl_no','ASC')->get();
        $data['messages']      = Messages::where('status', 1)->get();
        $data['events']        = Event::latest('id')->get();
        return view("frontent.".$this->template.".gallery",$data,compact('galleries'));
    }


    public function student_list(Request $request)
    {
        if($request->search){
            $students = Student::where('class_id',$request->class_id)->where('group_id',$request->group_id)->get();
            // $student  = $students->find(1);
            $data['students'] = $students;
            $data['class']    = InsClass::where('id',$request->class_id)->first()->name;
            $data['group']    = Group::where('ins_class_id',$request->class_id)->first()->name;
            $data['section']  = Section::where('ins_class_id',$request->class_id)->first()->name;
        }
        $data['classes']       = InsClass::all();
        $data['groups']        = Group::all();
        $data['social_links']  = Sociallink::find(1);
        $data['banners']       = Banner::orderBy('sl_no','ASC')->get();
        $data['messages']      = Messages::where('status', 1)->get();
        $data['events']        = Event::latest('id')->get();

        return view("frontent.".$this->template.".student_list",$data);
    }


    public function staff_list(){

        $data['social_links']  = Sociallink::find(1);
        $staffs = Teacher::where('type', 'staff')->get();
        $data['banners']       = Banner::orderBy('sl_no','ASC')->get();
        $data['messages']      = Messages::where('status', 1)->get();
        $data['events']        = Event::latest('id')->get();

        return view("frontent.".$this->template.".staff_list",compact('staffs'),$data);

    }

    public function getRoutine(Request $request)
    {
        $groups    = Group::all();
        $subjects  = Subject::all();
        $periods   = PeriodTime::all();
        $teachers  = Teacher::all();
        $ins_class  = InsClass::all();
        $routine  = Routine::all();
        $sections= Section::all();
        $data['banners']       = Banner::orderBy('sl_no','ASC')->get();
        $data['messages']      = Messages::where('status', 1)->get();
        $data['events']        = Event::latest('id')->get();

        return view("frontent.".$this->template.".class_routine",$data,compact( 'sections', 'groups', 'subjects', 'periods', 'teachers','routine'));
    }


    public function exam_routine(Request $request)
    {
        $session  = $request->session;
        $class    = $request->class;
        $exam     = $request->exam;

        $routine = new ExamRoutine();
        $routine = $routine->where('session_id',$session);
        $routine = $routine->where('ins_class_id',$class);
        $routine = $routine->where('exam_id',$exam);
        $routine = $routine->first();
        $data['banners']       = Banner::orderBy('sl_no','ASC')->get();
        $data['messages']      = Messages::where('status', 1)->get();
        $data['events']        = Event::latest('id')->get();

        return view("frontent.".$this->template.".exam_routine",$data,compact('routine','exam','class'));
    }

    public function book_list()
    {
        $data['banners']       = Banner::orderBy('sl_no','ASC')->get();
        $data['messages']      = Messages::where('status', 1)->get();
        $data['events']        = Event::latest('id')->get();
        return view("frontent.".$this->template.".book_list",$data);
    }

    public function result()
    {
        $data['banners']       = Banner::orderBy('sl_no','ASC')->get();
        $data['messages']      = Messages::where('status', 1)->get();
        $data['events']        = Event::latest('id')->get();
        return view("frontent.".$this->template.".result",$data);
    }

    public function notice()
    {
        $notice= Notice::all();
        $data['banners']       = Banner::orderBy('sl_no','ASC')->get();
        $data['messages']      = Messages::where('status', 1)->get();
        $data['events']        = Event::latest('id')->get();
        return view("frontent.".$this->template.".notice",$data,compact('notice'));
    }

    public function governing_body()
    {
        $committees = Teacher::where('type', 'committee')->get();
        $data['banners']       = Banner::orderBy('sl_no','ASC')->get();
        $data['messages']      = Messages::where('status', 1)->get();
        $data['events']        = Event::latest('id')->get();
        return view("frontent.".$this->template.".governing_body",$data,compact('committees'));
    }


    public function Message($slug)
    {
        $msg = Messages::where('institute_id',Helper::getInstituteId())->where('slug',$slug)->where('status',1)->first();
        $data['banners']       = Banner::orderBy('sl_no','ASC')->get();
        $data['messages']      = Messages::where('status', 1)->get();
        $data['events']        = Event::latest('id')->get();
        return view("frontent.".$this->template.".chairman_msg",$data,compact('msg'));
    }


    // public function principal_msg(){

    //     return view ('frontent.theme1.principal_msg');
    // }

    public function teacher_list()
    {

        $teachers = Teacher::where('type', 'teacher')->where('institute_id',Helper::getInstituteId())->get();
        $data['social_links']  = Sociallink::find(1);
        $data['banners']       = Banner::orderBy('sl_no','ASC')->get();
        $data['messages']      = Messages::where('status', 1)->get();
        $data['events']        = Event::latest('id')->get();

        return view("frontent.".$this->template.".teacher_list",compact('teachers'),$data);
    }

    public function at_a_glance()
    {
        $ataglance=Page::where('id',10)->first();
        $data['banners']       = Banner::orderBy('sl_no','ASC')->get();
        $data['messages']      = Messages::where('status', 1)->get();
        $data['events']        = Event::latest('id')->get();
        return view("frontent.".$this->template.".at_a_glance",$data,compact('ataglance'));
    }

    public function school_history()
    {
        
        $data['banners']       = Banner::orderBy('sl_no','ASC')->get();
        $data['messages']      = Messages::where('status', 1)->get();
        $data['events']        = Event::latest('id')->get();
        return view("frontent.".$this->template.".school_history",$data);
    }

    public function why_study()
    {
        return view("frontent.".$this->template.".why_study");
    }

    public function infrastructure()
    {
        return view("frontent.".$this->template.".infrastructure");
    }

    public function achievement()
    {
        return view("frontent.".$this->template.".achievement");
    }

    public function news()
    {
        return view("frontent.".$this->template.".news");
    }

    public function digital_content()
    {
        $data['banners']       = Banner::orderBy('sl_no','ASC')->get();
        $data['messages']      = Messages::where('status', 1)->get();
        $data['events']        = Event::latest('id')->get();
        return view("frontent.".$this->template.".digital_content",$data);
    }

    public function hand_book()
    {
        $data['banners']       = Banner::orderBy('sl_no','ASC')->get();
        $data['messages']      = Messages::where('status', 1)->get();
        $data['events']        = Event::latest('id')->get();
        return view("frontent.".$this->template.".hand_book",$data);
    }

    public function home_work()
    {
        $data['banners']       = Banner::orderBy('sl_no','ASC')->get();
        $data['messages']      = Messages::where('status', 1)->get();
        $data['events']        = Event::latest('id')->get();
        return view("frontent.".$this->template.".home_work",$data);
    }
    public function class_note()
    {
        $data['banners']       = Banner::orderBy('sl_no','ASC')->get();
        $data['messages']      = Messages::where('status', 1)->get();
        $data['events']        = Event::latest('id')->get();
        return view("frontent.".$this->template.".class_note",$data);
    }

    public function other_download()
    {
        $data['banners']       = Banner::orderBy('sl_no','ASC')->get();
        $data['messages']      = Messages::where('status', 1)->get();
        $data['events']        = Event::latest('id')->get();
        return view("frontent.".$this->template.".other_download",$data);
    }

    public function contact_us()
    {
        $data['banners']       = Banner::orderBy('sl_no','ASC')->get();
        $data['messages']      = Messages::where('status', 1)->get();
        $data['events']        = Event::latest('id')->get();
        return view("frontent.".$this->template.".contact_us",$data);
    }

    public function contact_us_store(Request $request){

        $message = new ContactUs();

        $message->name=$request->name;
        $message->email=$request->email;
        $message->message=$request->message;
        if( $request->status == 1){
            $message->status = true;
        }else{
            $message->status = false;
        }

        $message->save();
        return redirect()->back();
    }

    public function sport()
    {
        $data['banners']       = Banner::orderBy('sl_no','ASC')->get();
        $data['messages']      = Messages::where('status', 1)->get();
        $data['events']        = Event::latest('id')->get();
        return view("frontent.".$this->template.".sport",$data);
    }

    public function scout()
    {
        $data['banners']       = Banner::orderBy('sl_no','ASC')->get();
        $data['messages']      = Messages::where('status', 1)->get();
        $data['events']        = Event::latest('id')->get();
        return view("frontent.".$this->template.".scout",$data);
    }

    public function tour()
    {
        $data['banners']       = Banner::orderBy('sl_no','ASC')->get();
        $data['messages']      = Messages::where('status', 1)->get();
        $data['events']        = Event::latest('id')->get();
        return view("frontent.".$this->template.".tour",$data);
    }

    public function noticeShow($id)
    {
        $notice = Notice::findOrfail($id);
        $data['banners']       = Banner::orderBy('sl_no','ASC')->get();
        $data['messages']      = Messages::where('status', 1)->get();
        $data['events']        = Event::latest('id')->get();
        return view("frontent.".$this->template.".noticeshow",$data,compact('notice'));
    }

    public function eventShow($id)
    {
        $event = Event::findOrfail($id);
        $data['banners']       = Banner::orderBy('sl_no','ASC')->get();
        $data['messages']      = Messages::where('status', 1)->get();
        $data['events']        = Event::latest('id')->get();
        return view("frontent.".$this->template.".noticeshow",$data,compact('event'));
    }

    public function Messages($id)
    {
        $data['banners']       = Banner::orderBy('sl_no','ASC')->get();
        $data['messages']      = Messages::where('status', 1)->get();
        $data['events']        = Event::latest('id')->get();
        $msg = Messages::where('id',$id)->where('status',1)->first();
        return view("frontent.".$this->template.".messeges",$data,compact('msg'));
    }

    public function expiredCheck(){

        if(@$_SERVER['HTTP_HOST']){
            $currentUrl = str_replace('www.','',$_SERVER['HTTP_HOST']);
        }else{
            $currentUrl='127.0.0.1:8000';
        }
        $domain = Institution::with('package')->where('domain', $currentUrl)->first();

        $data = [];
        if (!empty($domain)) {

            $data['paymentMethod'] = $domain->payment_method;

            if ($domain->status != 'active') {
                $data['msgHead'] = "YOUR APPLICATION IS UNDER REVIEW";
                $data['msgBody'] = "Please be with us, we will get back soon (Please Contact with Administrator).";
                $data['expired']  = true;
            }

            $today   = date('Y-m-d');
            $expire_date = Institution::where('domain', $currentUrl)->selectRaw('GREATEST(`expire_date`,`trial_period_end`) as expire')->first();

            if($expire_date->expire > $today){
                $data['expired'] = false;
            }
            else{
                $data['msgHead'] = "YOUR PAYMENT DATE IS EXPIRED";
                $data['msgBody'] = "Please pay as soon as possible to continue your website & application.";
                $data['expired']  = true;
            }
        }

        return response()->json($data);
    }

    public function expiredDayCount(){
        if(@$_SERVER['HTTP_HOST']){
            $currentUrl = str_replace('www.','',$_SERVER['HTTP_HOST']);
        }else{
            $currentUrl='127.0.0.1:8000';
        }
        $domain = Institution::where('domain', $currentUrl)->first();
        $today   = Carbon::now();

        $start =  Carbon::parse($today);
        $end   =  Carbon::parse($domain->expire_date);

        $difDay = $end->diffInDays($start) + 1;

        if($difDay < 7){
            return $difDay;
        }

    }
}
