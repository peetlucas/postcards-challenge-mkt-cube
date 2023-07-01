<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostcardRequest;
use App\Http\Requests\UpdatePostcardRequest;
use App\Models\Postcard;
use App\Pagination\CustomLengthAwarePaginator;

use Illuminate\Support\Collection;

class PostcardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Assuming you have your items and pagination settings
        $items = Postcard::all();
        $total = $items->count();
        $perPage = 10;
        $currentPage = request()->input('page', 1);
        $path = '/custom-url'; // Specify your custom URL here

        // Create the custom paginator instance
        $paginator = new CustomLengthAwarePaginator(
            new Collection($items),
            $total,
            $perPage,
            $currentPage,
            [
                'path' => $path,
            ]
        );

        // Retrieve the paginated results
        $paginatedItems = $paginator->items();

        // Render the pagination links
        $links = $paginator->render();

        return view('postcards.index', [
            'postcards' => Postcard::paginate(20), compact('paginatedItems')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostcardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Postcard $postcard)
    {
        return view('postcards.show', compact('postcard'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Postcard $postcard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostcardRequest $request, Postcard $postcard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Postcard $postcard)
    {
        //
    }
}
