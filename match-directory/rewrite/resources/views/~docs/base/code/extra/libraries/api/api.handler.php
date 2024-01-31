<?php
// Файл /app/Controllers/Api/UserController.php

namespace App\Controllers\Api;
use App\Models\UserModel;
class UserController extends BaseApiActions
{
    public function actionGetOne(): array
    {
        $id = $this->container->request()->get('id')->asInt();
        if (!$id) {
            return $this->error('Invalid request data: id', 400);
        }
        $data = UserModel::getOne($id);
        return array_merge(
            $this->present($data ?: []),
            ['error_cells' => $this->getErrorCells()]
        );
    }
}