<a class=" waves-effect waves-light autohidebut" href="javascript:;" id="notificationBtn"></a>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Store session data in a JavaScript variable
        var toast_type = '{{ session()->get('toast_type') }}';
        var toast_location = '{{ session()->get('toast_location') }}';
        var toast_head = '{{ session()->get('toast_head') }}';
        var toast_message = '{{ session()->get('toast_message') }}';


        // Wait for the page to load
        setTimeout(function() {
            $.Notification.autoHideNotify(toast_type,toast_location, toast_head, toast_message);
        }, 0);

        // Hide the notification after 5 seconds
        setTimeout(function() {
            $('.jq-toast-wrap').fadeOut();
        }, 5000);
    });
</script>
