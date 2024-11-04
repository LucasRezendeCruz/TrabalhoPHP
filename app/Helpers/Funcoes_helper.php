<?php

    /**
     * formatValor
     *
     * @param float $valor 
     * @param int $decimais 
     * @return float
     */
    function formatValor($valor, $decimais = 2)
    {
        return number_format($valor, $decimais, ",", ".");
    }

    /**
     * strToNumer - Converte um valor string no formato decimal para float
     *
     * @param string $valor 
     * @return float
     */
    function strToNumer($valor) 
    {
        return str_replace(",", ".", str_replace(".", "", $valor));
    }
