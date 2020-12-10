<?php

//add_action('reactive_preview_template', 'turbo_listing_preview_template');

//function turbo_listing_preview_template() { ?>

<!-- <script type="text/html" id="tmpl-turboalt-template">
    <div class="rq-car-listing-wrapper">
        <#
            if(data.view === 'grid'){
                var wrapperClass = 'rq-listing-grid-two';
            }else{
                var wrapperClass = 'rq-listing-list-two';
            }

            var urlData = data.urlData;

            /**
             * Calculate Total Price
             *
             * @since 2.0.0
             * @return number
             */
            function rnb_calculate_total_price(rnb_data){
                var pricingData = rnb_data.pricings,
                    conditionalData = rnb_data.settings.conditions,
                    resources = rnb_data.resources,
                    pickup_locations = rnb_data.locations.pickup ? rnb_data.locations.pickup : '',
                    return_locations = rnb_data.locations.return ? rnb_data.locations.return : '';

                var totalDays = 1;
                var startDate;
                var endDate;
                var price;
                var cost = 0;
                var dynamicPrice = 0;

                if ('datepickerrange' in urlData ) {
                    var dates = urlData.datepickerrange,
                        splitDates = dates[0].split('-'),
                        sDate =splitDates[0],
                        eDate = splitDates[1];

                    var selected_resources = urlData.tex_resource ? urlData.tex_resource : '',
                        selected_dropoff_locations = urlData.tex_dropoff_location ? urlData.tex_dropoff_location : '',
                        selected_pickup_locations = urlData.tex_pickup_location ? urlData.tex_pickup_location : '';

                    var splitSDate= sDate.split('_'),
                        startDate = splitSDate[2]+'-'+splitSDate[0]+'-'+splitSDate[1];

                    var splitEDate= eDate.split('_'),
                        endDate = splitEDate[2]+'-'+splitEDate[0]+'-'+splitEDate[1];

                    var startTime = urlData.start_time ? urlData.start_time : '';
                    var endTime = urlData.end_time ? urlData.end_time : '';

                    var pickupDateTime = startDate + ' ' +startTime,
                        dropoffDateTime = endDate + ' ' +endTime;


                    var start = new Date(pickupDateTime),
                        end   = new Date(dropoffDateTime),
                        diff  = end.getTime() - start.getTime(),
                        hours = diff/3600000,
                        days,total_hours;

                    var singleDayBooking = conditionalData.single_day_booking;

                    if(hours < 24){
                        if(singleDayBooking == 'open'){
                            days = 1;
                        }else{
                            days = 0;
                            total_hours = Math.ceil(hours);
                        }
                    }else{
                        days = parseInt(hours/24);
                        var extra_hours = hours%24;
                        if(singleDayBooking == 'open'){
                            if(extra_hours >= parseFloat(conditionalData.max_time_late) ){
                                days = days + 1;
                            }
                        }else{
                            if(extra_hours > parseFloat(conditionalData.max_time_late) ){
                                days = days + 1;
                            }
                        }
                    }

                    totalDays = days;


                    /**
                     * Get resources
                     *
                     * @since 1.0.0
                     * @return null
                     */
                    var resource_items = resources.map( (item, index) => {
                        if(selected_resources.includes(item.resource_slug)){
                            return item;
                        }
                        return false;
                    } );

                    var payable_resources = resource_items.filter( item => item !== false);


                    /**
                     * Get Pickup Locations
                     *
                     * @since 1.0.0
                     * @return null
                     */
                    var p_locations = pickup_locations.map( (location, index) => {
                        if(selected_pickup_locations.includes(location.slug)){
                            return location;
                        }
                        return false;
                    } );

                    var payable_pickup_locations = p_locations.filter( location => location !== false);


                    /**
                     * Get Return Locations
                     *
                     * @since 1.0.0
                     * @return null
                     */
                    var r_locations = return_locations.map( (location, index) => {
                        if(selected_dropoff_locations.includes(location.slug)){
                            return location;
                        }
                        return false;
                    } );

                    var payable_return_locations = r_locations.filter( location => location !== false);


                    /**
                     * Calculate general pricing
                     *
                     * @since 1.0.0
                     * @return null
                     */
                    if (pricingData.pricing_type === 'general_pricing') {
                        var cost = rnb_calculate_general_price(cost, pricingData, totalDays, payable_resources, payable_pickup_locations, payable_return_locations);
                    }


                    /**
                    * Calculate day ranges pricing
                    *
                    * @since 1.0.0
                    * @return null
                    */
                    if (pricingData.pricing_type === 'days_range') {
                        var cost = rnb_calculate_days_range_price(cost, pricingData, totalDays, payable_resources, payable_pickup_locations, payable_return_locations);
                    }


                    /**
                    * Calculate daily pricing
                    *
                    * @since 1.0.0
                    * @return null
                    */
                    if (pricingData.pricing_type === 'daily_pricing') {
                        var cost = rnb_calculate_daily_price(cost, pricingData, totalDays, startDate, payable_resources, payable_pickup_locations, payable_return_locations);
                    }


                    /**
                    * Calculate monthly pricing
                    *
                    * @since 1.0.0
                    * @return null
                    */
                    if (pricingData.pricing_type === 'monthly_pricing') {
                        var cost = rnb_calculate_monthly_price(cost, pricingData, totalDays, startDate, payable_resources, payable_pickup_locations, payable_return_locations);
                    }
                }

                return cost;
            }

            /**
             * Calculate resources and person cost
             *
             * @since 1.0.0
             * @return number
             */
            function calculate_third_party_cost(cost, days, resources, pickup_locations, return_locations){

                console.log(resources, pickup_locations, return_locations);

                if(pickup_locations.length != 0){
                    pickup_locations.forEach(function(value, index){
                        cost = parseFloat(cost) + parseFloat(value.cost);
                    });
                }

                if(return_locations.length != 0){
                    return_locations.forEach(function(value, index){
                        cost = parseFloat(cost) + parseFloat(value.cost);
                    });
                }

                if(resources.length != 0){
                    resources.forEach(function(value, index){
                        if(value.resource_applicable == 'per_day'){
                            var resource_cost = value.resource_cost ? value.resource_cost : 0;
                            cost = parseFloat(cost) + parseInt(days)*parseFloat(resource_cost);
                        }else{
                            var resource_cost = value.resource_cost ? value.resource_cost : 0;
                            cost = parseFloat(cost) + parseFloat(resource_cost);
                        }
                    });
                }

                return cost;
            }

            /**
             * Calculate price discount
             *
             * @since 1.0.0
             * @return number
             */
            function calculatePriceDiscount(totalDays, cost, priceDiscount){

                var flag = 0;
                var discountAmount;
                var discountType;

                priceDiscount.forEach(function (value, index) {
                    if (flag === 0){
                        if (parseInt(value.min_days, 10) <= parseInt(totalDays, 10) && parseInt(value.max_days, 10) >= parseInt(totalDays, 10)){
                            discountType = value.discount_type;
                            discountAmount = value.discount_amount;
                            flag = 1;
                        }
                    }
                });

                if (discountType !== undefined && discountType && discountAmount !== undefined && discountAmount) {
                    if (discountType === 'percentage'){
                         cost = cost - (cost*discountAmount)/100;
                    } else {
                        cost = cost - discountAmount;
                    }
                }
                return cost;
            }

            /**
             * Calculate General Price
             *
             * @since 2.0.0
             * @return number
             */
            function rnb_calculate_general_price(cost, pricingData, totalDays, payable_resources, payable_pickup_locations, payable_return_locations){
                price = pricingData.general_pricing;
                cost = price * totalDays;
                dynamicPrice = price;

                var priceDiscount = pricingData.price_discount;
                cost = calculatePriceDiscount(totalDays, cost, priceDiscount);
                cost = calculate_third_party_cost(cost, totalDays, payable_resources, payable_pickup_locations, payable_return_locations);
                return cost;
            }

            /**
             * Calculate Day Ranges Price
             *
             * @since 2.0.0
             * @return number
             */
            function rnb_calculate_days_range_price(cost, pricingData, totalDays, payable_resources, payable_pickup_locations, payable_return_locations){
                var daysRangePricing = pricingData.days_range;
                price = daysRangePricing[daysRangePricing.length - 1].range_cost;
                var flag = 0;

                daysRangePricing.forEach(function (value, index) {
                    if (flag === 0) {
                        if (value.cost_applicable === 'per_day') {
                            if (parseInt(value.min_days, 10) <= parseInt(totalDays, 10) && parseInt(value.max_days, 10) >= parseInt(totalDays, 10)) {
                                cost = parseFloat(value.range_cost) * parseInt(totalDays, 10);
                                flag = 1;
                                dynamicPrice = parseFloat(value.range_cost);
                            }
                        } else {
                            if (parseInt(value.min_days, 10) <= parseInt(totalDays, 10) && parseInt(value.max_days, 10) >= parseInt(totalDays, 10)) {
                                cost = parseFloat(value.range_cost);
                                flag = 1;
                                dynamicPrice = parseFloat(value.range_cost);
                            }
                        }
                    }
                });
                var priceDiscount = pricingData.price_discount;
                cost = calculatePriceDiscount(totalDays, cost, priceDiscount);
                cost = calculate_third_party_cost(cost, totalDays, payable_resources, payable_pickup_locations, payable_return_locations);
                return cost;
            }

            /**
             * Calculate Daily Price
             *
             * @since 2.0.0
             * @return number
             */
            function rnb_calculate_daily_price(cost, pricingData, totalDays, startDate, payable_resources, payable_pickup_locations, payable_return_locations){
                if (totalDays > 0) {
                    const dailyPricingPlan = pricingData.daily_pricing;
                    let day;

                    for (let i = 0; i < parseInt(totalDays, 10); i++) {
                        if (i === 0) {
                            const start = new Date(startDate);
                            day = start.getDay();
                        } else {
                            const tomorrow = new Date(startDate);
                            const nextDay = tomorrow.setDate(tomorrow.getDate() + i);
                            const convertDate = new Date(nextDay);
                            day = convertDate.getDay();
                        }
                        switch (day) {
                            case 0:
                                if (dailyPricingPlan.sunday !== '') {
                                    cost = cost + parseFloat(dailyPricingPlan.sunday);
                                    if (i === 0) {
                                        dynamicPrice = parseFloat(dailyPricingPlan.sunday);
                                    }
                                } else {
                                    cost = cost + 0;
                                }
                                break;
                            case 1:
                                if (dailyPricingPlan.monday !== '') {
                                    cost = cost + parseFloat(dailyPricingPlan.monday);
                                    if (i === 0) {
                                        dynamicPrice = parseFloat(dailyPricingPlan.monday);
                                    }
                                } else {
                                    cost = cost + 0;
                                }
                                break;
                            case 2:
                                if (dailyPricingPlan.tuesday !== '') {
                                    cost = cost + parseFloat(dailyPricingPlan.tuesday);
                                    if (i === 0) {
                                        dynamicPrice = parseFloat(dailyPricingPlan.tuesday);
                                    }
                                } else {
                                    cost = cost + 0;
                                }
                                break;
                            case 3:
                                if (dailyPricingPlan.wednesday !== '') {
                                    cost = cost + parseFloat(dailyPricingPlan.wednesday);
                                    if (i === 0) {
                                        dynamicPrice = parseFloat(dailyPricingPlan.wednesday);
                                    }
                                } else {
                                    cost = cost + 0;
                                }
                                break;
                            case 4:
                                if (dailyPricingPlan.thursday !== '') {
                                    cost = cost + parseFloat(dailyPricingPlan.thursday);
                                    if (i === 0) {
                                        dynamicPrice = parseFloat(dailyPricingPlan.thursday);
                                    }
                                } else {
                                    cost = cost + 0;
                                }
                                break;
                            case 5:
                                if (dailyPricingPlan.friday !== '') {
                                    cost = cost + parseFloat(dailyPricingPlan.friday);
                                    if (i === 0) {
                                        dynamicPrice = parseFloat(dailyPricingPlan.friday);
                                    }
                                } else {
                                    cost = cost + 0;
                                }
                                break;
                            case 6:
                                if (dailyPricingPlan.saturday !== '') {
                                    cost = cost + parseFloat(dailyPricingPlan.saturday);
                                    if (i === 0) {
                                        dynamicPrice = parseFloat(dailyPricingPlan.saturday);
                                    }
                                } else {
                                    cost = cost + 0;
                                }
                                break;
                            default:
                                break;
                        }
                    }
                    const priceDiscount = pricingData.price_discount;
                    cost = calculatePriceDiscount(totalDays, cost, priceDiscount);
                    cost = calculate_third_party_cost(cost, totalDays, payable_resources, payable_pickup_locations, payable_return_locations);
                    return cost;
                }
            }

            /**
             * Calculate Monthly Price
             *
             * @since 2.0.0
             * @return number
             */
            function rnb_calculate_monthly_price(cost, pricingData, totalDays, startDate, payable_resources, payable_pickup_locations, payable_return_locations) {
                if (totalDays > 0) {
                    const monthlyPricingPlan = pricingData.monthly_pricing;
                    let month;

                    for (let i = 0; i < parseInt(totalDays, 10); i++) {
                        if (i === 0) {
                            const start = new Date(startDate);
                            month = start.getMonth();
                        } else {
                            const tomorrow = new Date(startDate);
                            const nextDay = tomorrow.setDate(tomorrow.getDate() + i);
                            const convertDate = new Date(nextDay);
                            month = convertDate.getMonth();
                        }
                        //End if-else statement
                        switch (month) {
                            case 0:
                                if (monthlyPricingPlan.january !== '') {
                                    cost = cost + parseFloat(monthlyPricingPlan.january);
                                    if (i === 0) {
                                        dynamicPrice = parseFloat(monthlyPricingPlan.january);
                                    }
                                } else {
                                    cost = cost + 0;
                                }
                                break;
                            case 1:
                                if (monthlyPricingPlan.february !== '') {
                                    cost = cost + parseFloat(monthlyPricingPlan.february);
                                    if (i === 0) {
                                        dynamicPrice = parseFloat(monthlyPricingPlan.february);
                                    }
                                } else {
                                    cost = cost + 0;
                                }
                                break;
                            case 2:
                                if (monthlyPricingPlan.march !== '') {
                                    cost = cost + parseFloat(monthlyPricingPlan.march);
                                    if (i === 0) {
                                        dynamicPrice = parseFloat(monthlyPricingPlan.march);
                                    }
                                } else {
                                     cost = cost + 0;
                                }
                                break;
                            case 3:
                                if (monthlyPricingPlan.april !== '') {
                                    cost = cost + parseFloat(monthlyPricingPlan.april);
                                    if (i === 0) {
                                        dynamicPrice = parseFloat(monthlyPricingPlan.april);
                                    }
                                } else {
                                    cost = cost + 0;
                                }
                                break;
                            case 4:
                                if (monthlyPricingPlan.may !== '') {
                                    cost = cost + parseFloat(monthlyPricingPlan.may);
                                    if (i === 0) {
                                        dynamicPrice = parseFloat(monthlyPricingPlan.may);
                                    }
                                } else {
                                    cost = cost + 0;
                                }
                                break;
                            case 5:
                                if (monthlyPricingPlan.june !== '') {
                                    cost = cost + parseFloat(monthlyPricingPlan.june);
                                    if (i === 0) {
                                        dynamicPrice = parseFloat(monthlyPricingPlan.june);
                                    }
                                } else {
                                    cost = cost + 0;
                                }
                                break;
                            case 6:
                                if (monthlyPricingPlan.july !== '') {
                                    cost = cost + parseFloat(monthlyPricingPlan.july);
                                    if (i === 0) {
                                        dynamicPrice = parseFloat(monthlyPricingPlan.july);
                                    }
                                } else {
                                    cost = cost + 0;
                                }
                                break;
                            case 7:
                                if (monthlyPricingPlan.august !== '') {
                                    cost = cost + parseFloat(monthlyPricingPlan.august);
                                    if (i === 0) {
                                        dynamicPrice = parseFloat(monthlyPricingPlan.august);
                                    }
                                } else {
                                    cost = cost + 0;
                                }
                                break;
                            case 8:
                                if (monthlyPricingPlan.september !== '') {
                                    cost = cost + parseFloat(monthlyPricingPlan.september);
                                    if (i === 0) {
                                        dynamicPrice = parseFloat(monthlyPricingPlan.september);
                                    }
                                } else {
                                    cost = cost + 0;
                                }
                                break;
                            case 9:
                                if (monthlyPricingPlan.october !== '') {
                                    cost = cost + parseFloat(monthlyPricingPlan.october);
                                    if (i === 0) {
                                        dynamicPrice = parseFloat(monthlyPricingPlan.october);
                                    }
                                } else {
                                    cost = cost + 0;
                                }
                                break;
                            case 10:
                                if (monthlyPricingPlan.november !== '') {
                                    cost = cost + parseFloat(monthlyPricingPlan.november);
                                    if (i === 0) {
                                        dynamicPrice = parseFloat(monthlyPricingPlan.november);
                                    }
                                } else {
                                    cost = cost + 0;
                                }
                                break;
                            case 11:
                                if (monthlyPricingPlan.december !== '') {
                                    cost = cost + parseFloat(monthlyPricingPlan.december);
                                    if (i === 0) {
                                        dynamicPrice = parseFloat(monthlyPricingPlan.december);
                                    }
                                } else {
                                    cost = cost + 0;
                                }
                                break;
                            default:
                                break;
                        }
                        //End Switch
                    }
                    const priceDiscount = pricingData.price_discount;
                    cost = calculatePriceDiscount(totalDays, cost, priceDiscount);
                    cost = calculate_third_party_cost(cost, totalDays, payable_resources, payable_pickup_locations, payable_return_locations);
                }
                return cost;
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
                    <#
                        const rnb_data = JSON.parse(post.meta._redq_rental_all_data);
                        console.log(rnb_data);
                        let totalCost = rnb_calculate_total_price(rnb_data);
                        totalCost = totalCost !== 0 ? totalCost : post.meta._price;
                        const productBaseUrl = post.post_link;
                        const finalUrl = rnb_generate_final_url(productBaseUrl);
                    #>
                    <div class="col-md-6 col-sm-6">
                        <div class="listing-single">
                            <div class="listing-img">
                                <img src={{ post.thumb_url }} alt="img">
                                <div class="listing-image-hover">
                                    <a href="{{finalUrl}}">Book Now</a>
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
                                    <span><span class="price">${{post.meta._price}}</span>/Day</span>
                                </div>
                                <div class="listing-attributes">
                                    <#
                                        const attributes = rnb_data.attributes ? rnb_data.attributes : {};
                                        const highlighted_attrs = attributes.highlighted ? attributes.highlighted : false;
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
                                    <span class="book-now-text"><span class="price"><span class='total-text'>Total </span>${{parseFloat(totalCost).toFixed(2)}}</span></span>
                                    <span class="book-now-btn"><a href="{{finalUrl}}">Book Now</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <# }); #>
                <# }else{ #>
                    <# _.each(data.posts, function( post ) { #>
                    <#
                        const rnb_data = JSON.parse(post.meta._redq_rental_all_data);
                        let totalCost = rnb_calculate_total_price(rnb_data);
                        totalCost = totalCost !== 0 ? totalCost : post.meta._price;
                        const productBaseUrl = post.post_link;
                        const finalUrl = rnb_generate_final_url(productBaseUrl);
                       // post.post_link = finalUrl;
                    #>
                    <div class="col-md-12 col-sm-12">
                        <div class="listing-single">
                            <div class="listing-img">
                                <img src={{ post.thumb_url }} alt="img" pagespeed_url_hash="744447902" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                            </div>
                            <div class="listing-details">
                              <div class="listing-details-title">
                                <h3 class="car-name"><a href="{{post.post_link}}">{{post.post_title}}</a></h3>
                                  <span >$
                                        <span class="price">{{post.meta._price}}</span> / day
                                    </span>
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
                                    <span class='rating-text'>8 Comments</span>
                                </div>
                                <#
                                    const attributes = rnb_data.attributes ? rnb_data.attributes : {};
                                    const highlighted_attrs = attributes.highlighted ? attributes.highlighted : false;
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
                                    const highlighted_features = features.highlighted ? features.highlighted : false;
                                #>
                                <# if( highlighted_features && highlighted_features.length > 0) { #>
                                <ul class='listing-feature'>
                                    <# _.each(highlighted_features, function( feature, index ) { #>
                                    <li class='list-feature-item'>{{feature.name}}</li>
                                    <# }); #>
                                </ul>
                                <# } #>

                                <div class="listing-footer">
                                    <span>
                                        Total Cost <span class="price">{{parseFloat(totalCost).toFixed(2)}}</span> $
                                    </span>
                                    <div class='btn-wrapper'>
                                        <span class='details-btn'><a href="{{post.post_link}}">Details</a></span>
                                        <span class='book-now-btn'><a href="{{post.post_link}}">Book Now</a></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <# }); #>
                <# } #>
            </div>
        </div>
    </div>

</script> -->

<?php //} ?>
