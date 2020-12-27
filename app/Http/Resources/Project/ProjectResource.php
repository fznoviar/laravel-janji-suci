<?php

namespace App\Http\Resources\Project;

use App\Modules\Project\Contracts\ProjectInterface;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        $this->resource;

        return [
            'title'       => $this->getProject()->getTitle(),
            'url'         => $this->getProject()->getUrl(),
            'description' => $this->getProject()->getDescription(),
        ];
    }

    /**
     * @return ProjectInterface
     */
    private function getProject(): ProjectInterface
    {
        return $this->resource;
    }
}
