<!-- Modal with form -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Ajout | Espace</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" method="post" >

                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Espace</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Nom de l'espace"
                                       name="name" required autofocus>
                                <div class="invalid-feedback">

                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary m-t-15 add-btn waves-effect">Ajouter
                        un espace</button>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Modal with form Update -->
<div class="modal fade " id="bd-update-modal-lg" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Modifier | Espace</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" method="post">

                    @method('put')
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Espace</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Nom de l'espace"
                                       name="name" required autofocus>
                                <div class="invalid-feedback">

                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary m-t-15 waves-effect ">Modifier un
                        espace</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- basic modal -->
<div class="modal fade" id="f-info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Details d'un espace</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body id-serveur">
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



