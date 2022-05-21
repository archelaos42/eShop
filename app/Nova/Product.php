<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;
use App\Models\Category;
use App\Models\Subcategory;

class Product extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Product::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

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
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            Text::make(__('Name'), 'name')->sortable(),
            Text::make(__('Slug'), 'slug')->sortable(),
            Text::make(__('Quantity'), 'quantity')->sortable(),
            Image::make(__('Featured Image'), 'featuredImage')->sortable(),
            Text::make(__('Price'), 'price')->sortable(),

            BelongsTo::make('Brand'),

            NovaBelongsToDepend::make('Category')
            ->options(Category::all()),

            NovaBelongsToDepend::make('Subcategory')
                ->optionsResolve(function ($category) {
                    return Subcategory::query()->where('category_id', $category->id)->get(['id','name']);
                })
            ->dependsOn('Category'),




            HasMany::make('Attributes'),
            BelongsToMany::make('Orders'),
            HasMany::make('Images'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
