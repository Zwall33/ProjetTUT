
//Tableau de 10 valeurs (Température et Humidité)
var Temperature = new Array(10);
var Humidite = new Array(10);

var inter = 5000

function ShiftTab(t){
    for (i = 0; i < 9; i++) {
        t[i]=t[i+1];  
    }
}

function GetTime(){
    
    var d = new Date();
    var t = d.getTime()/inter;
    var tamp = parseInt(t);
    tamp = t - tamp;
    tamp = tamp.toPrecision(3);
    t = t -tamp;
    t = t * inter;

    return t;
}

function InitTab(){
    for (i = 0; i < 10; i++) {
        Temperature[i]=Math.round(Math.random() * 45)
    }
    for (i = 0; i < 10; i++) {
        Humidite[i]=Math.round(Math.random() * 100)
    }
}

function dataserie(car){
    var data = [],
    time = GetTime(),
    i;

    if(car == 'T') {
    	ShiftTab(Temperature)
        for (i = -9; i <= 0; i += 1) {
            data.push([time + i * inter,Temperature[i+9]]);
        }
    }
    if(car == 'H') {
    	ShiftTab(Humidite)
        for (i = -9; i <= 0; i += 1) {
            data.push([time + i * inter,Humidite[i+9]]);
        }
    }
    document.getElementById("temp").innerHTML = Temperature[9] + '°C ';
    document.getElementById("humi").innerHTML = Humidite[9] + '%';
    return data;
}

InitTab();

$(function () {
    var myChart = Highcharts.chart('container', {
        chart: {
            backgroundColor: '#313031',
            type: 'spline',
            marginRight: 85,
            events: {
            load: function () {
                
                var series = this.series[0];
                var series1 = this.series[1];
                setInterval(function () {
                    			ShiftTab(Temperature);
                    			ShiftTab(Humidite);
                    			var x =GetTime(), // current time
                    			y = Math.round(Math.random() * 100),
                    			z= Math.round(Math.random() * 45);
                    			Temperature[9] = z;
                    			Humidite[9] = y;
                    			series.addPoint([x, z], false, true);
                    			series1.addPoint([x, y], true, true);
                    			document.getElementById("temp").innerHTML = z + '°C';
                    			document.getElementById("humi").innerHTML = y + '%';
                			}, inter);
            	}
        	}
            
        },

        time: {
        	useUTC: false
    	},

/////////*----Legend----*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        legend: {
            itemStyle: {                /* couleur et format du texte des legendes */
                color: '#e0e0e3',
                fontWeight: 'bold'
            },
            itemHoverStyle: {
            	color: '#b8b8b8'
        	}
        },
        
/////////*----Titre Graphique----*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        title: {
            text: 'Stat Info Jardin Connecté',
            align: 'center',
            style: {
                color: '#e0e0e3',
                fontWeight: 'bold'
            }
        },

/////////*----Exporter Graphique----*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        exporting: {
        	enabled: false  //enlève l'option pour exporter le graphique en format pdf, png ...
    	},

/////////*----Axe des abscisse----*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        xAxis: {
        	type: 'datetime',
        	tickPixelInterval: 10,
        	labels: {
            	format: '{value:%H:%M:%S}',
            }
    	},

        tooltip: {
            xDateFormat: '%d/%m/%Y <br> %H:%M:%S',
            style: {
                color: '#e0e0e3',  
            },
            borderColor: '#b8b8b8',
            backgroundColor: '#313031',
            shared : true
        },

/////////*----Axe des ordonné----*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
        yAxis: [
        /*----Axe des ordonné N°1----*/
        			{
            			lineColor: '#038197',
            			lineWidth: 3,
            			labels: {
                			style: {
                    			color: '#038197',
                			},
                			format : '{value} °C'
            			},
            		title: {
                		text: 'Température',
            
            			style: {
               				color: '#038197',
                			fontWeight : 'bold'
            			}
        			}
        			},
        
        /*----Axe des ordonné N°2  03b9ff----*/
        			{
            			opposite: true,
           				lineColor: '#91B22F',
            			lineWidth: 3,
           				labels: {
                			style: {
                    			color: '#91B22F',    
                			},
                			format : '{value} %'
        				},
            			title: {
                			text: 'Humidité',
            
                		style: {
                    		color: '#91B22F',
                    		fontWeight : 'bold'
                		}
            			}
        			}
        ],

/////////*----Séies----*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        series: [

        /*----Séies N°1----*/
        {
            name: 'Température',
            yAxis: 0,
            data: dataserie('T'),
            shadow: {
                width: 5,
                opacity: 0.2,
                color: '#038197'
            },
            color: '#038197',
            tooltip:{
                valueSuffix : '°C'
            }
        },

        /*----Séies N°2----*/        
        {
            name: 'Humidité',
            yAxis: 1,
            data: dataserie('H'),
            shadow: {
                width: 5,
                opacity: 0.2,
                color: '#91B22F'
            },
            color: '#91B22F',            
            tooltip:{
                valueSuffix : '%'
            }
        }]
    });
});