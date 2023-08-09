<?php

namespace Modules\Business\Http\Controllers;

use Modules\Business\DataTables\BusinessDataTable;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Business\Entities\Business;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(BusinessDataTable $dataTable)
    {
        abort_if(Gate::denies('access_business'), 403);

        return $dataTable->render('business::index');
        // return view('business::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        abort_if(Gate::denies('create_business'), 403);

        return view('business::create');
        // return view('business::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('create_business'), 403);

        $request->validate([
            'name' => 'required|string|max:255',
            'location_id' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'zip_code' => 'required|string|max:10',
            'country' => 'required|string|max:100',
            'mobile' => 'required|string|max:13',
            'email' => 'required|string|max:100'
        ]);

        Business::create([
            'name' => $request->name,
            'location_id' => $request->location_id,
            'address' => $request->address,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'country' => $request->country,
            'mobile' => $request->mobile,
            'email' => $request->email
        ]);

        toast('Business Location Created!', 'success');

        return redirect()->route('business.index');
    }


    public function edit(Business $business)
    {
        abort_if(Gate::denies('edit_business'), 403);

        return view('business::edit', compact('business'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Business $business)
    {
        abort_if(Gate::denies('edit_business'), 403);

        $request->validate([
            'name' => 'required|string|max:255',
            'location_id' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'zip_code' => 'required|string|max:10',
            'country' => 'required|string|max:100',
            'mobile' => 'required|string|max:13',
            'email' => 'required|string|max:100'
        ]);

        $business->update([
            'name' => $request->name,
            'location_id' => $request->location_id,
            'address' => $request->address,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'country' => $request->country,
            'mobile' => $request->mobile,
            'email' => $request->email
        ]);

        toast('Business Location Updated!', 'success');

        return redirect()->route('business.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Business $business)
    {
        abort_if(Gate::denies('delete_business'), 403);

        $business->delete();

        toast('Business Deleted!', 'warning');

        return redirect()->route('business.index');
    }
}
