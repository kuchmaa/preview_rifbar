/**
 * Устанавливает куки с указанным именем, значением и временем истечения
 * @param {string} name - Имя куки
 * @param {string} value - Значение куки
 * @param {number} minutes - Время истечения в минутах
 */
function setCookie(name, value, minutes) {
    const date = new Date();
    date.setTime(date.getTime() + (minutes * 60 * 1000));
    const expires = "expires=" + date.toUTCString();
    document.cookie = name + "=" + encodeURIComponent(JSON.stringify(value)) + ";" + expires + ";path=/";
}

/**
 * Получает значение куки по имени
 * @param {string} name - Имя куки
 * @returns {any} - Значение куки или null, если куки не найден
 */
function getCookie(name) {
    const cookieName = name + "=";
    const decodedCookie = decodeURIComponent(document.cookie);
    const cookieArray = decodedCookie.split(';');
    
    for (let i = 0; i < cookieArray.length; i++) {
        let cookie = cookieArray[i];
        while (cookie.charAt(0) === ' ') {
            cookie = cookie.substring(1);
        }
        if (cookie.indexOf(cookieName) === 0) {
            try {
                return JSON.parse(cookie.substring(cookieName.length, cookie.length));
            } catch (e) {
                console.error("Ошибка парсинга куки");
                return null;
            }
        }
    }
    return null;
}

/**
 * Удаляет куки с указанным именем
 * @param {string} name - Имя куки
 */
function deleteCookie(name) {
    document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/;";
}

// Экспортируем функции в глобальное пространство имен
window.cookieUtils = {
    setCookie,
    getCookie,
    deleteCookie
}; 