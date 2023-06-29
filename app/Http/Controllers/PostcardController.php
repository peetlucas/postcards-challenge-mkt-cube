<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostcardRequest;
use App\Http\Requests\UpdatePostcardRequest;
use App\Models\Postcard;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\abort;
use Illuminate\Support\Facades\Redirect;

use Carbon\Carbon;

class PostcardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $isDraft = 0;
        return view('postcards.index', [
            'postcards' => Postcard::latest()->filter(request(['search']))
                    ->where('is_draft', '=', $isDraft)                   
                    ->paginate(5)
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
        //Confirm postcard not deleted
        $deletedPost = Postcard::onlyTrashed()      
                    ->where('id', '=', $postcard->id)
                    ->get();
        if($deletedPost == "[]"){
            $deletedPost = "";
        }
        if($deletedPost != ""){
            abort_if($deletedPost, response(Redirect::to('/')
                ->with('message', '301, Postcard unavailable!'), 301));                     
        }

        //Get postcard schema
        $product = Postcard::findOrFail($postcard->id);
        $schema = $product->getSchema();   

        return view('postcards.show', compact('postcard', 'schema'));
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
     * Remove the specified postcard from storage.
     */
    public function destroy(Postcard $postcard) {        
        
        if($postcard->photo && Storage::disk('public')->exists($postcard->photo)) {
            Storage::disk('public')->delete($postcard->photo);
        }
        $postcard->delete();
        return redirect('/postcards/manage')->with('message', 'Postcard deleted successfully');
    }
}
