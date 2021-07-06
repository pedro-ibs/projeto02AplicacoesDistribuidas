<div class="container">
    <div class="row pt-5 d-none" id="erro">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div id="text-erro">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12 pt-5 pb-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Gênero</h5>
                    <ul class="pt-3">
                        <li class="pt-2"><a href="<?= base_url("Acervo/") ?>" class="link-info">Todos</a></li>
                        <?php foreach($categorias as $item): ?>
                            <li class="pt-2"><a href="<?= base_url("Acervo/index/$item->category") ?>" class="link-info"><?= $item->category ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-12 col-xs-12 pt-5 pb-5">
            <h2>Lista de Livros</h2>
            <div class="row row-cols-1 row-cols-md-12 row-cols-lg-2 row-cols-xl-2 g-4">
            <?php foreach($livros as $item): ?>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="<?= base_url("assets/uploads/$item->image") ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $item->title ?></h5>
                            <p class="card-text"><b>Autor: </b> <?= $item->author ?></p>        
                            <p class="card-text"><b>Ano: </b> <?= $item->year ?></p>        
                            <p class="card-text"><b>Gênero: </b> <?= $item->category->category ?></p> 
                            <?php if($dados): ?>
                            <button type="button" class="btn btn-warning" onclick="editaLivro(<?= $item->key ?>)">Editar</button>
                            <button type="button" class="btn btn-danger" onclick="excluiLivro(<?= $item->key ?>)">Excluir</button>
                            <?php endif; ?>
                            <button type="button" class="btn btn-primary" onclick="infoLivro(<?= $item->key ?>)">Ver mais</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detalhesLivros" tabindex="-1" aria-labelledby="detalhesLivrosLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detalhesLivrosLabel">Informações do Livro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h5>Titulo</h5>
                        <p class="text-justify" id="tituloDetalhes">Titulo do Livro</p>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <h5>Ano</h5>
                        <p class="text-justify" id="anoDetalhes">Ano do Livro</p>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <h5>Paginas</h5>
                        <p class="text-justify" id="paginaDetalhes">Quantidade de Paginas</p>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h5>Descrição do Livro</h5>
                        <p class="text-justify" id="descricaoDetalhes">Modal body text goes here.</p>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h5>Autor</h5>
                        <p class="text-justify" id="autorDetalhes">Autor do Livro</p>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h5>Gênero</h5>
                        <p class="text-justify" id="generoDetalhes">Autor do Livro</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editarLivro" tabindex="-1" aria-labelledby="editarLivroLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarLivroLabel">Editar Livro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="submitEditaLivro">
              <div class="modal-body">
                  <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <label for="titulo" class="form-label">Titulo</label>
                        <input type="text" class="form-control" id="titulo_edita" name="titulo" placeholder="Titulo">
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label for="ano" class="form-label">Ano</label>
                        <input type="text" class="form-control" id="ano_edita" name="ano" placeholder="Ano">
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label for="pagina" class="form-label">Pagina</label>
                        <input type="text" class="form-control" id="pagina_edita" name="pagina" placeholder="Pagina">
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <label for="autor" class="form-label">Autor</label>
                        <input type="text" class="form-control" id="autor_edita" name="autor" placeholder="Autor da Obra">
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <label for="email" class="form-label">Gênero do Livro</label><br/>
                        <?php foreach($categorias as $item): ?>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="categoria" id="flexRadio<?= $item->key ?>_edita" value="<?= $item->key ?>">
                            <label class="form-check-label" for="flexRadio<?= $item->key ?>"><?= $item->category ?></label>
                          </div>
                        <?php endforeach; ?>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <label for="formFile" class="form-label">Imagem do Livro</label>
                        <input class="form-control" type="file" name="imagem" id="formFile">
                      </div>
                      <input type="hidden" value="" id="imagem_hidden" name="imagem_hidden" />
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <label for="descricao" class="form-label">Descrição</label>
                        <textarea class="form-control" id="descricao_edita" name="descricao" rows="4" placeholder="Descrição"></textarea>
                      </div>
                      <input type="hidden" id="id_edita" name="id" value=""/>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-primary">Editar</button>
              </div>
            </form>
        </div>
    </div>
</div>