<?php

namespace App\Models;

use FormHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use stdClass;
use Illuminate\Support\Collection;

class Pessoa extends Model
{
    // use HasFactory;
    protected $custom;
    protected $table = 'pessoas';
    public $actions = [];
    public $formAttributes = [];

    public function __construct()
    {
        $this->setActions();
        $this->custom = new FormHelper($this->formAttributes, $this->actions);
    }

    public function setActions()
    {
        $this->actions = [
            'list' => 'list_link',
            'create' => 'create_link',
            'update' => 'update_link'
        ];
    }

    public function setFormAttributes()
    {
        $this->formAttributes = [
            'id',
            'nome',
            'cpf',
            'uf',
            'cidade',
            'situacao',
            'updated_at'
        ];
    }
}
