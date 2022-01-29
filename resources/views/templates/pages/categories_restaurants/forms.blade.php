 <!-- Modal with form -->
 <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
 aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myLargeModalLabel">Ajout | Categorie restaurant</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <div class="modal-body">
          <form class="" method="post" action={{ route('restaurants/create')}}>

              @csrf
                  <div class="form-group">
                      <label>Categorie</label>
                      <div class="input-group">
                          <div class="input-group-prepend">
                              <div class="input-group-text">
                                  <i class="fas fa-shopping-cart"></i>
                              </div>
                          </div>
                          <input type="text" class="form-control" placeholder="Nom de la categorie" name="categorie" required>
                      </div>
                  </div>
                  <div class="form-group">
                      <label>Description</label>
                      <div class="input-group">
                          <div class="input-group-prepend">
                              <div class="input-group-text">
                                  <i class="fas fa-shopping-cart"></i>
                              </div>
                          </div>
                          <input type="text" class="form-control" placeholder="Description de la categorie" name="description" required>
                      </div>
                  </div>

              <button type="submit" class="btn btn-primary m-t-15 waves-effect">Ajouter categorie restaurant</button>
          </form>
      </div>
    </div>
  </div>
</div>