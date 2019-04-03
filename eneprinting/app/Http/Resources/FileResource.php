<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'course' => $this->course,
            'file_name' => $this->file_name,
            'file_path' => $this->file_path,
            'id' => $this->id,
            'file_type' => $this->file_type,
            'created_at' => str_before($this->created_at, ' ')
        ];
    }
}
