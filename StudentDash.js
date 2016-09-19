//-----------------------------------------------------------
//Curtis Kotecki | Luke Jaynes | Clayton Tallwhiteman
//Javascript - Student Dashboard
//CREATED:09/17/2016
//MODIFLED: 09/17/2016
//-----------------------------------------------------------

function addChild(element, value, id)
{
    var node = document.createElement(element);
    var textNode = document.createTextNode(value);
    
    node.setAttribute("id", value);
    node.appendChild(textNode);
    document.getElementById(id).appendChild(node);
}

function calendarBuilder()
{
    //METHOD VARIABLES
    var calendarDate = new Date();
    var monthArray = ["January","February","March","April","May","June","July","August","September","October","November","December"];
    var currentDay = calendarDate.getDate();
    var givenDate = (calendarDate.getFullYear() + "-" + "01" + "-" + calendarDate.getMonth());
    var tempDate = new Date(givenDate);
    var firstDay = tempDate.getDay();
    
    //BUILD CALENDAR TITLE
    document.getElementById("CalendarTitle").innerHTML = monthArray[calendarDate.getMonth()] + "</br>" + calendarDate.getFullYear();
    
    //ALIGN MONTH WITH THE DAYS OF THE WEEK
    for(j = 0; j < (firstDay-2); j++)
    {
        addChild("LI", " ", "days");       
    }
    
    //BUILD NUMBER OF DAYS IN MONTH
    if(calendarDate.getMonth() == 3 | calendarDate.getMonth() == 6 | calendarDate.getMonth() == 8 | calendarDate.getMonth() == 10)
    {
        for(i = 1; i <= 30; i++)
        {
            addChild("LI", i, "days");
        }
    }
    
    else if(calendarDate.getMonth() == 1 && calendarDate.getFullYear() % 4 === 0 && calendarDate.getFullYear() % 100 !== 0 || calendarDate.getFullYear() % 400 === 0)
    {
        for(i = 1; i <= 28; i++)
        {
            addChild("LI", i, "days");
        }
    }
    
    else
    {
        for(i = 1; i <= 31; i++)
        {
            addChild("LI", i, "days");
        }
    }
    
    //SET CURRENT DATE
    document.getElementById(currentDay).setAttribute("class", "active"); 
}

calendarBuilder();
