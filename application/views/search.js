var SearchView = Backbone.View.extend({
	el: "#search-container",

	events: {
		"click #btnSearch": "searchQuestion",
	},

	initialize: function () {
		this.input = this.$("#search");
	},

	searchQuestion: function () {
		var searchInput = this.input.val();
		var question = new Question({ search_input: searchInput });
		question.save();
	},
});

var Question = Backbone.Model.extend({
	url: "search",
	defaults: {
		question: "",
	},
	parse: function (response) {
		return response;
	},
});
