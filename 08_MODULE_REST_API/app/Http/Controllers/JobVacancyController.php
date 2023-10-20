<?php

namespace App\Http\Controllers;

use App\Models\AvailablePosition;
use App\Models\JobApplyPosition;
use App\Models\JobCategory;
use App\Models\JobVacancies;
use App\Models\Society;
use App\Models\Validation;
use Illuminate\Http\Request;

class JobVacancyController extends Controller
{
    public function index(Request $request)
    {
        $society = Society::where('login_tokens', $request->token)->first();
        $validation = Validation::where('society_id', $society->id)->first();
        $job_vacancy = JobVacancies::where('job_category_id', $validation->job_category_id)->first();
        $job_cat = JobCategory::where('id', $job_vacancy->job_category_id)->first();
        $available_position = AvailablePosition::where('job_vacancy_id', $job_vacancy->id )->get();

        $data['id'] = $job_vacancy->id;
        $data['category'] = $job_cat;
        $data['Company'] = $job_vacancy->company;
        $data['address'] = $job_vacancy->address;
        $data['description'] = $job_vacancy->description;
        $data['available_position'] = $available_position;

        return response()->json(['vacancies' => $data], 200);

    }
}
