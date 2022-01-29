<!-- basic modal -->
<div class="modal fade" id="bd-update-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Valider la commande</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <form class="" method="post">

                        @method('put')
                        @csrf

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <input type="hidden" class="form-control" placeholder="Nom du point de vente" name="pointdevente" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect ">Valider une commande</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">

            </div>
        </div>
    </div>
</div>

<!-- Large modal -->
<div class="modal fade bd-example-modal-lg" id="f-info" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Details du Point de vente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <hr />
            <div class="modal-body id-point">
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

