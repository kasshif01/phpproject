/*
 * Globalize Culture kk
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

    Globalize.addCultureInfo("kk", "default", {
        name: "kk",
        englishName: "Kazakh",
        nativeName: "Қазақ",
        language: "kk",
        numberFormat: {
            ",": " ",
            ".": ",",
            percent: {
                pattern: ["-n%", "n%"],
                ",": " ",
                ".": ","
            },
            currency: {
                pattern: ["-$n", "$n"],
                ",": " ",
                ".": "-",
                symbol: "Т"
            }
        },
        calendars: {
            standard: {
                "/": ".",
                firstDay: 1,
                days: {
                    names: ["Жексенбі", "Дүйсенбі", "Сейсенбі", "Сәрсенбі", "Бейсенбі", "Жұма", "Сенбі"],
                    namesAbbr: ["Жк", "Дс", "Сс", "Ср", "Бс", "Жм", "Сн"],
                    namesShort: ["Жк", "Дс", "Сс", "Ср", "Бс", "Жм", "Сн"]
                },
                months: {
                    names: ["қаңтар", "ақпан", "наурыз", "сәуір", "мамыр", "маусым", "шілде", "тамыз", "қыркүйек", "қазан", "қараша", "желтоқсан", ""],
                    namesAbbr: ["Қаң", "Ақп", "Нау", "Сәу", "Мам", "Мау", "Шіл", "Там", "Қыр", "Қаз", "Қар", "Жел", ""]
                },
                AM: null,
                PM: null,
                patterns: {
                    d: "dd.MM.yyyy",
                    D: "d MMMM yyyy 'ж.'",
                    t: "H:mm",
                    T: "H:mm:ss",
                    f: "d MMMM yyyy 'ж.' H:mm",
                    F: "d MMMM yyyy 'ж.' H:mm:ss",
                    M: "d MMMM",
                    Y: "MMMM yyyy"
                }
            }
        }
    });

}(this));
