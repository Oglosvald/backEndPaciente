<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressPostRequest;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $addresses = DB::table('addresses')
            ->when($id, function ($query, $id) {
                return $query->where('id', '=', $id);
            })
            ->get();

        return response()->json($addresses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddressPostRequest $request)
    {
        try {

            $validated = $request->validate();
            //dd($validated);
            $validated = $request->safe()->only(['id']);
            Redis::set($validated);
            // retornar o ID do endereço
            return redirect('/posts');
        } catch (Exception $e) {
            return 'Error:Could not finish the Address registration';
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
