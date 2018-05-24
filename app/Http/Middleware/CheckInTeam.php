<?php

namespace App\Http\Middleware;

use Closure;
use App\Project;
use App\User;
use App\Team;

class CheckInTeam {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $isProject = $request->is('project/*');
        $isTeam    = $request->is('team/*');

        /*———————————————————————————————————*\
                $ PROJECT PAGE
        \*———————————————————————————————————*/
        if ($isProject) {
            $slugUrl   = $request->route('slug');
            $projectID = Project::where('slug', $slugUrl)->first()->id;

            foreach (User::myProjects() as $p) {
                if($p->slug === $slugUrl) {
                    $authorized = true;
                    break;
                }
                else {
                    $authorized = false;
                }
            }
        /*———————————————————————————————————*\
                $ TEAM PAGE
        \*———————————————————————————————————*/
        } elseif ($isTeam) {
            $slugUrl = $request->route('slug');

            foreach (User::myTeams() as $p) {
                if($p->slug === $slugUrl) {
                    $authorized = true;
                    break;
                }
                else {
                    $authorized = false;
                }
            }
        }


        if (!$authorized) {
            return redirect()->route('dashboard.index');
        }

        return $next($request);
    }
}
