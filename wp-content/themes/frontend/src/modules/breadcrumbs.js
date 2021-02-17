export const init = ($) => {
    const breadcrumbs = "breadcrumbs";
    
    const switchBreadcrumbs = () => {
        if ($(window).scrollTop() >= 50) {
          $(`#${breadcrumbs}`).addClass("scrolled");
        } else {
          $(`#${breadcrumbs}`).removeClass("scrolled");
        }
      };
  
      $(window).scroll(function () {
        switchBreadcrumbs();
      });
  
      $(window).load(function () {
        switchBreadcrumbs();
      });

}