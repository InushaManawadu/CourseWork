var SearchView = Backbone.View.extend({
	events: {
		"click #btnSearch": "search",
	},

	initialize: function () {
		this.input = this.$("#search");
	},

	search: function () {
		var keyword = this.input.val();
		if (keyword) {
			$.ajax({
				url: "search",
				method: "POST",
				dataType: "json",
				data: {
					keyword: keyword,
				},
				success: function (response) {
					if (response.status) {
						this.render(response.data);
					} else {
						alert("No Results Found.");
					}
				}.bind(this),
			});
		} else {
			alert("Search field is empty.");
		}
	},

	render: function (data) {
		var modalBody = $("#search-modal .modal-body");
		modalBody.empty();
		for (var i = 0; i < data.length; i++) {
			var question = data[i];
			var html =
				'<div class="card mb-3">' +
				'<div class="card-body">' +
				'<h5 class="card-title">' +
				question.title +
				"</h5>" +
				'<p class="card-text"><b>Description:</b> ' +
				question.description +
				"</p>" +
				'<p class="card-text"><b>Category:</b> ' +
				question.category +
				"</p>" +
				"</div>" +
				"</div>";
			modalBody.append(html);
		}
		$("#search-modal").modal("show");
	},
});

var searchView = new SearchView({
	el: "form",
});
