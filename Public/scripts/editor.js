  $(function() {

          var editor;
          KindEditor.ready(function(K) {
            editor = K.create('textarea[name="content"]', {
              resizeType : 1,
              allowPreviewEmoticons : false,
              allowImageUpload : false,
              items : [
                'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                'insertunorderedlist', '|', 'emoticons', 'image', 'link']
            });
        });


        $('div.mdl-select > ul > li').click(function(e) {
            var text = $(e.target).text();
            $(e.target).parents('.mdl-select').addClass('is-dirty').children('input').val(text);
        });

        $("#is-discount").click(function() {
            if ($(this).is(":checked")) {
              $("#price-now-box").css('display', 'block');
            } else {
               $("#price-now-box").css('display','none');
            }
        });


    });