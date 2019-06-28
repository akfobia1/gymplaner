var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons: tu dodać ja co

    if (n == (x.length -1 )) {
        document.getElementById("addBtn").style.display = "inline";
    } else {
        document.getElementById("addBtn").style.display = "none";
    }

    if (n == (x.length -1 )) {
        document.getElementById("nextBtn").style.display = "none";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }


    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
}

function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("exercise_save").submit();

        return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
}

function myFunction() {
    var x = document.getElementById("repeats").value;

}



function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
}