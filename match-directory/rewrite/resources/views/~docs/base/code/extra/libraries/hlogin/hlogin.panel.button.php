<script>
    // Setting the design for the page via JS.
    // For example, this way you can set the `special` type for visually
    // impaired users without refreshing the page in the browser.
    hloginSetDesignToPopups('special');

    // Returns the design type to its original state.
    hloginRevertDesignToPopups();

    // Close all registration popups.
    hloginCloseAllPopups();

    // Open a specific window, in this case user registration.
    hloginVariableOpenPopup('UserRegister');
    // Or 'UserEnter', 'UserProfile', 'ContactMessage'

    // Displays an arbitrary custom message in the window (current design).
    hloginOpenMessage('Title', 'Message <b>text</b>');

    // If this function exists, it will be called every time a popup is opened, passing the popup type.
    function hloginPopupVariableFunction(popupType) {
        // Custom code. (popupType = 'UserRegister' / 'UserEnter' / 'UserPassword' / 'ContactMessage')
    }
</script>
