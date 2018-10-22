$(document).ready(function(){


	// Show GIPHY Search
	$('.insert-eaze-gif-btn').on('click', function(){
		$('#eaze-gif-wrap').show();
	});

	
	// Hide GIPHY Search and clear input, and GIF Count
	$('#gif-search-close').on('click', function(){
		// $('#eaze-gif-wrap').hide();
		eaze_clear_gifs();
	});
	

	// Add selected GIFs to WP Editor, and then clearn the input, gif count and hide GIPHY Search
	$('#gif-search-insert').on('click', function(){
		eaze_insert_gif_to_editor();
		eaze_clear_gifs();
	});



	// Trigger Search for GIFs when Enter key is pressed
	$("#gif-search-input").keypress(function(e) {
	    if(e.which == 13) {
	    	e.preventDefault();
	        eaze_run_search();
	    }else{
	    	return;
	    }
	});


	// Trigger Search for GIFs when the Search Button is pressed
	$('#gif-search-button').on('click', eaze_run_search );



	$('.gif-search-results').on('click', function(){
		var count = $('.gif-btn:checked').length;
		$("#gif-search-insert span").html( count );
	});



	// Run Search on GIPHY and display results in container 
	function eaze_run_search(){
		var searchTerms = $('#gif-search-input').val();
		if (searchTerms == "") {
	    	return;
	    }
		searchTerms = searchTerms.replace(" ", "+");
		var xhr = $.get("http://api.giphy.com/v1/gifs/search?q=" + searchTerms + "&api_key=guvXV9ZJmkEkwb3OgI88pv3u3iCOwq4b&limit=32");
		xhr.done(function(reponse) {
			var results = "";
			for(x in reponse.data){
				results += '<input type="checkbox" class="gif-btn" id="gif-' + x + '" name="' + reponse.data[x]['title'] + '" value="' + reponse.data[x]['images']['original']['url'] + '"><label for="gif-' + x + '"><img src="' + reponse.data[x]['images']['original']['url'] + '" alt="' + reponse.data[x]['title'] + '"></label>';
			};
			results += "";
			$(".gif-search-results").html( results );
			// console.log(reponse.data[x]['images']);
		});
	}



	// Add Selected GIFs to the WP Editor
	function eaze_insert_gif_to_editor() {
		var checkedGifs = [];
		var output = "";
		var i = 1;
		$(".gif-btn:checked").each(function(){
			var url = $(this).val();
			var title = $(this).attr("name");
			var item = [];
			output += '<img class="eaze-giphy-img" src="' + url + '" alt="' + title + '">';
			i++;
		});
		output += "";
		wp.media.editor.insert(output);
	}



	// Clear the Search input, GIF Count, and hide the Search
	function eaze_clear_gifs(){
		$("#eaze-gif-wrap").hide().find(".gif-btn").prop("checked", false);
		$('#gif-search-input').val("");
		$(".gif-count").html("");
	}


});