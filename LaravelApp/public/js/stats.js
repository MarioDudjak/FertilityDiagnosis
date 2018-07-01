var data = "{{ $tests->toJson() }}";
var data = JSON.parse(data.replace(/&quot;/g,'"'));

var yValues = [];
var xValues = [];
var title;
$(document).on('click', '#submitStats', function () {
    yValues = [];
    xValues = [];
    title = "";
    d3.select("#svg").remove();
    var select_number = $("#variableSelect").val();

    switch (parseInt(select_number)) {
        case 1:
            title = "% of Normal outputs to season of analysis";
            var i = 0;
            var j = 0;
            for (i = 0; i < 4; i++) {
                var normal = 0;
                var altered = 0;
                for (j = 0; j < data.length; j++) {

                    if ((parseFloat(data[j]["season"]) == -1) && (i == 0)) {
                        if (parseInt(data[j]["result"]) == 0) normal++;
                        if (parseInt(data[j]["result"]) == 1) altered++;
                    }
                    if ((parseFloat(data[j]["season"]) == -0.33) && (i == 1)) {
                        if (parseInt(data[j]["result"]) == 0) normal++;
                        if (parseInt(data[j]["result"]) == 1) altered++;
                    }
                    if ((parseFloat(data[j]["season"]) == 0.33) && (i == 2)) {
                        if (parseInt(data[j]["result"]) == 0) normal++;
                        if (parseInt(data[j]["result"]) == 1) altered++;
                    }
                    if ((parseFloat(data[j]["season"]) == 1) && (i == 3)) {
                        if (parseInt(data[j]["result"]) == 0) normal++;
                        if (parseInt(data[j]["result"]) == 1) altered++;
                    }
                }
                if ((normal + altered) == 0) yValues[i] = 0;
                else
                    yValues[i] = ((normal) / (normal + altered)) * 100;
                if (i == 0) xValues[i] = "Winter";
                if (i == 1) xValues[i] = "Spring";
                if (i == 2) xValues[i] = "Summer";
                if (i == 3) xValues[i] = "Fall";
            }

            break;
        case 2:
            title = "% of Normal outputs to age of examinee"
            var i = 18;
            var j = 0;
            for (i = 0; i < 19; i++) {
                var normal = 0;
                var altered = 0;
                for (j = 0; j < data.length; j++) {
                    if (Math.round(parseFloat(data[j]["age"]) * 18 + 18) == (i + 18)) {
                        if (parseInt(data[j]["result"]) == 0) normal++;
                        if (parseInt(data[j]["result"]) == 1) altered++;
                    }
                }
                if ((normal + altered) == 0) yValues[i] = 0;
                else
                    yValues[i] = ((normal) / (normal + altered)) * 100;
                xValues[i] = i + 18;
            }

            break;
        case 3:
            title = "% of Normal outputs to history of childish diseases";
            var i = 0;
            var j = 0;
            for (i = 0; i < 2; i++) {
                var normal = 0;
                var altered = 0;
                for (j = 0; j < data.length; j++) {

                    if ((parseFloat(data[j]["disease"]) == 0) && (i == 0)) {
                        if (parseInt(data[j]["result"]) == 0) normal++;
                        if (parseInt(data[j]["result"]) == 1) altered++;
                    }
                    if ((parseFloat(data[j]["disease"]) == 1) && (i == 1)) {
                        if (parseInt(data[j]["result"]) == 0) normal++;
                        if (parseInt(data[j]["result"]) == 1) altered++;
                    }
                }
                if ((normal + altered) == 0) yValues[i] = 0;
                else
                    yValues[i] = ((normal) / (normal + altered)) * 100;
                if (i == 0) xValues[i] = "Had disease";
                if (i == 1) xValues[i] = "No diseases";
            }

            break;
        case 4:
            title = "% of Normal outputs to history of serious trauma";
            var i = 0;
            var j = 0;
            for (i = 0; i < 2; i++) {
                var normal = 0;
                var altered = 0;
                for (j = 0; j < data.length; j++) {

                    if ((parseFloat(data[j]["trauma"]) == 0) && (i == 0)) {
                        if (parseInt(data[j]["result"]) == 0) normal++;
                        if (parseInt(data[j]["result"]) == 1) altered++;
                    }
                    if ((parseFloat(data[j]["trauma"]) == 1) && (i == 1)) {
                        if (parseInt(data[j]["result"]) == 0) normal++;
                        if (parseInt(data[j]["result"]) == 1) altered++;
                    }
                }
                if ((normal + altered) == 0) yValues[i] = 0;
                else
                    yValues[i] = ((normal) / (normal + altered)) * 100;
                if (i == 0) xValues[i] = "Had trauma";
                if (i == 1) xValues[i] = "No trauma";
            }
            break;
        case 5:
            title = "% of Normal outputs to history of surgical interventions";
            var i = 0;
            var j = 0;
            for (i = 0; i < 2; i++) {
                var normal = 0;
                var altered = 0;
                for (j = 0; j < data.length; j++) {

                    if ((parseFloat(data[j]["surgery"]) == 0) && (i == 0)) {
                        if (parseInt(data[j]["result"]) == 0) normal++;
                        if (parseInt(data[j]["result"]) == 1) altered++;
                    }
                    if ((parseFloat(data[j]["surgery"]) == 1) && (i == 1)) {
                        if (parseInt(data[j]["result"]) == 0) normal++;
                        if (parseInt(data[j]["result"]) == 1) altered++;
                    }

                }
                if ((normal + altered) == 0) yValues[i] = 0;
                else
                    yValues[i] = ((normal) / (normal + altered)) * 100;
                if (i == 0) xValues[i] = "Had surgery";
                if (i == 1) xValues[i] = "No surgeries";
            }
            break;
        case 6:
            title = "% of Normal outputs to history of high fevers";
            var i = 0;
            var j = 0;
            for (i = 0; i < 3; i++) {
                var normal = 0;
                var altered = 0;
                for (j = 0; j < data.length; j++) {

                    if ((parseFloat(data[j]["fevers"]) == -1) && (i == 0)) {
                        if (parseInt(data[j]["result"]) == 0) normal++;
                        if (parseInt(data[j]["result"]) == 1) altered++;
                    }
                    if ((parseFloat(data[j]["fevers"]) == 1) && (i == 1)) {
                        if (parseInt(data[j]["result"]) == 0) normal++;
                        if (parseInt(data[j]["result"]) == 1) altered++;
                    }
                    if ((parseFloat(data[j]["fevers"]) == 0) && (i == 2)) {
                        if (parseInt(data[j]["result"]) == 0) normal++;
                        if (parseInt(data[j]["result"]) == 1) altered++;
                    }
                }
                if ((normal + altered) == 0) yValues[i] = 0;
                else
                    yValues[i] = ((normal) / (normal + altered)) * 100;
                if (i == 0) xValues[i] = "Within three months";
                if (i == 1) xValues[i] = "More than three months ago";
                if (i == 2) xValues[i] = "No fevers in last year";
            }
            break;
        case 7:
            title = "% of Normal outputs to history of alcohol consumption";
            var i = 0;
            var j = 0;
            for (i = 0; i < 5; i++) {
                var normal = 0;
                var altered = 0;
                for (j = 0; j < data.length; j++) {

                    if ((parseFloat(data[j]["alcohol"]) == 0.2) && (i == 0)) {
                        if (parseInt(data[j]["result"]) == 0) normal++;
                        if (parseInt(data[j]["result"]) == 1) altered++;
                    }
                    if ((parseFloat(data[j]["alcohol"]) == 0.4) && (i == 1)) {
                        if (parseInt(data[j]["result"]) == 0) normal++;
                        if (parseInt(data[j]["result"]) == 1) altered++;
                    }
                    if ((parseFloat(data[j]["alcohol"]) == 0.6) && (i == 2)) {
                        if (parseInt(data[j]["result"]) == 0) normal++;
                        if (parseInt(data[j]["result"]) == 1) altered++;
                    }
                    if ((parseFloat(data[j]["alcohol"]) == 0.8) && (i == 3)) {
                        if (parseInt(data[j]["result"]) == 0) normal++;
                        if (parseInt(data[j]["result"]) == 1) altered++;
                    }
                    if ((parseFloat(data[j]["alcohol"]) == 1) && (i == 4)) {
                        if (parseInt(data[j]["result"]) == 0) normal++;
                        if (parseInt(data[j]["result"]) == 1) altered++;
                    }
                }
                if ((normal + altered) == 0) yValues[i] = 0;
                else
                    yValues[i] = ((normal) / (normal + altered)) * 100;
                if (i == 0) xValues[i] = "Several times a day";
                if (i == 1) xValues[i] = "Every day";
                if (i == 2) xValues[i] = "Several times a week";
                if (i == 3) xValues[i] = "Once a week";
                if (i == 4) xValues[i] = "Hardly ever or never";
            }
            break;
        case 8:
            title = "% of Normal outputs to history of smoking habits";
            var i = 0;
            var j = 0;
            for (i = 0; i < 3; i++) {
                var normal = 0;
                var altered = 0;
                for (j = 0; j < data.length; j++) {

                    if ((parseFloat(data[j]["smoking"]) == -1) && (i == 0)) {
                        if (parseInt(data[j]["result"]) == 0) normal++;
                        if (parseInt(data[j]["result"]) == 1) altered++;
                    }
                    if ((parseFloat(data[j]["smoking"]) == 1) && (i == 1)) {
                        if (parseInt(data[j]["result"]) == 0) normal++;
                        if (parseInt(data[j]["result"]) == 1) altered++;
                    }
                    if ((parseFloat(data[j]["smoking"]) == 0) && (i == 2)) {
                        if (parseInt(data[j]["result"]) == 0) normal++;
                        if (parseInt(data[j]["result"]) == 1) altered++;
                    }
                }
                if ((normal + altered) == 0) yValues[i] = 0;
                else
                    yValues[i] = ((normal) / (normal + altered)) * 100;
                if (i == 0) xValues[i] = "Never";
                if (i == 1) xValues[i] = "Occasionaly";
                if (i == 2) xValues[i] = "Daily";
            }
            break;
        case 9:
            title = "% of Normal outputs to number of hours spent sitting"
            var i = 0;
            var j = 0;
            for (i = 0; i < 17; i++) {
                var normal = 0;
                var altered = 0;
                for (j = 0; j < data.length; j++) {

                    if (Math.round(parseFloat(data[j]["sitting"]) * 16) == i) {
                        if (parseInt(data[j]["result"]) == 0) normal++;
                        if (parseInt(data[j]["result"]) == 1) altered++;
                    }
                }
                if ((normal + altered) == 0) yValues[i] = 0;
                else
                    yValues[i] = ((normal) / (normal + altered)) * 100;
                xValues[i] = i;
            }
            break;
    }
    barchart();
});

