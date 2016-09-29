(function (factory) {
    if (typeof define === "function" && define.amd) {
        define(["jquery", "../jquery.validate"], factory);
    } else if (typeof module === "object" && module.exports) {
        module.exports = factory(require("jquery"));
    } else {
        factory(jQuery);
    }
}(function ($) {

    /*
     * Translated default messages for the jQuery validation plugin.
     * Locale: VI (Vietnamese; Tiếng Việt)
     */
    $.extend($.validator.messages, {
        required: "HA�y nhập.",
        remote: "HA�y sửa cho đA�ng.",
        email: "HA�y nhập email.",
        url: "HA�y nhập URL.",
        date: "HA�y nhập ngA y.",
        dateISO: "HA�y nhập ngA y (ISO).",
        number: "HA�y nhập số.",
        digits: "HA�y nhập chữ số.",
        creditcard: "HA�y nhập số thẻ tA�n dụng.",
        equalTo: "HA�y nhập thA�m lần nữa.",
        extension: "Phần mở rộng khA�ng đA�ng.",
        maxlength: $.validator.format("HA�y nhập từ {0} kA� tự trở xuống."),
        minlength: $.validator.format("HA�y nhập từ {0} kA� tự trở lA�n."),
        rangelength: $.validator.format("HA�y nhập từ {0} đến {1} kA� tự."),
        range: $.validator.format("HA�y nhập từ {0} đến {1}."),
        max: $.validator.format("HA�y nhập từ {0} trở xuống."),
        min: $.validator.format("HA�y nhập từ {1} trở lA�n.")
    });

}));