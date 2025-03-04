<?php

namespace App\Http\Controllers\API;

use App\Models\Data;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;

class DataController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'sales' => '23',
            'comissions' => '23',
            'total' => 1230.94
        ];

        return $this->sendResponse($data);   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
