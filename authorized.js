// event handling for preventing submition and ask user to confirm if they want to clear the form
document.getElementById("clear").addEventListener("click", function(event){
    var isUserSure = window.confirm('Are you sure you want to clear this form?');
    if (isUserSure) {
        console.log("User pressed 'ok'");
        event.preventDefault()
        document.getElementById("title").value = "";
        document.getElementById("blogBody").value = "";

        // styling reset:
        document.getElementById("blogBody").classList.remove("notFilledHighlight");
        document.getElementById("title").classList.remove("notFilledHighlight");
        // below is for styling reset alternative method:
    /*
        document.getElementById("title").style.backgroundColor = 'white';
        document.getElementById("blogBody").style.backgroundColor = 'white';
    */
   
    } else{
        console.log("User pressed 'Cancel'");
        event.preventDefault()
    }
});


// event handling for preventing submission if a field is empty and highlighting the corresponding field
document.getElementById("post").addEventListener("click", function(event){
        var titleText = document.getElementById("title").value;
        var blogBodyText = document.getElementById("blogBody").value;
        console.log("User input for title: " + titleText);
        console.log("User input for blog body: " + blogBodyText);


        // highlight unfilled sections 
        // * commented sections are alternative ways. they could be replaced with their above line and keep the functionality same.
        if (titleText == ""){
            event.preventDefault();
            document.getElementById("title").classList.add("notFilledHighlight");
            // document.getElementById("title").style.backgroundColor = 'yellow';
        } else{
            document.getElementById("title").classList.remove("notFilledHighlight");
            // document.getElementById("title").style.backgroundColor = 'white';
        }

        if (blogBodyText == ""){
            event.preventDefault();
            document.getElementById("blogBody").classList.add("notFilledHighlight");
            // document.getElementById("blogBody").style.backgroundColor = 'yellow';
        } else{
            document.getElementById("blogBody").classList.remove("notFilledHighlight");
            // document.getElementById("blogBody").style.backgroundColor = 'white';
        }
}); 
