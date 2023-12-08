<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Collection;
use Illuminate\Support\Carbon;
use Asantibanez\LivewireCalendar\LivewireCalendar;

class AppointmentsCalendar extends LivewireCalendar
{
    public function events() : Collection
    {
        return collect([
            [
                'id' => 1,
                'title' => 'Breakfast',
                'description' => 'Pancakes! 🥞',
                'date' => Carbon::today(),
            ],
            [
                'id' => 2,
                'title' => 'Meeting with Pamela',
                'description' => 'Work stuff',
                'date' => Carbon::tomorrow(),
            ],
        ]);
        // return Model::query()
        // ->whereDate('scheduled_at', '>=', $this->gridStartsAt)
        // ->whereDate('scheduled_at', '<=', $this->gridEndsAt)
        // ->get()
        // ->map(function (Model $model) {
        //     return [
        //         'id' => $model->id,
        //         'title' => $model->title,
        //         'description' => $model->notes,
        //         'date' => $model->scheduled_at,
        //     ];
        // });
    }
}
