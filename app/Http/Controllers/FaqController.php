<?php

namespace App\Http\Controllers;

use App\Http\Resources\FaqResource;
use App\Models\Faq;
use App\Models\Group;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //
    public function index(){
        $faqs = Faq::all();

        return FaqResource::collection($faqs);
    }
    
    public function store(Request $request){
       $faqStore = new Faq();
       $faqStore->event_id = $request->input('event_id');
       $faqStore->question = $request->input('question');
       $faqStore->answer = $request->input('answer');
       $faqStore->save();
       return response()->json($faqStore);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'event_id' => 'required|max:191',
            'question' => 'required|max:191',
            'answer' => 'required|max:191'
        ]);


        $faqUpdate = Faq::find($id);
        if ($faqUpdate) {
            $faqUpdate->event_id = $request->event_id;
            $faqUpdate->question = $request->question;
            $faqUpdate->answer = $request->answer;
            $faqUpdate->update();

            return response()->json(['message' => 'Faq updated successfully'], 200);
        }
        else{

            return response()->json(['message' => 'No faqs found'], 404);
        }

    }

    public function destroy($id)
    {
        $faqDestroy = Faq::find($id);
        if ($faqDestroy)
        {
            $faqDestroy->delete();
            return response()->json(['message' => 'Faq deleted successfully'], 200);
        }
        else
        {
            return response()->json(['message' => 'No faqs found'], 404);
        }
    }
}
