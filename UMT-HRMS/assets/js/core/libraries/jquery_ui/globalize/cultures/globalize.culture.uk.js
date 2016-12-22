/*
 * Globalize Culture uk
 *
 * http://github.com/jquery/globalize
 *
 * Copyright Software Freedom Conservancy, Inc.
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * This file was generated by the Globalize Culture Generator
 * Translation: bugs found in this file need to be fixed in the generator
 */

(function (window, undefined) {

    var Globalize;

    if (typeof require !== "undefined" &&
            typeof exports !== "undefined" &&
            typeof module !== "undefined") {
        // Assume CommonJS
        Globalize = require("globalize");
    } else {
        // Global variable
        Globalize = window.Globalize;
    }

    Globalize.addCultureInfo("uk", "default", {
        name: "uk",
        englishName: "Ukrainian",
        nativeName: "українська",
        language: "uk",
        numberFormat: {
            ",": " ",
            ".": ",",
            negativeInfinity: "-безмежність",
            positiveInfinity: "безмежність",
            percent: {
                pattern: ["-n%", "n%"],
                ",": " ",
                ".": ","
            },
            currency: {
                pattern: ["-n$", "n$"],
                ",": " ",
                ".": ",",
                symbol: "₴"
            }
        },
        calendars: {
            standard: {
                "/": ".",
                firstDay: 1,
                days: {
                    names: ["неділя", "понеділок", "вівторок", "середа", "четвер", "п'ятниця", "субота"],
                    namesAbbr: ["Нд", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
                    namesShort: ["Нд", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"]
                },
                months: {
                    names: ["Січень", "Лютий", "Березень", "Квітень", "Травень", "Червень", "Липень", "Серпень", "Вересень", "Жовтень", "Листопад", "Грудень", ""],
                    namesAbbr: ["Січ", "Лют", "Бер", "Кві", "Тра", "Чер", "Лип", "Сер", "Вер", "Жов", "Лис", "Гру", ""]
                },
                monthsGenitive: {
                    names: ["січня", "лютого", "березня", "квітня", "травня", "червня", "липня", "серпня", "вересня", "жовтня", "листопада", "грудня", ""],
                    namesAbbr: ["січ", "лют", "бер", "кві", "тра", "чер", "лип", "сер", "вер", "жов", "лис", "гру", ""]
                },
                AM: null,
                PM: null,
                patterns: {
                    d: "dd.MM.yyyy",
                    D: "d MMMM yyyy' р.'",
                    t: "H:mm",
                    T: "H:mm:ss",
                    f: "d MMMM yyyy' р.' H:mm",
                    F: "d MMMM yyyy' р.' H:mm:ss",
                    M: "d MMMM",
                    Y: "MMMM yyyy' р.'"
                }
            }
        }
    });

}(this));
