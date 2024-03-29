// bootstrap
require('bootstrap');

// admin-lte
require('admin-lte/dist/js/adminlte');

// datatable
require( 'datatables.net-bs' );
import * as dt from './datatable';

// select2
require('select2');
require('select2/dist/css/select2.css');

import './dashboard'
/*import editor from './editor'*/

require('daterangepicker');
import moment from 'moment'

$(function() {

    $('[data-href]').click((e) => {
        window.location = $(e.target).closest('[data-href]').data('href');
    });

    /*if (document.querySelector('#editor1')) {
        editor('#editor1');
    }

    if (document.querySelector('textarea#cgv')) {
        editor('textarea#cgv');
    }*/

    // datatables
    dt.list('datatable');
    dt.abandonnees('datatable_abandonne');

    if (document.querySelector('#daterange') || document.querySelectorAll('.daterange')) {
        let start = moment().subtract(29, 'days');
        let end = moment();

        $('#daterange, .daterange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Aujourd\'hui': [moment(), moment()],
                'Hier': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                '7 Dernier Jours': [moment().subtract(6, 'days'), moment()],
                '30 Dernier Jours': [moment().subtract(29, 'days'), moment()],
                'Ce mois': [moment().startOf('month'), moment().endOf('month')],
                'Cette année': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            "locale": {
                "format": "MM/DD/YYYY",
                "separator": " - ",
                "applyLabel": "Valider",
                "cancelLabel": "Annuler",
                "fromLabel": "Du",
                "toLabel": "Au",
                "customRangeLabel": "Personnalisé",
                "weekLabel": "S",
                "daysOfWeek": [
                    "Di",
                    "Lu",
                    "Ma",
                    "Me",
                    "Je",
                    "Ve",
                    "Sa"
                ],
                "monthNames": [
                    "Janvier",
                    "Fevrier",
                    "Mars",
                    "Avril",
                    "Mai",
                    "Juin",
                    "Juillet",
                    "Août",
                    "Septembre",
                    "Octobre",
                    "Novembre",
                    "Decembre"
                ],
                "firstDay": 1
            },
        }, cb);

        cb(start, end);
    }
});

function cb(start, end) {
    $('#daterange span, .daterange span').html(start.format('DD/MM/YY') + ' - ' + end.format('DD/MM/YY'));
}