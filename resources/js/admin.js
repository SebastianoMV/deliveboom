require("./bootstrap");
window.axios = require('axios');

$().ready(function() {
    userFormValidator($("#userCreateForm"));
    foodFormValidator($("#foodCreateForm"));
    foodFormValidator($("#foodEditForm"));

    function userFormValidator(form) {
        form.submit(function(event) {
            let errors = false;
            $("#error-name").hide();
            $("#error-email").hide();
            $("#error-address").hide();
            $("#error-vat_number").hide();
            $("#error-image").hide();
            $("#error-city").hide();
            $("#error-password").hide();
            $("#error-tipologies").hide();

            //NOME
            if ($("#name").val().length === 0) {
                $("#error-name")
                    .show("slow")
                    .text("Il campo nome è obbligatorio")
                    .fadeOut(4000);
                $("#name").addClass("is-invalid");
                errors = true;
            } else if ($("#name").val().length < 3) {
                $("#error-name")
                    .show("slow")
                    .text("Il campo nome deve avere minimo 3 caratteri")
                    .fadeOut(4000);
                $("#name").addClass("is-invalid");
                errors = true;
            } else if ($("#name").val().length > 50) {
                $("#error-name")
                    .show("slow")
                    .text("Il campo nome può avere massimo 50 caratteri")
                    .fadeOut(4000);
                $("#name").addClass("is-invalid");
                errors = true;
            } else {
                $("#name").removeClass("is-invalid");
            }

            //EMAIL
            if ($("#email").val().length === 0) {
                $("#error-email")
                    .show("slow")
                    .text("Il campo email è obbligatorio")
                    .fadeOut(4000);
                $("#email").addClass("is-invalid");
                errors = true;
            } else if ($("#name").val().length > 255) {
                $("#error-name")
                    .show("slow")
                    .text("Il campo nome può avere massimo 255 caratteri")
                    .fadeOut(4000);
                $("#name").addClass("is-invalid");
                errors = true;
            } else {
                $("#email").removeClass("is-invalid");
            }

            //INDIRIZZO
            if ($("#address").val().length === 0) {
                $("#error-address")
                    .show("slow")
                    .text("Il campo indirizzo è obbligatorio")
                    .fadeOut(4000);
                $("#address").addClass("is-invalid");
                errors = true;
            } else if ($("#address").val().length < 4) {
                $("#error-address")
                    .show("slow")
                    .text("Il campo indirizzo deve avere minimo 4 caratteri")
                    .fadeOut(4000);
                $("#address").addClass("is-invalid");
                errors = true;
            } else if ($("#address").val().length > 50) {
                $("#error-address")
                    .show("slow")
                    .text("Il campo indirizzo può avere massimo 255 caratteri")
                    .fadeOut(4000);
                $("#address").addClass("is-invalid");
                errors = true;
            } else {
                $("#address").removeClass("is-invalid");
            }

            //CITTA
            if ($("#city").val().length === 0) {
                $("#error-city")
                    .show("slow")
                    .text("Il campo città è obbligatorio")
                    .fadeOut(4000);
                $("#city").addClass("is-invalid");
                errors = true;
            } else if ($("#city").val().length < 2) {
                $("#error-city")
                    .show("slow")
                    .text("Il campo città deve avere minimo 2 caratteri")
                    .fadeOut(4000);
                $("#city").addClass("is-invalid");
                errors = true;
            } else if ($("#city").val().length > 50) {
                $("#error-city")
                    .show("slow")
                    .text("Il campo indirizzo può avere massimo 50 caratteri")
                    .fadeOut(4000);
                $("#city").addClass("is-invalid");
                errors = true;
            } else {
                $("#city").removeClass("is-invalid");
            }

            //P-IVA
            if ($("#vat_number").val().length === 0) {
                $("#error-vat")
                    .show("slow")
                    .text("Il campo P. Iva è obbligatorio")
                    .fadeOut(4000);
                $("#vat_number").addClass("is-invalid");
                errors = true;
            } else if (
                $("#vat_number").val().length < 11 ||
                $("#vat_number").val().length > 11
            ) {
                $("#error-vat")
                    .show("slow")
                    .text("Il campo P. Iva deve avere 11 caratteri")
                    .fadeOut(4000);
                $("#vat_number").addClass("is-invalid");
                errors = true;
            } else {
                $("#vat_number").removeClass("is-invalid");
            }

            //PASSWORD
            if ($("#password").val().length === 0) {
                $("#error-password")
                    .show("slow")
                    .text("Il campo password è obbligatorio")
                    .fadeOut(4000);
                $("#password").addClass("is-invalid");
                errors = true;
            } else if ($("#password").val().length < 8) {
                $("#error-password")
                    .show("slow")
                    .text("Il campo password deve avere 8 caratteri")
                    .fadeOut(4000);
                $("#password").addClass("is-invalid");
                errors = true;
            } else {
                $("#password").removeClass("is-invalid");
            }
            //CONFERMA PASSWORD
            if ($("#password-confirm").val().length === 0) {
                $("#error-password-confirm")
                    .show("slow")
                    .text("Il campo password è obbligatorio")
                    .fadeOut(4000);
                $("#password-confirm").addClass("is-invalid");
                errors = true;
            } else if ($("#password").val().length < 8) {
                $("#error-password")
                    .show("slow")
                    .text("Il campo password deve avere 8 caratteri")
                    .fadeOut(4000);
                $("#password").addClass("is-invalid");
                errors = true;
            } else {
                $("#password").removeClass("is-invalid");
            }

            //TIPOLOGIE

            checked = $("input[type=checkbox]:checked").length;

            if (!checked) {
                $("#error-tipologies")
                    .show("slow")
                    .text("Seleziona almeno una tipologia")
                    .fadeOut(4000);
                errors = true;
            }

            if (errors === true) {
                event.preventDefault();
            }
        });
    }

    function foodFormValidator(form) {
        form.submit(function(event) {
            let errors = false;
            $("#error-name").hide();
            $("#error-description").hide();
            $("#error-image").hide();
            $("#error-price").hide();

            //NOME
            if ($("#name").val().length === 0) {
                $("#error-name")
                    .show("slow")
                    .text("Il campo nome è obbligatorio")
                    .fadeOut(4000);
                $("#name").addClass("is-invalid");
                errors = true;
            } else if ($("#name").val().length < 3) {
                $("#error-name")
                    .show("slow")
                    .text("Il campo nome deve avere minimo 3 caratteri")
                    .fadeOut(4000);
                $("#name").addClass("is-invalid");
                errors = true;
            } else if ($("#name").val().length > 50) {
                $("#error-name")
                    .show("slow")
                    .text("Il campo nome può avere massimo 50 caratteri")
                    .fadeOut(4000);
                $("#name").addClass("is-invalid");
                errors = true;
            } else {
                $("#name").removeClass("is-invalid");
            }

            //DESCRIZIONE
            if ($("#description").val().length === 0) {
                $("#error-description")
                    .show("slow")
                    .text("Il campo descrizione è obbligatorio")
                    .fadeOut(4000);
                $("#description").addClass("is-invalid");
                errors = true;
            } else if ($("#description").val().length < 3) {
                $("#error-description")
                    .show("slow")
                    .text("Il campo descrizione deve avere minimo 3 caratteri")
                    .fadeOut(4000);
                $("#description").addClass("is-invalid");
                errors = true;
            } else if ($("#description").val().length > 255) {
                $("#error-description")
                    .show("slow")
                    .text(
                        "Il campo descrizione può avere massimo 255 caratteri"
                    )
                    .fadeOut(4000);
                $("#description").addClass("is-invalid");
                errors = true;
            } else {
                $("#description").removeClass("is-invalid");
            }

            //IMMAGINE
            // if($('#image').val().length === 0){
            //     $('#error-image').show('slow').text('Il campo immagine è obbligatorio').fadeOut(4000);
            //     $('#image').addClass('is-invalid');
            //     errors = true;
            // }
            // else if($('#image').val().length < 4){
            //     $('#error-image').show('slow').text('Il campo immagine deve avere minimo 4 caratteri').fadeOut(4000);
            //     $('#image').addClass('is-invalid');
            //     errors = true;
            // }
            // else if($('#image').val().length > 50){
            //     $('#error-image').show('slow').text('Il campo immagine può avere massimo 255 caratteri').fadeOut(4000);
            //     $('#image').addClass('is-invalid');
            //     errors = true;
            // }else{
            //     $('#image').removeClass('is-invalid')
            // }

            //PREZZO
            if ($("#price").val().length === 0) {
                $("#error-price")
                    .show("slow")
                    .text("Il campo prezzo è obbligatorio")
                    .fadeOut(4000);
                $("#price").addClass("is-invalid");
                errors = true;
            } else if ($("#price").val() >= 100) {
                $("#error-price")
                    .show("slow")
                    .text("Il campo prezzo deve essere inferiore a 100€")
                    .fadeOut(4000);
                $("#price").addClass("is-invalid");
                errors = true;
            } else if (isNaN($("#price").val())) {
                $("#error-price")
                    .show("slow")
                    .text("Il campo prezzo deve contenere solo numeri")
                    .fadeOut(4000);
                $("#price").addClass("is-invalid");
                errors = true;
            } else {
                $("#price").removeClass("is-invalid");
            }

            if (errors === true) {
                event.preventDefault();
            }
        });
    }
});




const ctx = document.getElementById("myChart");
const price = document.getElementById("priceChart");

function createCharts(orders){
    const myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"],
            datasets: [{
                label: "Numero di ordini",
                data: orders,
                backgroundColor: [
                    "rgba(255, 99, 132, 0.2)",

                ],
                borderColor: [
                    "rgba(255, 99, 132, 1)",

                ],
                borderWidth: 1,
            }, ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });

};

function priceChart(total){
    const priceChart = new Chart(price, {
        type: "line",
        data: {
            labels: ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"],
            datasets: [{
                label: "Guadagno totale",
                data: total,
                backgroundColor: [
                    "rgba(99, 100, 255, 0.5)",

                ],
                borderColor: [
                    "rgba(99, 100, 255, 1)",

                ],
                borderWidth: 1,
            }, ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });

}


axios.get('/admin/statistic')
    .then(res => {
        const orders = res.data.totalOrdersForMonths;
        const total = res.data.totalSellForMonths;

        // loader.classList.add('active');
        // chartsWrapper.classList.remove('active');

        const chart = createCharts(orders);
        const price = priceChart(total);
        console.log(res.data);
    });
