<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreValidationRequest;
use App\Http\Resources\ValidationResource;
use App\Models\Society;
use App\Models\Validation;
use Illuminate\Http\Request;

class ValidationController extends Controller
{
    public function index(Request $request)
    {
        $society = Society::where('login_tokens', $request->token)->first();
        if ($society) {
            return response()->json(['validation' => ValidationResource::collection(
                Validation::where('society_id', $society->id)->get()
                // return response()->json($validation, 200);
            )
        ]);
        }
        return response()->json($society, 200);
    }

    public function store(StoreValidationRequest $request)
    {
        $society = Society::where('login_tokens', $request->token)->first();
        $request->validated();

        $validation = Validation::where('society_id', $society->id)->first();

        if (!$validation) {
            Validation::create([
                'work_experience' => $request->work_experience,
                'job_category_id' => $request->job_category_id,
                'job_position' => $request->job_position,
                'reason_accepted' => $request->reason_accepted,
                'society_id' => $society->id,
                'status' => 'pending',
                'validator_id' => null,
                'validator_notes' => null
            ]);
            return response()->json(['message' => 'Request data validation sent successful'], 200);
        }
        return response()->json(['message' => 'You already request validation'], 200);
    }
}
