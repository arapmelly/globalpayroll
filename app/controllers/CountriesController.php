<?php

class CountriesController extends \BaseController {

	/**
	 * Display a listing of countries
	 *
	 * @return Response
	 */
	public function index()
	{
		$countries = Country::all();

		return View::make('countries.index', compact('countries'));
	}

	/**
	 * Show the form for creating a new country
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('countries.create');
	}

	/**
	 * Store a newly created country in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Country::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$country = new Country;
		$country->name = array_get($data, 'name');
		$country->save();

		return Redirect::route('countries.index');
	}

	/**
	 * Display the specified country.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$country = Country::findOrFail($id);

		$rates = DB::table('rates')->where('country', '=', $country->name)->get();

		return View::make('countries.show', compact('country', 'rates'));
	}

	/**
	 * Show the form for editing the specified country.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$country = Country::find($id);

		return View::make('countries.edit', compact('country'));
	}

	/**
	 * Update the specified country in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$country = Country::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Country::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$country->name = array_get($data, 'name');
		$country->update();

		return Redirect::route('countries.index');
	}

	/**
	 * Remove the specified country from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Country::destroy($id);

		return Redirect::route('countries.index');
	}



	public function isdefault($id)
	{
		

		$countries  = Country::all();

		foreach ($countries as $country) {
			$count = Country::findOrFail($country->id);
			$count->is_default = false;
			$count->update();
		}

		$country = Country::findOrFail($id);

		$country->is_default = true;
		$country->update();


		return Redirect::back();
	}

}
