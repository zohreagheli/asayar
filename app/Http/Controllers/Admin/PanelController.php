<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\api;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search', '');

        // اگر نیاز به فیلتر داده دارید:
        $results = [];
        if ($search) {
            $results = api::where('field_name', 'like', '%'.$search.'%')->get();
            // یا هر منطق جستجوی دیگری که نیاز دارید
        }


        return view('index', [
            'search' => $search,
            'results' => $results
        ]);
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
    public function show(api $api)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, api $api)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(api $api)
    {
        //
    }
}
