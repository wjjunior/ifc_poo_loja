<?php

class View
{
    public static function carregar($pagina, $dados = null)
    {
        include $pagina;
    }
} 