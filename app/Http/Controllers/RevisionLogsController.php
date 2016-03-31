<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Revision;
use App\RevisionLog;
use Illuminate\Http\Request;

class RevisionLogsController extends Controller
{
    public function index(Revision $revision, Request $request)
    {
        $revision->with('logs.user');

        $logs = $this->applyLogFilters($request->get('filter', []), $revision);

        return view('revisions.logs.index')
            ->withRevision($revision)
            ->withLogs($logs);
    }

    private function applyLogFilters(array $filters, Revision $revision)
    {
        $appovedFilters = collect($filters)->only('user_id');

        $query = $revision->logs()->with('user');

        $appovedFilters->each(function ($value, $key) use ($query) {
            return $query->where($key, $value);
        });

        return $query->get();
    }

    public function create(Revision $revision)
    {
        return view('revisions.logs.create')
            ->withRevision($revision);
    }

    public function store(Revision $revision, Request $request)
    {
        $log = new RevisionLog($request->only('body', 'revision_id'));

        $request->user()
            ->logs()
            ->save($log);

        return redirect()->route('revisions::logs::show', [$revision, $log]);
    }

    public function show(Revision $revision, RevisionLog $revision_log)
    {
        return view('revisions.logs.show')
            ->withRevision($revision)
            ->withLog($revision_log);
    }
}
