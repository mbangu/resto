<!-- Modal with form -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Ajout | Article</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class=""  id="form-ajout-art" enctype="multipart/form-data">

                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nom de l'article</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Nom de l'article" name="article" required autofocus>
                                <div class="invalid-feedback">
                                    Please fill in your login
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Categorie de l'article</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-grid"></i>
                                    </div>
                                </div>
                                <select name="idcategorie_article" class="form-control" required>
                                    <?php foreach($categories as $categorie): ?>
                                    <option value={{ $categorie->idcategorie_article}}>{{ $categorie->categorie}}</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label>Point de vente</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-trash"></i>
                                    </div>
                                </div>
                                <select name="idpointdevente" class="form-control" required>
                                    <?php foreach($points as $point): ?>
                                    <option value={{ $point->idpointdevente}}>{{ $point->pointdevente}}</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Devise</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                </div>
                                <select name="iddevise" class="form-control" required>
                                    <?php foreach($devises as $devise): ?>
                                    <option value={{ $devise->iddevise}}>{{ $devise->devise}}</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Prix de l'article</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-dollar-sign"></i>
                                    </div>
                                </div>
                                <input type="number" class="form-control" placeholder="Prix de l'article" name="prix" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Image de l'article</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-file"></i>
                                    </div>
                                </div>
                                <input type="file" class="form-control" placeholder="Photo de l'article" name="image" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Description</label>
                            <textarea class="form-control" name="description" required style=" min-width:500px; max-width:100%;min-height:150px;height:100%;width:100%;"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Ajouter article</button>
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
                <h5 class="modal-title" id="myLargeModalLabel">Modifier | Article</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" id="form-update-art" method="post" enctype="multipart/form-data">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nom de l'article</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Nom de l'article" name="article" required autofocus>
                                <div class="invalid-feedback">
                                    Please fill in your login
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Categorie de l'article</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-grid"></i>
                                    </div>
                                </div>
                                <select name="idcategorie_article" id="id-cat" class="form-control" required>
                                    <?php foreach($categories as $categorie): ?>
                                    <option value={{ $categorie->idcategorie_article}}>{{ $categorie->categorie}}</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label>Point de vente</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-trash"></i>
                                    </div>
                                </div>
                                <select name="idpointdevente" id="id-point" class="form-control" required>
                                    <?php foreach($points as $point): ?>
                                    <option value={{ $point->idpointdevente}}>{{ $point->pointdevente}}</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Devise</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                </div>
                                <select name="iddevise" id="id-devise" class="form-control" required>
                                    <?php foreach($devises as $devise): ?>
                                    <option value={{ $devise->iddevise}}>{{ $devise->devise}}</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Prix de l'article</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-dollar-sign"></i>
                                    </div>
                                </div>
                                <input type="number" class="form-control" placeholder="Prix de l'article" name="prix" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Image de l'article</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-file"></i>
                                    </div>
                                </div>
                                <input type="file" class="form-control" placeholder="Photo de l'article" name="image" id="id-image" >
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Description</label>
                            <textarea class="form-control" name="description" required style=" min-width:500px; max-width:100%;min-height:150px;height:100%;width:100%;"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect ">Modifier un
                        article</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Details de l'article</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <hr />
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 id-art">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6">
                        <div id="aniimated-thumbnials" class="list-unstyled clearfix id-img">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

