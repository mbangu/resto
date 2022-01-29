<!-- Modal with form -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Ajout | Serveur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" method="post" >

                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nom du serveur</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Nom du serveur"
                                       name="serveur" required autofocus>
                                <div class="invalid-feedback">
                                    Please fill in your login
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nom d'utlisateur</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Nom d'utlisateur"
                                       name="name" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Restaurant</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-shopping-cart"></i>
                                    </div>
                                </div>
                                <select name="idrestaurant" class="form-control" required>
                                    <?php foreach($restaurants as $restaurant): ?>
                                    <option value={{ $restaurant->idrestaurant }}>
                                        {{ $restaurant->nom_restaurant }}</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                                <input type="email" class="form-control" placeholder="Adresse email"
                                       name="email" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Mot de passe</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                </div>
                                <input type="password" class="form-control" placeholder="Mot de passe"
                                       name="password" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Confirmer Mot de passe</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                </div>
                                <input type="password" class="form-control" placeholder="Mot de passe"
                                       name="password_confirmation" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary m-t-15 add-btn waves-effect">Ajouter
                        serveur</button>
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
                <h5 class="modal-title" id="myLargeModalLabel">Modifier | Serveur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" method="post">

                    @method('put')
                    @csrf

                    <div class="form-group">
                        <label>Nom du Serveur</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" value="" name="serveur" required>
                        </div>
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
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect ">Modifier un
                        serveur</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Details du serveur</h5>
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



