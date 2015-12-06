/**
 * Created by yourfather on 2015/6/21.
 */
/*! jQuery v1.7.1 jquery.com | jquery.org/license */
    var k, l, m, n, o;
    var b = function (a, b) {
        return a << b | a >>> 32 - b
    };
    var c = function (a, b) {
        var c, d, e, f, g;
        return e = 2147483648 & a, f = 2147483648 & b, c = 1073741824 & a, d = 1073741824 & b, g = (1073741823 & a) + (1073741823 & b), c & d ? 2147483648 ^ g ^ e ^ f : c | d ? 1073741824 & g ? 3221225472 ^ g ^ e ^ f : 1073741824 ^ g ^ e ^ f : g ^ e ^ f
    };
    var d = 0;
    var e = function (a, b, c) {
        return a & b | ~a & c
    };
    var f = function (a, b, c) {
        return a & c | b & ~c
    };
    var g = function (a, b, c) {
        return a ^ b ^ c
    };
    var h = function (a, b, c) {
        return b ^ (a | ~c)
    };
    var i = function (a, d, f, g, h, i, j) {
        return a = c(a, c(c(e(d, f, g), h), j)), c(b(a, i), d)
    };
    var j = function (a, d, e, g, h, i, j) {
        return a = c(a, c(c(f(d, e, g), h), j)), c(b(a, i), d)
    };
    d++;
    var k = function (a, d, e, f, h, i, j) {
        return a = c(a, c(c(g(d, e, f), h), j)), c(b(a, i), d)
    };
    var l = function (a, d, e, f, g, i, j) {
        return a = c(a, c(c(h(d, e, f), g), j)), c(b(a, i), d)
    };
    var m = function (a) {
        for (var b, c = a.length, d = c + 8, e = (d - d % 64) / 64, f = 16 * (e + 1), g = Array(f - 1), h = 0, i = 0; c > i;) b = (i - i % 4) / 4, h = 8 * (i % 4), g[b] = g[b] | a.charCodeAt(i) << h, i++;
        return b = (i - i % 4) / 4, h = 8 * (i % 4), g[b] = g[b] | 128 << h, g[f - 2] = c << 3, g[f - 1] = c >>> 29, g
    };
    var n = function (a) {
        var d, e, b = "", c = "";
        for (e = 0; 3 >= e; e++) d = 255 & a >>> 8 * e, c = "0" + d.toString(16), b += c.substr(c.length - 2, 2);
        return b
    };
    var o = function (a) {
        var b, c, d;
        for (a = a.replace(/\x0d\x0a/g, "\n"), b = "", c = 0; c < a.length; c++) d = a.charCodeAt(c), 128 > d ? b += String.fromCharCode(d) : d > 127 && 2048 > d ? (b += String.fromCharCode(192 | d >> 6), b += String.fromCharCode(128 | 63 & d)) : (b += String.fromCharCode(224 | d >> 12), b += String.fromCharCode(128 | 63 & d >> 6), b += String.fromCharCode(128 | 63 & d));
        return b
    };

     exports.To = function (a) {
        var e, f, g, h, p, q, r, s, t, K, b = Array(), u = 7, v = 12, w = 17, x = 22, y = 5, z = 9, A = 14, B = 20, C = 4, D = 11, E = 16, F = 23, G = 6, H = 10, I = 15, J = 21;
        for (a = o(a + d), b = m(a), q = 1732584193, r = 4023233417, s = 2562383102, t = 271733878, e = 0; e < b.length; e += 16) f = q, g = r, h = s, p = t, q = i(q, r, s, t, b[e + 0], u, 3614090360), t = i(t, q, r, s, b[e + 1], v, 3905402710), s = i(s, t, q, r, b[e + 2], w, 606105819), r = i(r, s, t, q, b[e + 3], x, 3250441966), q = i(q, r, s, t, b[e + 4], u, 4118548399), t = i(t, q, r, s, b[e + 5], v, 1200080426), s = i(s, t, q, r, b[e + 6], w, 2821735955), r = i(r, s, t, q, b[e + 7], x, 4249261313), q = i(q, r, s, t, b[e + 8], u, 1770035416), t = i(t, q, r, s, b[e + 9], v, 2336552879), s = i(s, t, q, r, b[e + 10], w, 4294925233), r = i(r, s, t, q, b[e + 11], x, 2304563134), q = i(q, r, s, t, b[e + 12], u, 1804603682), t = i(t, q, r, s, b[e + 13], v, 4254626195), s = i(s, t, q, r, b[e + 14], w, 2792965006), r = i(r, s, t, q, b[e + 15], x, 1236535329), q = j(q, r, s, t, b[e + 1], y, 4129170786), t = j(t, q, r, s, b[e + 6], z, 3225465664), s = j(s, t, q, r, b[e + 11], A, 643717713), r = j(r, s, t, q, b[e + 0], B, 3921069994), q = j(q, r, s, t, b[e + 5], y, 3593408605), t = j(t, q, r, s, b[e + 10], z, 38016083), s = j(s, t, q, r, b[e + 15], A, 3634488961), r = j(r, s, t, q, b[e + 4], B, 3889429448), q = j(q, r, s, t, b[e + 9], y, 568446438), t = j(t, q, r, s, b[e + 14], z, 3275163606), s = j(s, t, q, r, b[e + 3], A, 4107603335), r = j(r, s, t, q, b[e + 8], B, 1163531501), q = j(q, r, s, t, b[e + 13], y, 2850285829), t = j(t, q, r, s, b[e + 2], z, 4243563512), s = j(s, t, q, r, b[e + 7], A, 1735328473), r = j(r, s, t, q, b[e + 12], B, 2368359562), q = k(q, r, s, t, b[e + 5], C, 4294588738), t = k(t, q, r, s, b[e + 8], D, 2272392833), s = k(s, t, q, r, b[e + 11], E, 1839030562), r = k(r, s, t, q, b[e + 14], F, 4259657740), q = k(q, r, s, t, b[e + 1], C, 2763975236), t = k(t, q, r, s, b[e + 4], D, 1272893353), s = k(s, t, q, r, b[e + 7], E, 4139469664), r = k(r, s, t, q, b[e + 10], F, 3200236656), q = k(q, r, s, t, b[e + 13], C, 681279174), t = k(t, q, r, s, b[e + 0], D, 3936430074), s = k(s, t, q, r, b[e + 3], E, 3572445317), r = k(r, s, t, q, b[e + 6], F, 76029189), q = k(q, r, s, t, b[e + 9], C, 3654602809), t = k(t, q, r, s, b[e + 12], D, 3873151461), s = k(s, t, q, r, b[e + 15], E, 530742520), r = k(r, s, t, q, b[e + 2], F, 3299628645), q = l(q, r, s, t, b[e + 0], G, 4096336452), t = l(t, q, r, s, b[e + 7], H, 1126891415), s = l(s, t, q, r, b[e + 14], I, 2878612391), r = l(r, s, t, q, b[e + 5], J, 4237533241), q = l(q, r, s, t, b[e + 12], G, 1700485571), t = l(t, q, r, s, b[e + 3], H, 2399980690), s = l(s, t, q, r, b[e + 10], I, 4293915773), r = l(r, s, t, q, b[e + 1], J, 2240044497), q = l(q, r, s, t, b[e + 8], G, 1873313359), t = l(t, q, r, s, b[e + 15], H, 4264355552), s = l(s, t, q, r, b[e + 6], I, 2734768916), r = l(r, s, t, q, b[e + 13], J, 1309151649), q = l(q, r, s, t, b[e + 4], G, 4149444226), t = l(t, q, r, s, b[e + 11], H, 3174756917), s = l(s, t, q, r, b[e + 2], I, 718787259), r = l(r, s, t, q, b[e + 9], J, 3951481745), q = c(q, f), r = c(r, g), s = c(s, h), t = c(t, p);
        return K = n(q) + n(r) + n(s) + n(t), K.toLowerCase()
};