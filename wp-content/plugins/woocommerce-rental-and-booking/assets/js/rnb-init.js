var RNB_HELPER = {};
jQuery(document).ready(function($) {
  const bookNowButtonSelector = $('.redq_add_to_cart_button');
  const rfqButtonSelector = $('.redq_request_for_a_quote');
  loadingEffect = selector => {
    $(selector).block({
      message: null,
      overlayCSS: {
        background: '#fff',
        opacity: 0.8,
      },
    });
  };

  unLoadingEffect = selector => {
    $(selector).unblock();
  };

  shouldFireAjax = dataObj => {
    const ajaxPreload = [];
    let fireAjax = false;

    if ($('#pickup-date').length > 0) {
      ajaxPreload.push('pickup_date');
    }
    if ($('#dropoff-date').length > 0) {
      ajaxPreload.push('dropoff_date');
    }

    if ($('#pickup-time').length > 0) {
      ajaxPreload.push('pickup_time');
    }
    if ($('#dropoff-time').length > 0) {
      ajaxPreload.push('dropoff_time');
    }

    const checkPreload = ajaxPreload.map(value => {
      return dataObj[value] !== '';
    });

    fireAjax = checkPreload.includes(false);

    return !fireAjax;
  };

  resetFields = () => {
    $('.rnb-error-message').remove();

    $('.inventory-qty').val(1);
    $('#pickup-date').val('');
    $('#pickup-time').val('');
    $('#dropoff-date').val('');
    $('#dropoff-time').val('');
    $('.booking-pricing-info').hide();
  };

  rnbProcessFormData = self => {
    const formData = self.serializeArray();
    const dataObj = {};
    $(formData).each(function(i, field) {
      if (field.name.endsWith('[]')) {
        const name = field.name.substring(0, field.name.length - 2);
        if (!(name in dataObj)) {
          dataObj[name] = [];
        }
        if ($.inArray(field.value, dataObj[name]) === -1) {
          dataObj[name].push(field.value);
        }
      } else {
        dataObj[field.name] = field.value;
      }
    });
    return dataObj;
  };

  rnbHandleErrorAction = () => {
    $('.date-error-message').show();
    $('.redq_add_to_cart_button').attr('disabled', 'disabled');
    $('.redq_request_for_a_quote').attr('disabled', 'disabled');
    // $('#rnbSmartwizard .actions ul li')
    //   .addClass('disabled disabledNextOnModal')
    //   .attr('aria-disabled', 'true');
  };

  rnbHandleError = response => {
    $('.rnb-error-message').remove();
    rnbHandleSuccessAction();
    if (response.error && response.error.length) {
      $('.booking-pricing-info').hide();
      const errors = response.error
        .map(err => {
          return '<li>' + err + '</li>';
        })
        .join('');
      const errorMessage = `<ul class="rnb-error-message">${errors}</ul>`;

      if (bookNowButtonSelector.length) {
        bookNowButtonSelector.before(errorMessage);
      } else {
        rfqButtonSelector.before(errorMessage);
      }

      $('html, body').animate(
        {
          scrollTop: $('.rnb-cart').offset().top,
        },
        'slow'
      );

      RNB_HELPER.rnbHandleErrorAction();
    }
  };

  rnbHandleSuccessAction = () => {
    $('.date-error-message').hide();
    $('.redq_add_to_cart_button').removeAttr('disabled', 'disabled');
    $('.redq_request_for_a_quote').removeAttr('disabled', 'disabled');
    $('#rnbSmartwizard .actions ul li')
      .removeClass('disabled disabledNextOnModal')
      .addClass('proceedOnModal')
      .attr('aria-disabled', 'false');
  };

  handleProductUnitPrice = data => {
    $(`.rnb_price_unit_${data.product_id}`).html(data.unit_price);
  };

  RNB_HELPER = {
    loadingEffect,
    unLoadingEffect,
    shouldFireAjax,
    resetFields,
    rnbProcessFormData,
    rnbHandleErrorAction,
    rnbHandleError,
    rnbHandleSuccessAction,
    handleProductUnitPrice,
  };
});
