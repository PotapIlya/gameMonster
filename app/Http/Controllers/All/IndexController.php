<?php

namespace App\Http\Controllers\All;

use App\Http\Controllers\Controller;
use App\Models\Admin\Catalog;
use App\Models\Admin\CatalogKey;
use App\Models\Admin\Category;
use App\Models\Admin\Lick;
use App\Models\Admin\Proposal;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;

class IndexController extends BasicAllController
{



	public function __construct()
	{
		parent::__construct();
	}


	/**
	 * @param string $locale
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function changeLocale(string $locale)
	{
		if ($locale && in_array($locale, self::LOCALE) ){
			session(['locale' => $locale]);
		}
		return redirect()->back();
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {

		return view('all.main.index',
		[
    		'catalog' => Catalog::limit(16)->with('category')->get(),
    		'slider' => Slider::all(),
    		'link' => Lick::all(),
    		'proposal' => Proposal::all()
		]);
//    	return view('all.main.index', compact('catalog', 'slider', 'link', 'proposal'));
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
	 * @param string $url
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
	 */
    public function show(string $url)
    {
    	$item = Catalog::with('category', 'developer', 'languages', 'operatingSystem')->with('key', function ($query) {
			$query->where('status', 1)->first();
		})
			->where('url', $url)
			->first();

    	if (!$item){
    		return abort(404);
		};


//		$item->category->pluck('name'); // массив категорий товара (steam, origin)

		// ищу от категрий к товарам
		$otherGame = Category::whereIn('name', $item->category->pluck('name'))
			->with('catalog', function ($query) use ($url)
			{
				// чтобы не выводился товар, на котором уже нахоидимся
				$query->where('url', '!=', $url)
					->limit(4);
			})
			->get();


    	return view('all.main.show', compact('item', 'otherGame'));
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
