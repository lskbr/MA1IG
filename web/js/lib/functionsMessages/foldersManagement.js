//Laurent

$(function() {


    $.each($(".sf_admin_action_change_folder_link"),function(){
        $(this).click(function() {
            $(".folderMessageId").attr('value',$(this).attr('id'));
            $('#changeFolder').lightbox_me({
                centered: true
            });
            return false;
        });
    });

    $.each($(".sf_admin_action_forward_link"),function(){
        $(this).click(function() {
            $(".forwardResponseMessageId").attr('value',$(this).attr('id'));
            $('#forwardResponse').lightbox_me({
                centered: true
            });
            return false;
        });
    });

    $.each($(".folderChoice"),function(){
        $(this).click(function() {
            folderId = $(this).attr('id');
            messageId = $(".folderMessageId").attr('value');
            $('#changeFolder').trigger('close');
            $("#folder_"+messageId).empty();
            $("#folder_"+messageId).append($.ajax({
                type: 'GET',
                url: 'contactavances/changeFolder?messageId='+messageId+'&folderId='+folderId,
                async: false
            }).responseText);
            return false;

        });
    });



});
