<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Revision;
use Illuminate\Http\Request;

class RevisionsController extends Controller
{
    public function index()
    {
        $revisions = Revision::orderBy('id', 'desc')
            ->with('logs')
            ->get();

        return view('revisions.index')
            ->withRevisions($revisions);
    }

    public function show(Revision $rev)
    {
        return 'hello';
    }
}
