
$(document).ready(function(){
    $.ajax({
         url:'monthlyChart.php',
         method:'GET',
        //   dataType: 'JSON',
         success:function(data){
             //call pie chart
             pieChart();
             busytime();
             dailyBarChart();
            console.log(data);//recive json file
            // var data= '[{"month":"January","total":"152"},{"month":"February","total":"179"},{"month":"March","total":"229"},{"month":"April","total":"267"},{"month":"May","total":"114"}]'
            data = JSON.parse(data)
            var monthName = [];
            var sumSales = [];
            var years = [];

            for(var i in data){
                monthName.push(data[i].month);
                sumSales.push(data[i].total);
                years.push(data[i].year);

            }
            
            year = years[0];
            var chartdata={
                labels: monthName,
                datasets : [{
                    label: year +' Sales Sum',
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1,
                    data: sumSales
                }]
            };
            
            var bar = $('#barChart');
            var barGraph = new Chart(bar, {
                type: 'bar',
                data: chartdata
            });
         },
        error: function(data){
            console.log(data);
        }
       
        });
        
     });
     
     //famous food
    function pieChart(){
        $.ajax({
            url:'itemsPieChart.php',
            method:'GET',
            success:function(data){
                console.log(data);//recive json file
               // var data= '[{"month":"January","total":"152"},{"month":"February","total":"179"},{"month":"March","total":"229"},{"month":"April","total":"267"},{"month":"May","total":"114"}]'
               data = JSON.parse(data)
               var pName = [];
               var totalSoldQty = [];
               var years = [];
   
         
               for(i=0; i<5; i++){
                pName.push(data[i].product_name);
                totalSoldQty.push(data[i].totalQuantity);
                years.push(data[i].year);

            }
               
            //    year = years[0];
               var chartdata={
                    labels: pName,
                   datasets: [{
                    data: totalSoldQty,
                    backgroundColor: [
                      'rgba(255, 99, 132, 0.5)',
                      'rgba(54, 162, 235, 0.5)',
                      'rgba(255, 206, 86, 0.5)',
                      'rgba(75, 192, 192, 0.5)',
                      'rgba(153, 102, 255, 0.5)',
                      'rgba(255, 159, 64, 0.5)'
                    ],
                    borderColor: [
                      'rgba(255,99,132,1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(153, 102, 255, 1)',
                      'rgba(255, 159, 64, 1)'
                    ],
                  }],
              
                  // These labels appear in the legend and in the tooltips when hovering different arcs
                  labels:  pName
               };
               
               var pie = $('#pieChart');
               var pieGraph = new Chart(pie, {
                   type: 'pie',
                   data: chartdata
               });
            },
           error: function(data){
               console.log(data);
           }
          
           });
    }
    function busytime(){
        $.ajax({
            url:'dailyScatterChart.php', //busy time
            method:'GET',
            success:function(data){
                console.log(data);//recive json file
               // var data= '[{"month":"January","total":"152"},{"month":"February","total":"179"},{"month":"March","total":"229"},{"month":"April","total":"267"},{"month":"May","total":"114"}]'
               data = JSON.parse(data)
               var sales = [];
               var times = [];
               var pointColors = [];
               var borderColors = [];
              
   
               for(var i in data){
                   sales.push(data[i].total);
                   times.push(data[i].time);
                   pointColors.push('rgba(255, 99, 132, 0.2)');
                   borderColors.push('rgba(255, 99, 132, 1)');

   
               }

               var chartdata={
                labels: data.map(o => o.time),
                datasets: [{
                    label: 'Sales',
                    data: data.map(d => d.total),
                    
                    
                    backgroundColor: pointColors,
                    
                    borderColor: borderColors,
                   
                    pointRadius: 3,
                    pointHoverRadius: 3
                  }]
               };
               
               var scatter = $('#scatterChart');
               var scatterGraph = new Chart(scatter, {
                   type: 'scatter',
                   data: chartdata,
                   options: {
                    responsive: true,
                    legend: {
                        display: false
                    },
                    scales: {      
                      xAxes: [{     
                        type: 'time',
                        time: {
                          parser: 'HH:mm',
                          unit: 'hour',
                          stepSize: 1,
                          displayFormats: {
                            hour: 'HH:mm'   
                          },          
                          tooltipFormat: 'HH:mm'          
                        },
                        ticks: {
                          min: '10:00',
                          max: '20:00',
                          callback: (value, index) => index == 24 ? '24:00' : value
                        }
                      }],
                      yAxes: [{
                        ticks: {
                          beginAtZero: true,
                          stepSize: 5
                        }
                      }]
                    }
                  }
               });
            },
           error: function(data){
               console.log(data);
           }
          
           });
    }

    function dailyBarChart(){
      $.ajax({
        url:'dailyBarChart.php',
        method:'GET',
        success:function(data){
           console.log(data);//recive json file
           data = JSON.parse(data)
           var daynames = [];
           var sales = [];
           

           for(var i in data){
               daynames.push(data[i].dayname);
               sales.push(data[i].total);

           }
           

          
           var chartdata={ //1=Sun, 2=Tue..
               labels: ['Sun','Mon','Tue','Wed','Thur','Fri','Sat'],
               datasets : [{
                   label: year +' Sales Sum',
                   backgroundColor: [
                       'rgba(255, 99, 132, 0.2)',
                       'rgba(54, 162, 235, 0.2)',
                       'rgba(255, 206, 86, 0.2)',
                       'rgba(75, 192, 192, 0.2)',
                       'rgba(153, 102, 255, 0.2)',
                       'rgba(255, 159, 64, 0.2)'
                   ],
                   borderColor: [
                       'rgba(255, 99, 132, 1)',
                       'rgba(54, 162, 235, 1)',
                       'rgba(255, 206, 86, 1)',
                       'rgba(75, 192, 192, 1)',
                       'rgba(153, 102, 255, 1)',
                       'rgba(255, 159, 64, 1)'
                   ],
                   borderWidth: 1,
                   data: sales
               }]
           };
           
           var bar = $('#daily');
           var barGraph = new Chart(bar, {
               type: 'bar',
               data: chartdata
           });
        },
       error: function(data){
           console.log(data);
       }
      
       });
       
      }
    
