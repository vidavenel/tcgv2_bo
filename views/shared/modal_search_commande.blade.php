<div class="modal fade" id="modal-search_commande">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Recherche commande</h4>
            </div>
            <form action="{{ route('admin.commande_search') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="no_commande">N° commande</label>
                                <input type="text" class="form-control" id="no_commande" name="reference">
                            </div>
                            <div class="form-group">
                                <label for="no_facture">N° facture</label>
                                <input type="text" class="form-control" id="no_facture">
                            </div>
                            <div class="form-group">
                                <label for="no_immat">N° immatriculation</label>
                                <input type="text" class="form-control" id="no_immat">
                            </div>
                            <div class="form-group">
                                <label for="no_client">Nom Client</label>
                                <input type="text" class="form-control" id="no_client">
                            </div>
                            <div class="form-group">
                                <label for="telephone_client">Téléphone client</label>
                                <input type="text" class="form-control" id="telephone_client">
                            </div>
                            <div class="form-group">
                                <label for="email_client">Email client</label>
                                <input type="text" class="form-control" id="email_client">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
