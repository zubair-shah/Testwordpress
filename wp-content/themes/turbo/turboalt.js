<div class="rq-car-listing-wrapper">
<#
  var wrapperClass = data.view === 'grid' ? 'rq-listing-grid-two' : 'rq-listing-list-two';
  var urlData = data.urlData;  

  function htmlDecode(input){
    const e = document.createElement('div');
    e.innerHTML = input;
    return e.childNodes.length === 0 ? "" : e.childNodes[0].nodeValue;
  }

  function rnb_generate_final_url(productBaseUrl){
    const searchUrl = window.location.href;
    const uniqueKeyValues = searchUrl.split(/[?&]/).reduce(function (a, b, c) {
      const p = b.split('='), k = p[0], v = decodeURIComponent(p[1]);
      if (!p[1]) return a;
      a[k] = a[k] || [];
      a[k].push(v);
      return a;
    }, {});

    let sep = '&';
    let finalUrl='';
    let value;

    for (let key in uniqueKeyValues) {
      value = uniqueKeyValues[key];
      finalUrl += key + "=" + value.toString()+sep;
    }

    finalUrl = '?'+finalUrl;
    finalUrl = productBaseUrl+finalUrl;

    return finalUrl;
  }
#>


<div class="rq-listing-choose {{wrapperClass}}">
  <div class="row">
    <# if(data.view === 'grid') { #>

      <# _.each(data.posts, function( post ) { #>

        <# try { #>
          <#
            const rnb_data = JSON.parse(post.meta._redq_rental_all_data);
            const productBaseUrl = post.post_link;
            const finalUrl = rnb_generate_final_url(productBaseUrl);
            const currency_symbol = rnb_data.settings.currency ? rnb_data.settings.currency : '$';
            const book_now = rnb_data.settings.global_options.book_now_btn_label ? rnb_data.settings.global_options.book_now_btn_label : 'Book Now';
            const per_unit = rnb_data.settings.global_options.price_unit ? rnb_data.settings.global_options.price_unit : '/day';
          #>
          <div class="col-md-6 col-sm-6">
            <div class="listing-single">
              <div class="listing-img">
                <img src={{ post.thumb_url }} alt="img">
                <div class="listing-image-hover">
                  <a href="{{finalUrl}}">{{book_now}}</a>
                </div>
              </div>
              <div class="listing-details-two">
                <h3 class="listing-title"><a href="{{finalUrl}}">{{post.post_title}}</a></h3>
                <div class="listing-meta-content">
                  <div class="reactiveRatingPro">
                    <# _.each([1,2,3,4,5], function( num ) { #>
                      <# if(num <= parseFloat(post.meta._wc_average_rating, 10)) { #>
                        <span class="star ratingOne"></span>
                      <# } else if((num > parseFloat(post.meta._wc_average_rating, 10)) && ((num-1 < parseFloat(post.meta._wc_average_rating, 10)))) { #>
                        <span class="star ratingHalf"></span>
                      <# } else { #>
                        <span class="star ratingNone"></span>
                      <# } #>
                    <# }) #>
                  </div>
                  <span><span class="price">{{htmlDecode(currency_symbol)}}{{post.meta._price}}</span>{{per_unit}}</span>
                </div>
                <div class="listing-attributes">
                  <#
                    const attributes = rnb_data.attributes ? rnb_data.attributes : {};
                    const highlighted_attrs = attributes && attributes.highlighted ? attributes.highlighted : [];
                  #>
                  <# if( highlighted_attrs && highlighted_attrs.length > 0) { #>
                    <ul>
                      <# _.each(highlighted_attrs, function( attribute, index ) { #>
                        <li>{{attribute.name}}<span>{{attribute.value}}</span></li>
                      <# }); #>
                    </ul>
                  <# } #>
                </div>
                <div class="listing-footer">
                  <span class="book-now-btn"><a href="{{finalUrl}}">{{book_now}}</a></span>
                </div>
              </div>
            </div>
          </div>
        <#
          }catch(e){
            console.log(e, post);
          }
        #>

      <# }); #>

    <# }else{ #>
          <# _.each(data.posts, function( post ) { #>

            <# try { #>

              <#
                const rnb_data = JSON.parse(post.meta._redq_rental_all_data);
                
                const productBaseUrl = post.post_link;
                const finalUrl = rnb_generate_final_url(productBaseUrl);
                const currency_symbol = rnb_data.settings.currency ? rnb_data.settings.currency : '$';
                const book_now = rnb_data.settings.global_options.book_now_btn_label ? rnb_data.settings.global_options.book_now_btn_label : 'Book Now';
                const per_unit = rnb_data.settings.global_options.price_unit ? rnb_data.settings.global_options.price_unit : '/day';
              #>

              <div class="col-md-12 col-sm-12">
                  <div class="listing-single list-view">
                    <div class="listing-img">
                      <img src={{ post.thumb_url }} alt="img">
                    </div>
                    <div class="listing-details">
                      <div class="listing-details-title">
                        <h3 class="car-name"><a href="{{finalUrl}}">{{post.post_title}}</a></h3>
                        <span>{{htmlDecode(currency_symbol)}}<span class="price">{{post.meta._price}}</span> {{per_unit}} </span>
                      </div>
                      <div class="reactiveRatingPro">
                        <# _.each([1,2,3,4,5], function( num ) { #>
                          <# if(num <= parseFloat(post.meta._wc_average_rating, 10)) { #>
                            <span class="star ratingOne"></span>
                          <# } else if((num > parseFloat(post.meta._wc_average_rating, 10)) && ((num-1 < parseFloat(post.meta._wc_average_rating, 10)))) { #>
                            <span class="star ratingHalf"></span>
                          <# } else { #>
                            <span class="star ratingNone"></span>
                          <# } #>
                        <# }) #>
                      </div>
                      <#
                        const attributes = rnb_data.attributes ? rnb_data.attributes : {};
                        const highlighted_attrs = attributes && attributes.highlighted ? attributes.highlighted : [];
                      #>
                      <# if( highlighted_attrs && highlighted_attrs.length > 0) { #>
                        <ul class='listing-attribute'>
                          <# _.each(highlighted_attrs, function( attribute, index ) { #>
                            <li>{{attribute.name}} <span>{{attribute.value}}</span></li>
                          <# }); #>
                        </ul>
                      <# } #>
                      <#
                        const features = rnb_data.features ? rnb_data.features : {};
                        const highlighted_features = features && features.highlighted ? features.highlighted : [];
                      #>
                      <# if( highlighted_features && highlighted_features.length > 0) { #>
                        <ul class='listing-feature'>
                          <# _.each(highlighted_features, function( feature, index ) { #>
                            <li class='list-feature-item'>{{feature.name}}</li>
                          <# }); #>
                        </ul>
                      <# } #>

                      <div class="listing-footer">
                        <div class='btn-wrapper'>
                          <span class='book-now-btn'><a href="{{finalUrl}}">{{book_now}}</a></span>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            <#
              }catch(e){
                console.log(e, post);
              }
            #>
          <# }); #>

      <# } #>
  </div>
</div>
</div>