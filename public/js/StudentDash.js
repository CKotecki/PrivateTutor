//-----------------------------------------------------------
//CURTIS KOTECKI
//JAVASCRIPT - CALENDAR
//CREATED:09/17/2016
//MODIFLED: 10/16/2016
//-----------------------------------------------------------

//CLASS LEVEL VARIABLES
var trueDate = new Date();
//trueDate.setDate();

function addChild(element, value, parentId, childId)
{
    var node = document.createElement(element);
    var textNode = document.createTextNode(value);

    node.setAttribute("id", childId);
    node.appendChild(textNode);
    document.getElementById(parentId).appendChild(node);
}

function calendarBuilder(month, year)
{
    //METHOD VARIABLES
    var calendarDate = new Date();

    //SET CURRENT MONTH VIEWING OF CALENDAR
    if(month != null)
    {
        calendarDate.setMonth(month);
    }

    if(year != null)
    {
        calendarDate.setFullYear(year);
    }

    var monthArray = ["January","February","March","April","May","June","July","August","September","October","November","December"];
    var currentDay = trueDate.getDate();
    var tempDate = new Date();
        tempDate.setMonth(calendarDate.getMonth());
        tempDate.setDate(1);
    var firstDay = tempDate.getDay();
    var daysInPrevMonth;
    var prevMonth;

    //ALIGN MONTH WITH THE DAYS OF THE WEEK
    var getLastDayPrevMonth = function(month,year)
    {
        return new Date(year, month, 0);
    };

    lastDayPrevMonth = getLastDayPrevMonth((calendarDate.getMonth()),calendarDate.getFullYear());
    lastDayThisMonth = getLastDayPrevMonth((calendarDate.getMonth()+1),calendarDate.getFullYear());
    daysInPrevMonth = getLastDayPrevMonth((calendarDate.getMonth()),calendarDate.getFullYear()).getDate();

    daysDifference = lastDayPrevMonth.getDay();
    daysInPrevMonth = daysInPrevMonth - daysDifference;

    //BUILD CALENDAR TITLE
    document.getElementById("CalendarTitle").innerHTML = monthArray[calendarDate.getMonth()] + "</br>" + calendarDate.getFullYear();

    for(j = 0; j < (firstDay); j++)
    {
        addChild("LI", daysInPrevMonth, "days", daysInPrevMonth + " prevMonth");
        daysInPrevMonth++;
    }

    //BUILD NUMBER OF DAYS IN MONTH

	//Build calender modal popup

		// Get the modal
		var modal = document.getElementById('myModal');

		// Get the button that opens the modal
		//var btn = document.getElementById("send");

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close");

		// When the user clicks on the button, open the modal
		//btn.onclick = function() {
			//modal.style.display = "block";
		//};

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
			modal.style.display = "none";
		};

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		};


    //MONTHS WITH 30 DAYS
    if(calendarDate.getMonth() == 3 | calendarDate.getMonth() == 5 | calendarDate.getMonth() == 8 | calendarDate.getMonth() == 10)
    {
        for(i = 1; i <= 30; i++)
        {
            addChild("LI", i, "days", i);
			$('#'+i).click(function(){
				modal.style.display = "block";
			});
        }
    }

    //IF LEAP YEAR
    else if(calendarDate.getMonth() == 1 && calendarDate.getFullYear() % 4 === 0 && calendarDate.getFullYear() % 100 !== 0 || calendarDate.getFullYear() % 400 === 0)
    {
        for(i = 1; i <= 28; i++)
        {
            addChild("LI", i, "days", i);
			modal.style.display = "block";
        }
    }

    //MONTHS WITH 31 DAYS
    else
    {
        for(i = 1; i <= 31; i++)
        {
            addChild("LI", i, "days", i);
			$('#'+i).click(function(){
				console.log('clicked');
				modal.style.display = "block";
			});
        }
    }

    //DAYS DIFFERENCE IS THE 7 - THE NUMERICAL VALUE OF THE DAY OF THE WEEK OF THE LAST DAY OF THE MONTH
    if(lastDayThisMonth != 0)
    {
        daysDifference = 6 - lastDayThisMonth.getDay();
    }

    for(j = 0; j < (daysDifference); j++)
    {
        addChild("LI", (j+1), "days", (j+1) + " nextMonth");
    }


    //SET CSS FOR PREVIOUS MONTH DAYS AND NEXT MONTH DAYS
    $("li[id$='prevMonth']").css("background-color", "#d9d9d9").css("color", "#999");
    $("li[id$='nextMonth']").css("background-color", "#d9d9d9").css("color", "#999");

    //SET CURRENT DATE
    if(trueDate.getMonth() == calendarDate.getMonth() && trueDate.getFullYear() == calendarDate.getFullYear())
    {
        document.getElementById(currentDay).setAttribute("class", "active");
        document.getElementById(currentDay).setAttribute("style", null);
    }

    else if(trueDate.getMonth() == calendarDate.getMonth() - 1 && trueDate.getFullYear() == calendarDate.getFullYear())
    {
        if(document.getElementById(currentDay + " prevMonth") != null)
        {
            document.getElementById(currentDay + " prevMonth").setAttribute("class", "active");
            document.getElementById(currentDay + " prevMonth").setAttribute("style", null);
        }
    }

    else if(trueDate.getMonth() == calendarDate.getMonth() + 1 && trueDate.getFullYear() == calendarDate.getFullYear())
    {
        if(document.getElementById(currentDay + " nextMonth") != null)
        {
            document.getElementById(currentDay + " nextMonth").setAttribute("class", "active");
            document.getElementById(currentDay + " nextMonth").setAttribute("style", null);
        }
    }
}

function setViewingMonth(op)
{
    var viewingMonth = trueDate.getMonth()+1;

    return {
        changeViewingMonth: function(x)
        {
            return viewingMonth += x;
        }
    };
};

function setViewingYear()
{
    var viewingYear = trueDate.getFullYear();

    return {
        changeViewingYear: function(x)
        {
            return viewingYear += x;
        }
	};
};

var temp = setViewingMonth();
var temp2 = setViewingYear();

function monthChooser(button, direction)
{
    daysList = document.getElementById("days");

    while(daysList.firstChild)
    {
        daysList.removeChild(daysList.firstChild);
    }

    if(direction == "next")
    {
        if(temp.changeViewingMonth(0) == 11)
        {
            calendarBuilder(temp.changeViewingMonth(-11), temp2.changeViewingYear(1));
        }

        else
        {
            calendarBuilder(temp.changeViewingMonth(1));
        }
    }

    else if (direction == "previous")
    {
        if(temp.changeViewingMonth(0) == 0)
        {
            calendarBuilder(temp.changeViewingMonth(11), temp2.changeViewingYear(-1));
        }

        else
        {
            calendarBuilder(temp.changeViewingMonth(-1));
        }
    }

}

calendarBuilder();

$(".calendar").on("swipeleft", function()
{
    monthChooser("arrows", "next");
});

$(".calendar").on("swiperight", function()
{
    monthChooser("arrows", "previous");
});


// Chat Box
$(function(){
$("#addClass").click(function () {
  $('#sidebar_secondary').addClass('popup-box-on');
    });

    $("#removeClass").click(function () {
  $('#sidebar_secondary').removeClass('popup-box-on');
    });
})
