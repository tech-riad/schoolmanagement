<?php

namespace App\Repositories\Institute;

use App\Models\Institution;
use App\Models\User;
use App\Repositories\Institute\InstituteInterface;
use Illuminate\Support\Facades\DB;

class InstituteRepository implements InstituteInterface
{
    private $institute_activation_status = 1;
    public function index()
    {
        // TODO: Implement index() method.
        $session = Institution::latest()->get();

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
            DB::beginTransaction();
            $institute = Institution::create($data);
            if ($institute) {
                User::create([
                    'institute_id' => $institute->id,
                    'status' => $data['status'],
                    'name' => $data['principal_name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                ]);
                DB::commit();
            }
            return response()->json([
                'success' => true,
                'message' => 'Session Created Successfully',
                'data' => $institute
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response($e->getMessage());
        }
    }

    public function show($id)
    {
        // TODO: Implement show() method.
        return Institution::findOr($id, fn () => ('Institution Not Found'));
    }

    public function update($id, array $data)
    {
        // TODO: Implement update() method.
        try {
            $institute = Institution::find($id);
            if ($institute) {
                $institute->update([
                    'status' => $this->institute_activation_status
                ]);
                return response()->json([
                    'success' => true,
                    'message' => 'Institute Activated Successfully',
                    'data' => $institute
                ], 200);
            }
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }
}
