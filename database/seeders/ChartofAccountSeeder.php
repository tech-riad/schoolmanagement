<?php

namespace Database\Seeders;

use App\Models\ChartofAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChartofAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $asset = ChartofAccount::updateOrCreate([
            'institute_id'  => 1,
            'acc_code'      => 'asset', //1
            'acc_head'      => 'Assets',
            'parent_id'     => 0,
            'acc_level'     => 0
        ]);

        
        ChartofAccount::updateOrCreate([
            'institute_id'  => 1,
            'acc_code'      => 'expenditure', //2
            'acc_head'      => 'Expenditure',
            'parent_id'     => 0,
            'acc_level'     => 0
        ]);
        ChartofAccount::updateOrCreate([
            'institute_id'  => 1,
            'acc_code'      => 'income', //3
            'acc_head'      => 'Income',
            'parent_id'     => 0,
            'acc_level'     => 0
        ]);
        ChartofAccount::updateOrCreate([
            'institute_id'  => 1,
            'acc_code'      => 'liabilities', //4
            'acc_head'      => 'Liabilities',
            'parent_id'     => 0,
            'acc_level'     => 0
        ]);
        ChartofAccount::updateOrCreate([
            'institute_id'  => 1,
            'acc_code'      => 'regularfees',
            'acc_head'      => 'Regular Fees',
            'parent_id'     => 3,
            'acc_level'     => 1
        ]);
        ChartofAccount::updateOrCreate([
            'institute_id'  => 1,
            'acc_code'      => 'admissionfees',
            'acc_head'      => 'Admission Fees',
            'parent_id'     => 3,
            'acc_level'     => 1
        ]);
        ChartofAccount::updateOrCreate([
            'institute_id'  => 1,
            'acc_code'      => 'examfees',
            'acc_head'      => 'Exam Fees',
            'parent_id'     => 3,
            'acc_level'     => 1
        ]);
        ChartofAccount::updateOrCreate([
            'institute_id'  => 1,
            'acc_code'      => 'otherfees',
            'acc_head'      => 'Other Fees',
            'parent_id'     => 3,
            'acc_level'     => 1
        ]);
        ChartofAccount::updateOrCreate([
            'institute_id'  => 1,
            'acc_code'      => 'studentfees',
            'acc_head'      => 'Student Fees',
            'parent_id'     => 3,
            'acc_level'     => 1
        ]);
    }
}
