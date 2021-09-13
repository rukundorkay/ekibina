<!-- top loading bar -->

	<!-- top loading scripts -->

	<script src="../assets/js/top_loader/topbar.js"></script>
    <script src="../assets/js/top_loader/topbar.min.js"></script>    
    <script src="../assets/js/top_loader/jquery-1.10.2.min.js"></script>
    <script src="../assets/js/top_loader/prettify.min.js"></script>

<!-- inject js end -->
 <script>
      $(function() {
          prettyPrint()
          function resetToDefaults() {
            topbar.config({
              autoRun      : true,
              barThickness : 6,
              barColors    : {
                '0'      : '#ffa200',
                '.25'    : '#ffa200',
                '.50'    : '#ffa200',
                '.75'    : '#444',
                '1.0'    : '#444'
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
	<!-- end of script -->