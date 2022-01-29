<script>
    // Update serveur

    function addTable() {

        $('.add-btn').off('click').click(function() {

            var modal_add = $('.bd-example-modal-lg');

            modal_add.modal();

            modal_add.find('form').off('submit').submit(function(e) {

                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                $.ajax({

                    type: 'post',
                    url: '{{ route('tables/create') }}',
                    data: modal_add.find('form').serialize(),
                    success: function(response) {

                        // console.log(response);return;

                        modal_add.find('form').get(0).reset();

                        modal_add.modal('hide');

                        getTables();

                        console.log(response);
                    }
                });

                swal('Poof! Serveur ajoute avec succes!', {
                    icon: 'success',
                });

            });

        });
    }


    // Delete serveur

    function deleteTable() {
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
                    var url1 = '{{ route('tables/delete', '') }}/' + id;
                    console.log(url1, id);
                    if (willDelete) {
                        console.log('Hello');
                        $.ajax({
                            method: 'delete',
                            url: url1,
                            success: function(res) {

                                getTables();

                                console.log('Deleted');
                            }
                        })
                        swal('Poof! Table supprimee avec succes!', {
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

    function getTables() {


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $.ajax({
            type: 'get',
            url: '{{ route('tables') }}',
            success: function(response) {
                var str = '';

                // console.log(response.serveurs);return;

                $(response.tables).each(function(index, value) {

                    // console.log(value.restaurant);

                    str += ` <tr srv=${value.idtable}>

                <td>${value.idtable}</td>
                <td>${value.numero_table}</td>
                <td>${value.nb_places}</td>
                <td>${value.restaurant.nom_restaurant}</td>
                <td>${value.espace.name}</td>
                <td>
                    <a href="#" data-toggle="modal" idtable="${value.idtable}" nb_places="${value.nb_places}" numero_table="${value.numero_table}" espace_table="${value.espace.name}" idrestaurant="${value.restaurant.idrestaurant}" idespace="${value.espace.id}"  class="btn btn-update btn-icon btn-primary"><i class="far fa-edit"></i></a>
                    <a href="#" class="btn btn-icon btn-danger swal-6" data-id="${value.idtable}"><i class="fas fa-times"></i></a>
                    <a href="#" data-toggle="modal"  class="btn btn-icon btn-info btn-show"><i class="fas fa-info-circle"></i></a>
                </td>
                </tr>`
                })

                $(tableId).DataTable().destroy()

                $(tableId).find('tbody').html(str)

                addTable();

                updateTable();

                showTable();

                deleteTable();

                $(tableId).DataTable()
            }
        });
    }

    // Update serveur

    function updateTable() {

        $('.btn-update').off('click').click(function() {

            var modal_update = $('#bd-update-modal-lg');

            modal_update.modal();

            var btn = $(this);

            modal_update.find('input[name=numero_table]').val(btn.attr('numero_table'));
            modal_update.find('input[name=nb_places]').val(btn.attr('nb_places'));

            // console.log(btn.attr('idespace'));
            // console.log(btn.attr('idrestaurant'));

            $('#id-esp').val(btn.attr('idespace')).change();

            $('#id-rest').val(btn.attr('idrestaurant')).change();


            modal_update.find('form').off('submit').submit(function(e) {

                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                $.ajax({

                    type: 'put',
                    url: '{{ route('tables/update', '') }}/' + btn.attr('idtable'),
                    data: modal_update.find('form').serialize(),
                    success: function(response) {

                        modal_update.modal('hide');

                        getTables();

                        console.log(response);
                    }
                });

                swal('Poof! Serveur mis a jour avec succes!', {
                    icon: 'success',
                });

            });

        });
    }


    // Show Serveur

    function showTable() {
        $('.btn-show').off('click').click(function() {

            var modal_show = $('#f-info');

            modal_show.modal();

            var btn = $(this);

            var id = '<span style="font-weight: bold">Identifiant du serveur </span>: ' + btn.attr('idserveur');
            var nom = '<span style="font-weight: bold">Nom du serveur </span>: ' + btn.attr('nom_serveur');
            var restaurant = '<span style="font-weight: bold">Nom du restaurant du serveur </span>: ' + btn.attr('restaurant_serveur');

            var serveur_showed = id + '  <hr /> <br/>' + nom + '   <hr /> <br/>' + restaurant + '  <hr /> <br/>';

            $('.id-serveur').html(serveur_showed);

            modal_show.modal('hide');


        });
    }

    getTables();
</script>
