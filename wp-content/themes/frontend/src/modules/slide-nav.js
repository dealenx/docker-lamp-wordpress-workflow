
export const init = ($) => {
    const hamburger = "hamb"; //THIS IS THE NAME OF YOUR HAMBURGER BUTTON

    const slideNavName = "slideDown"; //THIS IS THE NAME OF YOUR HIDING NAVIGATION

    const rectangleName = "rect"; //THIS IS THE NAME OF YOUR LITTLE HAMBURGER RECTANGLES, MINUS THE NUMBERS (SEE CSS COMMENTS)


    //YOU MAY CHANGE ALL OF THESE IF YOU NEED TO (SEE CSS COMMENTS)
    const showRect = "showRect";
    const topRectX = "topRectX";
    const hideRectX = "hideRectX";
    const bottomRectX = "bottomRectX";
    const topNav = "topNav";

    const switchHamb = () => {
      $(`#${rectangleName}1`).toggleClass(showRect + " " + topRectX);
      $(`#${rectangleName}2`).toggleClass(showRect + " " + hideRectX);
      $(`#${rectangleName}3`).toggleClass(showRect + " " + bottomRectX);
    };

    $("#" + hamburger).click(function (
      event //CHECK IF YOUR BUTTON IS PRESSED
    ) {
      if ($(`#${slideNavName}`).attr("class") == "hidden") {
        switchHamb();

        //REVEAL YOUR NAVIGATION
        $("#" + slideNavName).toggleClass("hidden revealed");
      } else if ($("#" + slideNavName).attr("class") == "revealed") {
        //CHECKS TO SEE IF YOUR MENU IS CURRENTLY OPEN
        switchHamb();

        //HIDE YOUR NAVIGATION
        $("#" + slideNavName).toggleClass("revealed hidden");
      }
    });

    $("#" + hamburger).click(function (e) {
      e.stopPropagation();
    });

    $("#" + slideNavName).click(function (e) {
      e.stopPropagation();
    });

    $(`#${topNav}`).click(function (e) {
      e.stopPropagation();
    });

    $(document).click(function () {
      console.log("Click on document");

      if ($("#" + slideNavName).attr("class") == "revealed") {
        //SEE IF YOUR NAV IS OPEN

        switchHamb();

        //HIDE YOUR NAVIGATION
        $("#" + slideNavName).toggleClass("revealed hidden");
      }
    });

    //BONUS!!! AN OPENED NAV DISSAPEARS WHEN SCROLLING!!

    const hideNavigation = () => {
      if ($("#" + slideNavName).attr("class") == "revealed") {
        //SEE IF YOUR NAV IS OPEN
        switchHamb();

        //HIDE YOUR NAVIGATION
        $("#" + slideNavName).toggleClass("revealed hidden");
      }
    };

    $(window).scroll(function (
      event //AUTOMATICALLY HIDES THE NAV WHEN SCROLLING STARTS
    ) {
      hideNavigation();
    });

    $(window).resize(function () {
      hideNavigation();
    });

}