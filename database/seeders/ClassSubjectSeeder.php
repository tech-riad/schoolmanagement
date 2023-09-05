<?php

namespace Database\Seeders;

use App\Models\ClassSubject;
use App\Models\InsClass;
use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $class = InsClass::first();

        $subjects = Subject::all();

        ClassSubject::updateOrcreate([
            'ins_class_id'  =>  $class->id,
            'subject_id'    =>  $subjects[0]->id
        ]);
        ClassSubject::updateOrcreate([
            'ins_class_id'  =>  $class->id,
            'subject_id'    =>  $subjects[1]->id
        ]);
        ClassSubject::updateOrcreate([
            'ins_class_id'  =>  $class->id,
            'subject_id'    =>  $subjects[2]->id
        ]);
        ClassSubject::updateOrcreate([
            'ins_class_id'  =>  $class->id,
            'subject_id'    =>  $subjects[3]->id
        ]);
        ClassSubject::updateOrcreate([
            'ins_class_id'  =>  $class->id,
            'subject_id'    =>  $subjects[4]->id
        ]);

    }
}
