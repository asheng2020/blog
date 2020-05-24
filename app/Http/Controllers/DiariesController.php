<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diary;
use Carbon\Carbon;

class DiariesController extends Controller
{
    public function index() {

        $diaries = Diary::get();

        return view('pages.diary', [
            'diaries'   => $diaries,
        ]);
    }
}
