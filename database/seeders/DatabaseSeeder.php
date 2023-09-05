<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Holiday;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(IdcardTheamSeeder::class);
        $this->call(TemplateSeeder::class);
        $this->call(InstituteSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SessionSeeder::class);
        $this->call(InsClassSeeder::class);
        $this->call(ShiftSeeder::class);
        $this->call(SectionSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(ReligionSeeder::class);
        $this->call(SubjectTypeSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(GeneralGradeSeeder::class);
        $this->call(ClassTestGradeSeeder::class);
        $this->call(AdmissionTestGradeSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(DesignationSeeder::class);
        $this->call(BranchSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(AttendanceSeeder::class);
        $this->call(GetInTouchSeeder::class);
        $this->call(BannerSeeder::class);
        $this->call(NoticeSeeder::class);
        $this->call(MassageSeeder::class);
        $this->call(VideoSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(InstitutephotoSeeder::class);
        $this->call(AboutschoolSeeder::class);
        $this->call(SociallinkSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(SchoolInfoSeeder::class);
        $this->call(HolidaySeeder::class);
        $this->call(ExamSeeder::class);
        $this->call(FeesTypeSeeder::class);
        $this->call(ShortCodeSeeder::class);
        $this->call(InstitutionPackageSeeder::class);
        $this->call(AdminTemplateSeeder::class);
        $this->call(FrontSectionSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(PeriodTimeSeeder::class);
        $this->call(ClassRoutineSeeder::class);
        $this->call(FeesSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(GlanceSeeder::class);
        $this->call(TeacherAssignSeeder::class);
        $this->call(ChartofAccountSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(StockSMSSeeder::class);
        $this->call(SellerSMSSeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(AdminMenuSeeder::class);
        $this->call(LeaveTemplateSeeder::class);

    }
}
