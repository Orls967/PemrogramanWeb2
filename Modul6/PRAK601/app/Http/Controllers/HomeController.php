<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Praktikan;

class HomeController extends Controller
{
    public function index()
    {
        $praktikan = Praktikan::first();
        if (! $praktikan) {
            abort(404);
        }

        $praktikanArr = $praktikan->toArray();
        $praktikanArr['hobi'] = $praktikan->hobi ?? [];
        $praktikanArr['skills'] = $praktikan->skills ?? [];
        $praktikan = $praktikanArr;

        $cards = array_slice(
            Praktikan::experiences(),
            0,
            2
        );

        return view('home', compact('praktikan', 'cards'));
    }

    public function profile()
    {
        $praktikan = Praktikan::first();
        if (! $praktikan) {
            abort(404);
        }
        $experiences = Praktikan::experiences();
        $cards = array_slice($experiences, 0, 4);
        $praktikanArr = $praktikan->toArray();
        $praktikanArr['hobi'] = $praktikan->hobi ?? [];
        $praktikanArr['skills'] = $praktikan->skills ?? [];
        $praktikan = $praktikanArr;

        return view('profile', compact('praktikan', 'cards'));
    }

    public function experience($id)
    {
        $exp = Praktikan::findExperience($id);
        if (! $exp) {
            abort(404);
        }
        return view('experience', ['experience' => $exp]);
    }
}