// });//document)

   // const bar = document.getElementById('barChart').getContext('2d');
    // const barChart = new Chart(bar, {
    //     type: 'bar',
    //     data: {
    //         labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    //         datasets: [{
    //             label: '# of Votes',
    //             data: [12, 19, 3, 5, 2, 3],
    //             backgroundColor: [
    //                 'rgba(255, 99, 132, 0.2)',
    //                 'rgba(54, 162, 235, 0.2)',
    //                 'rgba(255, 206, 86, 0.2)',
    //                 'rgba(75, 192, 192, 0.2)',
    //                 'rgba(153, 102, 255, 0.2)',
    //                 'rgba(255, 159, 64, 0.2)'
    //             ],
    //             borderColor: [
    //                 'rgba(255, 99, 132, 1)',
    //                 'rgba(54, 162, 235, 1)',
    //                 'rgba(255, 206, 86, 1)',
    //                 'rgba(75, 192, 192, 1)',
    //                 'rgba(153, 102, 255, 1)',
    //                 'rgba(255, 159, 64, 1)'
    //             ],
    //             borderWidth: 1
    //         }]
    //     },
    //     options: {
    //         scales: {
    //             y: {
    //                 beginAtZero: true
    //             }
    //         }
    //     }
    // });

    // const pie = document.getElementById('pieChart').getContext('2d');
    // const pieChart = new Chart(pie, {
    //     type: 'pie',
    //     data: {
    //         labels: ["Jan", "Feb", "Mar", "Apr", "May"],
    //         datasets: [{
    //             label: '# of Votes',
    //             data: [12, 19, 3, 5, 2, 3],
    //             backgroundColor: [
    //                 'rgba(255, 99, 132, 0.2)',
    //                 'rgba(54, 162, 235, 0.2)',
    //                 'rgba(255, 206, 86, 0.2)',
    //                 'rgba(75, 192, 192, 0.2)',
    //                 'rgba(153, 102, 255, 0.2)',
    //                 'rgba(255, 159, 64, 0.2)'
    //             ],
    //             borderColor: [
    //                 'rgba(255, 99, 132, 1)',
    //                 'rgba(54, 162, 235, 1)',
    //                 'rgba(255, 206, 86, 1)',
    //                 'rgba(75, 192, 192, 1)',
    //                 'rgba(153, 102, 255, 1)',
    //                 'rgba(255, 159, 64, 1)'
    //             ],
    //             borderWidth: 1
    //         }]
    //     },
    //     options: {
    //         scales: {
    //             y: {
    //                 beginAtZero: true
    //             }
    //         }
    //     }
    // });



    // const timeLine = document.getElementById('lineChart').getContext('2d');
    // const timeLineChart = new Chart(timeLine, {
    //     type: 'line',
    //     data: {
    //         labels: ['AM 9 ','PM 12 ','PM 3','PM 6','PM 9'],
    //         datasets: [{
    //             label: 'Hour of Day',
    //             data: [12, 19, 3, 5, 2, 3],
    //             backgroundColor: [
    //                 'rgba(255, 99, 132, 0.2)',
    //                 'rgba(54, 162, 235, 0.2)',
    //                 'rgba(255, 206, 86, 0.2)',
    //                 'rgba(75, 192, 192, 0.2)',
    //                 'rgba(153, 102, 255, 0.2)',
    //                 'rgba(255, 159, 64, 0.2)'
    //             ],
    //             borderColor: [
    //                 'rgba(255, 99, 132, 1)',
    //                 'rgba(54, 162, 235, 1)',
    //                 'rgba(255, 206, 86, 1)',
    //                 'rgba(75, 192, 192, 1)',
    //                 'rgba(153, 102, 255, 1)',
    //                 'rgba(255, 159, 64, 1)'
    //             ],
    //             borderWidth: 1
    //         }]
    //     },
    //     options: {
    //         scales: {
    //             x: {
    //                 type: 'time',
    //                 time: {
    //                 displayFormats: {
    //                     hour: 'hh'
    //                 }
    //                 }
                    
    //             },
    //             y: {
    //                 beginAtZero: true
    //             },
                
    //         }
    //     }
    // });





















// new Chart('barChart', {
//     type: 'bar',
//     data: {
//       labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
//       datasets: [{
//         label: 'My data',
//         backgroundColor: '#af90ca',
//         data: [12, 15, 14, 16, 18]
//       }]
//     },
//     options: {
//       responsive: true,
//       scales: {
//         yAxes: [{
//           ticks: {
//             beginAtZero: true
//           }
//         }]
//       }
//     }
//   });
  