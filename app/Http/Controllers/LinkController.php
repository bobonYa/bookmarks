<?php

namespace App\Http\Controllers;

use App\Exports\LinksExport;
use App\Http\Controllers\Classes\LinkParser;
use App\Http\Requests\StoreLink;
use App\Link;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Reader\Xls\MD5;

class LinkController extends Controller
{
    //
    public function index()
    {
        return view('links.index');
    }

    public function create()
    {
        return view('links.create');
    }

    public function store(StoreLink $request)
    {

        $validated = $request->validated();
        $pageContent = LinkParser::getPageData($request->link);
        if (!empty($request->password))
            $pageContent['password'] = Hash::make($request->password);

        $link = Link::create($pageContent);

        if (isset($link)) {
            return redirect()->to('/dashboard/links');
        }

        return redirect()->back();
    }

    public function detail(Link $link)
    {

        return view('links.detail', [
            'link' => $link
        ]);
    }


    public function destroy(Link $link, Request $request)
    {

        $validatedData = $request->validate([
            'password' => 'required',
        ]);

        if (!Hash::check($request->password, $link->password)) {
            return Redirect::back()->withErrors( 'Password invalid');
        }

        $link->delete();

        return redirect()->to('/dashboard/links');
    }

    /*
     * $draw - count of iteration for table
     * $offset -
     * $limit - count of rows
     * $columns -- list of columns
     * $order[name] -- column for sort
     * $order[dir] -- type of sort
     *
     * return json
     */
    public function json(Request $request)
    {
        $draw = $request->draw ?? 0;
        $offset = $request->start ?? 0;
        $limit = $request->length ?? 10;
        $order = $request->order[0];
        $columns = $request->columns;
        $columnOrdered = $columns[$order['column']]['name'] ?? 'created_at';
        $columnOrderedType = $order['dir'] ?? 'desc';
        $links = Link::orderBy($columnOrdered, $columnOrderedType)
            ->offset($offset)
            ->limit($limit);

        $linksData = $links->get();
        $linksCount = $links->count();


        foreach ($linksData as $link) {
            $created_at = $link->created_at->toDateString();
            $favicon = empty($link->favicon) ? "" : "<img src='{$link->favicon}'>";
            $url = "<a href='{$link->link}'>" . mb_strimwidth($link->link, 0, 40, "...") . "</a>";
            $title = mb_strimwidth($link->title, 0, 40, "...");
            $detailUrl = "<a href='/dashboard/links/{$link->id}'> Detail </a>";
            $rawsData[] = [
                $created_at,
                $favicon,
                $url,
                $title,
                $detailUrl,
            ];
        }
        $dataJson = [
            'draw' => $draw,
            'recordsTotal' => $linksCount,
            'recordsFiltered' => $linksCount,
            'data' => $rawsData ?? []
        ];

        return response()->json($dataJson);
    }

/*
 * Export data to xlsx
 */
    public function export()
    {
        return Excel::download(new LinksExport, 'links.xlsx');
    }
}
