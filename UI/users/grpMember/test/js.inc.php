
  <!-- plugins:js -->
  <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="../../assets/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/hoverable-collapse.js"></script>
  <script src="../../assets/js/misc.js"></script>
  <script src="../../assets/js/settings.js"></script>
  <script src="../../assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../assets/js/dashboard.js"></script>
  <!-- End custom js for this page-->
   <!-- Custom js for this page-->
   <script src="../../assets/js/wizard.js"></script>
  <!-- End custom js for this page-->


  <!-- js datatables-->
  <script src="../../assets/js/data-table.js"></script>
  <!-- end of js datatables -->

  <!-- tooltips -->
  <script src="../../assets/js/tooltips.js"></script>

  <!-- top loading scripts -->

  <script src="../../assets/js/top_loader/topbar.js"></script>
    <script src="../../assets/js/top_loader/topbar.min.js"></script>    
    <script src="../../assets/js/top_loader/jquery-1.10.2.min.js"></script>
    <script src="../../assets/js/top_loader/prettify.min.js"></script>

<!-- inject js end -->
 <script>
      $(function() {
          prettyPrint()
          function resetToDefaults() {
            topbar.config({
              autoRun      : true,
              barThickness : 4,
              barColors    : {
                '0'      : '#ffa200',
                '.25'    : '#ffa200',
                '.50'    : '#ffF',
                '.75'    : '#fff',
                '1.0'    : '#fff'
              },
              shadowBlur   : 10,
              shadowColor  : 'rgba(0,   0,   0,   .6)'
            })
          }

          // Page load
          resetToDefaults()
          topbar.show()
          setTimeout(function() {
            $('#main_content').fadeIn('slow')
            topbar.hide()
          }, 6000)

          // Simple Demo
          $('#btnStartSimple').click(function() {
            resetToDefaults()
            topbar.show()
          })
          $('#btnStopSimple').click(function() {
            topbar.hide()  
          })

          // Advanced Demo
          $('#btnStartAdvanced').click(function() {
            resetToDefaults()
            topbar.config({
              autoRun      : false, 
              barThickness : 5,
              barColors    : {
                  '0'      : 'rgba(26,  188, 156, .7)',
                  '.3'     : 'rgba(41,  128, 185, .7)',
                  '1.0'    : 'rgba(231, 76,  60,  .7)'
              },
              shadowBlur   : 5,
              shadowColor  : 'rgba(0, 0, 0, .5)'
            })
            topbar.show();
            (function step() {
              setTimeout(function() {  
                if (topbar.progress('+.01') < 1) step()
              }, 16)
            })()
          })
          $('#btnStopAdvanced').click(function() {
            topbar.hide()  
          })
      })
    </script>
