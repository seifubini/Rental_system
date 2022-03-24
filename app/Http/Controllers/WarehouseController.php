<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Warehouse;

class WarehouseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;

        $warehouses = DB::table('warehouses')
                ->where('created_by', $user_id)->get();

        return view('Admin.Warehouses.index', compact('warehouses'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'warehouse_name' => 'required|string|max:55',
            'warehouse_email' => 'required|email|max:55',
            'warehouse_phone' => 'required|string|min:10|max:13',
            'warehouse_address' => 'required|string',
            'warehouse_country' => 'required|string',
            'warehouse_city' => 'required|string'
        ]);

        $user_id = Auth::user()->id;

        $info = new Warehouse;

        $info->warehouse_name = $request->warehouse_name;
        $info->warehouse_email = $request->warehouse_email;
        $info->warehouse_phone = $request->warehouse_phone;
        $info->warehouse_address = $request->warehouse_address;
        $info->warehouse_country = $request->warehouse_country;
        $info->warehouse_city = $request->warehouse_city;
        $info->created_by = $user_id;
        $info->warehouse_status = $request->warehouse_status;

        $info->save();

        return redirect()->back()->with('success', 'Warehouse created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warehouse $warehouse)
    {
        $request->validate([
            'warehouse_name' => 'required|string|max:55',
            'warehouse_email' => 'required|email|max:55',
            'warehouse_phone' => 'required|string|min:10|max:13',
            'warehouse_address' => 'required|string',
            'warehouse_country' => 'required|string',
            'warehouse_city' => 'required|string'
        ]);

        $id = $warehouse->id;

        if($request->warehouse_status == "")
        {
            $status = "off";
        }
        else
        {
            $status = $request->warehouse_status;
        }

        DB::table('warehouses')
            ->where('id', $id)
            ->update([
                'warehouse_name' => $request->warehouse_name,
                'warehouse_email' => $request->warehouse_email,
                'warehouse_phone' => $request->warehouse_phone,
                'warehouse_address' => $request->warehouse_address,
                'warehouse_country' => $request->warehouse_country,
                'warehouse_city' => $request->warehouse_city,
                'warehouse_status' => $status
            ]);

        return redirect()->back()->with('success', 'Warehouse updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete();

        return redirect()->back()->with('success', 'Warehouse deleted successfully.');
    }
}
