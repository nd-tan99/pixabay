<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;

class CreateViewIfNotExists
{
    public function handle($request, Closure $next)
    {
        // Get the video name from the route parameters
        $videoName = $request->route('videoName');

        // Define the view name based on the video name
        $viewName = "$videoName";
        // Check if the view already exists
        if (!View::exists($viewName)) {
            $viewPath = resource_path("views/details/$viewName.blade.php");
            $viewContent = <<<HTML
@extends('details.main')

@section('content')
HTML;

            // Note: You can add default content for the view here if needed

            // Add closing section directive
            $viewContent .= <<<HTML

@endsection
HTML;

            // Save the content to the view file
            File::put($viewPath, $viewContent);
        }

        // Continue with the next middleware or route handling
        return $next($request);
    }
}
