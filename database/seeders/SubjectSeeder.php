<?php

namespace Database\Seeders;

use App\Imports\SubjectImport;
use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ["Bangla (101)","English (107)","Mathmatics (109)","Religion &Moral Education (111)","General Science (127)","BD & Glob Studies (150)","HigherMath (126)","Finance & Banking (152)","Accounting (146)","Business Ent (143)","Geography (110)","Civic and Citizenship (140)","Civic 2nd (140)","Islamic History 1st (01)","ICT (154)","Physical Education (147)","Arts & Crafts (148)","Work and Life Education (155)","Agriculture Studies (134)","Bangla 1st (101)","Economics (141)","Physics 1st (178)","Physics 2nd (189)","Chemistry 1st (176)","Chemistry 2nd (177)","Biology 1st (178)","Social Work 2nd (272)","Accounting (253)","Bangla 2nd (102)","English 1st (107)","English 2nd (108)","Physics  (136)","Chemistry (137)","Biology  (138)","Biology 2nd (179)","Higher Math 1st (265)","Higher Math 2nd (206)","Economics 1st (141)","Economics 2nd (141)","Civic 1st (140)","Business Entp 2nd (0)","Agriculture Education 1st (238)","Islamic History 1st (01)","Islamic History 2nd (0)","Logic 1st (121)","Logic 2nd (122)","Social Work 1st (271)","Phychology 2nd (124)","History 1st (304)","History 2nd (305)","Islamic History and Culture 1st(267)","Islamic History and Culture 2nd(268)","Civics and Good goernance 1st (269)","Management 1st (0)","Management 2nd (0)","Islamic H&C 1st(0)","Islamic H&C 2nd(0)","Civics and Good goernance 1st (0)","Civics and Good goernance 2nd (0)","Accounting  1st(253)","Accounting 2nd (254)","Finance 1st (0)","Finance 2nd (0)","Business Ent 1st (0)","Civics and Good goernance 2nd (270)","Economy 1st (109)","Economy 2nd (110)","Soiology 1st (117)","Soiology 2nd (118)","Social Science 1st (117)","Agriculture 1st (0)","Agriculture 2nd (0)","Math (00)","Drawing (00)","G Knowledge & Drw (00)","Arabic (00)","Agriculture Education 1st (239)","Agriculture Education 2nd (240)","Geography 1st (125)","Geography 2nd (126)","Phychology 1st (123)","Social Science 2nd (118)","Islamic Study 1st (249)","Islamic Study 2nd (250)","Finance an & Ins 1st (292)","Finance an & Ins 2nd (293)","GK & Oral Test (00)","Religion (00)"];

        $subjects = [];
        foreach ($data as $subject){
            $subjectCode = explode(')', (explode('(', $subject)[1]))[0];
            $subjectName = $s=explode("(",$subject);;

            Subject::create([
                'sub_name' => $subjectName[0],
                'sub_code' => $subjectCode
            ]);

        }






    }
}
