$(function ($) {
	let dates = ['01.10.2022', 200, 300, 400, 500, 600, 700, 800, 900, 1000];
	let chart = new Chart("dashboardChart", {
		type: "line",
		options: {
			legend: { display: false, autoUpdateInput: true, autoApply: true }
		}
	});
	
	let renewChart = function (start, end) {
		$.ajax({
			type: 'GET',
			url: '/api/dashboard_data/' + start + '/' + end,
			dataType: "json",
			success: function (result, textStatus, jqXHR) {
				
				let defaultData = {
					labels: dates,
					datasets: [{
						data: [7860, 1140, 1060, 1060, 1070, 1110, 1330, 2210, 7830, 2478],
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
	
	let renewIndicators = function (start, end) {
		console.log("start:"+start+"end:"+end);
		$.ajax({
			type: 'GET',
			url: '/api/dashboard_data/' + start + '/' + end,
			dataType: "json",
			success: function (result, textStatus, jqXHR) {
				console.log(result["orders_count"]);
				$("#orders_tally").text("Orders: "+result["orders_count"]);
				$("#customers_tally").text("Customers: "+result["customers_count"]);
				$("#revenue").text("Revenue: "+result["revenue"]);
			}
		});
	}
	
	
	let dateRangePickerEl = $('input[name="stat_dates_filter"]');
	let datesAr = dateRangePickerEl.val().split(' - ')
	
	renewIndicators(new Date(datesAr[0]).valueOf(), new Date(datesAr[1]).valueOf());
	
	dateRangePickerEl.daterangepicker({
		opens: 'left'
	}, function (start, end, label) {
		renewIndicators(start, end);
	});
	
	
});