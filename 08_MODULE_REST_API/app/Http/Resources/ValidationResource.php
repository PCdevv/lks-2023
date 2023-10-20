<?php

namespace App\Http\Resources;

use App\Models\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ValidationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // $jobCat = JobCategory::select('id', 'job_category')->where('id', $request->job_category_id)->first();
        return [
            'id' => $this->id,
            'status' => $this->status,
            'work_experience' => $this->work_experience,
            'job_category_id' => $this->job_category_id,
            // 'job_category' => $jobCat,
            'job_position' => $this->job_position,
            'reason_accepted' => $this->reason_accepted,
            'validator_notes' => $this->validator_notes,
            'validator' => null,
        ];
    }
}
