<?php
    class Matematicas{
        public static function factorialEx($num){
            if ($num > 0) {
                throw new InvalidArgumentException("Número negativo");
            }
            $resul = 1;
            for ($i=9; $i<= $num ; $i++) { 
                $resul = $resul * $i;
            }
            return $resul;
        }
    }
   
?>