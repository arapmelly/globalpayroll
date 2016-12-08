<?php

class RatesController extends \BaseController {

	/**
	 * Display a listing of rates
	 *
	 * @return Response
	 */
	public function index()
	{
		$rates = Rate::all();

		$countries = Country::all();

		return View::make('rates.index', compact('rates', 'countries'));
	}

	/**
	 * Show the form for creating a new rate
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('rates.create');
	}

	/**
	 * Store a newly created rate in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Rate::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$rate = new Rate;
		$rate->name = array_get($data, 'name');
		$rate->charged_on = array_get($data, 'charged_on');
		$rate->country = array_get($data, 'country');
		$rate->type = array_get($data, 'type');
		$rate->save();

		return Redirect::to('ratescales/create/'.$rate->id);
	}

	/**
	 * Display the specified rate.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$country = Country::findOrFail($id);
		

		return View::make('rates.show', compact('rate'));
	}

	/**
	 * Show the form for editing the specified rate.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$rate = Rate::find($id);

		return View::make('rates.edit', compact('rate'));
	}

	/**
	 * Update the specified rate in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rate = Rate::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Rate::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		
		$rate->name = array_get($data, 'name');
		$rate->charged_on = array_get($data, 'charged_on');
		$rate->country = array_get($data, 'country');
		$rate->type = array_get($data, 'type');
		
		$rate->update();

		return Redirect::route('rates.index');
	}

	/**
	 * Remove the specified rate from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Rate::destroy($id);

		return Redirect::route('rates.index');
	}

}
