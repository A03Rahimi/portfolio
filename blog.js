// function to add ordinals to month days given the day in string in form n or 0n
function addOrdinals(day){
    day = +day; // remove leading zeroes
    switch (day)
    {
        case 1:
        case 21:
            return (day + "st");
        case 2:
        case 22:
            return (day + "nd");
        case 3:
        case 23:
            return (day + "rd");
        default:
            return (day+"th")
    }
}

// function to convert the month number given in string in forms n or 0n to corresponding month name
function monthNumToName(num) {
    var name;
    switch (num)
    {
        case "1":
        case "01":
            name = "January"
            break;
        case "2":
        case "02":
            name = "February"
            break;
        case "3":
        case "03":
            name = "March"
            break;
        case "4":
        case "04":
            name = "April"
            break;
        case "5":
        case "05":
            name = "May"
            break;
        case "6":
        case "06":
            name = "June"
            break;
        case "7":
        case "07":
            name = "July"
            break;
        case "8":
        case "08":
            name = "August"
            break;
        case "9":
        case "09":
            name = "September"
            break;
        case "10":
            name = "October"
            break;
        case "11":
            name = "November"
            break;
        case "12":
            name = "December"
            break;
    }
    return name;
}


// makes all posts visible 
function setAllVisible(){
    const blogs = document.getElementsByClassName('blogs');
    for (let i = 0; i < blogs.length; i++) {
        blogs[i].removeAttribute("hidden"); 
    }
    console.log("All set to visible")
}

// changes posts visibility based on input month name and year the blog is posted
function viewByDate(year,month){
    const blogs = document.getElementsByClassName('blogs'); 
    const years = [];
    const months = [];

    for (let i = 0; i < blogs.length; i++) {
        let splitted = blogs[i].getAttribute('name').split(' '); // previously, the name attribute is set to the date of each post in source format (database format)
        let dateInSrcFormat = splitted[0];  // made date and time separate and keep date for later use
        let YearMonthDay =  dateInSrcFormat.split('-'); // make year-month-day separate

        years[i] = YearMonthDay[0];
        months[i] = monthNumToName(YearMonthDay[1]);
    }

    if (year == "All" && month == "All")
    {
        setAllVisible();
    } 
    else
    {
        setAllVisible(); // reset the page (set all to visible) to hide the posts that are meant ot be hidden
        if (year == "All") // only check for month
        {
            for (let i = 0; i < blogs.length; i++) {
                if (month != months[i]){
                    console.log(month);
                    console.log(months[i]);
                    blogs[i].setAttribute("hidden", true);
                }
            }
        }
        else if (month == "All") // only check for year
        {
            for (let i = 0; i < blogs.length; i++) {
                if (year != years[i]){
                    blogs[i].setAttribute("hidden", true);
                }
            }
        }
        else // check for both year and month
        {
            for (let i = 0; i < blogs.length; i++) {
                if (!(year == years[i] && month == months[i])){
                    blogs[i].setAttribute("hidden", true);
                }
            }
        }
    }
}

// event handling for clicking 'reload' button to refresh based on entered dates
document.getElementById('reload').addEventListener("click", () => {
    viewByDate(document.getElementById('years').value,document.getElementById('months').value);
});

// convert date and time to the format specified in the coursework:
let dates = document.getElementsByClassName('time');
for (let i = 0; i < dates.length; i++) {
    document.getElementsByClassName('blogs')[i].setAttribute('name', dates[i].innerHTML); // set value date to name attribute for sections of blogs in the source format for later use
    
    let splitted= dates[i].innerHTML.split(' ');

    let dateInSrcFormat = splitted[0];
    let timeInSourceFormat = splitted[1];

    let time = timeInSourceFormat.substring(0,5); // final time to print

    let YearMonthDay =  dateInSrcFormat.split('-');
    let year = YearMonthDay[0]; // final year to print
    let month = monthNumToName(YearMonthDay[1]); // final month to print (month name)
    let day = addOrdinals(YearMonthDay[2]); // final year to print

    dates[i].innerHTML = ("🕑 " + day+ " " + month + " " + year + ", " + time + " UK Time");
}
