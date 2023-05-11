<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class EventController extends Controller
{
    //

    public function index(){
        $events = Event::all();

        return EventResource::collection($events);
    }

    public function store(Request $request){
       $eventStore = new Event();
       $eventStore->start_at = $request->input('start_at');
       $eventStore->name = $request->input('name');
       $eventStore->desc = $request->input('desc');
       $eventStore->location = $request->input('location');
       $eventStore->save();
       return response()->json($eventStore);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'start_at' => 'required|max:191',
            'name' => 'required|max:191',
            'desc' => 'required|max:191',
            'location' => 'required|max:191',
        ]);


        $eventUpdate = Event::find($id);
        if ($eventUpdate) {
            $eventUpdate->start_at = $request->start_at;
            $eventUpdate->name = $request->name;
            $eventUpdate->desc = $request->desc;
            $eventUpdate->location = $request->location;
            $eventUpdate->update();

            return response()->json(['message' => 'Event updated successfully'], 200);
        }
        else{

            return response()->json(['message' => 'No events found'], 404);
        }

    }

    public function destroy($id)
    {
        $eventDestroy = Event::find($id);
        if ($eventDestroy)
        {
            $eventDestroy->delete();
            return response()->json(['message' => 'Event deleted successfully'], 200);
        }
        else
        {
            return response()->json(['message' => 'No events found'], 404);
        }
    }

}

