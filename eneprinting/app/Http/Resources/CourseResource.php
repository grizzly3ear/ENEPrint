<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // $table->increments('id');
        // $table->string('code')->unique();
        // $table->string('name');
        // $table->string('type')->nullable();
        // $table->integer('year')->unsigned()->nullable();

        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'type' => $this->type,
            'year' => $this->year,
            'full_name' => $this->code . ' ' . $this->name,
            'pivot' => $this->pivot
        ];
    }
}
