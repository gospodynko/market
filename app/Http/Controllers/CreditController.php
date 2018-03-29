<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20.03.18
 * Time: 11:17
 */

namespace App\Http\Controllers;

use App\Models\CreditAlliances;
use App\Models\CreditContacts;
use App\Models\CreditRegions;
use FontLib\Table\Type\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CreditController extends Controller
{
    public function allianceCreate(Request $request)
    {
//        dd(CreditRegions::get());
        return view('dashboard.sections.credits.create', ['data' => ['regions' => CreditRegions::all()]]);
    }

    public function createRegionContact($alliance, $region){
        $data_region = [
            'id_agro_alliance' => $alliance['id'],
            'id_credit_region' => $region['id'],
            'region_email'
        ];
        $region_cont_id = CreditContacts::create($data_region);
        $region_cont_id->region()->sync($region['id']);
        $region_cont_id->alliance()->sync( $alliance['id']);
        return $region_cont_id->id;
    }

    public function storeAlliance(Request $request)
    {

        $v = Validator::make($request->all(), [
            'branches' => 'required|array',
            'branches.*.id_credit_region' => 'required|integer|exists:regions,id',
            'branches.*.region_email' => 'required|string'

        ]);

        if (count($v->errors())) {
            return response()->json([], 400);
        }

        $credit_aliance = CreditAlliances::create([
            'title' => $request->input('title'),
            'contacts' =>$request->input('contacts')
        ]);
        $credit_aliance->branches()->createMany($request->input('branches'));
        return response()->json(['message' => 'success'], 200);
    }
    public function allianceList()
    {
        $count_page = 15;
        return view('dashboard.sections.credits.index', ['credits' => CreditAlliances::paginate($count_page)]);
    }

    public function editAlliance($id)
    {
        return view('dashboard.sections.credits.edit' , ['credit'=> CreditAlliances::findOrFail($id)->load('branches'), 'regions' => CreditRegions::all()]);
    }

    public function updateAlliance(CreditAlliances $alliances, Request $request)
    {
        $v = Validator::make($request->all(), [
            'title' => 'required|string',
            'contacts' => 'required|string',
            'branches' => 'required|array',
            'branches.*.id_credit_region' => 'required|integer|exists:regions,id',
            'branches.*.region_email' => 'required|string'
        ]);

        if (count($v->errors())) {
            return response()->json([], 400);
        }
        $alliances->update($request->only(['title', 'contacts']));
        $alliances->branches()->delete();
        $alliances->branches()->createMany($request->only(['branches']));
        return response()->json(['status' => 1], 202);
    }

    public function deleteAlliance($id){
        $credit = CreditAlliances::findOrFail($id);
        $credit->delete();
        return redirect()->back();
    }

    public function getRegions(){
        $regions = CreditRegions::select('id','region_name')->get()->toArray();
        return response()->json(['regions' => $regions], 200);
    }

    public function getAlliance(CreditRegions $region){
        $branches = $region->branches()->with('alliance')->get();
        return response()->json(['branches' => $branches], 200);
    }
}