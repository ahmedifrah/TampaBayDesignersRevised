<?php

namespace App\Http\Controllers;

use App\Http\Resources\GroupResource;
use App\Models\Faq;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    //

    public function index(){
        $groups = Group::all();

        return GroupResource::collection($groups);
    }

    public function store(Request $request){
       $groupStore = new Group();
       $groupStore->is_slack = $request->input('is_slack') ?? $groupStore->is_slack;
       $groupStore->is_credit = $request->input('is_credit') ?? $groupStore->is_credit;
       $groupStore->name = $request->input('name');
       $groupStore->desc = $request->input('desc');
       $groupStore->icon = $request->input('icon');
       $groupStore->save();
       return response()->json($groupStore);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'is_slack' => 'required|max:191',
            'is_credit' => 'required|max:191',
            'name' => 'required|max:191',
            'desc' => 'required|max:191',
            'icon' => 'required|max:191',
        ]);


        $groupUpdate = Group::find($id);
        if ($groupUpdate) {
            $groupUpdate->is_slack = $request->is_slack;
            $groupUpdate->is_credit = $request->is_credit;
            $groupUpdate->name = $request->name;
            $groupUpdate->desc = $request->desc;
            $groupUpdate->icon = $request->icon;
            $groupUpdate->update();

            return response()->json(['message' => 'Group updated successfully'], 200);
        }
        else{

            return response()->json(['message' => 'No groups found'], 404);
        }

    }

    public function destroy($id)
    {
        $groupDestroy = Group::find($id);
        if ($groupDestroy)
        {
            $groupDestroy->delete();
            return response()->json(['message' => 'Group deleted successfully'], 200);
        }
        else
        {
            return response()->json(['message' => 'No groups found'], 404);
        }
    }



    // public function is_slack()
    // {
    //     return view('slacks', [
    //         'slacks' => Group::where('is_slack', 1)->get()
    //     ]);
    // }
}
