<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioControllador extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }
    public function index() {
        return '<h3>Lista de Usuarios</h3>' . 
        '<ul>' .
        '<li>Usuario1</li>' .
        '<li>Usuario2</li>' .
        '<li>Usuario3</li>' .
        '<li>Usuario4</li>' .
        '</ul>'; 
    }
}
