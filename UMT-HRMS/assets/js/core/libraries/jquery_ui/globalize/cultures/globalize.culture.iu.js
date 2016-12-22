/*
 * Globalize Culture iu
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

    Globalize.addCultureInfo("iu", "default", {
        name: "iu",
        englishName: "Inuktitut",
        nativeName: "Inuktitut",
        language: "iu",
        numberFormat: {
            groupSizes: [3, 0],
            percent: {
                groupSizes: [3, 0]
            }
        },
        calendars: {
            standard: {
                days: {
                    names: ["Naattiinguja", "Naggajjau", "Aippiq", "Pingatsiq", "Sitammiq", "Tallirmiq", "Sivataarvik"],
                    namesAbbr: ["Nat", "Nag", "Aip", "Pi", "Sit", "Tal", "Siv"],
                    namesShort: ["N", "N", "A", "P", "S", "T", "S"]
                },
                months: {
                    names: ["Jaannuari", "Viivvuari", "Maatsi", "Iipuri", "Mai", "Juuni", "Julai", "Aaggiisi", "Sitipiri", "Utupiri", "Nuvipiri", "Tisipiri", ""],
                    namesAbbr: ["Jan", "Viv", "Mas", "Ipu", "Mai", "Jun", "Jul", "Agi", "Sii", "Uut", "Nuv", "Tis", ""]
                },
                patterns: {
                    d: "d/MM/yyyy",
                    D: "ddd, MMMM dd,yyyy",
                    f: "ddd, MMMM dd,yyyy h:mm tt",
                    F: "ddd, MMMM dd,yyyy h:mm:ss tt"
                }
            }
        }
    });

}(this));
