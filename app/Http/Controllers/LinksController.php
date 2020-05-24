<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;

class LinksController extends Controller
{
    public function index() {

        $links = Link::get();

        return view('pages.link',[
            'links' => $links,
        ]);
    }
}
