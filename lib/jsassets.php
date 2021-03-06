
<!-- Core JS Files -->
<script src="../assets/js/jquery-1.10.2.js" type="text/javascript">			</script>
<script src="../assets/js/jquery-1.12.1.min.js" type="text/javascript">	</script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--Checkbox, Radio & Switch Plugins -->
<script src="../assets/js/bootstrap-checkbox-radio-switch.js"></script>

<!--Charts Plugin -->
<script src="../assets/js/chartist.min.js"></script>

<!--Notifications Plugin-->
<script src="../assets/js/bootstrap-notify.js"></script>

<!--Google Maps Plugin-->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="../assets/js/light-bootstrap-dashboard.js"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js">		</script>
<script src="../assets/js/script.js">	</script>
<script src="../assets/js/parallax.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.20/jquery.form-validator.min.js"></script>
<script>
  $.validate({
    modules : 'location, date, security, file',
    onModulesLoaded : function() {
      $('#country').suggestCountry();
    }
  });
  // Restrict presentation length
  $('#presentation').restrictLength( $('#pres-max-length') );
</script>