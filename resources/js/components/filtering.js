(function($){
  filteringDropDowns = $('.filtering').find('select, input');
  init_query = get_current_query();

  filteringDropDowns.each(function(){
    var filteringDropDown = $(this);

    filteringDropDown.on('change', function(){
      set_url_params(get_current_query(), init_query);
    });
  });

  /**
  * Get current query
  */
  function get_current_query() {
    var query = {};

    // Go through each input in filtering container and add to query
    $('.filtering input, .filtering select').each(function() {
      var inputEl = $(this);
      var inputVal = false;

      if(inputEl.is('select')) {
        inputVal = inputEl.find('option:selected').val();
      } else {
        inputVal = inputEl.val()
      }
      if(inputVal) {
        query[inputEl.attr('name')] = inputVal;
      }
    });




    return query;
  }

  /**
  * Set url params based on given query
  */
  function set_url_params(query, init_query) {
    var base_url = script_vars.current_url;
    var base_url_depaged = script_vars.current_url_depaged;
    var url = '';

    Object.keys(query).forEach(function(key) {
      console.log(query[key])
      // Go through each query key and set/delete url param
      if (typeof query[key] != 'undefined') {
        if(url) {
          url += '&';
        }
        url+= key + '=' + query[key];
      }
    })

    if(url) {
      url = '?' + url;
    }

    // If query has changed navigate to depaged base url (reset the page)
    if (query !== init_query) {
      // TODO - determine whether we need to detect page has not changed
      base_url = base_url_depaged;
    }

    window.location =  base_url + url;
  }

  /**
  * Returns object will all url parameters
  */
  function get_all_url_params(exclude_params) {
    var params = {};

    if (location.search) {
      var parts = location.search.substring(1).split('&');

      for (var i = 0; i < parts.length; i++) {
        var nv = parts[i].split('=');
        if (!nv[0] || exclude_params.includes(nv[0])) continue;
        params[nv[0]] = nv[1] || true;
      }
    }

    return params;
  }
})(jQuery);
