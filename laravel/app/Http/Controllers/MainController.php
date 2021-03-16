<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $pessoa = Pessoa::find(1);
        dd($pessoa);

        dd('apartir daqui é estrutura pra tabela');
        $pessoas = Pessoa::tableData();
        $form = new FormController;
        $tableData = $form->tableData($pessoas);

        $html = $form->searchFilter('Cadastro >> Pessoas', $tableData);

        return view('crud.list', compact('html'));
    }
}
