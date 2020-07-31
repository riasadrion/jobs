<?php

namespace App\Http\Controllers\Admin;

use App\Type;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypesController extends Controller
{

    public function index()
    {
        $types = Type::orderBy('id', 'desc')->paginate(5);
        return view ('admin.pages.types', compact('types'));
    }

    public function store(Request $request)
    {
        $controller_type = new type();
        $controller_type->title = $request->input('title');
        $controller_type->save();
        return redirect("/controller-types")->with('success','type created successfully!');
    }

    public function update(Request $request, Type $controller_type)
    {
        $controller_type->title = $request->input('title');
        $controller_type->save();
        return redirect("/controller-types")->with('success','Type created successfully!');
    }

    public function destroy(Type $controller_type)
    {
        $controller_type->delete();
        return redirect("/controller-types")->with('error','Type removed');

    }
}
