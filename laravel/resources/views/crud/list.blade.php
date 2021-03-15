@extends('layout')

@section('content')
<section class="section">
    <div class="container-fluid">
        <div class="box box-default bg-blue-gray p-0">
            <div class="box-header d-flex justify-content-between">
                <h3>Cadastros >> Pessoas</h3>
                <!-- <button id="CloseSearch">Close aqui</button> -->
            </div>
            <div id="SearchArea" class="box-body open">
                <div class="form-group-row">
                    <div class="form-group">
                        <div data-search="true" class="form-row has-label">
                            <label for="" class="label is-small">Filtrar por:</label>
                            <div data-search-row="true" class="control field is-grouped">
                                <div class="select is-small">
                                    <select name="column" id="name">
                                        <option value="codigo">Código</option>
                                        <option value="nome" selected>Nome</option>
                                        <option value="cpf">CPF/CNPJ</option>
                                        <option value="cidade">Cidade</option>
                                    </select>
                                </div>
                                <div class="select is-small">
                                    <select name="operation" id="fill">
                                        <option value="<=">Menor ou Igual</option>
                                        <option value="<">Menor que</option>
                                        <option value="=">Igual a</option>
                                        <option value=">">Maior que</option>
                                        <option value="=>">Maior ou Igual</option>
                                        <option value="<>">Diferente de</option>
                                        <option value="C">Contém</option>
                                        <option value="NC">Não Contém</option>
                                        <option value="IC">Inicia Com</option>
                                        <option value="E">Entre</option>
                                    </select>
                                </div>
                                <input type="text" class="input is-small">
                            </div>
                        </div>
                        <div data-search="true" class="form-row has-label">
                            <label for="ordem" class="label is-small">Ordem:</label>
                            <div data-search-row="true" class="field is-grouped control">
                                <div class="select is-small">
                                    <select name="ordem" id="ordem">
                                        <option value="asc" selected >Crescente</option>
                                        <option value="desc">Decrescente</option>
                                    </select>
                                </div>
                                <div class="select is-small">
                                    <select name="coluna-ordem" id="coluna-ordem">
                                        <option value="codigo">Código</option>
                                        <option value="nome" selected>Nome</option>
                                        <option value="cpf">CPF/CNPJ</option>
                                        <option value="cidade">Cidade</option>
                                    </select>
                                </div>

                                <div class="option-buttons d-flex">
                                    <button onclick="addFilterRow();" class="button is-small is-light">
                                        <span class="icon material-icons-outlined">
                                            add
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group-row">
                    <div class="form-group">
                        <div class="form-row has-label">
                            <label for="estado" class="label is-small">Estado:</label>
                            <div class="field is-grouped control">
                                <div class="select is-small">
                                    <select name="estado" id="estado">
                                        <option value="0" selected=""> Todos</option>
                                        <option value="AC">AC</option>
                                        <option value="AL">AL</option>
                                        <option value="AM">AM</option>
                                        <option value="AP">AP</option>
                                        <option value="BA">BA</option>
                                        <option value="CE">CE</option>
                                        <option value="DF">DF</option>
                                        <option value="ES">ES</option>
                                        <option value="GO">GO</option>
                                        <option value="MA">MA</option>
                                        <option value="MT">MT</option>
                                        <option value="MS">MS</option>
                                        <option value="MG">MG</option>
                                        <option value="PA">PA</option>
                                        <option value="PB">PB</option>
                                        <option value="PR">PR</option>
                                        <option value="PE">PE</option>
                                        <option value="PI">PI</option>
                                        <option value="RJ">RJ</option>
                                        <option value="RN">RN</option>
                                        <option value="RO">RO</option>
                                        <option value="RS">RS</option>
                                        <option value="RR">RR</option>
                                        <option value="SC">SC</option>
                                        <option value="SE">SE</option>
                                        <option value="SP">SP</option>
                                        <option value="TO">TO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row has-label">
                            <label for="tipopessoa" class="label is-small">Tipo de Pessoa:</label>
                            <div class="field is-grouped control">
                                <div class="select is-small">
                                    <select name="tipopessoa" id="tipopessoa">
                                        <option value="0" selected="">Todos</option>
                                        <option value="F">Pessoa Física</option>
                                        <option value="J">Pessoa Jurídica</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row has-label">
                            <label for="status" class="label is-small">Status:</label>
                            <div class="field is-grouped control">
                                <div class="select is-small">
                                    <select name="status" id="status">
                                        <option value="0" selected="">Todos</option>
                                        <option value="ativo">Ativo</option>
                                        <option value="inativo">Inativo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row is-align-items-flex-end buttons">
                            <button class="button is-small is-primary is-outlined">Limpar</button>
                            <button class="button is-small is-primary">Filtrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-to-end mb-3">
            <a href="" class="button is-small is-primary">
                <span class="icon material-icons-outlined">
                    add_box
                </span>
                <span>Incluir</span>
            </a>
        </div>

        <div class="box box-default p-0">
            <div class="box-header"><h3>Listagem de Dados</h3></div>
            <div class="box-body p-0">
                <div class="table-responsive">
                    <table class="table is-striped is-hoverable is-fullwidth is-bordered">
                        <thead class="gradient is-borderless">
                            <tr>
                                <th scope="col" class="has-text-centered has-text-primary" >#</th>
                                <th scope="col" class="has-text-centered has-text-primary" >Código</th>
                                <th scope="col" class="has-text-primary">Nome</th>
                                <th scope="col" class="has-text-centered has-text-primary" >CPF/CNPJ</th>
                                <th scope="col" class="has-text-centered has-text-primary" >UF</th>
                                <th scope="col" class="has-text-primary">Cidade</th>
                                <th scope="col" class="has-text-centered has-text-primary" >Situação</th>
                                <th scope="col" class="has-text-centered has-text-primary" >Última Atualização</th>
                                <th scope="col" class="has-text-centered has-text-primary" >Ações</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <tr>
                                <td class="is-vcentered is-narrow"></td>
                                <th scope="row" class="has-text-centered is-vcentered is-narrow" >1</th>
                                <td class="is-vcentered is-narrow">Dr. Marli Braga</td>
                                <td class="has-text-centered is-vcentered is-narrow" >984.681.975-81</td>
                                <td class="has-text-centered is-vcentered is-narrow" >PA</td>
                                <td class="is-vcentered is-narrow">Bragado Norte</td>
                                <td class="has-text-centered is-vcentered is-narrow" >Ativo</td>
                                <td class="has-text-centered is-vcentered is-narrow" >25/08/2020 09:21:39</td>
                                <td class="has-text-centered is-vcentered is-narrow">
                                    <div class="is-flex is-justify-content-space-between">
                                        <a href="#" class="has-text-primary icon material-icons">
                                            print
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            clear
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            done
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            visibility
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="is-vcentered is-narrow"></td>
                                <th scope="row" class="has-text-centered" >1</th>
                                <td class="is-vcentered is-narrow">Dr. Marli Braga</td>
                                <td class="has-text-centered is-vcentered is-narrow" >984.681.975-81</td>
                                <td class="has-text-centered is-vcentered is-narrow" >PA</td>
                                <td class="is-vcentered is-narrow">Bragado Norte</td>
                                <td class="has-text-centered is-vcentered is-narrow" >Ativo</td>
                                <td class="has-text-centered is-vcentered is-narrow" >25/08/2020 09:21:39</td>
                                <td class="has-text-centered is-vcentered is-narrow" >
                                    <div class="is-flex is-justify-content-space-between">
                                        <a href="#" class="has-text-primary icon material-icons">
                                            print
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            clear
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            done
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            visibility
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="is-vcentered is-narrow"></td>
                                <th scope="row" class="has-text-centered" >1</th>
                                <td class="is-vcentered is-narrow">Dr. Marli Braga</td>
                                <td class="has-text-centered is-vcentered is-narrow" >984.681.975-81</td>
                                <td class="has-text-centered is-vcentered is-narrow" >PA</td>
                                <td class="is-vcentered is-narrow">Bragado Norte</td>
                                <td class="has-text-centered is-vcentered is-narrow" >Ativo</td>
                                <td class="has-text-centered is-vcentered is-narrow" >25/08/2020 09:21:39</td>
                                <td class="has-text-centered is-vcentered is-narrow" >
                                    <div class="is-flex is-justify-content-space-between">
                                        <a href="#" class="has-text-primary icon material-icons">
                                            print
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            clear
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            done
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            visibility
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="is-vcentered is-narrow"></td>
                                <th scope="row" class="has-text-centered" >1</th>
                                <td class="is-vcentered is-narrow">Dr. Marli Braga</td>
                                <td class="has-text-centered is-vcentered is-narrow" >984.681.975-81</td>
                                <td class="has-text-centered is-vcentered is-narrow" >PA</td>
                                <td class="is-vcentered is-narrow">Bragado Norte</td>
                                <td class="has-text-centered is-vcentered is-narrow" >Ativo</td>
                                <td class="has-text-centered is-vcentered is-narrow" >25/08/2020 09:21:39</td>
                                <td class="has-text-centered is-vcentered is-narrow" >
                                    <div class="is-flex is-justify-content-space-between">
                                        <a href="#" class="has-text-primary icon material-icons">
                                            print
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            clear
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            done
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            visibility
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="is-vcentered is-narrow"></td>
                                <th scope="row" class="has-text-centered" >1</th>
                                <td class="is-vcentered is-narrow">Dr. Marli Braga</td>
                                <td class="has-text-centered is-vcentered is-narrow" >984.681.975-81</td>
                                <td class="has-text-centered is-vcentered is-narrow" >PA</td>
                                <td class="is-vcentered is-narrow">Bragado Norte</td>
                                <td class="has-text-centered is-vcentered is-narrow" >Ativo</td>
                                <td class="has-text-centered is-vcentered is-narrow" >25/08/2020 09:21:39</td>
                                <td class="has-text-centered is-vcentered is-narrow" >
                                    <div class="is-flex is-justify-content-space-between">
                                        <a href="#" class="has-text-primary icon material-icons">
                                            print
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            clear
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            done
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            visibility
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="is-vcentered is-narrow"></td>
                                <th scope="row" class="has-text-centered" >1</th>
                                <td class="is-vcentered is-narrow">Dr. Marli Braga</td>
                                <td class="has-text-centered is-vcentered is-narrow" >984.681.975-81</td>
                                <td class="has-text-centered is-vcentered is-narrow" >PA</td>
                                <td class="is-vcentered is-narrow">Bragado Norte</td>
                                <td class="has-text-centered is-vcentered is-narrow" >Ativo</td>
                                <td class="has-text-centered is-vcentered is-narrow" >25/08/2020 09:21:39</td>
                                <td class="has-text-centered is-vcentered is-narrow" >
                                    <div class="is-flex is-justify-content-space-between">
                                        <a href="#" class="has-text-primary icon material-icons">
                                            print
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            clear
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            done
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            visibility
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="is-vcentered is-narrow"></td>
                                <th scope="row" class="has-text-centered" >1</th>
                                <td class="is-vcentered is-narrow">Dr. Marli Braga</td>
                                <td class="has-text-centered is-vcentered is-narrow" >984.681.975-81</td>
                                <td class="has-text-centered is-vcentered is-narrow" >PA</td>
                                <td class="is-vcentered is-narrow">Bragado Norte</td>
                                <td class="has-text-centered is-vcentered is-narrow" >Ativo</td>
                                <td class="has-text-centered is-vcentered is-narrow" >25/08/2020 09:21:39</td>
                                <td class="has-text-centered is-vcentered is-narrow" >
                                    <div class="is-flex is-justify-content-space-between">
                                        <a href="#" class="has-text-primary icon material-icons">
                                            print
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            clear
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            done
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            visibility
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="is-vcentered is-narrow"></td>
                                <th scope="row" class="has-text-centered" >1</th>
                                <td class="is-vcentered is-narrow">Dr. Marli Braga</td>
                                <td class="has-text-centered is-vcentered is-narrow" >984.681.975-81</td>
                                <td class="has-text-centered is-vcentered is-narrow" >PA</td>
                                <td class="is-vcentered is-narrow">Bragado Norte</td>
                                <td class="has-text-centered is-vcentered is-narrow" >Ativo</td>
                                <td class="has-text-centered is-vcentered is-narrow" >25/08/2020 09:21:39</td>
                                <td class="has-text-centered is-vcentered is-narrow" >
                                    <div class="is-flex is-justify-content-space-between">
                                        <a href="#" class="has-text-primary icon material-icons">
                                            print
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            clear
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            done
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            visibility
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="is-vcentered is-narrow"></td>
                                <th scope="row" class="has-text-centered" >1</th>
                                <td class="is-vcentered is-narrow">Dr. Marli Braga</td>
                                <td class="has-text-centered is-vcentered is-narrow" >984.681.975-81</td>
                                <td class="has-text-centered is-vcentered is-narrow" >PA</td>
                                <td class="is-vcentered is-narrow">Bragado Norte</td>
                                <td class="has-text-centered is-vcentered is-narrow" >Ativo</td>
                                <td class="has-text-centered is-vcentered is-narrow" >25/08/2020 09:21:39</td>
                                <td class="has-text-centered is-vcentered is-narrow" >
                                    <div class="is-flex is-justify-content-space-between">
                                        <a href="#" class="has-text-primary icon material-icons">
                                            print
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            clear
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            done
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            visibility
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="is-vcentered is-narrow"></td>
                                <th scope="row" class="has-text-centered" >1</th>
                                <td class="is-vcentered is-narrow">Dr. Marli Braga</td>
                                <td class="has-text-centered is-vcentered is-narrow" >984.681.975-81</td>
                                <td class="has-text-centered is-vcentered is-narrow" >PA</td>
                                <td class="is-vcentered is-narrow">Bragado Norte</td>
                                <td class="has-text-centered is-vcentered is-narrow" >Ativo</td>
                                <td class="has-text-centered is-vcentered is-narrow" >25/08/2020 09:21:39</td>
                                <td class="has-text-centered is-vcentered is-narrow" >
                                    <div class="is-flex is-justify-content-space-between">
                                        <a href="#" class="has-text-primary icon material-icons">
                                            print
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            clear
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            done
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            visibility
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="is-vcentered is-narrow"></td>
                                <th scope="row" class="has-text-centered" >1</th>
                                <td class="is-vcentered is-narrow">Dr. Marli Braga</td>
                                <td class="has-text-centered is-vcentered is-narrow" >984.681.975-81</td>
                                <td class="has-text-centered is-vcentered is-narrow" >PA</td>
                                <td class="is-vcentered is-narrow">Bragado Norte</td>
                                <td class="has-text-centered is-vcentered is-narrow" >Ativo</td>
                                <td class="has-text-centered is-vcentered is-narrow" >25/08/2020 09:21:39</td>
                                <td class="has-text-centered is-vcentered is-narrow" >
                                    <div class="is-flex is-justify-content-space-between">
                                        <a href="#" class="has-text-primary icon material-icons">
                                            print
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            clear
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            done
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            visibility
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="is-vcentered is-narrow"></td>
                                <th scope="row" class="has-text-centered" >1</th>
                                <td class="is-vcentered is-narrow">Dr. Marli Braga</td>
                                <td class="has-text-centered is-vcentered is-narrow" >984.681.975-81</td>
                                <td class="has-text-centered is-vcentered is-narrow" >PA</td>
                                <td class="is-vcentered is-narrow">Bragado Norte</td>
                                <td class="has-text-centered is-vcentered is-narrow" >Ativo</td>
                                <td class="has-text-centered is-vcentered is-narrow" >25/08/2020 09:21:39</td>
                                <td class="has-text-centered is-vcentered is-narrow" >
                                    <div class="is-flex is-justify-content-space-between">
                                        <a href="#" class="has-text-primary icon material-icons">
                                            print
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            clear
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            done
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            visibility
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="is-vcentered is-narrow"></td>
                                <th scope="row" class="has-text-centered" >1</th>
                                <td class="is-vcentered is-narrow">Dr. Marli Braga</td>
                                <td class="has-text-centered is-vcentered is-narrow" >984.681.975-81</td>
                                <td class="has-text-centered is-vcentered is-narrow" >PA</td>
                                <td class="is-vcentered is-narrow">Bragado Norte</td>
                                <td class="has-text-centered is-vcentered is-narrow" >Ativo</td>
                                <td class="has-text-centered is-vcentered is-narrow" >25/08/2020 09:21:39</td>
                                <td class="has-text-centered is-vcentered is-narrow" >
                                    <div class="is-flex is-justify-content-space-between">
                                        <a href="#" class="has-text-primary icon material-icons">
                                            print
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            clear
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            done
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            visibility
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="is-vcentered is-narrow"></td>
                                <th scope="row" class="has-text-centered" >1</th>
                                <td class="is-vcentered is-narrow">Dr. Marli Braga</td>
                                <td class="has-text-centered is-vcentered is-narrow" >984.681.975-81</td>
                                <td class="has-text-centered is-vcentered is-narrow" >PA</td>
                                <td class="is-vcentered is-narrow">Bragado Norte</td>
                                <td class="has-text-centered is-vcentered is-narrow" >Ativo</td>
                                <td class="has-text-centered is-vcentered is-narrow" >25/08/2020 09:21:39</td>
                                <td class="has-text-centered is-vcentered is-narrow" >
                                    <div class="is-flex is-justify-content-space-between">
                                        <a href="#" class="has-text-primary icon material-icons">
                                            print
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            clear
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            done
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            visibility
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="is-vcentered is-narrow"></td>
                                <th scope="row" class="has-text-centered" >1</th>
                                <td class="is-vcentered is-narrow">Dr. Marli Braga</td>
                                <td class="has-text-centered is-vcentered is-narrow" >984.681.975-81</td>
                                <td class="has-text-centered is-vcentered is-narrow" >PA</td>
                                <td class="is-vcentered is-narrow">Bragado Norte</td>
                                <td class="has-text-centered is-vcentered is-narrow" >Ativo</td>
                                <td class="has-text-centered is-vcentered is-narrow" >25/08/2020 09:21:39</td>
                                <td class="has-text-centered is-vcentered is-narrow" >
                                    <div class="is-flex is-justify-content-space-between">
                                        <a href="#" class="has-text-primary icon material-icons">
                                            print
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            clear
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            done
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            visibility
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="is-vcentered is-narrow"></td>
                                <th scope="row" class="has-text-centered" >1</th>
                                <td class="is-vcentered is-narrow">Dr. Marli Braga</td>
                                <td class="has-text-centered is-vcentered is-narrow" >984.681.975-81</td>
                                <td class="has-text-centered is-vcentered is-narrow" >PA</td>
                                <td class="is-vcentered is-narrow">Bragado Norte</td>
                                <td class="has-text-centered is-vcentered is-narrow" >Ativo</td>
                                <td class="has-text-centered is-vcentered is-narrow" >25/08/2020 09:21:39</td>
                                <td class="has-text-centered is-vcentered is-narrow" >
                                    <div class="is-flex is-justify-content-space-between">
                                        <a href="#" class="has-text-primary icon material-icons">
                                            print
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            clear
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            done
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            visibility
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="is-vcentered is-narrow"></td>
                                <th scope="row" class="has-text-centered" >1</th>
                                <td class="is-vcentered is-narrow">Dr. Marli Braga</td>
                                <td class="has-text-centered is-vcentered is-narrow" >984.681.975-81</td>
                                <td class="has-text-centered is-vcentered is-narrow" >PA</td>
                                <td class="is-vcentered is-narrow">Bragado Norte</td>
                                <td class="has-text-centered is-vcentered is-narrow" >Ativo</td>
                                <td class="has-text-centered is-vcentered is-narrow" >25/08/2020 09:21:39</td>
                                <td class="has-text-centered is-vcentered is-narrow" >
                                    <div class="is-flex is-justify-content-space-between">
                                        <a href="#" class="has-text-primary icon material-icons">
                                            print
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            clear
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            done
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            visibility
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="is-vcentered is-narrow"></td>
                                <th scope="row" class="has-text-centered" >1</th>
                                <td class="is-vcentered is-narrow">Dr. Marli Braga</td>
                                <td class="has-text-centered is-vcentered is-narrow" >984.681.975-81</td>
                                <td class="has-text-centered is-vcentered is-narrow" >PA</td>
                                <td class="is-vcentered is-narrow">Bragado Norte</td>
                                <td class="has-text-centered is-vcentered is-narrow" >Ativo</td>
                                <td class="has-text-centered is-vcentered is-narrow" >25/08/2020 09:21:39</td>
                                <td class="has-text-centered is-vcentered is-narrow" >
                                    <div class="is-flex is-justify-content-space-between">
                                        <a href="#" class="has-text-primary icon material-icons">
                                            print
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            clear
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            done
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            visibility
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="is-vcentered is-narrow"></td>
                                <th scope="row" class="has-text-centered" >1</th>
                                <td class="is-vcentered is-narrow">Dr. Marli Braga</td>
                                <td class="has-text-centered is-vcentered is-narrow" >984.681.975-81</td>
                                <td class="has-text-centered is-vcentered is-narrow" >PA</td>
                                <td class="is-vcentered is-narrow">Bragado Norte</td>
                                <td class="has-text-centered is-vcentered is-narrow" >Ativo</td>
                                <td class="has-text-centered is-vcentered is-narrow" >25/08/2020 09:21:39</td>
                                <td class="has-text-centered is-vcentered is-narrow" >
                                    <div class="is-flex is-justify-content-space-between">
                                        <a href="#" class="has-text-primary icon material-icons">
                                            print
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            clear
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            done
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            visibility
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="is-vcentered is-narrow"></td>
                                <th scope="row" class="has-text-centered" >1</th>
                                <td class="is-vcentered is-narrow">Dr. Marli Braga</td>
                                <td class="has-text-centered is-vcentered is-narrow" >984.681.975-81</td>
                                <td class="has-text-centered is-vcentered is-narrow" >PA</td>
                                <td class="is-vcentered is-narrow">Bragado Norte</td>
                                <td class="has-text-centered is-vcentered is-narrow" >Ativo</td>
                                <td class="has-text-centered is-vcentered is-narrow" >25/08/2020 09:21:39</td>
                                <td class="has-text-centered is-vcentered is-narrow" >
                                    <div class="is-flex is-justify-content-space-between">
                                        <a href="#" class="has-text-primary icon material-icons">
                                            print
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            clear
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            done
                                        </a>
                                        <a href="#" class="has-text-primary icon material-icons">
                                            visibility
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot class="gradient">
                            <tr>
                                <td colspan="9" class="has-text-centered text-primary">
                                    <div class="field control is-horizontal is-grouped is-grouped-centered">
                                        <div class="is-flex is-align-items-center"><span class="field-label is-small">Página 1 de 892</span></div>
                                        <div class="is-flex is-align-items-center mr-2">
                                            <span class="field-label has-white-space-nowrap is-small">Ir Para:</span> <input type="text" class="input is-small is-small">
                                        </div>
                                        <div class="is-flex is-align-items-center">
                                            <span class="field-label is-small">Registros:</span>
                                            <div class="select is-small is-small">
                                                <select name="" id="">
                                                    <option value="20" selected>20</option>
                                                    <option value="50" >50</option>
                                                    <option value="100" >100</option>
                                                </select>
                                            </div>
                                            <button class="button is-small is-primary">!!</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
