<script>
    // Update serveur

    function addServeur() {

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
                    url: '{{ route('serveurs/create') }}',
                    data: modal_add.find('form').serialize(),
                    success: function(response) {

                        // console.log(response);return;

                        modal_add.find('form').get(0).reset();

                        modal_add.modal('hide');

                        getServeurs();

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

    function deleteServeur() {
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
                    var url1 = '{{ route('serveurs/delete', '') }}/' + id;
                    console.log(url1, id);
                    if (willDelete) {
                        console.log('Hello');
                        $.ajax({
                            method: 'delete',
                            url: url1,
                            success: function(res) {

                                getServeurs();

                                console.log('Deleted');
                            }
                        })
                        swal('Poof! Serveur supprime avec succes!', {
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

    function getServeurs() {


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $.ajax({
            type: 'get',
            url: '{{ route('serveurs') }}',
            success: function(response) {
                var str = '';

                // console.log(response.serveurs);return;

                $(response.serveurs).each(function(index, value) {

                    // console.log(value.restaurant.nom_restaurant);return;

                    str += ` <tr srv=${value.idserveur}>

                <td>${value.idserveur}</td>
                <td>${value.serveur}</td>
                <td>${value.restaurant.nom_restaurant}</td>
                <td>${value.user.name}</td>
                <td>${value.user.email}</td>
                <td>
                    <a href="#" data-toggle="modal"  nom_serveur="${value.serveur}" idrestaurant="${value.restaurant.idrestaurant}" idserveur ="${value.idserveur}" restaurant_serveur="${value.restaurant.nom_restaurant}" class="btn btn-update btn-icon btn-primary"><i class="far fa-edit"></i></a>
                    <a href="#" class="btn btn-icon btn-danger swal-6" data-id="${value.idserveur}"><i class="fas fa-times"></i></a>
                    <a href="#" data-toggle="modal"  class="btn btn-icon btn-info btn-show"
                       nom_serveur="${value.serveur}"  idserveur ="${value.idserveur}"  restaurant_serveur="${value.restaurant.nom_restaurant}""><i class="fas fa-info-circle"></i></a>
                </td>
                </tr>`
                })

                $(tableId).DataTable().destroy()

                $(tableId).find('tbody').html(str)

                addServeur();

                updateServeur();

                showServeur();

                deleteServeur();

                $(tableId).DataTable()
            }
        });
    }

    // Update serveur

    function updateServeur() {

        $('.btn-update').off('click').click(function() {

            var modal_update = $('#bd-update-modal-lg');

            modal_update.modal();

            var btn = $(this);

            modal_update.find('input[name=serveur]').val(btn.attr('nom_serveur'));
            modal_update.find('select[name=idrestaurant]').html(`<option value="${btn.attr('idrestaurant')}">${btn.attr('restaurant_serveur')}</option>`);


            modal_update.find('form').off('submit').submit(function(e) {

                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                $.ajax({

                    type: 'put',
                    url: '{{ route('serveurs/update', '') }}/' + btn.attr('idserveur'),
                    data: modal_update.find('form').serialize(),
                    success: function(response) {

                        modal_update.modal('hide');

                        getServeurs();

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

    function showServeur() {
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

    getServeurs();
</script>
