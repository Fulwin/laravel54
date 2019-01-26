<?php

namespace App\Http\Controllers;

use App\Models\Software;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SoftwareRequest;

class SoftwareController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$softwares = Software::paginate();
		return view('softwares.index', compact('softwares'));
	}

    public function show(Software $software)
    {
        return view('softwares.show', compact('software'));
    }

	public function create(Software $software)
	{
		return view('softwares.create_and_edit', compact('software'));
	}

	public function store(SoftwareRequest $request)
	{
		$software = Software::create($request->all());
		return redirect()->route('softwares.show', $software->id)->with('message', 'Item created successfully.');
	}

	public function edit(Software $software)
	{
        $this->authorize('update', $software);
		return view('softwares.create_and_edit', compact('software'));
	}

	public function update(SoftwareRequest $request, Software $software)
	{
		$this->authorize('update', $software);
		$software->update($request->all());

		return redirect()->route('softwares.show', $software->id)->with('message', 'Item updated successfully.');
	}

	public function destroy(Software $software)
	{
		$this->authorize('destroy', $software);
		$software->delete();

		return redirect()->route('softwares.index')->with('message', 'Item deleted successfully.');
	}
}