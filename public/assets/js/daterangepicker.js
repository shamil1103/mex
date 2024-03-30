$(document).ready(function () {
	"use strict"; // Start of use strict

	//Date Range Picker With Times
	$(".timepicker")
		.daterangepicker({
			timePicker: true,
			singleDatePicker: false,
			timePicker24Hour: true,
			timePickerIncrement: 5,
			//timePickerSeconds : true,
			locale: {
				format: "HH:mm:ss",
			},
		})
		.on("show.daterangepicker", function (ev, picker) {
			picker.container.find(".calendar-table").hide();
		});

	//Date Range Picker With Times
	$(".timepick")
		.daterangepicker({
			timePicker: true,
			singleDatePicker: false,
			timePicker24Hour: true,
			timePickerIncrement: 5,
			//timePickerSeconds : true,
			locale: {
				format: "hh:mm A",
			},
		})
		.on("show.daterangepicker", function (ev, picker) {
			picker.container.find(".calendar-table").hide();
		});

	//Single Date Picker with month and year selections
	$(".datepicker").daterangepicker({
		singleDatePicker: true,
		showDropdowns: true,
		minYear: 1970,
		maxYear: parseInt(moment().format("YYYY"), 10),
		locale: {
			format: "DD/MM/YYYY",
		},
	});

	// $(".datepicker").on('apply.daterangepicker', function(ev, picker) {
	//     $(this).val(picker.startDate.format('DD/MM/YYYY '));
	// });

	//Single Date Picker
	$(".onlydate").daterangepicker({
		singleDatePicker: true,
		locale: {
			format: "DD/MM/YYYY",
		},
	});

	//Single Date Picker
	$(".onlydateYMD").daterangepicker({
		singleDatePicker: true,
		locale: {
			format: "YYYY-MM-DD",
		},
	});

	//Single Date Picker
	$(".onlydatetime").daterangepicker({
		autoApply: true,
		timePicker: true,
		singleDatePicker: true,
		timePicker24Hour: true,
		timePickerIncrement: 5,
		timePickerSeconds: true,
		locale: {
			format: "YYYY-MM-DD HH:mm:ss",
		},
	});

	//Single Date Picker
	$(".immunizationDatePicker").daterangepicker({
		autoUpdateInput: true,
		startDate: new Date(),
		timePicker: true,
		singleDatePicker: true,
		timePicker24Hour: true,
		timePickerIncrement: 5,
		timePickerSeconds: true,
		locale: {
			format: "YYYY-MM-DD HH:mm:ss",
		},
	});

	//Single Date Picker
	$(".todayDate").daterangepicker({
		singleDatePicker: true,
		minDate: moment(),
		useCurrent: false,
		locale: {
			format: "DD/MM/YYYY",
		},
	});

	//Predefined Date Ranges
	var start = moment();
	var end = moment();

	function cb(start, end) {
		$("#reportrange, #reportrange1, .reportrange1").html(
			start.format("MMM D, YYYY") + " - " + end.format("MMM D, YYYY")
		);
	}

	function cb1(start, end) {
		$(".maxOneMonth").html(
			[start.subtract(14, "days"), moment()].format("MMM D, YYYY") +
				" - " +
				end.format("MMM D, YYYY")
		);
	}

	$("#reportrange").daterangepicker(
		{
			startDate: start,
			endDate: end,
			locale: {
				format: "MMMM D, YYYY",
			},
			ranges: {
				Today: [moment(), moment()],
				Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")],
				"Last 7 Days": [moment().subtract(6, "days"), moment()],
				"Last 30 Days": [moment().subtract(29, "days"), moment()],
				"This Month": [moment().startOf("month"), moment().endOf("month")],
				"Last Month": [
					moment().subtract(1, "month").startOf("month"),
					moment().subtract(1, "month").endOf("month"),
				],
			},
		},
		cb
	);

	//js start by mehedi
	$("#date_wise_vital").daterangepicker(
		{
			singleDatePicker: true,
			showDropdowns: true,
			autoApply: false,
			minYear: 1901,
			locale: {
				format: "YYYY-MM-DD",
			},
		},
		function (start, end, label) {}
	);

	$(".reportrange").daterangepicker(
		{
			startDate: start,
			endDate: end,
			locale: {
				format: "MMMM D, YYYY",
			},
			ranges: {
				Today: [moment(), moment()],
				Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")],
				"Last 7 Days": [moment().subtract(6, "days"), moment()],
				"Last 30 Days": [moment().subtract(29, "days"), moment()],
				"This Month": [moment().startOf("month"), moment().endOf("month")],
				"Last Month": [
					moment().subtract(1, "month").startOf("month"),
					moment().subtract(1, "month").endOf("month"),
				],
			},
		},
		cb
	);

	//js start by mehedi
	$("#date_wise_vital").daterangepicker(
		{
			singleDatePicker: true,
			showDropdowns: true,
			autoApply: false,
			minYear: 1901,
			locale: {
				format: "YYYY-MM-DD",
			},
		},
		function (start, end, label) {}
	);

	//js start by mehedi
	$("#date_wise_service").daterangepicker(
		{
			singleDatePicker: true,
			showDropdowns: true,
			autoApply: false,
			minYear: 1901,
			locale: {
				format: "YYYY-MM-DD",
			},
		},
		function (start, end, label) {}
	);

	$("#reportrange1").daterangepicker(
		{
			startDate: start,
			endDate: end,
			locale: {
				format: "MMMM D, YYYY",
			},
			ranges: {
				Today: [moment(), moment()],
				Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")],
				"Last 7 Days": [moment().subtract(6, "days"), moment()],
				"Last 30 Days": [moment().subtract(29, "days"), moment()],
				"This Month": [moment().startOf("month"), moment().endOf("month")],
				"Last Month": [
					moment().subtract(1, "month").startOf("month"),
					moment().subtract(1, "month").endOf("month"),
				],
			},
		},
		cb
	);

	$(".dateTimeRange").daterangepicker(
		{
			timePicker: true,
			startDate: start,
			endDate: end,
			locale: {
				format: "MMMM D, YYYY hh:mm A",
			},
			ranges: {
				Today: [moment(), moment()],
				Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")],
				"Last 7 Days": [moment().subtract(6, "days"), moment()],
				"Last 30 Days": [moment().subtract(29, "days"), moment()],
				"This Month": [moment().startOf("month"), moment().endOf("month")],
				"Last Month": [
					moment().subtract(1, "month").startOf("month"),
					moment().subtract(1, "month").endOf("month"),
				],
			},
		},
		cb
	);
	$(".dateTimeRange").val("");

	$(".minmax").daterangepicker(
		{
			minDate: fy_start_date,
			maxDate: fy_end_date,
			locale: {
				format: "MMMM D, YYYY",
			},
			ranges: {
				Today: [moment(), moment()],
				Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")],
				"Last 7 Days": [moment().subtract(6, "days"), moment()],
				"Last 30 Days": [moment().subtract(29, "days"), moment()],
				"This Month": [moment().startOf("month"), moment().endOf("month")],
				"Last Month": [
					moment().subtract(1, "month").startOf("month"),
					moment().subtract(1, "month").endOf("month"),
				],
			},
		},
		cb
	);

	$(".maxrange").daterangepicker(
		{
			autoApply: true,
			startDate: start,
			endDate: end,
			maxSpan: {
				days: 6,
			},
			locale: {
				format: "MMMM D, YYYY",
			},
			ranges: {
				Today: [moment(), moment()],
				Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")],
				Tomorrow: [moment().add(1, "days"), moment().add(1, "days")],
				"Last 7 Days": [moment().subtract(6, "days"), moment()],
				"Future 7 Days": [moment().add(1, "days"), moment().add(7, "days")],
			},
		},
		cb
	);

	$(".maxOneMonth").daterangepicker(
		{
			startDate: moment().subtract(15, "days"),
			endDate: end,
			minSpan: {
				days: 14,
			},
			maxSpan: {
				days: 29,
			},
			locale: {
				format: "MMMM D, YYYY",
			},
			ranges: {
				"Last 15 Days": [moment().subtract(15, "days"), moment()],
				"Last 30 Days": [moment().subtract(29, "days"), moment()],
				"This Month": [moment().startOf("month"), moment().endOf("month")],
				"Last Month": [
					moment().subtract(1, "month").startOf("month"),
					moment().subtract(1, "month").endOf("month"),
				],
			},
		},
		cb
	);

	cb(start, end);

	$("#reportrange1").val("");
	$(".reportrange1").val("");

	//Single empty Date Picker
	$(".emptyDate").daterangepicker({
		singleDatePicker: true,
		locale: {
			format: "YYYY-MM-DD",
		},
	});
	$(".emptyDate").val("");

	$(".defaultEmptyDate").daterangepicker({
		autoApply: true,
		autoUpdateInput: false,
		locale: {
			cancelLabel: "Clear",
		},
		ranges: {
			Today: [moment(), moment()],
			Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")],
			"Last 7 Days": [moment().subtract(6, "days"), moment()],
			"Last 30 Days": [moment().subtract(29, "days"), moment()],
			"This Month": [moment().startOf("month"), moment().endOf("month")],
			"Last Month": [
				moment().subtract(1, "month").startOf("month"),
				moment().subtract(1, "month").endOf("month"),
			],
		},
	});

	$(".defaultEmptyDate").on("apply.daterangepicker", function (ev, picker) {
		$(this).val(
			picker.startDate.format("MMM D, YYYY") +
				" - " +
				picker.endDate.format("MMM D, YYYY")
		);
		$("#closed_date_range").trigger("change");
	});

	$(".defaultEmptyDate").on("cancel.daterangepicker", function (ev, picker) {
		$(this).val("");
	});
});
