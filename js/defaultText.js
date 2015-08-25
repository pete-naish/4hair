;(function($){$.fn.defaultText=function(settings){var config={text:'Default Text',dataField:'data-desc',clearOnSubmit:true};if(typeof settings=="string"){config.text=settings;}
else if(settings instanceof Object){$.extend(config,settings);}
this.filter('input, textarea').each(function(){var obj=$(this);if(obj.val().length==0){obj.val(config.text);}
obj.attr(config.dataField,config.text);obj.addClass('jquery-inputdesc');obj.focus(onfocus);obj.blur(onblur);if(config.clearOnSubmit){obj.closest('form').submit(function(){onsubmit(obj);});}});function onfocus(e){var obj=$(e.currentTarget);if(obj.val()==obj.attr(config.dataField)){obj.val('');}}
function onblur(e){var obj=$(e.currentTarget);if(obj.val().length==0){obj.val(obj.attr(config.dataField));}}
function onsubmit(field){if(field.val()==field.attr(config.dataField)){field.val('');}}
return this;};})(jQuery);