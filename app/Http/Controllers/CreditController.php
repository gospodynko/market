<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20.03.18
 * Time: 11:17
 */

namespace App\Http\Controllers;

use App\Models\CreditAlliances;
use App\Models\CreditRegions;
use Illuminate\Http\Request;


class CreditController extends Controller
{
    public function allianceCreate()
    {
        return view('dashboard.sections.credits.create', [$regions = CreditRegions::all()]);
    }

    public function storeAlliance(Request $request)
    {
        CreditAlliances::create([
            'title' => $request->input('title'),
            'contacts' =>$request->input('contacts')
        ]);
        return response()->json(['message' => 'success'], 200);
    }
    public function allianceList()
    {
        $count_page = 15;
        return view('dashboard.sections.credits.index', ['credits' => CreditAlliances::paginate($count_page)]);
    }

    public function editAlliance($id)
    {
        return view('dashboard.sections.credits.edit' , ['credit'=> CreditAlliances::findOrFail($id)]);
    }

    public function updateAlliance(Request $request, $id)
    {
        $credits =CreditAlliances::findOrFail($id);
        $data = $request->only(['title', 'contacts']);
        $credits->update($data);
        dd($credits);
        return response()->json(['status' => 1], 202);
    }

    public function deleteAlliance($id){
        $credit = CreditAlliances::findOrFail($id);
        $credit->delete();
        return redirect()->back();
    }
}