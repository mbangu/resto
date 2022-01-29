<script>

    // Update serveur

    function addArticle() {

        $('#form-ajout-art').off('submit').submit(function(e) {
            e.preventDefault();
            form = $(this);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            var data = new FormData(this);

            $.ajax({
                type: 'post',
                url: '{{ route('articles/create') }}',
                data: data,
                processData: false,
                contentType: false,
                success: function(response) {
                    form.get(0).reset();

                    form.closest('.modal').modal('hide');

                    getArticles();

                    console.log(response);
                }
            });

            swal('Poof! Article ajoutee avec succes!', {
                icon: 'success',
            });

        });
    }


    // Delete serveur

    function deleteArticle() {
        $(".swal-6").off('click').click(function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            swal({
                title: 'Etes-vous sûr?',
                text: 'Une fois supprimée, vous ne pourrez plus annuler cette action !',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    var url1 = '{{ route('articles/delete', '') }}/' + id;
                    console.log(url1, id);
                    if (willDelete) {
                        $.ajax({
                            method: 'delete',
                            url: url1,
                            success: function(res) {

                                getArticles();

                                console.log('Deleted');
                            }
                        })
                        swal('Poof! Article supprimee avec succes!', {
                            icon: 'success',
                        });
                    } else {
                        swal('Vous avez annule !');
                    }
                });
        })
    }


    // Listining all serveurs

    var tableId = $('#save-stage')

    function getArticles() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $.ajax({
            type: 'get',
            url: '{{ route('articles') }}',
            success: function(response) {
                var str = '';

                // console.log(response.articles);return;

                $(response.articles).each(function(index, value) {

                    str += ` <tr srv=${value.idarticle}>

                <td>${value.idarticle}</td>
                <td>${value.article}</td>
                <td>${value.categorie_article.categorie}</td>
                <td>${value.pointdevente.pointdevente}</td>
                <td>${value.description}</td>
                <td>${value.prix}</td>
                <td>${value.devise.devise}</td>
                <td>
                    <a href="#" data-toggle="modal" image_article="${value.image}" iddevise="${value.devise.iddevise}" devise_article="${value.devise.devise}" prix_article="${value.prix}" idarticle="${value.idarticle}"  nom_article="${value.article}" idcategorie="${value.categorie_article.idcategorie_article}" nom_categorie_article="${value.categorie_article.categorie}" idpointdevente="${value.pointdevente.idpointdevente}" pointdevente_article="${value.pointdevente.pointdevente}"   description_article="${value.description}"  class="btn btn-update btn-icon btn-primary"><i class="far fa-edit"></i></a>
                    <a href="#" class="btn btn-icon btn-danger swal-6" data-id="${value.idarticle}"><i class="fas fa-times"></i></a>
                    <a href="#" image_article="${value.image}"  devise_article="${value.devise.devise}" prix_article="${value.prix}" idarticle="${value.idarticle}"  nom_article="${value.article}"  nom_categorie_article="${value.categorie_article.categorie}"  pointdevente_article="${value.pointdevente.pointdevente}"   description_article="${value.description}" data-toggle="modal"  class="btn btn-icon btn-info btn-show"><i class="fas fa-info-circle"></i></a>
                </td>
                </tr>`
                })

                $(tableId).DataTable().destroy()

                $(tableId).find('tbody').html(str)

                addArticle();

                updateArticle();

                showArticle();

                deleteArticle();

                $(tableId).DataTable()
            }
        });
    }

    // Update serveur

    function updateArticle() {

        $('.btn-update').off('click').click(function() {

            var modal_update = $('#bd-update-modal-lg');

            modal_update.modal();

            var btn = $(this);

            modal_update.find('input[name=article]').val(btn.attr('nom_article'));
            modal_update.find('textarea[name=description]').val(btn.attr('description_article'));
            modal_update.find('input[name=prix]').val(btn.attr('prix_article'));

            $('#id-cat').val(btn.attr('idcategorie')).change();

            $('#id-point').val(btn.attr('idpointdevente')).change();

            $('#id-devise').val(btn.attr('iddevise')).change();


            $('#form-update-art').off('submit').submit(function(e) {

                e.preventDefault();

                var form = $(this);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                var data = new FormData(form.get(0));

                $.ajax({

                    type: 'post',
                    url: '{{ route('articles/update', '') }}/' + btn.attr('idarticle'),
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(response) {

                        form.get(0).reset();

                        form.closest('.modal').modal('hide');

                        getArticles();

                        console.log(response);
                    }
                });

                swal('Poof! Article mis a jour avec succes!', {
                    icon: 'success',
                });

            });

        });
    }


    // Show Serveur

    function showArticle() {
        $('.btn-show').off('click').click(function() {

            var modal_show = $('#f-info');

            modal_show.modal();

            var btn = $(this);

            var id = '<span style="font-weight: bold">Identifiant de l\'article </span>: ' + btn.attr('idarticle');
            var nom = '<span style="font-weight: bold">Nom de l\'article </span>: ' + btn.attr('nom_article');
            var description = '<span style="font-weight: bold">Description  de l\'article </span>: <br />' + btn.attr('description_article');
            var categorie = '<span style="font-weight: bold">Categorie de l\'article </span>: ' + btn.attr('nom_categorie_article');
            var pointdevente = '<span style="font-weight: bold">Point de vente de l\'article </span>: ' + btn.attr('pointdevente_article');

            var article_showed = id + '  <hr /> <br/>' + nom + '  <hr /> <br/>' + description + '  <hr /> <br/>' + categorie + '  <hr /> <br/>' + pointdevente + '  <hr /> <br/>';

            $('.id-art').html(article_showed);

            var img = '{{ asset('storage') .'/' }}' + btn.attr('image_article');

            var image = '<span style="font-weight: bold">Image de l\'article </span>: ' + '<a href="' + img + '" data-sub-html="Demo Description"> <img class="img-responsive thumbnail"' + ' src="' + img + '" alt="" /></a>';
            var devise = '<span style="font-weight: bold">Devise de l\'article </span>: ' + btn.attr('devise_article');
            var prix = '<span style="font-weight: bold">Prix de l\'article </span>: ' + btn.attr('prix_article');

            var img_showed = image + '  <hr /> <br/>' + devise + '  <hr /> <br/>' + prix + '  <hr /> <br/>' ;

            console.log(img);

            $('.id-img').html(img_showed);

            modal_show.modal('hide');


        });
    }

    getArticles();

</script>
