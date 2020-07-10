<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ToggleTodoController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Todo $todo)
    {
        if ($todo->completed_at) {
            $todo = tap($todo)->update(['completed_at' => null]);
        } else {
            $todo = tap($todo)->update(['completed_at' => Carbon::now()]);
        }
        return response()->json($todo);
    }
}
