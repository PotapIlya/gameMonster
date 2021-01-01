<?php

namespace App\Http\Controllers\All;

use App\Http\Controllers\Controller;
use App\Models\Admin\Catalog;
use App\Models\Admin\Category;
use App\Models\Admin\OperatingSystem;
use Illuminate\Http\Request;
use View;

class CatalogController extends BasicAllController
{
	public function __construct()
	{
		parent::__construct();
	}

	public function search(Request $request)
	{
		$games = Catalog::query();

		if ($request->input('category'))
		{
			$games->whereHas('category', function ($query) use ($request) {
				$query->whereIn('categories.id', $request->input('category'));
			});
		}
		if ($request->input('operatingSystem'))
		{
			$games->whereHas('operatingSystem', function ($query) use ($request) {
				$query->whereIn('operating_system.id', $request->input('operatingSystem'));
			});
		}
		if ($request->input('search'))
		{
			$games->where('title', 'LIKE', "%{$request['search']}%" );
		}
		return $games->get();
	}


	/**
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
    public function index()
    {

    	return view('all.catalog.index', [
    		'category' => Category::all(),
//    		'games' => Catalog::paginate(10),
    		'catalog' => Catalog::with('category')->get(),
			'oc' => OperatingSystem::all(),
			'categoryImg' => Category::where('showGames', 1)->take(4)->get(),
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
