//-----------------------------------------------------------
//CURTIS KOTECKI
//JAVASCRIPT - MENU
//CREATED:09/17/2016
//MODIFLED: 10/16/2016
//-----------------------------------------------------------

//MAIN FUNCTION
var main = function() 
{
	//GLOBAL VARIABLES
	var eventFired = false;
	
	//OPEN MENU FUNCTION
	$('.icon_menu_open').click(function() 
	{

		//MOVE MENU ICONS
		$('.icon_menu_open').animate
		({
			left: "-100px"	
		}, 200);

		$('.icon_menu_close').animate
		({
			left: "35px"	
		}, 200);

		//HIDE OPEN ICON AND REVEAL CLOSE ICON
		$('.icon_menu_open').fadeToggle(300);
		$('.icon_menu_close').fadeToggle(300);

		//REVEAL MENU
		$('.menu').animate
		({
			left: "0px"
		}, 200);
	});

	//CLOSE MENU FUNCTION
	$('.icon_menu_close').click(function()
	{
		  
		//HIDE MENU
		$('.menu').animate
		({
			left: "-100%"
		}, 200);

		//MOVE MENU ICONS
		$('.icon_menu_close').animate
		({
			left: "-100px"	
		}, 300);

		$('.icon_menu_open').animate
		({
			left: "40px"	
		}, 300);

		//HIDE CLOSE ICON AND REVEAL OPEN ICON
		$('.icon_menu_open').fadeToggle(300);
		$('.icon_menu_close').fadeToggle(300);

		//SHIFT MAIN CONTENT TO ORIGINAL POSITION
		$('.main_content').animate
		({
			left: "0px"
		}, 200);

	});
}

main();