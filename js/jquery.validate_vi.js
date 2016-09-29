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
     * Locale: VI (Vietnamese; Tiáº¿ng Viá»‡t)
     */
    $.extend($.validator.messages, {
        required: "HA£y nháº­p.",
        remote: "HA£y sá»­a cho Ä‘Aºng.",
        email: "HA£y nháº­p email.",
        url: "HA£y nháº­p URL.",
        date: "HA£y nháº­p ngA y.",
        dateISO: "HA£y nháº­p ngA y (ISO).",
        number: "HA£y nháº­p sá»‘.",
        digits: "HA£y nháº­p chá»¯ sá»‘.",
        creditcard: "HA£y nháº­p sá»‘ tháº» tA­n dá»¥ng.",
        equalTo: "HA£y nháº­p thAªm láº§n ná»¯a.",
        extension: "Pháº§n má»Ÿ rá»™ng khA´ng Ä‘Aºng.",
        maxlength: $.validator.format("HA£y nháº­p tá»« {0} kA­ tá»± trá»Ÿ xuá»‘ng."),
        minlength: $.validator.format("HA£y nháº­p tá»« {0} kA­ tá»± trá»Ÿ lAªn."),
        rangelength: $.validator.format("HA£y nháº­p tá»« {0} Ä‘áº¿n {1} kA­ tá»±."),
        range: $.validator.format("HA£y nháº­p tá»« {0} Ä‘áº¿n {1}."),
        max: $.validator.format("HA£y nháº­p tá»« {0} trá»Ÿ xuá»‘ng."),
        min: $.validator.format("HA£y nháº­p tá»« {1} trá»Ÿ lAªn.")
    });

}));