<?php

namespace App\Nova;

use Laravel\Nova\Fields\{BelongsTo, BelongsToMany, DateTime, ID, Text};
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

class Appointment extends Resource
{

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Appointment::class;

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
            BelongsToMany::make('Availability'),
            BelongsTo::make('User'),
            BelongsTo::make('Treatment'),
        ];
    }

}
