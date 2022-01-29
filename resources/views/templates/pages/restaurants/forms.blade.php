           <!-- Modal with form -->
           <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
           aria-hidden="true">
              <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="myLargeModalLabel">Ajout | Restaurant</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form class="" method="post" action={{ route('restaurants/create')}}>

                          @csrf

                          <div class="form-row">
                              <div class="form-group col-md-6">
                                  <label>Nom du restaurant</label>
                                  <div class="input-group">
                                      <div class="input-group-prepend">
                                          <div class="input-group-text">
                                              <i class="fas fa-user"></i>
                                          </div>
                                      </div>
                                      <input type="text" class="form-control" placeholder="Nom du restaurant" name="nom_restaurant" required autofocus>
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
                                      <input type="text" class="form-control" placeholder="Nom d'utlisateur" name="name" required>
                                  </div>
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="form-group col-md-6">
                                  <label>Categorie du restaurant</label>
                                  <div class="input-group">
                                      <div class="input-group-prepend">
                                          <div class="input-group-text">
                                              <i class="fas fa-shopping-cart"></i>
                                          </div>
                                      </div>
                                      <select name="idcategorie_restaurant" class="form-control" required>
                                          <?php foreach($categories as $categorie): ?>
                                          <option value={{ $categorie->idcategorie_restaurant}}>{{ $categorie->categorie}}</option>
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
                                      <input type="email" class="form-control" placeholder="Adresse email" name="email" required>
                                  </div>
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="form-group col-md-6">
                                  <label>Contact</label>
                                  <div class="input-group">
                                      <div class="input-group-prepend">
                                          <div class="input-group-text">
                                              <i class="fas fa-phone"></i>
                                          </div>
                                      </div>
                                      <input type="tel" class="form-control" placeholder="Contact du restaurant" name="contact" required>
                                  </div>
                              </div>

                              <div class="form-group col-md-6">
                                  <label>Adresse du restaurant</label>
                                  <div class="input-group">
                                      <div class="input-group-prepend">
                                          <div class="input-group-text">
                                              <i class="fas fa-map"></i>
                                          </div>
                                      </div>
                                      <input type="text" class="form-control" placeholder="Adresse du restaurant" name="adresse" required>
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
                                      <input type="password" class="form-control" placeholder="Mot de passe" name="password" required>
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
                                      <input type="password" class="form-control" placeholder="Mot de passe" name="password_confirmation" required>
                                  </div>
                              </div>
                          </div>
                          <button type="submit" class="btn btn-primary m-t-15 waves-effect">Ajouter restaurant</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>