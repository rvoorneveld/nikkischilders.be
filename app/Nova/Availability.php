<?php

namespace App\Nova;

use Laravel\Nova\Fields\{BelongsTo, BelongsToMany, DateTime, HasOne, ID};
use Illuminate\Http\Request;

class Availability extends Resource
{

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Availability::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param Request $request
     * @return array
     */
    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),
            BelongsToMany::make('Appointment'),
            DateTime::make('start')->format($format = 'D MMM YYYY HH:mm'),
            DateTime::make('end')->format($format)->showOnIndex()->hideWhenCreating()->hideWhenUpdating(),
        ];
    }

    public function title()
    {
        return $this->start.' - '. $this->end;
    }

}
