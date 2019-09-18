/*
*
* @desc 判断两个数组是否相等
* @param {Array} arr1
* @param {Array} arr2
* @return {Boolean}
*
* */
function arrayEqual (arr1, arr2) {
    if (arr1 === arr2) return true
    if (arr1.length !== arr2.length) return false
    for (var i = 0; i < arr1.length; ++i) {
        if (arr[i] !== arr2[i]) return false
    }
    return true
}

/*
*
*  @desc 微元素添加class
*  @param {HTMLElement} ele
*  @param {String} cls
*
* */
var hasClass = require('./hasClass')
function addClass (ele, cls) {
    if (!hasClass(ele, cls)) {
        ele.className += ' ' + cls
    }
}

/*
*  @desc 判断原始是否有某个class
*  @param {HTMLElement} ele
*  @param {String} cls
*  @param {Boolean}
*
* */
function hasClass (ele, cls) {
    return (new RegExp('(\\s|^)' + cls + '(\\s|$)')).test(ele.className)
}

/*
* @desc 为元素移除class
* @param {HTMLElement} ele
* @param {String} cls
* */
var hasClass = require('./hasClass')
function removeClass (ele, cls) {
    if (hasClass(ele, cls)) {
        var reg = new RegExp('(\\s|^)' + cls + '(\\s|$)')
        ele.className = ele.className.replace(reg, ' ')
    }
}

/*
*
*  @desc 根据name读取cookie
*  @param {String} name
*  @param {String}
* */
function getCookie (name) {
    var arr = document.cookie.replace(/\s/g, "").split(';')
    for (var i = 0; i < arr.length; i ++) {
        var tempArr = arr[i].split('=')
        if (tempArr[0] == name) {
            return decodeURIComponent(tempArr[1])
        }
    }
    return '';
}
var setCookie = require('./setCookie')
/*
* @desc 根据name删除cookie
* @param {String} name
*
*
* */
function removeCookie (name) {
    setCookie(name, '1', -1)
}

/*
* @desc 设置cookie
* @param {String} name
* @param {String} value
* @param {Number} days
* */
function setCookie (name, value, days) {
    var date = new Date()
    date.setDate(date.getDate() + days)
    document.cookie = name + '=' + value + ';expires' + date
}






