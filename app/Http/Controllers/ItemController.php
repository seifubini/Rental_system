<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Warehouse;
use App\Models\Item;

class ItemController extends Controller
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
                ->where('created_by', $user_id)
                ->where('warehouse_status', "on")->get();

        $items = DB::table('items')
            ->join('warehouses', DB::raw('cast(warehouses.id AS VARCHAR)'), '=', 'items.warehouse_id')
            ->select('items.*', 'warehouses.warehouse_name')
            ->where('items.created_by', $user_id)->get();

        return view('Admin.Items.index', compact('warehouses', 'items'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
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
            'item_name' => 'required|string|max:55',
            'item_price' => 'required|string',
            'item_description' => 'required|string|max:255',
            'item_quantity' => 'required|string',
            'warehouse_id' => 'required|string',
        ]);

        $user_id = Auth::user()->id;

        $info = new Item;

        $info->item_name = $request->item_name;
        $info->item_price = $request->item_price;
        $info->item_quantity = $request->item_quantity;
        $info->item_description = $request->item_description;
        $info->item_type = $request->item_type;
        $info->warehouse_id = $request->warehouse_id;
        $info->item_brand = $request->item_brand;
        $info->item_status = $request->item_status;
        $info->created_by = $user_id;

        $info->save();

        return redirect()->back()->with('success', 'Item created successfully.');
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
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'item_name' => 'required|string|max:55',
            'item_price' => 'required|string',
            'item_description' => 'required|string|max:255',
            'item_quantity' => 'required|string',
            'warehouse_id' => 'required|string',
        ]);

        $id = $item->id;

        if($request->item_status == "")
        {
            $status = "off";
        }
        else
        {
            $status = $request->item_status;
        }

        DB::table('items')
            ->where('id', $id)
            ->update([
                'item_name' => $request->item_name,
                'item_price' => $request->item_price,
                'item_description' => $request->item_description,
                'item_quantity' => $request->item_quantity,
                'item_type' => $request->item_type,
                'item_brand' => $request->item_brand,
                'warehouse_id' => $request->warehouse_id,
                'item_status' => $status
            ]);

        return redirect()->back()->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->back()->with('success', 'Item deleted successfully.');
    }
}
