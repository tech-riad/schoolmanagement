<?php

namespace App\Repositories\Academic;

use App\Models\Session;
use Illuminate\Support\Str;
use App\Repositories\Academic\SessionInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;

class SessionRepository implements SessionInterface
{
    public function index()
    {
        // TODO: Implement index() method.
        $session = Session::latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'Session List',
            'data' => $session
        ], 200);
    }

    public function store(array $data)
    {
        // TODO: Implement store() method.
        try {
            $bag['uuid'] = (string) Str::uuid();
            $bag['title'] = $data['title'];

            $session = Session::create($bag);
            return response()->json([
                'success' => true,
                'message' => 'Session Created Successfully',
                'data' => $session
            ], 201);
        } catch (\Throwable $th) {
            throw $th->getMessage();
        }
    }

    public function show($id)
    {
        // TODO: Implement show() method.
        return Session::findOr($id, ['title'], fn () => ('Session Not Found'));
    }

    public function update($id, array $data)
    {
        // TODO: Implement update() method.
        return Session::find($id)->update($data);
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
        return Session::destroy($id);
    }
}
