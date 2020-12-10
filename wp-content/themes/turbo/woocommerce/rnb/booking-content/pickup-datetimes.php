<div class="redq-date-time-picker rq-sldebar-select rnb-component-wrapper">
  <?php
  $displays = redq_rental_get_settings(get_the_ID(), 'display');
  $labels = redq_rental_get_settings(get_the_ID(), 'labels', array('pickup_date'));
  $conditions = redq_rental_get_settings(get_the_ID(), 'conditions');
  $displays = $displays['display'];
  $labels = $labels['labels'];
  $conditions = $conditions['conditions'];
  ?>
  <?php if (isset($displays['pickup_date']) && $displays['pickup_date'] !== 'closed') : ?>
    <?php
    $start_date = '';
    if (isset($_GET['datepickerrange'])) {
      $date_format = $conditions['date_format'];
      $format = 'Y-m-d';
      $exp_date = explode('-', $_GET['datepickerrange']);
      if (isset($exp_date[0])) {
        $pdate = str_replace('_', '-', $exp_date[0]);
        $date = DateTime::createFromFormat($format, $pdate);
        $start_date = $date->format($date_format);
      }
    }
    ?>
    <h6 class="rq-mt-0"><?php echo esc_attr($labels['pickup_datetime']); ?></h6>
    <div class="col-md-7 rm-pad-first">
      <span class="pick-up-date-picker">
        <i class="far fa-calendar-alt"></i>
        <input type="text" name="pickup_date" class="rq-form-control small" id="pickup-date" placeholder="<?php echo esc_attr($labels['pickup_date']); ?>" value="<?php echo esc_attr($start_date); ?>" readonly>
      </span>
    </div>
  <?php endif; ?>

  <?php if (isset($displays['pickup_time']) && $displays['pickup_time'] !== 'closed') : ?>
    <div class="col-md-5 rm-pad">
      <span class="pick-up-time-picker">
        <i class="far fa-clock"></i>
        <input type="text" name="pickup_time" class="rq-form-control small" id="pickup-time" placeholder="<?php echo esc_attr($labels['pickup_time']); ?>" value="" readonly>
      </span>
    </div>
  <?php endif; ?>
</div>

<div id="pickup-modal-body" style="display: none;">
  <h5 class="pick-modal-title"><?php echo esc_attr($labels['pickup_datetime']); ?></h5>
  <div id="mobile-datepicker"></div>
  <span id="cal-close-btn">
    <i class="fas fa-times"></i>
  </span>
  <button type="button" id="cal-submit-btn">
    <i class="far fa-check-circle"></i>
    <?php echo esc_html__('Submit', 'turbo'); ?>
  </button>
</div>