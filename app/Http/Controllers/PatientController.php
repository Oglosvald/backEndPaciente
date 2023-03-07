<?php

namespace App\Http\Controllers;
use App\Http\Requests\PatientPostRequest;
use Illuminate\Http\Request;
class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $patients = DB::table('patients')
            ->when($id, function ($query, $id) {
                return $query->where('id', '=', $id);
            })
            ->get();

        return response()->json($patients);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientPostRequest $request)
    {
        try {
//            $Addresses = AddressController::class;
//            $Address = $Addresses::store;
            $validated = $request->validate();

            // The blog post is valid...

            return redirect('/posts');

        } catch (Exception $e) {
            return 'Error: could not finish the Patient registration.';
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
