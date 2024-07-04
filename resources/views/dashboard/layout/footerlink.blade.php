<!--**********************************
        Scripts
    ***********************************-->


    <!-- Required vendors -->
    <script src="{{ asset('dashboards/Theme1/vendor/global/global.min.js') }}"></script>
	{{-- <script src="{{ asset('dashboards/Theme1/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script> --}}
	{{-- <script src="{{ asset('dashboards/Theme1/vendor/chart-js/chart.bundle.min.js') }}"></script> --}}
     <script src="{{ asset('dashboards/Theme1/js/custom.min.js') }}"></script>
	<script src="{{ asset('dashboards/Theme1/js/deznav-init.js') }}"></script>
	<script src="{{ asset('dashboards/Theme1/vendor/bootstrap-datetimepicker/js/moment.js') }}"></script>
	<script src="{{ asset('dashboards/Theme1/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
	<!-- Chart piety plugin files -->
       {{-- <script src="{{ asset('dashboards/Theme1/vendor/peity/jquery.peity.min.js') }}"></script> --}}

	<!-- Apex Chart -->
	{{-- <script src="{{ asset('dashboards/Theme1/vendor/apexchart/apexchart.js') }}"></script> --}}

	<!-- Dashboard 1 -->
	{{-- <script src="{{ asset('dashboards/Theme1/js/dashboard/dashboard-1.js') }}"></script> --}}
	<script>
		$(function () {
			$('#datetimepicker1').datetimepicker({
				inline: true,
			});
		});
	</script>
