<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Food;
use App\Category;

class foodController extends Controller
{
    public function index() {
        $food = Food::orderBy('name')->get();

    	return view('welcome', [
    		'food' => $food
    	]);
    }

    public function thermal($thermal) {

    	$thermal_id = null;
    	if ($thermal == 'cool') {
    		$thermal_id = 1;
    	}
    	if ($thermal == 'warm') {
    		$thermal_id = 2;
    	}
    	if ($thermal == 'neutral') {
    		$thermal_id = 3;
    	}

        $food = Food::with(['thermal'])->where('thermal_id', '=', $thermal_id)->get();

    	return view('thermal', [
    		'food' => $food,
    		'thermal' => $thermal
    	]);
    }

    public function category($thermal, $category) {
        $thermal_id = null;
        if ($thermal == 'cool') {
            $thermal_id = 1;
        }
        if ($thermal == 'warm') {
            $thermal_id = 2;
        }
        if ($thermal == 'neutral') {
            $thermal_id = 3;
        }

    	$category_id = null;
    	if ($category == 'fruits') {
    		$category_id = 1;
    	}
    	if ($category == 'vegetables') {
    		$category_id = 2;
    	}
    	if ($category == 'grains') {
    		$category_id = 3;
    	}
    	if ($category == 'meat') {
    		$category_id = 4;
    	}
    	if ($category == 'drinks') {
    		$category_id = 5;
    	}

        $food = Food::with(['thermal', 'category'])->where('thermal_id', '=', $thermal_id)->where('category_id', '=', $category_id)->get();

    	return view('category', compact('thermal', 'category'), [
    		'food' => $food,
            'thermal' => $thermal,
    		'category' => $category
    	]);
    }

    public function food($id) {
        $food = Food::find($id);
        return view('food', [
            'food' => $food
        ]);
    }

    public function thumbnail($id) {
        // with Eloquent:
        $validation = Validator::make([
            'image' => request('image')
                ],[
            'image' => 'required|url'
        ]);

        if($validation->passes()) {
            $food = Food::find($id);
            $food->image = request('image');
            $food->save();
            return redirect("/food/$id")
            ->with('successStatus', 'Thumbnail was successfully changed!');
        }
        else {
            return redirect("/food/$id")
            ->withInput() // to accommodate for old input
            ->withErrors($validation);
        }
    }
}
