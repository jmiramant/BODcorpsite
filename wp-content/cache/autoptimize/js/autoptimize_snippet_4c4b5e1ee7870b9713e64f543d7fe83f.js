jQuery.fn.equalHeights=function(){var max_height=0;$(this).each(function(){max_height=Math.max($(this).height(),max_height);});$(this).each(function(){$(this).height(max_height);});};(function($){$.fn.equalHeights=function(){var max_height=0;$(this).each(function(){max_height=Math.max($(this).height(),max_height);});$(this).each(function(){$(this).height(max_height);});};function setEqualHeight(){if(jQuery(window).width()>=768){jQuery('.where-we-work-block ul').equalHeights();jQuery('.phase-1-row .icon_box').equalHeights();jQuery('.phase-2-row .icon_box').equalHeights();jQuery('.phase-3-row .icon_box').equalHeights();jQuery('#approach-section .icon_box').equalHeights();jQuery('.entry-content .leaders .desc_wrapper').equalHeights();}}
$(document).ready(function(){setEqualHeight();jQuery('.page-template-template-case-study  .main-article .article-inner').equalHeights();jQuery('.page-template-template-case-study  .detail-recent-box  .detail-recent-box-inner').equalHeights();});$(window).resize(function(){setEqualHeight();});})(jQuery);jQuery(document).ready(function($){if(jQuery('.service-custom-tab').length){jQuery('body').on('click',".menu-item a",function(){var url=jQuery(this).attr("href");var id=url.substring(url.lastIndexOf('#')+1);if(id=='visualization'){setTimeout(function(){jQuery(".service-custom-tab #phase-2").trigger("click");},1000);jQuery('html, body').animate({scrollTop:jQuery(".service-custom-tab").offset().top-100},2000);}else if(id=='analytics'){setTimeout(function(){jQuery(".service-custom-tab #phase-3").trigger("click");},1000);jQuery('html, body').animate({scrollTop:jQuery(".service-custom-tab").offset().top-100},2000);}else if(id=='transformation'){setTimeout(function(){jQuery(".service-custom-tab #phase-1").trigger("click");},1000);jQuery('html, body').animate({scrollTop:jQuery(".service-custom-tab").offset().top-100},2000);}});var url=jQuery(location).attr("href");var id=url.substring(url.lastIndexOf('#')+1);if(id=='visualization'){setTimeout(function(){jQuery(".service-custom-tab #phase-2").trigger("click");},1000);jQuery('html, body').animate({scrollTop:jQuery(".service-custom-tab").offset().top-100},2000);}else if(id=='analytics'){setTimeout(function(){jQuery(".service-custom-tab #phase-3").trigger("click");},1000);jQuery('html, body').animate({scrollTop:jQuery(".service-custom-tab").offset().top-100},2000);}else if(id=='transformation'){setTimeout(function(){jQuery(".service-custom-tab #phase-1").trigger("click");},1000);jQuery('html, body').animate({scrollTop:jQuery(".service-custom-tab").offset().top-100},2000);}else{jQuery('.service-custom-tab li:first-child').addClass('active');}}
jQuery('body').on('click',".service-custom-tab-nav .phase-1",function(){jQuery(".service-custom-tab #phase-1")[0].click();jQuery('html, body').animate({scrollTop:jQuery(".service-custom-tab").offset().top-100},2000);});jQuery('body').on('click',".service-custom-tab-nav .phase-2",function(){jQuery(".service-custom-tab #phase-2")[0].click();jQuery('html, body').animate({scrollTop:jQuery(".service-custom-tab").offset().top-100},2000);});jQuery('body').on('click',".service-custom-tab-nav .phase-3",function(){jQuery(".service-custom-tab #phase-3")[0].click();jQuery('html, body').animate({scrollTop:jQuery(".service-custom-tab").offset().top-100},2000);});jQuery('.phase-2-row').hide();jQuery('.phase-3-row').hide();jQuery('body').on('click','.service-custom-tab li',function(){jQuery('.service-custom-tab li').removeClass('active');jQuery(this).addClass('active');});jQuery('body').on('click','.service-custom-tab #phase-1',function(){jQuery('.phase-1-row').show();jQuery('.phase-2-row').hide();jQuery('.phase-3-row').hide();});jQuery('body').on('click','.service-custom-tab #phase-2',function(){jQuery('.phase-1-row').hide();jQuery('.phase-2-row').show();jQuery('.phase-3-row').hide();});jQuery('body').on('click','.service-custom-tab #phase-3',function(){jQuery('.phase-1-row').hide();jQuery('.phase-2-row').hide();jQuery('.phase-3-row').show();});$('#slide-6-layer-1').attr('data-aos','zoom-out-up');$('#slide-6-layer-10').attr('data-aos','zoom-out-up');$('#slide-6-layer-11').attr('data-aos','fade-right','data-aos-offset','300');$("<div class='progress-bar2' id='myborder'></div>").appendTo("#slide-7-layer-1");$("<div class='progress-bar4' id='myborder3'></div>").appendTo(".Animations-box .column.mcb-column.one.column_column .column_attr");$("<div class='progress-bar5' id='myborder4'></div>").appendTo(".myslider .tp-parallax-wrap .tp-mask-wrap");setTimeout(function(){$(".progress-bar2").addClass('mainborder');$('#stackheading').addClass('bigborder');$('#leverageheading').addClass('bigborder');$('#slide-5-layer-1').addClass('bigborder');$('#slide-3-layer-1').addClass('bigborder');},2000);});$(function(){var $sidescroll=(function(){var $rows=$('#ss-container > div.ss-row'),$rowsViewport,$rowsOutViewport,$links=$('#ss-links > a'),$win=$(window),winSize={},anim=false,scollPageSpeed=2000,scollPageEasing='easeInOutExpo',hasPerspective=false,perspective=hasPerspective&&Modernizr.csstransforms3d,init=function(){getWinSize();initEvents();defineViewport();setViewportRows();if(perspective){$rows.css({'-webkit-perspective':100,'-webkit-perspective-origin':'50% 0%'});}
$rowsViewport.find('a.ss-circle').addClass('ss-circle-deco');placeRows();},defineViewport=function(){$.extend($.expr[':'],{inviewport:function(el){if($(el).offset().top<winSize.height){return true;}
return false;}});},setViewportRows=function(){$rowsViewport=$rows.filter(':inviewport');$rowsOutViewport=$rows.not($rowsViewport)},getWinSize=function(){winSize.width=$win.width();if(winSize.width>1400||winSize.width<1600){winSize.height=$win.height()-300;}else if(winSize.width>1600){winSize.height=$win.height()-400;}else{winSize.height=$win.height();}},initEvents=function(){$links.on('click.Scrolling',function(event){$('html, body').stop().animate({scrollTop:$($(this).attr('href')).offset().top},scollPageSpeed,scollPageEasing);return false;});$(window).on({'resize.Scrolling':function(event){getWinSize();setViewportRows();$rows.find('a.ss-circle').removeClass('ss-circle-deco');$rowsViewport.each(function(){$(this).find('div.ss-left').css({left:'0%'}).end().find('div.ss-right').css({right:'0%'}).end().find('a.ss-circle').addClass('ss-circle-deco');});},'scroll.Scrolling':function(event){if(anim)
return false;anim=true;setTimeout(function(){placeRows();anim=false;},10);}});},placeRows=function(){var winscroll=$win.scrollTop(),winCenter=winSize.height/2+winscroll;$rowsOutViewport.each(function(i){var $row=$(this),$rowL=$row.find('div.ss-left'),$rowR=$row.find('div.ss-right'),rowT=$row.offset().top;if(rowT>winSize.height+winscroll){if(perspective){$rowL.css({'-webkit-transform':'translate3d(-75%, 0, 0) rotateY(-90deg) translate3d(-75%, 0, 0)','opacity':0});$rowR.css({'-webkit-transform':'translate3d(75%, 0, 0) rotateY(90deg) translate3d(75%, 0, 0)','opacity':0});}else{$rowL.css({left:'-14%'});$rowR.css({right:'-55%'});$rowL.css({width:'60%'});$rowR.css({width:'60%'});}}
else{var rowH=$row.height(),factor=(((rowT+rowH/2)-winCenter)/(winSize.height/2+rowH/2)),val=Math.max(factor*50,0);if(val<=0){if(!$row.data('pointer')){$row.data('pointer',true);$row.find('.ss-circle').addClass('ss-circle-deco');}}else{if($row.data('pointer')){$row.data('pointer',false);$row.find('.ss-circle').removeClass('ss-circle-deco');}}
if(perspective){var t=Math.max(factor*75,0),r=Math.max(factor*90,0),o=Math.min(Math.abs(factor-1),1);$rowL.css({'-webkit-transform':'translate3d(-'+t+'%, 0, 0) rotateY(-'+r+'deg) translate3d(-'+t+'%, 0, 0)','opacity':o});$rowR.css({'-webkit-transform':'translate3d('+t+'%, 0, 0) rotateY('+r+'deg) translate3d('+t+'%, 0, 0)','opacity':o});}else{$rowL.css({left:-val+'-14%'});$rowR.css({right:-val+'-55%'});$rowL.css({width:'100%'});$rowR.css({width:'100%'});}}});};return{init:init};})();$sidescroll.init();window.onscroll=function(){myFunction()};function myFunction(){var winScroll=document.body.scrollTop||document.documentElement.scrollTop;var height=document.documentElement.scrollHeight-document.documentElement.clientHeight;var scrolled=(winScroll/height)*200;var scrolled_var=(winScroll/height)*30;var scrolled_var_nw=(winScroll/height)*20;try{document.getElementById("myBar").style.width=scrolled+"%";}catch(err){}
try{document.getElementById("myBar1").style.width=scrolled_var+"%";}catch(err){}
try{document.getElementById("myBar2").style.width=scrolled_var_nw+"%";}catch(err){}}});var check_p=0;function adjustHeights(){if($('#approach-item-section .icon_box').length>0){check_p=0;equalHeights('#approach-item-section .icon_box');}
if($('.top-skew .mcb-column .column_attr').length>0){check_p=1;equalHeights('.top-skew .mcb-column .column_attr');}
if($('#price-compare .mcb-wrap-inner .column.one-third > .column_attr .expertise-box').length>0){check_p=0;equalHeights('#price-compare .mcb-wrap-inner .column.one-third > .column_attr .expertise-box');}}
document.addEventListener('DOMContentLoaded',function(){if($(window).width()>760){setTimeout(function(){adjustHeights();},2000);}
$(window).resize(function(){if($(window).width()>760){setTimeout(function(){adjustHeights();console.log('resize');},1000);}});$(".arrow-down-click").click(function(){try{var id=$(this).attr('href');$('html, body').animate({scrollTop:$(id).offset().top},2000);}catch(err){}
return false;});$('#price-compare .mcb-column:nth-of-type(3) .expertise-box').addClass('hovered');$('#price-compare .mcb-column .expertise-box').hover(function(){$('#price-compare .mcb-column .expertise-box').removeClass('hovered');$(this).addClass('hovered');},function(){$('#price-compare .mcb-column .expertise-box').removeClass('hovered');$('#price-compare .mcb-column:nth-of-type(3) .expertise-box').addClass('hovered');});$(window).scroll(function(){var scroll=$(window).scrollTop();if(scroll>=130){if(isScrolledIntoView("#form-fiix")||isScrolledIntoView("#footr-updat")){$(".landing-page-template #Top_bar").removeClass("sticky");}else{$(".landing-page-template #Top_bar").addClass("sticky");}
if($(window).scrollTop()+$(window).height()>=($(document).height()-($('#form-fiix').height()+$('#footr-updat').height()))){$(".landing-page-template #Top_bar").removeClass("sticky");}}else{$(".landing-page-template #Top_bar").removeClass("sticky");}});$(".landing-page-template #Top_bar .menu > li:last-of-type > a, .landing-page-template #Side_slide .menu > li:last-of-type > a").click(function(e){e.preventDefault();if($('#Side_slide').hasClass('enabled')){$('#Side_slide').css('right','-'+$('#Side_slide').data('width')+'px');$('body').css('left','0px');$('#body_overlay').css('display','none');scroll_to=$("#form-fiix .camp-col-contact").offset().top-50;}else{scroll_to=$("#form-fiix").offset().top-140;}
$('html, body').animate({scrollTop:scroll_to},2000);});});function isScrolledIntoView(elem){var $elem=$(elem);var $window=$(window);var docViewTop=$window.scrollTop();var docViewBottom=docViewTop+$window.height();try{var elemTop=$elem.offset().top;}catch(e){var elemTop=elemTop;}
var elemBottom=elemTop+$elem.height();return((elemBottom<=docViewBottom)&&(elemTop>=docViewTop));}
function equalHeights(container){var highestBox=0;var max_p=0;$(container).each(function(){if($(this).height()>highestBox){highestBox=$(this).height();}
if(check_p==1){if($('.top-skew .mcb-column .column_attr > p').height()>max_p){max_p=$('.top-skew .mcb-column .column_attr > p').height();}}});console.log(max_p+' > '+highestBox);if(check_p==1){if(max_p>highestBox){highestBox=max_p;}}
$(container).attr("style","height: "+highestBox+"px !important;");}
jQuery(document).ready(function(){jQuery(".boxed-exper1, .boxed-exper3").on('mouseenter',function(){jQuery(".boxed-exper2").addClass("hover-hax");}).on('mouseleave',function(){jQuery(".boxed-exper2").removeClass("hover-hax");});jQuery('.camp-col-contact textarea').removeAttr('placeholder');jQuery('.submit-contact-form').click(function(){jQuery('form.wpcf7-form').submit();return false;});$("#menu-main-menu > li.menu-item > ul.sub-menu").each(function(){var submenu=jQuery(this);submenu.find('li a span').each(function(){var title_string,title1,title2;title_string=$(this).html();var title1=title_string.includes("Title1");var title2=title_string.includes("Title2");if(title1==true){$(this).parent().parent().addClass('Title1');title_string=title_string.replace("Title1"," ");$(this).html(title_string);}
if(title2==true){$(this).parent().parent().addClass('Title2');title_string=title_string.replace("Title2"," ");$(this).html(title_string);}});var left_div='<div class="lft-sub-mnu">';var right_div='<div class="rit-sub-mnu">';var title1exist=0;var title2exist=0;submenu.find('li').each(function(){if($(this).hasClass("Title1")){title1exist=1;title2exist=0}else if($(this).hasClass("Title2")){title1exist=0;title2exist=1}
if(title1exist==1){left_div+=$(this)[0].outerHTML;}else if(title2exist==1){right_div+=$(this)[0].outerHTML;}else{left_div+=$(this)[0].outerHTML;}});left_div+='</div>';right_div+='</div>';submenu.html(left_div+right_div);if(submenu.find('.lft-sub-mnu').is(':empty')){submenu.find('.lft-sub-mnu').remove();}
if(submenu.find('.rit-sub-mnu').is(':empty')){submenu.find('.rit-sub-mnu').remove();}
submenu.addClass(submenu.find('div').length+'div');});});jQuery(document).ready(function(){jQuery('#tabs li a:not(:first)').addClass('inactive');jQuery('.tabbox').hide();jQuery('.tabbox:first').show();jQuery('#tabs li a').click(function(){var t=jQuery(this).attr('id');if($(this).hasClass('inactive')){jQuery('#tabs li a').addClass('inactive');jQuery(this).removeClass('inactive');jQuery('.tabbox').hide();jQuery('#'+t+'C').fadeIn('slow');}});});jQuery(window).load(function(){jQuery('#ui-id-2tr, #ui-id-3tr ,#ui-id-4tr').hide();});jQuery(document).on("click",".ui-state-default a ",function(){var id=jQuery(this).attr('id')+'tr';jQuery('.stepp').hide();jQuery("#"+id).show();});jQuery(document).on("click","#ui-id-1tr",function(){jQuery("#ui-id-2").click();jQuery("#ui-id-1tr").hide();jQuery("#ui-id-2tr").show();});jQuery(document).on("click","#ui-id-2tr",function(){jQuery("#ui-id-3").click();jQuery("#ui-id-2tr").hide();jQuery("#ui-id-3tr").show();});jQuery(document).on("click","#ui-id-3tr",function(){jQuery("#ui-id-4").click();jQuery("#ui-id-3tr").hide();jQuery("#ui-id-4tr").show();});jQuery(document).on("click","#ui-id-4tr",function(){jQuery("#ui-id-5").click();jQuery("#ui-id-4tr").hide();});jQuery(document).on("click",".stepp",function(){jQuery('html, body').animate({scrollTop:jQuery("#custm-tabbed").offset().top},400);});jQuery(document).ready(function(){jQuery("#get-touch").submit(function(e){e.preventDefault();var name=$('#name').val();var company=$('#company').val();var email=$('#email').val();var phone=$('#phone').val();var textarea=$('#textarea1').val();console.log(location.href);$.ajax({type:"POST",url:frontend_ajax_object.ajaxurl+'?action=listing_companions_ajax',dataType:"json",data:{name:name,company:company,email:email,phone:phone,textarea:textarea},success:function(response){if(response.status=='success'){console.log("mail sent");}else if(response.status=='failure'){console.log("mail not sent");}}})});jQuery('input, textarea').focus(function(){jQuery(this).parents('.form-group').addClass('focused');});jQuery('input, textarea').blur(function(){var inputValue=jQuery(this).val();if(inputValue==""){jQuery(this).removeClass('filled');jQuery(this).parents('.form-group').removeClass('focused');}else{jQuery(this).addClass('filled');}})
jQuery('.resiText').on('keyup input',function(){jQuery(this).css('height','auto').css('height',this.scrollHeight+(this.offsetHeight-this.clientHeight));});});$(document).ready(function(){$('.filter-button').on('click',function(){$(".filter-button").removeClass("current");var thisTab=this;$(thisTab).addClass('current');});$(".heateorSssSharing.heateorSssMoreBackground").click(function(e){$("#heateor_sss_sharing_more_providers #heateor_sss_sharing_more_content .all-services ul").append('<li class="insta-icon"><a href="https://www.instagram.com/" rel="nofollow noopener" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i>Instagram</a></li>');});});function get_category_post(cat_id){var post_limit=3;$.ajax({url:misha_loadmore_params.ajaxurl,data:{action:'getcategorypost',cat_id:cat_id,post_limit:post_limit},type:'POST',success:function(data){if(data){$(".filter-item-list.clearfix").html(data);}else{alert('error');}}});}
$(document).ready(function(){$('#all-categories .br').click(function(){var choices=[];$('.br:checkbox:checked').each(function(){if($(this).attr('data-category')=='Services'){var ids=$('[name="Services"]').map(function(){return $(this).attr('id');});console.log(ids);$.each(ids,function(index,value){choices.push({id:$('.sub-cats').attr(value),parent_id:$('.sub-cats').attr('parent-id')});});}else if($(this).attr('data-category')=='Industries'){var ids=$('[name="Industries"]').map(function(){return $(this).attr('id');});console.log(ids);$.each(ids,function(index,value){choices.push({id:$('.sub-cats').attr(value),parent_id:$('.sub-cats').attr('parent-id')});});}else{console.log('else');choices.push({id:$(this).attr('id'),parent_id:$(this).attr('parent-id')});}});$.ajax({url:misha_loadmore_params.ajaxurl,type:'POST',data:{'action':'call_posts','choices':choices,},success:function(result){$('.blog-left').html(result);},error:function(err){console.log(err);console.log(choices);}});});});