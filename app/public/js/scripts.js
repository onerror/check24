$(function ($) {
	let xValues = ['01.10.2022', 200, 300, 400, 500, 600, 700, 800, 900, 1000];
	let chart = new Chart("dashboardChart", {
		type: "line",
		//data: {},
		options: {
			legend: { display: false, autoUpdateInput: true, autoApply: true }
		}
	});
	
	let renewChart = function (start, end) {
		$.ajax({
			type: 'GET',
			url: '/api/dashboard_data/' + start + '/' + end,
			dataType: "json",
			//data: { start: start, end: end },
			success: function (result, textStatus, jqXHR) {
				
				let defaultData = {
					labels: xValues,
					datasets: [{
						data: result,
						borderColor: "red",
						fill: false
					}, {
						data: [1600, 1700, 1700, 1900, 2000, 2700, 4000, 5000, 6000, 7000],
						borderColor: "green",
						fill: false
					}, {
						data: [300, 700, 2000, 5000, 6000, 4000, 2000, 1000, 200, 100],
						borderColor: "blue",
						fill: false
					}]
				};
				chart.data = defaultData;
				chart.update();
			}
		});
	}
	
	
	let dateRangePickerEl = $('input[name="stat_dates_filter"]');
	let datesAr = dateRangePickerEl.val().split(' - ')
	renewChart(datesAr[0], datesAr[1]);
	
	dateRangePickerEl.daterangepicker({
		opens: 'left'
	}, function (start, end, label) {
		renewChart(start, end);
	});
	
	
});