<script>

    // Update serveur

    function addCategorie() {

            $('#form-ajout-cat').submit(function(e) {

                e.preventDefault();
                form = $(this);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                $.ajax({

                    type: 'post',
                    url: '{{ route('categories_articles/create') }}',
                    data: form.serialize(),
                    success: function(response) {

                        form.get(0).reset();

                        form.closest('.modal').modal('hide');

                        getCategories();

                        console.log(response);
                    }
                });

                swal('Poof! Categorie ajoutee avec succes!', {
                    icon: 'success',
                });

            });
    }


    // Delete serveur

    function deleteCategorie() {
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
                    var url1 = '{{ route('categories_articles/delete', '') }}/' + id;
                    console.log(url1, id);
                    if (willDelete) {
                        console.log('Hello');
                        $.ajax({
                            method: 'delete',
                            url: url1,
                            success: function(res) {

                               getCategories();

                                console.log('Deleted');
                            }
                        })
                        swal('Poof! Categorie supprimee avec succes!', {
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

    function getCategories() {


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $.ajax({
            type: 'get',
            url: '{{ route('categories_articles') }}',
            success: function(response) {
                var str = '';

                // console.log(response.categories);return;

                $(response.categories).each(function(index, value) {

                    str += ` <tr srv=${value.idcategorie_article}>

                <td>${value.idcategorie_article}</td>
                <td>${value.categorie}</td>
                <td>${value.restaurant.nom_restaurant}</td>
                <td>${value.description}</td>
                <td>
                    <a href="#" data-toggle="modal"  nom_categorie="${value.categorie}" idrestaurant="${value.restaurant.idrestaurant}" idcategorie ="${value.idcategorie_article}" description_categorie="${value.description}" restaurant_categorie="${value.restaurant.nom_restaurant}" class="btn btn-update btn-icon btn-primary"><i class="far fa-edit"></i></a>
                    <a href="#" class="btn btn-icon btn-danger swal-6" data-id="${value.idcategorie_article}"><i class="fas fa-times"></i></a>
                    <a href="#" data-toggle="modal"  class="btn btn-icon btn-info btn-show"
                      nom_categorie="${value.categorie}" idrestaurant="${value.restaurant.idrestaurant}" idcategorie ="${value.idcategorie_article}" description_categorie="${value.description}" restaurant_categorie="${value.restaurant.nom_restaurant}"><i class="fas fa-info-circle"></i></a>
                </td>
                </tr>`
                })

                $(tableId).DataTable().destroy()

                $(tableId).find('tbody').html(str)

                addCategorie();

                updateCategorie();

                showCategorie();

                deleteCategorie();

                $(tableId).DataTable()
            }
        });
    }

    // Update serveur

    function updateCategorie() {

        $('.btn-update').off('click').click(function() {

            var modal_update = $('#bd-update-modal-lg');

            modal_update.modal();

            var btn = $(this);

            modal_update.find('input[name=categorie]').val(btn.attr('nom_categorie'));
            modal_update.find('textarea[name=description]').val(btn.attr('description_categorie'));
            modal_update.find('select[name=idrestaurant]').html(`<option value="${btn.attr('idrestaurant')}">${btn.attr('restaurant_categorie')}</option>`);


            modal_update.find('form').off('submit').submit(function(e) {

                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                $.ajax({

                    type: 'put',
                    url: '{{ route('categories_articles/update', '') }}/' + btn.attr('idcategorie'),
                    data: modal_update.find('form').serialize(),
                    success: function(response) {

                        modal_update.modal('hide');

                        getCategories();

                        console.log(response);
                    }
                });

                swal('Poof! Categorie mise a jour avec succes!', {
                    icon: 'success',
                });

            });

        });
    }


    // Show Serveur

    function showCategorie() {
        $('.btn-show').off('click').click(function() {

            var modal_show = $('#f-info');

            modal_show.modal();

            var btn = $(this);

            var id = '<span style="font-weight: bold">Identifiant de la categorie </span>: ' + btn.attr('idcategorie');
            var nom = '<span style="font-weight: bold">Nom de la categorie </span>: ' + btn.attr('nom_categorie');
            var description = '<span style="font-weight: bold">Description de la categorie</span>: <br />' + btn.attr('description_categorie');
            var restaurant = '<span style="font-weight: bold">Nom du restaurant de la categorie </span>: ' + btn.attr('restaurant_categorie');

            var categorie_showed = id + '  <hr /> <br/>' + nom + '  <hr /> <br/>' + description + '  <hr /> <br/>' + restaurant + '  <hr /> <br/>';

            $('.id-categorie').html(categorie_showed);

            modal_show.modal('hide');


        });
    }

    getCategories();

</script>
