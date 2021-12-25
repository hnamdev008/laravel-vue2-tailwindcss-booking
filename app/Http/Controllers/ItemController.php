<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\DaysOfWeek;
use App\Models\ItemType;
use App\Models\TimeUnit;

class ItemController extends Controller
{
    public function index()
    {
        
    }
    
    public function get(Request $request)
    {
        return response()->json([
            'items' => Item::all(),
            'itemTypes' => ItemType::select("id", "name")->get(),
            'daysOfWeeks' => DaysOfWeek::select("id", "name")->get(),
            'timeUnits' => TimeUnit::select("id", "name")->get(),
        ]);
    }
    
    public function store(Request $request)
    {
    }
    
    public function delete($id)
    {
    }
}
