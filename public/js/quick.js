window.QuickPay = window.QuickPay || {}, window.QuickPay.Embedded = window.QuickPay.Embedded || {},
    function(e) {
        var t = e.QuickPay.Embedded;
        t.CardDetails = function(e) {
            var t = this,
                n = function() {
                    t.debug = !1, t.selectedPaymentMethods = null, t.cardNumber = "", t.expiration = ["", ""], t.cvd = "", t.bin = null, t.paymentMethod = null, t.cardNumberValid = !1, t.expirationValid = !1, t.cvdValid = !1, t.valid = !1, t.callbacks = {}
                };
            t.setCardNumber = function(e) {
                t.cardNumber !== e && (t.cardNumber = e, i())
            }, t.setExpiration = function(e) {
                t.expiration.toString() !== e.toString() && (t.expiration = e, r())
            }, t.setCvd = function(e) {
                t.cvd !== e && (t.cvd = e, o())
            }, t.on = function(e, n) {
                t.callbacks[e] || (t.callbacks[e] = []), t.callbacks[e].push(n)
            };
            var a = function(e, n) {
                    if (t.callbacks[e]) {
                        var a = t.callbacks[e];
                        a.forEach(function(e) {
                            e(n)
                        })
                    }
                },
                i = function() {
                    E("New cardNumber:", t.cardNumber), a("cardNumberChanged", t.cardNumber), m();
                    var e = g();
                    e !== t.bin && (t.bin = e, d())
                },
                r = function() {
                    E("New expiration", t.expiration), a("expirationChanged", t.expiration), f()
                },
                o = function() {
                    E("New CVD", t.cvd), a("cvdChanged", t.cvd), h()
                },
                d = function() {
                    E("New bin:", t.bin), a("binChanged", t.bin), null !== t.paymentMethod && (t.paymentMethod = null, u()), t.bin && y(t.bin, function(e) {
                        e = x(e), b(e) ? (t.paymentMethod = e, u()) : (m(), a("paymentMethodInvalid", e))
                    })
                },
                u = function() {
                    E("New paymentMethod:", t.paymentMethod), a("paymentMethodChanged", t.paymentMethod), m(), h()
                },
                s = function() {
                    E("Card number is now " + (t.cardNumberValid ? "valid" : "invalid")), a("cardNumberValidChanged", t.cardNumberValid), v()
                },
                c = function() {
                    E("Expiration date is now " + (t.expirationValid ? "valid" : "invalid")), a("expirationValidChanged", t.expirationValid), v()
                },
                l = function() {
                    E("CVD is now " + (t.cvdValid ? "valid" : "invalid")), a("cvdValidChanged", t.cvdValid), v()
                },
                p = function() {
                    E("CardDetails are now " + (t.valid ? "valid" : "invalid")), a("validChanged", t.valid)
                },
                m = function() {
                    var e = function() {
                        return null === t.paymentMethod ? !1 : t.paymentMethod.cardnumber_length[0] > t.cardNumber.length || t.cardNumber.length > t.paymentMethod.cardnumber_length[1] ? !1 : !!t.isPaymentMethodValid(t.paymentMethod)
                    };
                    valid = e(), valid !== t.cardNumberValid && (t.cardNumberValid = valid, s())
                },
                f = function() {
                    var e = function(e, t) {
                            var n = new Date,
                                a = n.getMonth() + 1,
                                i = parseInt((n.getFullYear() + "").substr(2, 2), 10);
                            return e.match(/^[0-1]{1}[0-9]{1}$/) && t.match(/^[0-9]{2}$/) ? (t = parseInt(t, 10), e = parseInt(e, 10), i > t ? !1 : t === i && a > e ? !1 : !(1 > e || e > 12)) : !1
                        },
                        n = t.expiration[0],
                        a = t.expiration[1];
                    valid = e(n, a), t.expirationValid !== valid && (t.expirationValid = valid, c())
                },
                h = function() {
                    var e = function(e) {
                        return t.paymentMethod ? t.paymentMethod.cvd_length ? e.match(/^[0-9]+$/) ? t.paymentMethod.cvd_length === t.cvd.length : !1 : !0 : !1
                    };
                    valid = e(t.cvd), t.cvdValid !== valid && (t.cvdValid = valid, l())
                },
                v = function() {
                    valid = t.cardNumberValid && t.expirationValid && t.cvdValid, t.valid !== valid && (t.valid = valid, p())
                },
                g = function() {
                    return t.cardNumber.length >= 6 ? t.cardNumber.substr(0, 6) : null
                },
                y = function(t, n, a) {
                    a = a || function() {};
                    var i = new XMLHttpRequest;
                    i.open("GET", e + "/payment-methods?bin=" + t), i.timeout = 3e4, i.setRequestHeader("Accept", "application/json"), i.onreadystatechange = function() {
                        if (4 === i.readyState) {
                            if (200 !== i.status) return a(i.responseText || i.statusText);
                            var e = JSON.parse(i.responseText);
                            n(e)
                        }
                    }, i.send(null)
                },
                b = function(e) {
                    if (!t.selectedPaymentMethods) return !0;
                    var n = e.brand,
                        a = e.country_alpha2,
                        i = t.selectedPaymentMethods.indexOf(n) >= 0;
                    return (i = i || t.selectedPaymentMethods.indexOf("3d-" + n) >= 0) ? t.lock ? (a && (a = a.toLowerCase()), valid = !1, lockTokens = t.lock.split(","), lockTokens.forEach(function(t) {
                        var i = t.match(/^(!)?(.*?)(?:-([a-z]{2}))?$/);
                        if (i) {
                            var r = "!" === i[1],
                                o = i[2],
                                d = i[3],
                                u = o === n || o === "3d-" + n,
                                s = !a || !d || a === d;
                            u && s && (valid = !r, E("Matching payment method and token.", t, e))
                        }
                    }), valid || E("Did not match payment method with lock.", e, t.lock), valid) : !0 : (E("Denying payment method. Is not in list of selected payment methods:", e), !1)
                },
                x = function(e) {
                    var t = e[0];
                    return 2 === e.length && (t = e.filter(function(e) {
                        return "visa" === e.brand
                    })[0]), t
                },
                E = function() {
                    return t.debug ? console.log.apply(console, arguments) : void 0
                };
            n()
        }
    }(window, document),
    function(e) {
        var t = e.QuickPay.Embedded.Card = {},
            n = {
                apiUrl: "/card",
                testmode: !1
            },
            a = function(e, t) {
                return Array(Math.max(t - String(e).length + 1, 0)).join(0) + e
            },
            i = function() {
                var e = -1;
                if ("Microsoft Internet Explorer" === navigator.appName) {
                    var t = navigator.userAgent,
                        n = new RegExp("MSIE ([0-9]{1,}[.0-9]{0,})");
                    null !== n.exec(t) && (e = parseFloat(RegExp.$1))
                }
                return -1 !== e && 10 > e
            },
            r = function(e, n, a) {
                var i = new XMLHttpRequest;
                i.open("GET", e), i.timeout = 3e4, i.setRequestHeader("Accept", "application/json"), i.onreadystatechange = function() {
                    if (4 == i.readyState) {
                        if (i.status > 399) return a(i.responseText || i.statusText);
                        var o = JSON.parse(i.responseText);
                        "ok" == o.status ? o.done ? n(new t.Token(o.data)) : setTimeout(function() {
                            r(e, n, a)
                        }, 5e3) : a(o.message, o)
                    }
                }, i.send(null)
            };
        t.createToken = function(e, t) {
            for (var o in n) n.hasOwnProperty(o) && !t.hasOwnProperty(o) && (t[o] = n[o]);
            if (i()) throw "IE8 AND IE9 not supported";
            var d = new XMLHttpRequest;
            d.open("POST", t.base_url + "/embedded/v2/cards"), d.timeout = 3e4, d.onreadystatechange = function() {
                if (4 == d.readyState) {
                    if (d.status > 399) return t.failure(d.statusText, d.responseText);
                    var e = JSON.parse(d.responseText);
                    "ok" === e.status ? r(e.poll_url, t.success, t.failure) : t.failure(e.message, e)
                }
            }, d.setRequestHeader("Accept", "application/json");
            var u = new FormData;
            u.append("merchant_id", e.merchant_id), u.append("agreement_id", e.agreement_id), u.append("card[number]", e.cardnumber), u.append("card[year]", a(e.year, 2)), u.append("card[month]", a(e.month, 2)), u.append("card[cvd]", e.cvd), d.send(u)
        }, t.Token = function(e) {
            for (var t in e) e.hasOwnProperty(t) && (this[t] = e[t])
        }
    }(window, document),
    function(e) {
        var t = e.QuickPay.Embedded;
        t.Fee = function(e, t) {
            var n = this;
            n.base_url = e, n.session_id = t
        }, t.Fee.prototype.get = function(e, t, n, a) {
            var i = this,
                r = new XMLHttpRequest;
            r.open("POST", i.base_url + "/calculate_fee"), r.timeout = 3e4, r.setRequestHeader("Accept", "application/json"), r.onreadystatechange = function() {
                if (4 === r.readyState) {
                    if (200 !== r.status) return a(r.status, r.responseText || r.statusText);
                    var e = JSON.parse(r.responseText);
                    n(e)
                }
            };
            var o = new FormData;
            o.append("card_number", e), o.append("session_id", i.session_id), t && "" !== t && o.append("acquirer", t), r.send(o)
        }
    }(window, document),
    function(e) {
        var t = e.QuickPay.Embedded,
            n = function(e, t) {
                return Array(Math.max(t - String(e).length + 1, 0)).join(0) + e
            },
            a = function(e, t, n) {
                var i = new XMLHttpRequest;
                i.open("GET", e), i.timeout = 3e4, i.setRequestHeader("Accept", "application/json"), i.onreadystatechange = function() {
                    if (4 === i.readyState) {
                        if (i.status > 399) return n(i.status, i.responseText || i.statusText);
                        var r = JSON.parse(i.responseText);
                        "ok" === r.status ? r.done ? t(r.qp_status_code, r.qp_status_msg) : setTimeout(function() {
                            a(e, t, n)
                        }, 5e3) : n(r.qp_status_code, r.qp_status_msg)
                    }
                }, i.send(null)
            };
        t.Link = function(e, t) {
            var n = this;
            n.initialized = !1, n.base_url = e;
            var a = t.match(/\/(payments|subscriptions)\/([a-fA-F0-9]+)$/);
            n.type = a[1], n.token = a[2]
        }, t.Link.prototype.init = function(e, t) {
            var n = this;
            n.get(function(t) {
                n.session = t.session_id, n.data = t.link, n.initialized = !0, e(t)
            }, t)
        }, t.Link.prototype.authorize = function(e, t, i) {
            var r = this;
            if (!r.initialized) return setTimeout(function() {
                r.authorize(e, t, i)
            }, 100);
            var o = new XMLHttpRequest,
                d = r.base_url + "/embedded/v2/" + r.session + "/authorize";
            o.open("POST", d), o.timeout = 3e4, o.onreadystatechange = function() {
                if (4 === o.readyState) {
                    if (o.status > 399) return i(o.statusText, o.responseText);
                    var e = JSON.parse(o.responseText);
                    "ok" === e.status ? a(e.poll_url, t, i) : i(e.message, e)
                }
            }, o.setRequestHeader("Accept", "application/json");
            var u = new FormData;
            u.append("card[number]", e.cardnumber), u.append("card[year]", n(e.year, 2)), u.append("card[month]", n(e.month, 2)), u.append("card[cvd]", e.cvd), o.send(u)
        }, t.Link.prototype.get = function(e, t) {
            var n = this,
                a = n.base_url + "/embedded/v2/" + n.type + "/" + n.token,
                i = new XMLHttpRequest;
            i.open("GET", a), i.timeout = 3e4, i.onreadystatechange = function() {
                if (4 === i.readyState) {
                    var n = i.responseText;
                    return i.getResponseHeader("Content-Type") && "application/json" === i.getResponseHeader("Content-Type") && (n = JSON.parse(i.responseText)), 200 !== i.status ? t(i.statusText, n) : void e(n)
                }
            }, i.setRequestHeader("Accept", "application/json"), i.send()
        }, t.Link.prototype.fee = function(e, n, a) {
            var i = this;
            if (i.data.auto_fee) {
                var r = new t.Fee(i.base_url, i.session);
                r.get(e, "clearhaus", n, a)
            }
        }
    }(window, document),
    function(e, t) {
        var n = e.QuickPay.Embedded,
            a = {},
            i = function(e) {
                return e.trim ? e.trim() : e.replace(new RegExp("s", "gu"), "")
            },
            r = function() {
                var e = -1;
                if ("Microsoft Internet Explorer" === navigator.appName) {
                    var t = navigator.userAgent,
                        n = new RegExp("MSIE ([0-9]{1,}[.0-9]{0,})");
                    null !== n.exec(t) && (e = parseFloat(RegExp.$1))
                }
                return -1 !== e && 10 > e
            };
        n.Form = function(e, a) {
            if (r()) throw "IE8 AND IE9 not supported";
            if ("string" == typeof e && (e = t.querySelector(e)), !(this instanceof n.Form)) return new n.Form(e, a);
            var i = this;
            if ("object" != typeof a) throw "Invalid or missing QuickPay.Embedded.Form config";
            if (a.hasOwnProperty("base_url") && 0 !== a.base_url.length || (a.base_url = i.base_url), a.hasOwnProperty("payment_link")) i.link = new n.Link(a.base_url, a.payment_link);
            else {
                if (!a.hasOwnProperty("merchant_id") || 0 === a.merchant_id.length) throw " QuickPay.Embedded.Form merchant_id config is missing";
                if (!a.hasOwnProperty("agreement_id") || 0 === a.agreement_id.length) throw " QuickPay.Embedded.Form agreement_id config is missing"
            }
            i.form = e, i.eventListeners = {}, i.config = i.parseConfig(a), i.cardDetails = new n.CardDetails(a.base_url), i.completed = !1, i.verifyForm(), i.initEvents(), i.link ? i.link.init(function(e) {
                i.cardDetails.selectedPaymentMethods = e.payment_methods, i.fireEvent("init", i, e.link)
            }, function(e, t) {
                i.fireEvent("failure", i, "invalid_payment_link", Array.isArray(t.errors) && t.errors.join(", ") || message, t)
            }) : i.fireEvent("init", i, {})
        }, n.Form.prototype.parseConfig = function(e) {
            for (var t in a) a.hasOwnProperty(t) && !e.hasOwnProperty(t) && (e[t] = a[t]);
            return e
        }, n.Form.prototype.verifyForm = function() {
            var e = this,
                t = e.getCardnumberField(),
                n = e.getExpirationField(),
                a = e.getExpMonthField(),
                i = e.getExpYearField(),
                r = e.getCVDField();
            if (null === t) throw 'Unable to find form input field with data-quickpay="cardnumber"';
            if (t.getAttribute("name")) throw "Card number field must NOT have a name attribute";
            if (null === n && (null === a || null === i)) throw 'Unable to find form input field(s) with data-quickpay="expiration" or data-quickpay="exp-month" and data-quickpay="exp-year"';
            if (n && n.getAttribute("name")) throw "Expiration date field must NOT have a name attribute";
            if (a && a.getAttribute("name")) throw "exp-month field must NOT have a name attribute";
            if (i && i.getAttribute("name")) throw "exp-year field must NOT have a name attribute";
            if (null === r) throw 'Unable to find form input field with data-quickpay="cvd"';
            if (r.getAttribute("name")) throw "CVD field must NOT have a name attribute"
        }, n.Form.prototype.initEvents = function() {
            var e = this,
                t = function() {
                    var t = e.getExpiration();
                    t ? e.cardDetails.setExpiration([t.month, t.year]) : e.cardDetails.setExpiration(["", ""])
                },
                n = function(n) {
                    13 === n.keyCode && (t(), e.form.submit())
                };
            ["init", "success", "failure", "beforeCreate", "brandChanged", "cardnumberChanged", "expirationChanged", "cvdChanged", "feeChanged", "paymentMethodChanged", "validChanged"].forEach(function(t) {
                e.config.hasOwnProperty(t) && e.on(t, e.config[t])
            }), e.getCardnumberField().addEventListener("keyup", function() {
                e.cardDetails.setCardNumber(e.getCardnumber())
            });
            var a;
            (a = e.getExpirationField()) && (a.addEventListener("blur", t), a.addEventListener("keyup", n)), (a = e.getExpMonthField()) && a.addEventListener("blur", t), (a = e.getExpYearField()) && (a.addEventListener("blur", t), a.addEventListener("keyup", n)), e.getCVDField().addEventListener("keyup", function() {
                e.cardDetails.setCvd(e.getCVD())
            }), e.cardDetails.on("paymentMethodChanged", function(t) {
                if (e.fireEvent("paymentMethodChanged", t) !== !1 && e.fireEvent("brandChanged", t && t.brand) !== !1) {
                    var n = e.getCVDField();
                    null === t || null !== t.cvd_length && 0 !== t.cvd_length ? n.removeAttribute("disabled") : (n.value = "", n.setAttribute("disabled", "")), t && e.link && e.link.fee(e.getCardnumber(), function(t) {
                        t.success ? e.fireEvent("feeChanged", e, t.fee, t.total) : e.fireEvent("failure", e, "fee", "No fee available")
                    }, function(t, n) {
                        e.fireEvent("failure", e, "fee", n)
                    })
                }
            }), e.cardDetails.on("cardNumberValidChanged", function(t) {
                e.fireEvent("cardnumberChanged", e, t)
            }), e.cardDetails.on("expirationValidChanged", function(t) {
                e.fireEvent("expirationChanged", e, t)
            }), e.cardDetails.on("cvdValidChanged", function(t) {
                e.fireEvent("cvdChanged", e, t)
            }), e.cardDetails.on("validChanged", function(t) {
                t || e.fireEvent("failure", e, "validation", "invalid", e.getInvalidFields()), e.fireEvent("validChanged", e, t, e.getInvalidFields())
            }), e.cardDetails.on("paymentMethodInvalid", function() {
                e.fireEvent("failure", e, "validation", "payment-method", ["cardnumber"])
            }), e.form.addEventListener("submit", function(t) {
                if (e.completed) return !0;
                if (t.preventDefault(), e.cardDetails.valid) {
                    if (e.config.beforeCreate(e) === !1) return;
                    e.link ? e.paymentLinkPay() : e.tokenizeCard()
                } else e.fireEvent("failure", e, "validation", "invalid", e.getInvalidFields())
            })
        }, n.Form.prototype.paymentLinkPay = function() {
            var e = this,
                n = e.getExpiration(),
                a = e.link;
            a.authorize({
                cardnumber: e.getCardnumber(),
                month: n.month,
                year: n.year,
                cvd: e.getCVD()
            }, function(n, a, i) {
                var r = t.createElement("INPUT");
                r.setAttribute("name", "qp_status_code"), r.setAttribute("value", n), r.setAttribute("type", "hidden"), e.form.appendChild(r), e.completed = !0, e.fireEvent("success", e, {
                    status: n,
                    message: a,
                    raw: i
                }) !== !1 && e.form.submit()
            }, function(t, n) {
                e.fireEvent("failure", e, "authorize", n, {
                    status: t
                })
            })
        }, n.Form.prototype.tokenizeCard = function() {
            var e = this,
                a = e.getExpiration();
            n.Card.createToken({
                merchant_id: e.config.merchant_id,
                agreement_id: e.config.agreement_id,
                cardnumber: e.getCardnumber(),
                month: a.month,
                year: a.year,
                cvd: e.getCVD()
            }, {
                base_url: e.config.base_url,
                success: function(n) {
                    var a = t.createElement("INPUT");
                    a.setAttribute("name", "card_token"), a.setAttribute("value", n.token), a.setAttribute("type", "hidden"), e.form.appendChild(a), e.completed = !0, e.fireEvent("success", e, n) !== !1 && e.form.submit()
                },
                failure: function(t, n) {
                    e.fireEvent("failure", e, "authorize", t, n)
                }
            })
        }, n.Form.prototype.on = function(e, t) {
            var n = this,
                a = n.eventListeners;
            a.hasOwnProperty(e) || (a[e] = []), a[e].push(t)
        }, n.Form.prototype.fireEvent = function(e) {
            var t = this,
                n = !0,
                a = Array.prototype.slice.call(arguments).slice(1);
            if (t.eventListeners.hasOwnProperty(e))
                for (var i = t.eventListeners[e], r = 0; r < i.length && (n = n && i[r].apply(t, a) !== !1, n); r++);
            return n
        }, n.Form.prototype.getCardnumberField = function() {
            return this.form.querySelector("input[data-quickpay=cardnumber]")
        }, n.Form.prototype.getCardnumber = function() {
            return this.getCardnumberField().value.replace(/ /g, "")
        }, n.Form.prototype.getExpirationField = function() {
            return this.form.querySelector("input[data-quickpay=expiration]")
        }, n.Form.prototype.getExpMonthField = function() {
            return this.form.querySelector("input[data-quickpay=exp-month]")
        }, n.Form.prototype.getExpYearField = function() {
            return this.form.querySelector("input[data-quickpay=exp-year]")
        }, n.Form.prototype.getExpiration = function() {
            var e, t = this.getExpirationField(),
                n = this.getExpYearField(),
                a = this.getExpMonthField();
            if (n && a) {
                var i = a.value,
                    r = n.value;
                return 0 === i.length || 0 === r.length ? null : {
                    month: a.value,
                    year: n.value
                }
            }
            return e = t.value.replace(/[^0-9]/g, ""), 4 !== e.length ? null : {
                month: e.slice(0, 2),
                year: e.slice(2, 4)
            }
        }, n.Form.prototype.getCVDField = function() {
            return this.form.querySelector("input[data-quickpay=cvd]")
        }, n.Form.prototype.getCVD = function() {
            return i(this.getCVDField().value)
        }, n.Form.prototype.getInvalidFields = function() {
            var e = this,
                t = [];
            return e.cardDetails.cardNumberValid || t.push("cardnumber"), e.cardDetails.expirationValid || (e.getExpMonthField() && e.getExpYearField() ? (t.push("exp-month"), t.push("exp-year")) : t.push("expiration")), e.cardDetails.cvdValid || t.push("cvd"), t
        }
    }(window, document),
    function() {
        var e = "https://payment.quickpay.net";
        QuickPay.Embedded.Form.prototype.base_url = e
    }(window, document);