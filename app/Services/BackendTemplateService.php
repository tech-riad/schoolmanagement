<?php

namespace App\Services;

use App\Models\BackendTemplate;
use App\Models\InsTemplate;

class BackendTemplateService
{
    public  $institute;
    public  $template;

    /**
     * @param $institute
     */
    public function __construct($institute)
    {
        $this->institute = $institute;

        // parent::__construct();
    }

    /**
     * @return array
     */
    public  function  getTemplate()
    {



        if ($this->institute->backendTemplate->isNotEmpty()){
            $this->template = $this->institute->backendTemplate[0];
        }
        else{
            $this->template = BackendTemplate::first();
        }


        return [
            'template' => $this->template
        ];
    }

}
