function isNumberKey(obj, evt) {
    var charCode = (evt.charCode) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46)
        if (window.event) //IE
        {
            window.event.returnValue = false;
        } else //Firefox
        {
            return false; // <-- What should I write here instead
        }
    else {
        var input = obj.value; //alert(input);
        var len = obj.value.length; //  alert(len);
        var index = obj.value.indexOf('.'); // alert(index);
        if (index > 0 && charCode == 46) {
            if (window.event) {
                window.event.returnValue = false;
            } else {
                return false;
            }
        }
        if (index > 0 || index == 0) {
            var CharAfterdot = (len + 1) - index;
            if (CharAfterdot > 7) {
                if (window.event) {
                    window.event.returnValue = false;
                } else {
                    return false;
                }
            }
        }
        if (charCode == 46 && input.split('.').length > 1) {
            if (window.event) {
                window.event.returnValue = false;
            } else {
                return false;
            }
        }

    }
    return true;
}