<?php

namespace App\Services;

use App\Models\InsTemplate;

class TemplateService
{
    public  $institute;
    public  $template;

    /**
     * @param $institute
     */
    public function __construct($institute)
    {
        $this->institute = $institute;
    }

    /**
     * @return array
     */
    public  function  getTemplate()
    {
        if ($this->institute->template->count() > 0) {
            $this->template = $this->institute->template[0];
        } else {
            $this->template = InsTemplate::find(1);
        }

        return [
            'template' => $this->template
        ];
    }
}
