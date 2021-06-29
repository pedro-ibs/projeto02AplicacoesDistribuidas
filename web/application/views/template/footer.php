<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
<script type="text/javascript" src="<?= base_url("assets/jquery.min.js") ?>"></script>
<script src="<?= base_url("assets/bootstrap/js/bootstrap.min.js") ?>"></script>

<script type="text/javascript">

    var BASE_URL = "<?= base_url() ?>";

    $(document).ready(function(){

        $("#submitAutentificar").submit(function(e){
            e.preventDefault();
            var data = $(this).serialize();
            data =  new FormData($("#submitAutentificar").get(0));
            $.ajax({
                type: "post",
                url: BASE_URL+"Acervo/autentificar",
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                data: data,
                success: function(data)
                {
                    if(data != true)
                    {
                        $(".alert").removeClass("alert-success").addClass("alert-danger");
                        $("#text-erro").html("Usuario não encontrado");
                        $("#erro").removeClass("d-none");
                    }

                    $("#autentificarUsuario").modal("hide");

                    setTimeout(() => { 
                        window.location.reload();
                    }, 1000);
                }
            });
        });

        $("#submitCadastroLivro").submit(function(e){
            e.preventDefault();
            var data = $(this).serialize();
            data =  new FormData($("#submitCadastroLivro").get(0));
            $.ajax({
                type: "POST",
                url: BASE_URL+"Acervo/cadastro_livro",
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                data: data,
                success: function(data)
                {
                    if(data.rst == true)
                    {
                        $(".alert").removeClass("alert-danger").addClass("alert-success");
                        $("#text-erro").html(data.msg);
                        $("#erro").removeClass("d-none");
                    }
                    else
                    {
                        $(".alert").removeClass("alert-success").addClass("alert-danger");
                        $("#text-erro").html(data.msg);
                        $("#erro").removeClass("d-none");
                    }

                    $("#cadastrarLivro").modal("hide");

                    setTimeout(() => { 
                        window.location.reload();
                    }, 1000);
                }
            });
        });

        $("#submitNovaCategoria").submit(function(e){
            e.preventDefault();
            var data = $(this).serialize();
            data =  new FormData($("#submitNovaCategoria").get(0));
            $.ajax({
                type: "POST",
                url: BASE_URL+"Acervo/cadastro_categoria",
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                data: data,
                success: function(data)
                {
                    if(data.rst == true)
                    {
                        $(".alert").removeClass("alert-danger").addClass("alert-success");
                        $("#text-erro").html(data.msg);
                        $("#erro").removeClass("d-none");
                    }
                    else
                    {
                        $(".alert").removeClass("alert-success").addClass("alert-danger");
                        $("#text-erro").html(data.msg);
                        $("#erro").removeClass("d-none");
                    }

                    $("#cadastrarCategoria").modal("hide");

                    setTimeout(() => { 
                        window.location.reload();
                    }, 1000);
                }
            });
        });

        $("#submitEditaLivro").submit(function(e){
            e.preventDefault();
            data =  new FormData($("#submitEditaLivro").get(0));
            $.ajax({
                type: "POST",
                url: BASE_URL+"Acervo/editaLivro",
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                data: data,
                success: function(data)
                {
                    if(data.rst == true)
                    {
                        $(".alert").removeClass("alert-danger").addClass("alert-success");
                        $("#text-erro").html(data.msg);
                        $("#erro").removeClass("d-none");
                    }
                    else
                    {
                        $(".alert").removeClass("alert-success").addClass("alert-danger");
                        $("#text-erro").html(data.msg);
                        $("#erro").removeClass("d-none");
                    }

                    $("#editarLivroLabel").modal("hide");

                    setTimeout(() => { 
                        window.location.reload();
                    }, 1000);
                }
            });
        })

        $("#editarLivroLabel").on("hide.bs.modal", function(){
            nome_padrao = "_edita"
            $("#titulo"+nome_padrao).val("");
            $("#ano"+nome_padrao).val("");
            $("#pagina"+nome_padrao).val("");
            $("#autor"+nome_padrao).val("");
            $("#descricao"+nome_padrao).val("");
            $("input[nome=cateogria_edita]").attr("checked",false);
            $("#imagem_hidden").val("");
            $("#id_edita").val("");
        });

    });

    function editaLivro(id)
    {
        $.ajax({
            type: "POST",
            url: BASE_URL+"Acervo/get_livro/"+id,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(data)
            {
                nome_padrao = "_edita"
                $("#titulo"+nome_padrao).val(data.title);
                $("#ano"+nome_padrao).val(data.year);
                $("#pagina"+nome_padrao).val(data.pages);
                $("#autor"+nome_padrao).val(data.author);
                $("#descricao"+nome_padrao).val(data.description);
                $("#flexRadio"+data.category.id+nome_padrao).attr("checked", "checked");
                $("#imagem_hidden").val(data.image);
                $("#id_edita").val(data.id);

                $("#editarLivro").modal("show")
            }
        });
    }

    function infoLivro(id)
    {
        $.ajax({
            type: "POST",
            url: BASE_URL+"Acervo/get_livro/"+id,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(data)
            {
                nome_padrao = "Detalhes"
                $("#titulo"+nome_padrao).html(data.title);
                $("#ano"+nome_padrao).html(data.year);
                $("#pagina"+nome_padrao).html(data.pages);
                $("#autor"+nome_padrao).html(data.author);
                $("#descricao"+nome_padrao).html(data.description);
                $("#genero"+nome_padrao).html(data.category.category);

                $("#detalhesLivros").modal("show")
            }
        });
    }

    function excluiLivro(id)
    {
        $.ajax({
            type: "POST",
            url: BASE_URL+"Acervo/exclui_livro/"+id,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(data)
            {
                if(data.rst == true)
                {
                    $(".alert").removeClass("alert-danger").addClass("alert-success");
                    $("#text-erro").html(data.msg);
                    $("#erro").removeClass("d-none");
                }
                else
                {
                    $(".alert").removeClass("alert-success").addClass("alert-danger");
                    $("#text-erro").html(data.msg);
                    $("#erro").removeClass("d-none");
                }

                setTimeout(() => { 
                    window.location.reload();
                }, 1000);
            }
        });
    }

</script>