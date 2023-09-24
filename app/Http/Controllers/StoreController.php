<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Border_control;
use App\Models\Facility;
use App\Models\Transportation;

class StoreController extends Controller
{
    public function store_1(Request $request, Boder_control $border_control)
    {
        $input = $request('border_control');
        $border_control->fill($input)->save();
    }
    public function store_2(Request $request, Facility $facility)
    {
        $input = $request('facility');
        $facility->fill($input)->save();
    }
    public function store_3(Request $request, Transportation $transportation)
    {
        $input = $request('transportation');
        $transportation->fill($input)->save();
    }
}
