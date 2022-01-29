<script>
    function deleteClient() {
        $(".swal-6").off('click').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
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
                    var url1 = '{{ route('clients/delete', '') }}/' + id;
                    console.log(url1, id);
                    if (willDelete) {
                        console.log('Hello');
                        $.ajax({
                            method: 'delete',
                            url: url1,
                            success: function(res) {

                                getClients();

                                console.log('Deleted');
                            }
                        })
                        swal('Poof! Client supprime avec succes!', {
                            icon: 'success',
                        });
                    } else {
                        swal('Vous avez annule !');
                    }
                });
        });
    }


    var tableId = $('#save-stage')

    function getClients() {


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $.ajax({
            type: 'get',
            url: '{{ route('clients') }}',
            success: function(response) {
                var str = '';

                $(response).each(function(index, value) {
                    str += ` <tr cl=${value.idclient}>

                        <td>${value.idclient}</td>
                        <td>${value.client}</td>
                        <td>${value.code}</td>
                        <td>${value.telephone}</td>
                        <td>${value.restaurant.nom_restaurant}</td>
                        <td>${value.date_creation}</td>
                        <td>
                            <a href="#" data-toggle="modal"  nom_client="${value.client}" phone_client="${value.telephone}"  idclient ="${value.idclient}" class="btn btn-update btn-icon btn-primary"><i class="far fa-edit"></i></a>
                            <a href="#" class="btn btn-icon btn-danger swal-6" data-id="${value.idclient}"><i class="fas fa-times"></i></a>
                            <a href="#" data-toggle="modal"
                             nom_client="${value.client}"
                              code_client="${value.code}"
                              phone_client="${value.telephone}"
                                restaurant_client="${value.restaurant.nom_restaurant}"
                                 date_creation_client ="${value.date_creation}"  id=''   class="btn btn-icon btn-info btn-show"
                              idclient ="${value.idclient}"><i class="fas fa-info-circle"></i></a>
                        </td>
                        </tr>`
                })

                $(tableId).DataTable().destroy()

                $(tableId).find('tbody').html(str)

                updateClient();

                showClient();

                deleteClient();

                $(tableId).DataTable()
            }
        });
    }

    function updateClient() {

        $('.btn-update').off('click').click(function() {

            var modal_update = $('#bd-update-modal-lg');

            modal_update.modal();

            var btn = $(this);

            modal_update.find('input[name=client]').val(btn.attr('nom_client'));
            modal_update.find('input[name=telephone]').val(btn.attr('phone_client'));


            modal_update.find('form').off('submit').submit(function(e) {

                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                $.ajax({

                    type: 'put',
                    url: '{{ route('clients/update', '') }}/' + btn.attr('idclient'),
                    data: modal_update.find('form').serialize(),
                    success: function(response) {

                        modal_update.modal('hide');

                        getClients();

                        console.log(response);
                    }
                });

                swal('Poof! Client mis a jour avec succes!', {
                    icon: 'success',
                });

            });

        });
    }


    function showClient() {
        $('.btn-show').off('click').click(function() {

            var modal_show = $('#f-info');

            modal_show.modal();

            var btn = $(this);

            var id = '<span style="font-weight: bold">Identifiant du client </span>: ' + btn.attr('idclient');
            var code = '<span style="font-weight: bold">Code du client </span>: ' + btn.attr('code_client');
            var nom = '<span style="font-weight: bold">Nom du client </span>: ' + btn.attr('nom_client');
            var phone = '<span style="font-weight: bold">Numero de telephone du client </span>: ' + btn.attr(
                'phone_client');
            var restaurant = '<span style="font-weight: bold">Nom du restaurant du client </span>: ' + btn.attr(
                'restaurant_client');
            var date_creation = '<span style="font-weight: bold">Date de creation </span>: ' + btn.attr(
                'date_creation_client');

            var client_showed = id + '  <hr /> <br/>' + code + '  <hr /> <br/>' + nom + '  <hr /> <br/>' + phone + '  <hr /> <br/>' + restaurant +
                '  <hr /> <br/>' + date_creation + '  <hr /> <br />';

            $('.id-client').html(client_showed);

            modal_show.modal('hide');


        });
    }

    getClients();

</script>
