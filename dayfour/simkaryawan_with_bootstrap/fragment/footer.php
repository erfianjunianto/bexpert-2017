	</div>
	<footer>
		<div class="footer">
			<div class="container">
				<small><i>Copyright &copy; 2017</i></small>
			</div>
		</div>
	</footer>
	<script type="text/javascript">
		$(function(){
			$('input.datepicker').each(function(){
				var datepicker = $(this);
				datepicker.bootstrapDatePicker(datepicker.data());
			});
		});
	</script>
</body>
</html>