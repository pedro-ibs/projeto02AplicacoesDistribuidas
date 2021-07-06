<nav class="navbar navbar-expand-lg navbar-light bg-danger">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Acervo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if($dados): ?>
        <li class="nav-item">
          <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#cadastrarCategoria">Adicionar um Gênero</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#cadastrarLivro">Adicionar um livro</a>
        </li>
        <?php endif; ?>
      </ul>
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <?php if($dados): ?>
            <a class="nav-link" href="<?= base_url("Acervo/sair") ?>">Sair</a>
          <?php else: ?>
            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#autentificarUsuario">Login</a>
          <?php endif; ?>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="modal fade" id="autentificarUsuario" tabindex="-1" aria-labelledby="autentificarUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="autentificarUsuarioLabel">Autentificar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="submitAutentificar">
              <div class="modal-body">
                  <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <label for="email" class="form-label">Login</label>
                        <input type="text" class="form-control" name="login" id="login" placeholder="Login">
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha">
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-primary">Autentificar</button>
              </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="cadastrarLivro" tabindex="-1" aria-labelledby="cadastrarLivroLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cadastrarLivroLabel">Cadastrar um novo Livro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="submitCadastroLivro">
              <div class="modal-body">
                  <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <label for="titulo" class="form-label">Titulo</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo">
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label for="ano" class="form-label">Ano</label>
                        <input type="text" class="form-control" id="ano" name="ano" placeholder="Ano">
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label for="pagina" class="form-label">Pagina</label>
                        <input type="text" class="form-control" id="pagina" name="pagina" placeholder="Pagina">
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <label for="autor" class="form-label">Autor</label>
                        <input type="text" class="form-control" id="autor" name="autor" placeholder="Autor da Obra">
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <label for="email" class="form-label">Gênero do Livro</label><br/>
                        <?php foreach($categorias as $item): ?>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="categoria" id="flexRadio<?= $item->key ?>" value="<?= $item->key ?>">
                            <label class="form-check-label" for="flexRadio<?= $item->key ?>"><?= $item->category ?></label>
                          </div>
                        <?php endforeach; ?>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <label for="formFile" class="form-label">Imagem do Livro</label>
                        <input class="form-control" type="file" name="imagem" id="formFile">
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <label for="descricao" class="form-label">Descrição</label>
                        <textarea class="form-control" id="descricao" name="descricao" rows="4" placeholder="Descrição"></textarea>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="cadastrarCategoria" tabindex="-1" aria-labelledby="cadastrarCategoriaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cadastrarCategoriaLabel">Cadastrar novo Gênero</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="submitNovaCategoria">
              <div class="modal-body">
                  <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <label for="titulo" class="form-label">Titulo</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo">
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-primary">Salvar</button>
              </div>
            </form>
        </div>
    </div>
</div>