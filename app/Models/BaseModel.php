<?php

namespace App\Models;

use CodeIgniter\Model;

class BaseModel extends Model
{
    /**
     * getLista
     *
     * @param array $aFiltro 
     * @return array
     */
    public function getLista($aFiltro = [], $orderby = "")
    {
        if (count($aFiltro) > 0) {
            $this->where($aFiltro);
        }

        if ($orderby != "") {
            $this->orderBy($orderby);
        }

        return $this->findAll();
    }

    /**
     * Buscar registros para o $id indicado
     *
     * @param integer $id 
     * @return array
     */
    public function getById($id) 
    {
        return $this->where(["id" => $id])->first();
    }
}
