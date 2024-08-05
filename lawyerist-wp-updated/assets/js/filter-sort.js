/*function sortOut() {
  function offSort() {
    console.log('off low');
    var classname = document.getElementsByClassName('fc_lpms_rating');
    var divs = [];
    for (var i = 0; i < classname.length; ++i) {
      divs.push(classname[i]);
    }
    divs.sort(function(a, b) {
      return +a.dataset.val - +b.dataset.val;
    });

    var br = document.querySelector(".spans");

    let parentDiv = document.querySelector(".product-p-listx");

    divs.forEach(function(el) {
      parentDiv.insertBefore(el, br);
    });
  };
  function offSortHigh() {
    console.log('off high');
    var classname = document.getElementsByClassName('fc_lpms_rating');
    var divs = [];
    for (var i = 0; i < classname.length; ++i) {
      divs.push(classname[i]);
    }
    divs.sort(function(a, b) {
      return +b.dataset.val - +a.dataset.val;
    });
    var br = document.querySelector(".spans");

    let parentDiv = document.querySelector(".product-p-listx");

    divs.forEach(function(el) {
      parentDiv.insertBefore(el, br);
    });
  };
  function onSort() {
    console.log('on low');
    var classname = document.getElementsByClassName('fc_lpms_rating');
    var divs = [];
    for (var i = 0; i < classname.length; ++i) {
      divs.push(classname[i]);
    }
    divs.sort((a, b) => a.id.localeCompare(b.id))
    var br = document.querySelector(".spans");

    let parentDiv = document.querySelector(".product-p-listx");

    divs.forEach(function(el) {
      parentDiv.insertBefore(el, br);
    });
  };
  function onSortHigh() {
    console.log('on high');
    var classname = document.getElementsByClassName('fc_lpms_rating');
    var divs = [];
    for (var i = 0; i < classname.length; ++i) {
      divs.push(classname[i]);
    }
    divs.sort((a, b) => b.id.localeCompare(a.id))
    var br = document.querySelector(".spans");

    let parentDiv = document.querySelector(".product-p-listx");

    divs.forEach(function(el) {
      parentDiv.insertBefore(el, br);
    });
  };
  function alphaSort() {
    console.log('alpha');
    var classname = document.querySelector('.product-p-listx .product-card');
    var divs = [];
    for (var i = 0; i < classname.length; ++i) {
      divs.push(classname[i]);
    }
    divs.sort((a, b))
    var br = document.querySelector(".spans");

    let parentDiv = document.querySelector(".product-p-listx");

    divs.forEach(function(el) {
      parentDiv.insertBefore(el, br);
    });
  }
  var filterBtn = document.querySelector('[data-acf_label="fc_lpms_rating"]');
  if ( (filterBtn).classList.contains('low') ) {
    if(filterBtn.classList.contains('off')) {
      onSort();
    } else {
      offSort();
    }
  } else if ( (filterBtn).classList.contains('high') ) {
    if(filterBtn.classList.contains('off')) {
      onSortHigh();
    } else {
      offSortHigh();
    }
  } else if ( (filterBtn).classList.contains('alphabetical') ) {
    if(filterBtn.classList.contains('off')) {
      alphaSort();
    }
  }
}*/

/*function sortOut() {
  var filterBtn = document.querySelector('[data-acf_label="fc_lpms_rating"]');
  var classname = document.getElementsByClassName('fc_lpms_rating');
  var divs = [];
  var br = document.querySelector(".spans");

  let parentDiv = document.querySelector(".product-p-listx");
  for (var i = 0; i < classname.length; ++i) {
    divs.push(classname[i]);
  }
  if(filterBtn.classList.contains('low')) {
	  divs.sort(function(a, b) {
		  return +a.dataset.val - +b.dataset.val;
	  });
  } else if(filterBtn.classList.contains('high')) {
    divs.sort((a, b) => b.id.localeCompare(a.id));

  } else if (filterBtn.classList.contains('alphabetical')) {
	  divs.sort();
  }
  divs.forEach(function(el) {
    parentDiv.insertBefore(el, br);
  });
}*/

function sortOut() {
  var filterBtn = document.querySelector('[data-acf_label="fc_lpms_rating"]');
  if(filterBtn.classList.contains('off')) {
	  var classname = document.getElementsByClassName('fc_lpms_rating');
	  var divs = [];
	  for (var i = 0; i < classname.length; ++i) {
		  divs.push(classname[i]);
	  }
	  divs.sort(function(a, b) {
		  return +a.dataset.val - +b.dataset.val;
	  });

	  var br = document.querySelector(".spans");

	  let parentDiv = document.querySelector(".product-p-listx");

	  divs.forEach(function(el) {
		  parentDiv.insertBefore(el, br);
	  });
  } else {
	  var classname = document.getElementsByClassName('fc_lpms_rating');
	  var divs = [];
	  for (var i = 0; i < classname.length; ++i) {
		  divs.push(classname[i]);
	  }
	  divs.sort((a, b) => a.id.localeCompare(b.id))
	  var br = document.querySelector(".spans");

	  let parentDiv = document.querySelector(".product-p-listx");

	  divs.forEach(function(el) {
		  parentDiv.insertBefore(el, br);
	  });
  }

}
