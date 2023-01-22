let visa_chart = $("#chartjs-4");

$(() => {
    let width = $(visa_chart).width();
    let height = width + width * .25;
    let data = [];
    let colors = [];
    let labels = [];
    visa_chart.parent().find('.chart-data > *').each(function () {
        data.push(parseInt($(this).attr('data-percent')));
        colors.push($(this).attr('data-color'));
        labels.push($(this).attr('data-label'));
    })
    visa_chart.attr('width', width).attr('height', height);
    const visaCharComponent = new Chart(visa_chart, {
        "type": "doughnut",
        responsive: true,
        options: {
            legend: {
                display: false,
            }

        },
        maintainAspectRatio: false,
        "data": {
            "labels": labels,
            "datasets": [{
                "data": data,
                "backgroundColor": colors
            }]
        }
    });

    $('.select-form').on('click', function () {

        let review_process = $(this).attr('review-process');
        let question_process = $(this).attr('question-process');
        let document_process = $(this).attr('document-process');
        let total_process = $(this).attr('total-process');
        let application_link = $(this).attr('application-link');
        let flag = $(this).attr('flag');

        let chart_data = $('.visa-application .chart-data');
        chart_data.find('div[data-label=Documents]').attr('data-percent', document_process)
        chart_data.find('div[data-label=Questions]').attr('data-percent', question_process)
        chart_data.find('div[data-label=Review]').attr('data-percent', review_process)
        $('.qchart-circle-xll').attr('data-value', "0." + total_process + "");
        visa_chart.css('background-image',"url("+ flag +")");
        $('.selected-counry').text($(this).text());
        $('.visa-application .invite').attr('href',application_link);
        $('.document-percent').text(document_process + "%");
        $('.question-percent').text(question_process + "%");
        $('.review-percent').text(review_process + "%");
        $('.total-percent').text(total_process + "%");
        $('.chart-circle-value').text(total_process + "%");
        visaCharComponent.destroy();
        createNewVisaChar();
        chartCircle();
    })

    chartCircle();

});

function createNewVisaChar(){
    let width = $(visa_chart).width();
    let height = width + width * .25;
    let data = [];
    let colors = [];
    let labels = [];
    visa_chart.parent().find('.chart-data > *').each(function () {
        data.push(parseInt($(this).attr('data-percent')));
        colors.push($(this).attr('data-color'));
        labels.push($(this).attr('data-label'));
    })
    visa_chart.attr('width', width).attr('height', height);
     new Chart(visa_chart, {
        "type": "doughnut",
        responsive: true,
        options: {
            legend: {
                display: false,
            }

        },
        maintainAspectRatio: false,
        "data": {
            "labels": labels,
            "datasets": [{
                "data": data,
                "backgroundColor": colors
            }]
        }
    });
}

function chartCircle(){
    $('#circle').circleProgress({
        fill: {
            color: "#838EEB"
        },
        size: 150,
        startAngle: -Math.PI / 4 * 2,
        emptyFill: '#e5e9f2',
        lineCap: 'round'
    })
}
