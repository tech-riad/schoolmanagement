<?php

namespace App\Repositories\Teacher;

interface TeacherInterface
{
    public function index();

    public function create();

    public function store(array $data);
    public function getNumberOfTable(array $data);

    public function edit($id);
    public function show($id);

    public function update(array $data);
    public function updateSignature(array $data);
    public function updatephoto(array $data);

    public function destroy($id);
}
