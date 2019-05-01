import Chart from 'chart.js';
import moment from 'moment/moment';

let start = moment().subtract(29, 'days');
let end = moment();

$(function () {
    if (document.getElementById("commande_evolution")) {
        initPicker('#commande_evolution button', start, end, update_evolution);
    }
    if (document.getElementById("distribution")) {
        initPicker('#distribution button', start, end, update_distribution);
    }
    // total
    if (document.getElementById('print_totaux')) {
        initPicker('#print_totaux button', start, end, update_total);
    }
});

function update_total(start, end) {
    let url = document.querySelector('#print_totaux button').getAttribute('data-ajax');
    $('#print_totaux button span').html(start.format('DD/MM/YY') + ' - ' + end.format('DD/MM/YY'));
    $.get(url, {start: start.format('DD/MM/YY'), end: end.format('DD/MM/YY')}, function (data) {
        let h3 =  document.querySelectorAll('#print_totaux h3');
        h3[0].innerHTML = data.commandes_validees;
        h3[1].innerHTML = data.commandes_abandonnees;
        h3[2].innerHTML = data.comptes_crees;
    });
}

function update_evolution(start, end) {
    $('#commande_evolution button span').html(start.format('DD/MM/YY') + ' - ' + end.format('DD/MM/YY'));

    let url = document.querySelector('#commande_evolution button').getAttribute('data-ajax');
    let ctx = document.getElementById('commande_client').getContext('2d');
    $.get(url, {start: start.format('DD/MM/YY'), end: end.format('DD/MM/YY')}, function (data) {
        let dates = data.map(el => el.date);
        let commandes = data.map(el => el.commande);
        let clients = data.map(el => el.client);

        new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: dates,
                datasets: [
                    {
                        label: 'Commandes',
                        borderColor: 'rgb(255, 99, 132)',
                        data: commandes
                    },
                    {
                        label: 'Comptes client',
                        borderColor: '#03a9f4',
                        data: clients
                    }
                ]
            },

            // Configuration options go here
            options: {
                scales: {
                    xAxes: [{
                        type: 'time',
                        time: {
                            unit: 'day',
                            displayFormats: {
                                day: 'DD MMM'
                            }
                        }
                    }]
                }
            }
        });
    });
}

function update_distribution(start, end) {
    let url = document.querySelector('#distribution button').getAttribute('data-ajax');
    $('#distribution button span').html(start.format('DD/MM/YY') + ' - ' + end.format('DD/MM/YY'));
    let com_horaire = document.getElementById('commande_horaire').getContext('2d');
    $.get(url, {start: start.format('DD/MM/YY'), end: end.format('DD/MM/YY')}, function (data) {
        let heures = data.map(el => el.heure);
        let commandes = data.map(el => el.commandes);

        new Chart(com_horaire, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: heures,
                datasets: [
                    {
                        label: 'Commandes (distribution horaire)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: commandes
                    }
                ]
            },
        });
    });
}

function initPicker(element, start, end, cb) {
    $(element).daterangepicker({
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