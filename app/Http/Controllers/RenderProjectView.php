<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class RenderProjectView extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Project $project): View
    {
        $breadCrumb = [
            ['label' => 'Home', 'url' => route('page.landingPage')],
            ['label' => 'Projects', 'url' => '#'],
            ['label' => $project->getAttribute('title'), 'url' => route('page.project.view', $project)],
        ];

        return view('components.page.project-view', compact('project', 'breadCrumb'));
    }
}