function barchart() {
    d3.select("#barchart").remove();

    var margin = {
        top: 40,
        bottom: 40,
        left: 40,
        right: 40
    };
    var width = 800 - margin.left - margin.right;
    var height = 500 - margin.top - margin.bottom;
    var barPadding = 4;
    var barWidth = width / yValues.length - barPadding;

    var x = d3.scale.ordinal().domain(d3.range(xValues.length)).rangeRoundBands([0, width]);

    var y = d3.scale.linear().domain([0, d3.max(yValues)]).range([height, 0]);

    var svg = d3.select("body").select("#chart")
        .append("svg")
        .attr("id", "svg")
        .attr("width", "800")
        .attr("height", "550")

    var tip = d3.tip()
        .attr('class', 'd3-tip')
        .offset([-10, 0])
        .html(function (d, i) {
            return "<strong>Percentage:</strong> <span style='color:red'>" + Math.round(yValues[i] * 100) / 100 + "</span>";
        })


    svg.call(tip);

    var g = svg.append("g").attr("id", "barchart")

        .attr("transform", "translate(" + margin.left + "," + (margin.top + 20) + ")");



    var xAxis = d3.svg.axis()
        .scale(x)
        .orient("bottom")
        .tickFormat(function (d, i) {
            return xValues[i];
        });

    var yAxis = d3.svg.axis()
        .scale(y)
        .orient("left")
        .ticks(10);


    g.append("g")
        .attr("class", "axis axis--x")
        .attr("transform", "translate(0," + height + ")")
        .call(xAxis)
        .attr("fill", "#fcfdfe")
        .selectAll("text")
        .attr("font-size", 15)
        .style("text-anchor", "middle");

    g.append("g")
        .attr("class", "axis axis--y")
        .call(yAxis)
        .attr("fill", "#fcfdfe")
        .append("text")
        .attr("fill", "#fcfdfe")
        .attr("transform", "rotate(-90)")
        .attr("y", 6)
        .attr("dy", "0.71em")
        .attr("text-anchor", "end")
        .text("Percentage of normal outputs");


    var barchart = g.selectAll("rect")
        .data(yValues)
        .enter()
        .append("rect")
        .attr("class", "bar")
        .attr("x", function (d, i) {
            return x(i);
        })
        .attr("y", y).attr("height", function (d) {
            return height - y(d);
        })
        .on('mouseover', tip.show)
        .on('mouseout', tip.hide)
        .attr("width", barWidth)
        .attr("id", function (d, i) {
            return "rect" + i
        });

    g.append("text")
        .attr("x", (width / 2))
        .attr("y", margin.top - 70)
        .attr("text-anchor", "middle")
        .attr("fill", "#fcfdfe")
        .attr("font-size", 30)
        .text(title);
}