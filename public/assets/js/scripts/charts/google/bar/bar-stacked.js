/*=========================================================================================
    File Name: bar-stacked.js
    Description: google horizontal stacked bar chart
    ----------------------------------------------------------------------------------------
    Item Name: Robust - Responsive Admin Template
    Version: 2.1
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

// Stacked Bar chart
// ------------------------------

// Load the Visualization API and the corechart package.
google.load('visualization', '1.0', {'packages':['corechart']});

// Set a callback to run when the Google Visualization API is loaded.
google.setOnLoadCallback(loadChartData);

// Callback that creates and populates a data table, instantiates the pie chart, passes in the data and draws it.
function drawBarStacked(data) {
    // Create the data table using the fetched data.
    var chartData = google.visualization.arrayToDataTable(data);

    // Set chart options
    var options_bar_stacked = {
        height: 400,
        fontSize: 12,
        colors: ['#99B898', '#FECEA8', '#FF847C', '#E84A5F', '#474747', '#4287f5'],
        chartArea: {
            left: '5%',
            width: '90%',
            height: 350
        },
        isStacked: true,
        hAxis: {
            gridlines: {
                color: '#e9e9e9',
                count: 10
            },
            minValue: 0
        },
        legend: {
            position: 'top',
            alignment: 'center',
            textStyle: {
                fontSize: 12
            }
        }
    };

    // Instantiate and draw our chart, passing in some options.
    var bar = new google.visualization.BarChart(document.getElementById('stacked-bar-chart'));
    bar.draw(chartData, options_bar_stacked);
}

function loadChartData() {
    $.ajax({
        url: '/laporan-produksi/getChartData',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            drawBarStacked(response.data);
            console.log(response.data);
        },
        error: function (error) {
            console.log(error);
        }
    });
}

// Resize chart
// ------------------------------

$(function () {

    // Resize chart on menu width change and window resize
    $(window).on('resize', resize);
    $(".menu-toggle").on('click', resize);

    // Resize function
    function resize() {
        drawBarStacked();
    }
});
