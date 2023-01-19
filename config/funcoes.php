<?php

function mascara($valor, $formato) {
    $retorno = '';
    $posicao_valor = 0;
    for($i = 0; $i<=strlen($formato)-1; $i++) {
        if($formato[$i] == '#') {
            if(isset($valor[$posicao_valor])) {
                $retorno .= $valor[$posicao_valor++];
            }
        } else {
            $retorno .= $formato[$i];
        }
    }
    return $retorno;
}