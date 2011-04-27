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
            $(".delegateToMessageId").attr('value',$(this).attr('id'));
            $('#forwardResponse').lightbox_me({
                centered: true
            });

            return false;
        });
    });

        $.each($(".insertFromFaq"),function(){
        $(this).click(function() {
            $('#insertFaqQuestion').lightbox_me({
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

    $.each($(".delegateTo"),function(){
        $(this).click(function() {
            delegateId = $(this).attr('id');
            messageId = $(".delegateToMessageId").attr('value');
            $('#forwardResponse').trigger('close');
            $(".forwardTo_"+messageId).empty();
            $(".forwardTo_"+messageId).append($.ajax({
                type: 'GET',
                url: 'contactavances/delegateTo?messageId='+messageId+'&delegateId='+delegateId,
                async: false
            }).responseText);
            return false;

        });
    });

        $.each($(".questionsFromFaq"),function(){
        $(this).click(function() {
            responseId = $(this).attr('id');
            $('#insertFaqQuestion').trigger('close');
            $("#message_text").empty();
//            $("#message_text").append($.ajax({
//                type: 'GET',
//                url: 'contactavances/InsertFromFaq',
//                async: false
//            }).responseText);
            alert($.ajax({
                type: 'GET',
                url: '../../contactavances/InsertFromFaq',
                async: false
            }).responseText);
            return false;

        });
    });



});
