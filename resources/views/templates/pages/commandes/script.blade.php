<script>

    // Delete commande

    function deleteCommande() {
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
                    var url1 = '{{ route('points_de_ventes/delete', '') }}/' + id;
                    if (willDelete) {
                        console.log('Hello');
                        $.ajax({
                            method: 'delete',
                            url: url1,
                            success: function(res) {

                                getPointsdevente();

                                console.log('Deleted');
                            }
                        })
                        swal('Poof! Point de vente supprime avec succes!', {
                            icon: 'success',
                        });
                    } else {
                        swal('Vous avez annule !');
                    }
                });
        })
    }


    // Listining all commandes

    var tableId = $('#save-stage')

    function getCommandes() {


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $.ajax({
            type: 'get',
            url: '{{ route('commandes') }}',
            success: function(response) {
                var str = '';

                console.log(response);

                $(response).each(function(index, value) {

                    // console.log(value.restaurant.nom_restaurant);return;

                    str += ` <tr srv=${value.idcommande}>

                <td>${value.idcommande}</td>
                <td>${value.numero_cmd}</td>
                <td>${value.client.client}</td>
                <td>${value.serveur.serveur}</td>
                <td>${value.table.numero_table}</td>
                <td>${'invalide'}</td>
                <td>${value.date}</td>
                <td>
                    <a href="#" data-toggle="modal" idcommande="${value.idcommande}" statecommande="${value.valide}"  class="btn btn-update btn-icon btn-primary"><i class="far fa-edit"></i></a>
                    <a href="#" class="btn btn-icon btn-danger swal-6" data-id="${value.idcommande}"><i class="fas fa-times"></i></a>
                    <a href="#" data-toggle="modal"  class="btn btn-icon btn-info btn-show"><i class="fas fa-info-circle"></i></a>
                </td>
                </tr>`
                })

                $(tableId).DataTable().destroy()

                $(tableId).find('tbody').html(str);

                updateCommande();

                showCommande();

                deleteCommande();

                $(tableId).DataTable()
            }
        });
    }

    // Update commande

    function updateCommande() {

        $('.btn-update').off('click').click(function() {

            var modal_update = $('#bd-update-modal-lg');

            modal_update.modal();

            var btn = $(this);

            modal_update.find('form').off('submit').submit(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                $.ajax({

                    type: 'put',
                    url: '{{ route('validatecmd', '') }}/' + btn.attr('idcommande'),
                    data: {'valide': 1},
                    success: function(response) {

                        modal_update.modal('hide');

                        getCommandes();

                        console.log(response);
                    }
                });

                swal('Poof! Commande validee avec succes!', {
                    icon: 'success',
                });

            });

        });
    }


    // Show Commande

    function showCommande() {
        $('.btn-show').off('click').click(function() {

            var modal_show = $('#f-info');

            modal_show.modal();

            var btn = $(this);

            var id = '<span style="font-weight: bold">Identifiant du point de vente </span>: ' + btn.attr('idpointdevente');
            var nom = '<span style="font-weight: bold">Nom du point de vente </span>: ' + btn.attr('nom_point');
            var description = '<span style="font-weight: bold">Description du point de vente</span>: <br />' + btn.attr('description_point');
            var restaurant = '<span style="font-weight: bold">Nom du restaurant du point de vente </span>: ' + btn.attr('restaurant_point');

            var point_showed = id + '  <hr /> <br/>' + nom + '  <hr /> <br/>' + description + '  <hr /> <br/>' + restaurant + '  <hr /> <br/>';

            $('.id-point').html(point_showed);

            modal_show.modal('hide');


        });
    }

    getCommandes();

</script>
