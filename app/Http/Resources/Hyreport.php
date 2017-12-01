<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Hyreport extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'pjchange' => $this->pjchange,
            'date' => $this->date,
            'insname' => $this->insname,
            'pjtype' => $this->pjtype,
            'expect' => $this->expect,
            'title' => $this->title,
            'indname' => $this->indname,
            'fluctuation' => $this->fluctuation,
            'updated_at' => $this->updated_at,
            'content' => $this->content
        ];
    }
}
