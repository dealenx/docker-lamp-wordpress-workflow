import $ from "jquery";

import {init as initSlideNav} from "./modules/slide-nav"
import {init as initBreadcrumbs} from "./modules/breadcrumbs"
import {init as initSearch} from "./modules/search"

export default (function () {
  const init = function () { 
    initSlideNav($);
    initBreadcrumbs($);
    initSearch($);
  };
  return {
    init
  };
})();
