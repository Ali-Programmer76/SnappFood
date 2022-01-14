$(document).ready(function () {
	$("#add-to-cart").on("click", function () {
		var cartCount = Number($("#shopping-cart-count").html());

		var url = $(this).attr("data-url");;
		var id = $(this).attr("data-id");
		var count = $("#count").val();
		var data = {
			id: id,
			count: count
		};

		$.ajax({
			type: "POST",
			url: url,
			data: data,
			success: function (response) {
				$("#cart-message").html(response).slideDown();
				console.log(response);
			}
		});

		$("#shopping-cart-count").html(cartCount + 1);
	});
});