<?php

namespace App\Http\Controllers\All;

use App\Http\Controllers\Controller;
use App\Models\Admin\Catalog;
use App\Models\Admin\CatalogKey;
use App\Models\Admin\Category;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;

class IndexController extends BasicAllController
{


	public function __construct()
	{
		parent::__construct();
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
		$catalog = Catalog::limit(16)->with('category')->get();
		$slider = Slider::all();



    	return view('all.main.index', compact('catalog', 'slider'));
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
    	$item = Catalog::with('category', 'key')->where('url', $id)->first();
    	if (!$item){
    		dd( 'IndexController show' );
		};

    	// беерем категории у родителей и от связи в категория берем схожие

		// переписать, тк берет только первую категорию
    	$otherGame = Category::whereIn('name', $item->category->pluck('name')) // получаю все категории родителя
			->with('catalog')
			->limit(1)
			->get()
			->pluck('catalog')->first();



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
