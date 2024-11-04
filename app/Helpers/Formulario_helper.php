<?php

    /**
     * exibeTitulo
     *
     * @param string $titulo 
     * @param array $parametro 
     * @return string
     */
    function exibeTitulo($titulo, $parametro = ['acao' => 'lista'])
    {
        if (!isset($parametro['controller'])) {
            $parametro['controller'] = $titulo;
        }

        $subTitulo  = $titulo;
        $link       = '/lista';
        $icone      = 'list';

        if ($parametro['acao'] == 'new') {
            $subTitulo .= ' - Novo';
        } else  if ($parametro['acao'] == 'update') {
            $subTitulo .= ' - Alteração';
        } else  if ($parametro['acao'] == 'delete') {
            $subTitulo .= ' - Exclusão';
        } else  if ($parametro['acao'] == 'view') {
            $subTitulo .= ' - Visualização';
        } else  if ($parametro['acao'] == 'lista') {
            $link       = '/form/new/0';
            $icone      = 'plus';
        }

        $texto = '
                    <section>
                        <div class="blog-banner">
                            <div class="row">
                                <div class="col-10 mt-5 mb-5 text-left">
                                    <h1 style="color: #384aeb;">' . $subTitulo . '</h1>
                                </div>
                                <div class="col-2 mt-5 mb-5 text-right">
                                    <a href="' .  base_url() . $parametro['controller'] . $link . '" class="btn btn-secondary btn-sm btn-icons-crud" title="Novo"><i class="fa fa-' . $icone .'" aria-hidden="true"></i></a>    
                                </div>
                            </div>
                        </div>
                    </section>
        ';

        $texto .= mensagemSucesso();
        $texto .= mensagemError();

        return $texto;
    }

    /**
     * mensagemSucesso
     *
     * @return string
     */
    function mensagemSucesso()
    {
        $msgSucess = session()->getFlashData('msgSucess');
        $texto = '';

        if (isset($msgSucess)) {

            $texto .= '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>' . $msgSucess. '</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';

        }

        return $texto;
    }

    /**
     * mensagemError
     *
     * @return string
     */
    function mensagemError()
    {
        $msgError   = session()->getFlashData('msgError');
        $texto      = '';

        if (isset($msgError)) {

            $texto .= '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>' . $msgError. '</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';

        }

        return $texto;
    }

    /**
     * setaMsgErrorCampo
     *
     * @param string $chave 
     * @param array $errors 
     * @return string
     */
    function setaMsgErrorCampo($chave, $errors)
    {
        $texto = '';

        if (!empty($errors[$chave])) {
            $texto = '<div class="text-danger mt-2">' . $errors[$chave] . '</div>';
        }

        return $texto;
    }


    /**
     * mostraStatus
     *
     * @param int $status 
     * @return string
     */
    function mostraStatus($status = 0)
    {
        if ($status == 0) {
            
        } else if ($status == 1) {
            return "Ativo";
        } else if ($status == 2) {
            return "Inativo";            
        }
    }

    /**
     * comboboxStatus
     *
     * @param int $status 
     * @return string
     */
    function comboboxStatus($status = 0)
    {
        return '<label for="statusRegistro" class="form-label">Status</label>
                <select name="statusRegistro" id="statusRegistro" class="form-control" required>
                    <option value=""  ' . (isset($status) ? ($status == 0 ? "selected" : "") : "") . '>...</option>
                    <option value="1" ' . (isset($status) ? ($status == 1 ? "selected" : "") : "") . '>Ativo</option>
                    <option value="2" ' . (isset($status) ? ($status == 2 ? "selected" : "") : "") . '>Inativo</option>
                </select>';
    }

    /**
     * setaValor
     *
     * @param string $campo 
     * @param string $dados 
     * @param mixed $valorDefault 
     * @return mixed
     */
    function setaValor($campo, $dados = [], $valorDefault = "")
    {
        if (!empty(set_value($campo))) {
            return set_value($campo);
        } else {
            if (isset($dados[$campo])) {
                return $dados[$campo];
            } else {
                return $valorDefault;
            }
        }
    }