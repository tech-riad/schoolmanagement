<?php

namespace App\Http\Controllers\Academic;

use App\Helper\Helper;
use App\Models\Session;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSessionRequest;
use App\Http\Requests\UpdateSessionRequest;
use App\Repositories\Academic\SessionInterface;
use Illuminate\Contracts\Validation\Rule as ValidationRule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SessionController extends Controller
{
    protected $session;

    // public function __construct(SessionInterface $sessionInterface)
    // {
    //     $this->session = $sessionInterface;
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return $this->session->index();
        $sessions = Session::where('is_active', 1)->latest()->get();
        return view($this->backendTemplate['template']['path_name'].'.academic.session.session')->with('sessions', $sessions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSessionRequest  $request
     * @return \Illuminate\Http\Response
     *
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => Rule::unique('sessions')->where('institute_id', $request->institute_id)->ignore($request->institute_id),
        ]);

        

        try {
            $bag['uuid'] = (string) Str::uuid();
            $bag['title'] = $request->title;

            $session = Session::create($bag);
            return redirect()->route('session.index')->with('success', 'Session created successfully');
        } catch (\Throwable $th) {
            throw $th->getMessage();
        }
        // return $this->session->store($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->session->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $session = Session::findOrfail($id);
        return response()->json($session);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSessionRequest  $request
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSessionRequest $request, Session $session)
    {
        $seesionData = Session::findOrfail($request->session_id);
        $seesionData->title  = $request->title;
        $seesionData->save();
        return redirect()->route('session.index')->with('success', 'Session updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $session = Session::findOrfail($id);
        $session->delete();
        return redirect()->route('session.index')->with('success', 'Session Deleted successfully');
    }
}
