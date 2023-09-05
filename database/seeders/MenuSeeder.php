<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $frontendMenu = Menu::create([
            'name' => 'home-menu',
            'description' =>'This is Home Menu.',
            'deleteable' => false
        ]);

        $frontendMenu->menuItems()->updateOrcreate([
            'order' => 1,
            'title' =>'Home',
            'url'   => '/'
        ]);

        $aboutMenu = $frontendMenu->menuItems()->updateOrcreate([
            'order' => 1,
            'title' =>'About Us',
        ]);

        $administrationMenu = $frontendMenu->menuItems()->updateOrcreate([
            'order' => 1,
            'title' =>'Administration',
        ]);

        $academicMenu = $frontendMenu->menuItems()->updateOrcreate([
            'order' => 1,
            'title' =>'Academic ',
        ]);

        $downloadMenu = $frontendMenu->menuItems()->updateOrcreate([
            'order' => 1,
            'title' =>'Download',
        ]);

        $coCurriculamMenu = $frontendMenu->menuItems()->updateOrcreate([
            'order' => 1,
            'title' =>'Co-Curriculam',
        ]);
        $frontendMenu->menuItems()->updateOrcreate([
            'order' => 1,
            'title' => 'Gallery',
            'url'   => '/page/gallery'
        ]);
        $frontendMenu->menuItems()->updateOrcreate([
            'order' => 1,
            'title' => 'Contact Us',
            'url'   => '/page/contact-us'
        ]);


        // about subpage start
        $frontendMenu->menuItems()->updateOrcreate([
            'order'     => 4,
            'parent_id' => $aboutMenu->id,
            'title'     => 'News & Event',
            'url'       => '/page/NewsEvent',
            'target'    => '_self'
        ]);

        $frontendMenu->menuItems()->updateOrcreate([
            'order'     => 5,
            'parent_id' => $aboutMenu->id,
            'title'     => 'Achievement',
            'url'       => '/page/Achievement',
            'target'    => '_self'
        ]);

        $frontendMenu->menuItems()->updateOrcreate([
            'order'     => 6,
            'parent_id' => $aboutMenu->id,
            'title'     => 'Infrastructure',
            'url'       => '/page/Infrastructure',
            'target'    => '_self'
        ]);

        $frontendMenu->menuItems()->updateOrcreate([
            'order'     => 7,
            'parent_id' => $aboutMenu->id,
            'title'     => 'Why Study',
            'url'       => '/page/whystudy',
            'target'    => '_self'
        ]);

        $frontendMenu->menuItems()->updateOrcreate([
            'order'     => 8,
            'parent_id' => $aboutMenu->id,
            'title'     => 'History',
            'url'       => '/page/history',
            'target'    => '_self'
        ]);
        $frontendMenu->menuItems()->updateOrcreate([
            'order'     => 9,
            'parent_id' => $aboutMenu->id,
            'title'     => 'At a Glance',
            'url'       => 'page/at_a_glance',
            'target'    => '_self'
        ]);

        //about subpage ends

        //administration subpage start 

        $frontendMenu->menuItems()->updateOrcreate([
            'order'     => 1,
            'parent_id' => $administrationMenu->id,
            'title'     => 'Governing Body',
            'url'       => '/page/governing-body',
            'target'    => '_self'
        ]);

        $frontendMenu->menuItems()->updateOrcreate([
            'order'     => 2,
            'parent_id' => $administrationMenu->id,
            'title'     => 'Chairman Message',
            'url'       => '/page/chairman-message',
            'target'    => '_self'
        ]);

        $frontendMenu->menuItems()->updateOrcreate([
            'order'     => 3,
            'parent_id' => $administrationMenu->id,
            'title'     => 'Principal Message',
            'url'       => '/page/principal-message',
            'target'    => '_self'
        ]);

        $frontendMenu->menuItems()->updateOrcreate([
            'order'     => 4,
            'parent_id' => $administrationMenu->id,
            'title'     => 'Teachers',
            'url'       => '/page/teachers',
            'target'    => '_self'
        ]);

        $frontendMenu->menuItems()->updateOrcreate([
            'order'     => 5,
            'parent_id' => $administrationMenu->id,
            'title'     => 'Staff',
            'url'       => '/page/staff',
            'target'    => '_self'
        ]);

        //administration subpage ends 


        //academic subpage start 

        $frontendMenu->menuItems()->updateOrcreate([
            'order'     => 1,
            'parent_id' => $academicMenu->id,
            'title'     => 'Students List',
            'url'       => '/page/students-list',
            'target'    => '_self'
        ]);
        $frontendMenu->menuItems()->updateOrcreate([
            'order'     => 2,
            'parent_id' => $academicMenu->id,
            'title'     => 'Merit Student',
            'url'       => 'page/merit-students-list',
            'target'    => '_self'
        ]);

        $frontendMenu->menuItems()->updateOrcreate([
            'order'     => 3,
            'parent_id' => $academicMenu->id,
            'title'     => 'Class Routine',
            'url'       => '/page/class-routine',
            'target'    => '_self'
        ]);

        $frontendMenu->menuItems()->updateOrcreate([
            'order'     => 4,
            'parent_id' => $academicMenu->id,
            'title'     => 'Exam Routine',
            'url'       => '/page/exam-routine',
            'target'    => '_self'
        ]);

        $frontendMenu->menuItems()->updateOrcreate([
            'order'     => 5,
            'parent_id' => $academicMenu->id,
            'title'     => 'Syllabus & Booklist',
            'url'       => '/page/syllabus-booklist',
            'target'    => '_self'
        ]);

        $frontendMenu->menuItems()->updateOrcreate([
            'order'     => 6,
            'parent_id' => $academicMenu->id,
            'title'     => 'Result',
            'url'       => '/page/result',
            'target'    => '_self'
        ]);

        $frontendMenu->menuItems()->updateOrcreate([
            'order'     => 7,
            'parent_id' => $academicMenu->id,
            'title'     => 'Notice',
            'url'       => '/page/notice',
            'target'    => '_self'
        ]);

        //academic subpage ends 


        //Download subpage start 

        $frontendMenu->menuItems()->updateOrcreate([
            'order'     => 1,
            'parent_id' => $downloadMenu->id,
            'title'     => 'Digital Content',
            'url'       => '/page/digital-content',
            'target'    => '_self'
        ]);

        $frontendMenu->menuItems()->updateOrcreate([
            'order'     => 2,
            'parent_id' => $downloadMenu->id,
            'title'     => 'Hand Book',
            'url'       => '/page/hand-book',
            'target'    => '_self'
        ]);

        $frontendMenu->menuItems()->updateOrcreate([
            'order'     => 3,
            'parent_id' => $downloadMenu->id,
            'title'     => 'Home Work',
            'url'       => '/page/home-work',
            'target'    => '_self'
        ]);

        $frontendMenu->menuItems()->updateOrcreate([
            'order'     => 4,
            'parent_id' => $downloadMenu->id,
            'title'     => 'Class Notice',
            'url'       => '/page/class-notice',
            'target'    => '_self'
        ]);

        $frontendMenu->menuItems()->updateOrcreate([
            'order'     => 5,
            'parent_id' => $downloadMenu->id,
            'title'     => 'Other Downloads',
            'url'       => '/page/other-downloads',
            'target'    => '_self'
        ]);

        //Download subpage ends 


        //Co-Curriculam subpage start 

         $frontendMenu->menuItems()->updateOrcreate([
            'order'     => 1,
            'parent_id' => $coCurriculamMenu->id,
            'title'     => 'Sports',
            'url'       => '/page/sports',
            'target'    => '_self'
        ]);

        $frontendMenu->menuItems()->updateOrcreate([
            'order'     => 2,
            'parent_id' => $coCurriculamMenu->id,
            'title'     => 'Tours',
            'url'       => '/page/tours',
            'target'    => '_self'
        ]);

        $frontendMenu->menuItems()->updateOrcreate([
            'order'     => 3,
            'parent_id' => $coCurriculamMenu->id,
            'title'     => 'Scout',
            'url'       => '/page/scout',
            'target'    => '_self'
        ]);

        //Co-Curriculam subpage ends 

    }
}
