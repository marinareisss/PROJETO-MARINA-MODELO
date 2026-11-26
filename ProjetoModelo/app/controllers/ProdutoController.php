<?php

class ProdutoController
{
    public function index()
    {
        require_once __DIR__ . '/../views/produto/produto.php';
    }

    public function new()
    {
        require_once __DIR__ . '/../views/produto/new.php';
    }
}