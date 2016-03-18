jQuery(function($){		
	// first example
	$("#topnav").treeview({
		collapsed: true,
		unique: true,
		persist: "location"
	});
 
});

jQuery(document).ready(function(){
	jQuery("#red").treeview({
		animated: "fast",
		collapsed: true,
		control: "#treecontrol"
	});
}); 