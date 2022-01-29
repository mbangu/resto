
<!-- Modal with form Update -->
<div class="modal fade " id="bd-update-modal-lg" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">1
            <div class="modal-header">der | Commande</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" method="post">

                    @method('put')
                    @csrf

                    <div class="form-group">
                        <label>Point de vente</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="Nom du point de vente" name="pointdevente" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" required style=" min-width:500px; max-width:100%;min-height:150px;height:100%;width:100%;"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Restaurant</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                            </div>
                            <select name="idrestaurant" class="form-control" required>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect ">Valider une commande</button>
                </form>
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

