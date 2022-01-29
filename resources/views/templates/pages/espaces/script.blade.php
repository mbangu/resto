<script>
    // Update serveur

    function addEspace() {

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
                    url: '{{ route('espaces/create') }}',
                    data: modal_add.find('form').serialize(),
                    success: function(response) {

                        // console.log(response);return;

                        modal_add.find('form').get(0).reset();

                        modal_add.modal('hide');

                        getEspaces();

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

    function deleteEspace() {
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
                    var url1 = '{{ route('espaces/delete', '') }}/' + id;
                    console.log(url1, id);
                    if (willDelete) {
                        console.log('Hello');
                        $.ajax({
                            method: 'delete',
                            url: url1,
                            success: function(res) {

                                getEspaces();

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

    function getEspaces() {


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $.ajax({
            type: 'get',
            url: '{{ route('espaces') }}',
            success: function(response) {
                var str = '';

                // console.log(response.espaces);return;

                $(response.espaces).each(function(index, value) {

                    console.log(value);

                    str += ` <tr srv=${value.id}>

                <td>${value.id}</td>
                <td>${value.name}</td>
                <td>${value.tables.length}</td>
                <td>${value.restaurant.nom_restaurant}</td>
                <td>
                    <a href="#" data-toggle="modal" idespace="${value.id}" nom_espace="${value.name}" class="btn btn-update btn-icon btn-primary"><i class="far fa-edit"></i></a>
                    <a href="#" data-toggle="modal" idespace="${value.id}"  class="btn btn-icon btn-info btn-show"><i class="fas fa-info-circle"></i></a>
                </td>
                </tr>`
                })

                $(tableId).DataTable().destroy()

                $(tableId).find('tbody').html(str)

                addEspace();

                updateEspace();

                showEspace();

                deleteEspace();

                $(tableId).DataTable()
            }
        });
    }

    // Update serveur

    function updateEspace() {

        $('.btn-update').off('click').click(function() {

            var modal_update = $('#bd-update-modal-lg');

            modal_update.modal();

            var btn = $(this);

            modal_update.find('input[name=name]').val(btn.attr('nom_espace'));

            modal_update.find('form').off('submit').submit(function(e) {

                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                $.ajax({

                    type: 'put',
                    url: '{{ route('espaces/update', '') }}/' + btn.attr('idespace'),
                    data: modal_update.find('form').serialize(),
                    success: function(response) {

                        modal_update.modal('hide');

                        getEspaces();

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

    function showEspace() {
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

    getEspaces();
</script>
