  <!-- General JS Scripts -->
  <script src={{ asset('/assets/js/app.min.js') }}></script>
  <!-- JS Libraies -->
  <script src={{ asset('/assets/bundles/datatables/datatables.min.js') }}></script>
  <script src={{ asset('/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}></script>
  <script src={{ asset('/assets/bundles/jquery-ui/jquery-ui.min.js') }}></script>
  <script src="{{ asset('assets/bundles/chartjs/chart.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/jquery.sparkline.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/jqvmap/dist/jquery.vmap.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
  <script src="{{ asset('assets/bundles/jqvmap/dist/maps/jquery.vmap.indonesia.js') }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('assets/js/page/widget-chart.js') }}"></script>
  <script src={{ asset('/assets/js/page/datatables.js') }}></script>
  <script src={{ asset('/assets/js/page/index.js') }}></script>

  <!-- Template JS File -->
  <script src={{ asset('/assets/js/scripts.js') }}></script>
  <!-- Custom JS File -->
  <script src={{ asset('/assets/js/custom.js') }}></script>

  <script>
      // revenue chart
      var options = {
          chart: {
              height: 330,
              type: "line",
              shadow: {
                  enabled: true,
                  color: "#000",
                  top: 18,
                  left: 7,
                  blur: 10,
                  opacity: 1
              },
              toolbar: {
                  show: false
              }
          },
          colors: ["#3dc7be", "#ffa117", "#ffa100"],
          dataLabels: {
              enabled: true
          },
          stroke: {
              curve: "smooth"
          },
          series: [],
          grid: {
              borderColor: "#e7e7e7",
              row: {
                  colors: ["#f3f3f3",
                      "transparent"
                  ], // takes an array which will be repeated on columns
                  opacity: 0.0
              }
          },
          markers: {
              size: 6
          },
          xaxis: {
              categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Juillet", "Aout", "Sep", "Oct",
                  "Nov", "Dec"
              ],

              labels: {
                  style: {
                      colors: "#9aa0ac"
                  }
              }
          },
          yaxis: {
              title: {
                  text: "Income"
              },
              labels: {
                  style: {
                      color: "#9aa0ac"
                  }
              },
              min: 5,
              max: 40
          },
          legend: {
              position: "top",
              horizontalAlign: "right",
              floating: true,
              offsetY: -25,
              offsetX: -5
          }
      };

      chart = new ApexCharts(document.querySelector("#chart-rev"), options);

      chart.render();
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': '{{ csrf_token() }}'
          }
      });

      $.ajax({
          type: 'get',
          url: '{{ route('stats') }}',
          success: function(response) {
              var data = response.data;
              var tab_data = [];
              leg = '';
              //   var c = 0;
              $(data).each(function(i, j) {
                  var devise = Object.keys(j)[0];
                  tab_data.push({
                      name: devise,
                     data: Object.values(j)[0]
                  });

                  // leg += `<span class="badge text-white" style="background: ${colors[c]}; margin: 5px">${i}</span>`;
                  // c++;
              });

              //   $('#legende').html(leg);
              console.log(tab_data);
              chart.updateSeries(tab_data)




          }
      });
  </script>


  </body>

  <!-- index.html  21 Nov 2019 03:47:04 GMT -->

  </html>
