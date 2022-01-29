"use strict";

$(function () {
    getMorris("line", "line_chart");
});

function getMorris(type, element) {
    const months = [
        { name: "January", index: 1 },
        { name: "February", index: 2 },
        { name: "March", index: 3 },
        { name: "April", index: 4 },
        { name: "May", index: 5 },
        { name: "June", index: 6 },
        { name: "July", index: 7 },
        { name: "August", index: 8 },
        { name: "September", index: 9 },
        { name: "October", index: 10 },
        { name: "November", index: 11 },
        { name: "December", index: 12 },
    ];

    $.ajax({
        url: "/commandes",
        success: function (response) {
            $(response).each(function (index, value) {});
        },
    });

    if (type === "line") {
        Morris.Line({
            element: element,
            data: [
                { y: "1", a: 100, b: 90 },
                { y: "2", a: 75, b: 65 },
                { y: "3", a: 50, b: 40 },
                { y: "4", a: 75, b: 65 },
                { y: "5", a: 50, b: 40 },
                { y: "6", a: 75, b: 65 },
                { y: "7", a: 100, b: 90 },
            ],
            xkey: "y",
            ykeys: ["a",  ],
            labels: ["Lundi", "Mardi", 'Mercredi', "Jeudi", 'Vendredi', 'Samedi', 'Dimanche'],
            pointSize: 3,
            fillOpacity: 0,
            pointStrokeColors: ["#222222", "#cccccc", "#f96332"],
            behaveLikeLine: true,
            gridLineColor: "#e0e0e0",
            lineWidth: 2,
            hideHover: "auto",
            lineColors: ["#222222", "#20B2AA", "#f96332"],
            resize: true,
        });
    }
}
