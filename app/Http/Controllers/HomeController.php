<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data['AuthUser'] = Auth::user();
        $filteredDate = $request->date ?? date('Y-m-d');

        $carbonDate = Carbon::createFromDate($filteredDate);
        Carbon::setLocale('pt_BR');

        $data['date_as_string'] = ucfirst($carbonDate->translatedFormat('d \d\e M'));
        $data['date_prev_button'] = $carbonDate->addDay(-1)->format('Y-m-d');
        $data['date_next_button'] = $carbonDate->addDay(2)->format('Y-m-d');


        $data['tasks'] = Task::whereDate('due_date', $filteredDate)->get();

        $data['tasks_count'] = $data['tasks']->count();
        $data['done_tasks_count'] = $data['tasks']->where('is_done', true)->count();
        $data['undone_tasks_count'] = $data['tasks']->where('is_done', false)->count();

        return view('home', $data);
    }
}
