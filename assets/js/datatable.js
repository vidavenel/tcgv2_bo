// datatable
require('datatables.net-bs');

export {list, abandonnees}

let language = {
    "emptyTable": "Aucune donnée disponible",
    "info": "Affichage de _START_ à _END_ sur _TOTAL_ lignes",
    "infoEmpty": "Showing 0 to 0 of 0 entries",
    "infoFiltered": "(filtré de _MAX_ lignes)",
    "lengthMenu": "Voir _MENU_ lignes",
    "loadingRecords": "Chargement...",
    "processing": "Traitement en cours...",
    "zeroRecords": "Aucun resultat",
    "paginate": {
        "first": "Début",
        "last": "Fin",
        "next": "Suivant",
        "previous": "Précédent"
    },
};

let base_config = {
    bSortCellsTop: true,
    dom: '<"toolbar">tipr',
    order: [[0, "desc"]],
    pageLength: 25,
    serverSide: true,
    language: language
};

let list = (id) => {
    let config = base_config;
    config.columns = [
        {"name": "reference", "data": "reference"},
        {
            "name": "client_nom", "data": function (data) {
                return `${data.client_nom} ${data.client_prenom}`
            }
        },
        {"name": "demarche", "data": "demarche"},
        {
            "name": "statut", "data": function (data) {
                return `<span class="label label-${data.statut.class}">${data.statut.nom}</span>`;
            }
        },
        {"name": "montant", "data": "montant"},
        {"name": "paiement", "data": "paiement"},
        {"name": "date", "data": "date"}
    ];
    let datatable = $('#datatable').DataTable(config);

    $(`#${id} select`).on('change', (e) => {
        let column = e.target.getAttribute('data-column');
        datatable.column(column)
            .search(e.target.value)
            .draw();
    });

    $(`#${id} tbody`).on('click', 'tr', function () {
        let data = datatable.row(this).data();
        window.location = '/tcgadmin/commande/' + data.id;
    });
};

let abandonnees = (id) => {
    let config = base_config;
    config.columns = [
        {"name": "reference", "data": "reference"},
        {
            "name": "client_nom", "data": function (data) {
                return `${data.client_nom} ${data.client_prenom} <span class="pull-right">${data.telephone}</span>`
            }
        },
        {"name": "demarche", "data": "demarche"},
        {
            "name": "montant", "data": function (data) {
                let montant = `${data.montant} €`;
                if (data.paiement) {
                    montant += `&nbsp;<span class="badge bg-light-blue">${data.paiement}</span>`;
                }
                return montant;
            }
        },
        {
            "name": "date", "data": function (data) {
                return data.date_creation;
            }
        },
        {
            "name": "relance", "data": function (data) {
                return `<input type="checkbox" disabled>`
            }
        }
    ];

    let table = $(`#${id}`).DataTable(config);

    $(`#${id} select`).on('change', (e) => {
        let column = e.target.getAttribute('data-column');
        table.column(column)
            .search(e.target.value)
            .draw();
    });

    $(`#${id} tbody`).on('click', 'tr', function () {
        let data = table.row(this).data();
        window.location = '/tcgadmin/commande/' + data.id;
    });
};