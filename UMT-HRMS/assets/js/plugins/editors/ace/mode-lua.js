define("ace/mode/lua_highlight_rules", ["require", "exports", "module", "ace/lib/oop", "ace/mode/text_highlight_rules"], function(e, t, n){"use strict"; var r = e("../lib/oop"), i = e("./text_highlight_rules").TextHighlightRules, s = function(){var e = "break|do|else|elseif|end|for|function|if|in|local|repeat|return|then|until|while|or|and|not", t = "true|false|nil|_G|_VERSION", n = "string|xpcall|package|tostring|print|os|unpack|require|getfenv|setmetatable|next|assert|tonumber|io|rawequal|collectgarbage|getmetatable|module|rawset|math|debug|pcall|table|newproxy|type|coroutine|_G|select|gcinfo|pairs|rawget|loadstring|ipairs|_VERSION|dofile|setfenv|load|error|loadfile|sub|upper|len|gfind|rep|find|match|char|dump|gmatch|reverse|byte|format|gsub|lower|preload|loadlib|loaded|loaders|cpath|config|path|seeall|exit|setlocale|date|getenv|difftime|remove|time|clock|tmpname|rename|execute|lines|write|close|flush|open|output|type|read|stderr|stdin|input|stdout|popen|tmpfile|log|max|acos|huge|ldexp|pi|cos|tanh|pow|deg|tan|cosh|sinh|random|randomseed|frexp|ceil|floor|rad|abs|sqrt|modf|asin|min|mod|fmod|log10|atan2|exp|sin|atan|getupvalue|debug|sethook|getmetatable|gethook|setmetatable|setlocal|traceback|setfenv|getinfo|setupvalue|getlocal|getregistry|getfenv|setn|insert|getn|foreachi|maxn|foreach|concat|sort|remove|resume|yield|status|wrap|create|running|__add|__sub|__mod|__unm|__concat|__lt|__index|__call|__gc|__metatable|__mul|__div|__pow|__len|__eq|__le|__newindex|__tostring|__mode|__tonumber", r = "string|package|os|io|math|debug|table|coroutine", i = "", s = "setn|foreach|foreachi|gcinfo|log10|maxn", o = this.createKeywordMapper({keyword:e, "support.function":n, "invalid.deprecated":s, "constant.library":r, "constant.language":t, "invalid.illegal":i, "variable.language":"self"}, "identifier"), u = "(?:(?:[1-9]\\d*)|(?:0))", a = "(?:0[xX][\\dA-Fa-f]+)", f = "(?:" + u + "|" + a + ")", l = "(?:\\.\\d+)", c = "(?:\\d+)", h = "(?:(?:" + c + "?" + l + ")|(?:" + c + "\\.))", p = "(?:" + h + ")"; this.$rules = {start:[{stateName:"bracketedComment", onMatch:function(e, t, n){return n.unshift(this.next, e.length - 2, t), "comment"}, regex:/\-\-\[=*\[/, next:[{onMatch:function(e, t, n){return e.length == n[1]?(n.shift(), n.shift(), this.next = n.shift()):this.next = "", "comment"}, regex:/\]=*\]/, next:"start"}, {defaultToken:"comment"}]}, {token:"comment", regex:"\\-\\-.*$"}, {stateName:"bracketedString", onMatch:function(e, t, n){return n.unshift(this.next, e.length, t), "comment"}, regex:/\[=*\[/, next:[{onMatch:function(e, t, n){return e.length == n[1]?(n.shift(), n.shift(), this.next = n.shift()):this.next = "", "comment"}, regex:/\]=*\]/, next:"start"}, {defaultToken:"comment"}]}, {token:"string", regex:'"(?:[^\\\\]|\\\\.)*?"'}, {token:"string", regex:"'(?:[^\\\\]|\\\\.)*?'"}, {token:"constant.numeric", regex:p}, {token:"constant.numeric", regex:f + "\\b"}, {token:o, regex:"[a-zA-Z_$][a-zA-Z0-9_$]*\\b"}, {token:"keyword.operator", regex:"\\+|\\-|\\*|\\/|%|\\#|\\^|~|<|>|<=|=>|==|~=|=|\\:|\\.\\.\\.|\\.\\."}, {token:"paren.lparen", regex:"[\\[\\(\\{]"}, {token:"paren.rparen", regex:"[\\]\\)\\}]"}, {token:"text", regex:"\\s+|\\w+"}]}, this.normalizeRules()}; r.inherits(s, i), t.LuaHighlightRules = s}), define("ace/mode/folding/lua", ["require", "exports", "module", "ace/lib/oop", "ace/mode/folding/fold_mode", "ace/range", "ace/token_iterator"], function(e, t, n){"use strict"; var r = e("../../lib/oop"), i = e("./fold_mode").FoldMode, s = e("../../range").Range, o = e("../../token_iterator").TokenIterator, u = t.FoldMode = function(){}; r.inherits(u, i), function(){this.foldingStartMarker = /\b(function|then|do|repeat)\b|{\s*$|(\[=*\[)/, this.foldingStopMarker = /\bend\b|^\s*}|\]=*\]/, this.getFoldWidget = function(e, t, n){var r = e.getLine(n), i = this.foldingStartMarker.test(r), s = this.foldingStopMarker.test(r); if (i && !s){var o = r.match(this.foldingStartMarker); if (o[1] == "then" && /\belseif\b/.test(r))return; if (o[1]){if (e.getTokenAt(n, o.index + 1).type === "keyword")return"start"} else{if (!o[2])return"start"; var u = e.bgTokenizer.getState(n) || ""; if (u[0] == "bracketedComment" || u[0] == "bracketedString")return"start"}}if (t != "markbeginend" || !s || i && s)return""; var o = r.match(this.foldingStopMarker); if (o[0] === "end"){if (e.getTokenAt(n, o.index + 1).type === "keyword")return"end"} else{if (o[0][0] !== "]")return"end"; var u = e.bgTokenizer.getState(n - 1) || ""; if (u[0] == "bracketedComment" || u[0] == "bracketedString")return"end"}}, this.getFoldWidgetRange = function(e, t, n){var r = e.doc.getLine(n), i = this.foldingStartMarker.exec(r); if (i)return i[1]?this.luaBlock(e, n, i.index + 1):i[2]?e.getCommentFoldRange(n, i.index + 1):this.openingBracketBlock(e, "{", n, i.index); var i = this.foldingStopMarker.exec(r); if (i)return i[0] === "end" && e.getTokenAt(n, i.index + 1).type === "keyword"?this.luaBlock(e, n, i.index + 1):i[0][0] === "]"?e.getCommentFoldRange(n, i.index + 1):this.closingBracketBlock(e, "}", n, i.index + i[0].length)}, this.luaBlock = function(e, t, n){var r = new o(e, t, n), i = {"function":1, "do":1, then:1, elseif: - 1, end: - 1, repeat:1, until: - 1}, u = r.getCurrentToken(); if (!u || u.type != "keyword")return; var a = u.value, f = [a], l = i[a]; if (!l)return; var c = l === - 1?r.getCurrentTokenColumn():e.getLine(t).length, h = t; r.step = l === - 1?r.stepBackward:r.stepForward; while (u = r.step()){if (u.type !== "keyword")continue; var p = l * i[u.value]; if (p > 0)f.unshift(u.value); else if (p <= 0){f.shift(); if (!f.length && u.value != "elseif")break; p === 0 && f.unshift(u.value)}}var t = r.getCurrentTokenRow(); return l === - 1?new s(t, e.getLine(t).length, h, c):new s(h, c, t, r.getCurrentTokenColumn())}}.call(u.prototype)}), define("ace/mode/lua", ["require", "exports", "module", "ace/lib/oop", "ace/mode/text", "ace/mode/lua_highlight_rules", "ace/mode/folding/lua", "ace/range", "ace/worker/worker_client"], function(e, t, n){"use strict"; var r = e("../lib/oop"), i = e("./text").Mode, s = e("./lua_highlight_rules").LuaHighlightRules, o = e("./folding/lua").FoldMode, u = e("../range").Range, a = e("../worker/worker_client").WorkerClient, f = function(){this.HighlightRules = s, this.foldingRules = new o}; r.inherits(f, i), function(){function n(t){var n = 0; for (var r = 0; r < t.length; r++){var i = t[r]; i.type == "keyword"?i.value in e && (n += e[i.value]):i.type == "paren.lparen"?n++:i.type == "paren.rparen" && n--}return n < 0? - 1:n > 0?1:0}this.lineCommentStart = "--", this.blockComment = {start:"--[", end:"]--"}; var e = {"function":1, then:1, "do":1, "else":1, elseif:1, repeat:1, end: - 1, until: - 1}, t = ["else", "elseif", "end", "until"]; this.getNextLineIndent = function(e, t, r){var i = this.$getIndent(t), s = 0, o = this.getTokenizer().getLineTokens(t, e), u = o.tokens; return e == "start" && (s = n(u)), s > 0?i + r:s < 0 && i.substr(i.length - r.length) == r && !this.checkOutdent(e, t, "\n")?i.substr(0, i.length - r.length):i}, this.checkOutdent = function(e, n, r){if (r != "\n" && r != "\r" && r != "\r\n")return!1; if (n.match(/^\s*[\)\}\]]$/))return!0; var i = this.getTokenizer().getLineTokens(n.trim(), e).tokens; return!i || !i.length?!1:i[0].type == "keyword" && t.indexOf(i[0].value) != - 1}, this.autoOutdent = function(e, t, r){var i = t.getLine(r - 1), s = this.$getIndent(i).length, o = this.getTokenizer().getLineTokens(i, "start").tokens, a = t.getTabString().length, f = s + a * n(o), l = this.$getIndent(t.getLine(r)).length; if (l < f)return; t.outdentRows(new u(r, 0, r + 2, 0))}, this.createWorker = function(e){var t = new a(["ace"], "ace/mode/lua_worker", "Worker"); return t.attachToDocument(e.getDocument()), t.on("error", function(t){e.setAnnotations([t.data])}), t.on("ok", function(t){e.clearAnnotations()}), t}, this.$id = "ace/mode/lua"}.call(f.prototype), t.Mode = f})