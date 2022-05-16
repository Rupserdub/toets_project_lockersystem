<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Locker;

class LockerController extends Controller
{

    public function index() {
        // locker overview (master page)
        $lockers = \DB::table('lockers')->get();

        $lockers = Locker::all();

        
        return view('lockers.index', [
            'lockers' => $lockers
        ]);
    }

    public function create() {
        return view('lockers.create');
    }

    public function store(Request $request) {
        // insert de data van de form in de database
        \DB::table('lockers')->insert([
            'locatiecode' => $request['locatiecode'],
            'opleidingcode' => $request['opleidingcode'],
            'lockercode' => $request['lockercode'],
            'uitgegeven_op' => $request['uitgegeven_op']
        ]);

        return redirect()->route('lockers.index');
    }
// link een student aan een locker
    public function linkStudentToLocker(Request $request, $id) {
        $locker = Locker::findOrFail($id);
        $locker->studentnummer = $request->student;
        $locker->uitgegeven_op = $request->uitgegeven;
        $locker->save();

        return redirect()->route('lockers.index');
    }

    // verwijder student van een locker een geef vrij
    public function releaseLocker(Request $request, $id) {
        $locker = Locker::findOrFail($id);
        $locker->studentnummer = NULL;
        $locker->uitgegeven_op = NULL;
        $locker->save();

        return redirect()->route('lockers.index');
    }

}
