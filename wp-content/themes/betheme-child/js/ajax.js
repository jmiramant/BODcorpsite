jQuery(document).ready(function() {

  jQuery(document).ready(function() {
    jQuery('#services-category-select').select2();
  });

  jQuery("#our-work-reset").click(function() {
    location.reload();
  });
  jQuery("input[name='all-post']").click(function() {
    location.reload();
  });

  var servicesID = [];

  var posttype = jQuery('#our_work_filter_section').attr("data-posttype");
  jQuery.ajax({
    url: myback.ajax_url,
    type: "POST",
    dataType: 'json',
    data: {
      action: "jsm_get_our_work_data",
      servicesID: servicesID,
      posttype: posttype
    },
  }).success(function(data) {

    if (data.result === true) {
      jQuery('#our_work_filter_section').html('').append(data.data);
      setTimeout(function() {
        jQuery("#our_work_loader").hide();
        if (jQuery(window).width() >= 768) {
          jQuery('#our_work_filter_section .main-article .article-inner').equalHeights();
        }
      }, 750);
    }
  });

  jQuery(".services-category-select").click(function() {

    jQuery("input[name='all-post']").prop("checked", false);
    ourWorkAjax();
  });

});

function ourWorkAjax() {
  jQuery("#our_work_loader").show();

  var servicesID = [];
  jQuery("input[name='vtype']:checked").each(function() {
    servicesID.push(jQuery(this).val());
  });
  var posttype = jQuery('#our_work_filter_section').attr("data-posttype");

  jQuery.ajax({
    url: myback.ajax_url,
    type: "POST",
    dataType: 'json',
    data: {
      action: "jsm_get_our_work_data",
      servicesID: servicesID,
      posttype: posttype
    },
  }).success(function(data) {

    if (data.result === true) {
      jQuery('#our_work_filter_section').html('').append(data.data);
      setTimeout(function() {
        if (jQuery(window).width() >= 768) {
          jQuery('#our_work_filter_section .main-article .article-inner').equalHeights();
        }
        jQuery("#our_work_loader").hide();
      }, 750);


      jQuery('html, body').animate({
        scrollTop: jQuery("#our_work_filter_section").offset().top
      }, 2000);

    }
  });
}

jQuery(document).on('click', 'a.page-link', function() {
  var nth = jQuery(this).attr('data-cpta');
  var lmt = jQuery(this).attr('data-cptalimit');;
  var cpta = jQuery(this).attr('data-posttype');

  var sid = [];
  jQuery("input[name='vtype']:checked").each(function() {
    sid.push(jQuery(this).val());
  });
  var posttype = jQuery('#our_work_filter_section').attr("data-posttype");

  jQuery.ajax({
    url: myback.ajax_url,
    type: "POST",
    dataType: 'json',
    data: {
      action: 'jsm_get_our_work_pagination',
      pagenumber: nth,
      postlimit: lmt,
      posttype: cpta,
      servicesID: sid,
      posttype: posttype
    },
  }).success(function(data) {

    if (data.result === true) {
      jQuery('#our_work_filter_section').html('').append(data.data);
      setTimeout(function() {
        jQuery("#our_work_loader").hide();
        if (jQuery(window).width() >= 768) {
          jQuery('#our_work_filter_section .main-article .article-inner').equalHeights();
        }
      }, 750);

      jQuery('html, body').animate({
        scrollTop: jQuery("#our_work_filter_section").offset().top
      }, 2000);

    }
  });



});
