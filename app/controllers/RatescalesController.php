<?php

class RatescalesController extends \BaseController {

	/**
	 * Display a listing of ratescales
	 *
	 * @return Response
	 */
	public function index()
	{
		$ratescales = Ratescale::all();

		return View::make('ratescales.index', compact('ratescales'));
	}

	/**
	 * Show the form for creating a new ratescale
	 *
	 * @return Response
	 */
	public function create($id)
	{
		$rate = Rate::find($id);
		$ratescales = Ratescale::where('rate_id', $rate->id)->get();
		return View::make('ratescales.create', compact('rate', 'ratescales'));
	}

	/**
	 * Store a newly created ratescale in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Ratescale::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$scale = new Ratescale;
		$scale->rate_id = array_get($data, 'rate_id');
		$scale->lower_limit = array_get($data, 'lower_limit');
		$scale->upper_limit = array_get($data, 'upper_limit');
		$scale->value = array_get($data, 'value');
		$scale->save();

		return Redirect::back();
	}

	/**
	 * Display the specified ratescale.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$ratescale = Ratescale::findOrFail($id);

		return View::make('ratescales.show', compact('ratescale'));
	}

	/**
	 * Show the form for editing the specified ratescale.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$ratescale = Ratescale::find($id);

		return View::make('ratescales.edit', compact('ratescale'));
	}

	/**
	 * Update the specified ratescale in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$scale = Ratescale::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Ratescale::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		
		
		$scale->lower_limit = array_get($data, 'lower_limit');
		$scale->upper_limit = array_get($data, 'upper_limit');
		$scale->value = array_get($data, 'value');
		$scale->update();

		return Redirect::to('ratescales/create/'.$scale->rate_id);
	}

	/**
	 * Remove the specified ratescale from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		$scale = Ratescale::find($id);
		
		Ratescale::destroy($id);

		return Redirect::back();
	}

}
