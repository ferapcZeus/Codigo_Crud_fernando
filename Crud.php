<?php

class Crud{


            public $insertInto;
            public $insertColumns;
            public $insertValues;
            public $mensaje;
            public $select;
            public $from;
            public $condition;
            public $rows;
            public $set;
            public $deleteFrom;


         public function Create()
    {
        $model = new Conexion;
        $conexion = $model->conectar();
        $insertInto = $this->insertInto;
        $insertColumns = $this->insertColumns;
        $insertValues = $this->insertValues;
        $sql = "INSERT INTO $insertInto ($insertColumns) VALUES ($insertValues)";
        $consulta = $conexion->prepare($sql);
        if (!consulta)
        {
            $this->mensaje = "Error al crear el registro";
        }
        else 
        {
            $consulta->execute();
            $this->mensaje = "Registro creado correctamente";        
        }    
    }
    
         public function Read()
    {
        $model = new Conexion;
        $conexion = $model->conectar();   
        $select = $this->select;
        $from = $this->from;
        $condition = $this->condition;
        if ($condition != '')
        {
            $condition = " WHERE " . $condition;
        }
        $sql = "SELECT $select FROM $from $condition";
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        while ($filas = $consulta->fetch())
        {
            $this->rows[] = $filas;
        }
    }
    
    public function Update()
    {
        $model = new Conexion;
        $conexion = $model->conectar();  
        $update = $this->update;
        $set = $this->set;
        $condition = $this->condition;
        if($condition !='')
        {
            $condition = " WHERE ". $condition;
        }
        $sql = "UPDATE $update SET $set $condition";
        $consulta = $conexion->prepare($sql);
        if (!$consulta)
        {
            $this->mensaje = "Oh, Ha ocurrido un error al actualizar el registro";
        }
        else 
        {
            $consulta->execute();
            $this->mensaje = "Bien, El registro  actualizo con exito";
        }
    }
    
         public function Delete()
    {
        $model = new Conexion;
        $conexion = $model->conectar();  
        $deleteFrom = $this->deleteFrom;
        $condition = $this->condition;
        if($condition !='')
        {
            $condition = " WHERE ". $condition;
        }
        $sql = "DELETE FROM $deleteFrom $condition";
        $consulta = $conexion->prepare($sql);
        if (!$consulta)
        {
            $this->mensaje = "Oh, Ha ocurrido un error al eliminar el registro";
        }
        else 
        {
            $consulta->execute();
            $this->mensaje = "Bien, El registro se elimino  correctamente";
        }   
    }
}


        