(function($){

  $(document).ready(function(){

    if($('#members-count').length > 0) {
      $('#members-count').text('test');

      $.ajax({
        type: 'POST',
        url: script_vars.ajax_url,
        dataType: 'json',
        data: {
          'action': 'get_mailchimp_count',
        },
        success: function (res) {

          if (res.success) {
            var res = JSON.parse(res.data)
            console.log('res', res.mailchimp_count)
            $('#members-count').text(res.mailchimp_count);
          }
        },
        error: function (err) {
          console.error('err', err)
        }
      })
    }
  })
})(jQuery);
