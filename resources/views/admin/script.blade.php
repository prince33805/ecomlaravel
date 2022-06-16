
      </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="/admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="/admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="/admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="/admin/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/admin/assets/js/off-canvas.js"></script>
    <script src="/admin/assets/js/hoverable-collapse.js"></script>
    <script src="/admin/assets/js/misc.js"></script>
    <script src="/admin/assets/js/settings.js"></script>
    <script src="/admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page --> 
    <script src="/admin/assets/js/dashboard.js"></script>
    
    {{-- <script>
      const ctx = document.getElementById("myChart").getContext('2d');
      
      const myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels:[ echo json_encode($label) ],
          datasets: [{
            label: 'food Items',
            data: ['2','3'],
            backgroundColor: ["#0074D9", "#FF4136", "#2ECC40",
            "#FF851B", "#7FDBFF", "#B10DC9", "#FFDC00",
            "#001f3f", "#39CCCC", "#01FF70", "#85144b",
            "#F012BE", "#3D9970", "#111111", "#AAAAAA"]
          }]
        },
      });
    </script> --}}

    <script>
      // Initialize and add the map
      function initMap() {
        // The location of Uluru
        const cmu = { lat: 18.8047 , lng: 98.9550 };
        // The map, centered at cmu
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 14,
          center: cmu,
        });
        // The marker, positioned at cmu
        const marker = new google.maps.Marker({
          position: cmu,
          map: map,
        });
      }
      window.initMap = initMap;
    </script>

    <script async
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBotTQcJdyr4M9QPq3vMsBcloMPRKreNAA&callback=initMap">
    </script>

    <!-- End custom js for this page -->