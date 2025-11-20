# Проект: Название проекта

## Описание

Этот проект представляет собой веб-приложение с использованием HTML, CSS, JavaScript и Blade-шаблонов. В проекте реализованы различные функциональные модули, такие как аутентификация, работа с картами, управление заказами и многое другое.

---

## Структура проекта

### Корневой каталог

- **README.MD**: Этот файл содержит документацию по проекту
- **public/**: Папка для статических файлов, доступных клиенту (CSS, JS, изображения и т.д.).
- **resources/**: Исходные файлы проекта, включая JavaScript, Blade-шаблоны и другие ресурсы.

---

### Папка `public/`

Содержит скомпилированные и готовые к использованию на клиенте файлы.

- **build/**: Скомпилированные JavaScript-файлы.

  - `chat-websocket.js`, `cookie-consent.js`, `main.js` и т.д.: Основные скрипты приложения.
  - **chunks/**: Модули JavaScript, разбитые на части для оптимизации загрузки.
  - **pages/**: Скрипты для отдельных страниц (например, `cabinet.js`, `home.js`).
  - **utils/**: Утилиты JavaScript (например, `accordion.js`, `cookies.js`).

- **css/**: Стили приложения.

  - Основные стили: `app.css`, `main.css`, `home.css` и т.д.
  - **components/**: Стили для отдельных компонентов (например, `cookie-consent.css`, `chat.css`).
  - **media/**: Медиа-стили для адаптивного дизайна (например, `tablet.css`, `mobile.css`).
  - **services/**: Стили для отдельных сервисов (например, `ebay-local-pick-up.css`).

- **fonts/**: Шрифты, используемые в проекте.

  - `COPYRIGHT.txt`: Лицензия на использование шрифтов.

- **imgs/**: Изображения для проекта.

  - **clients/**: Логотипы клиентов.
  - **partners/**: Логотипы партнеров.

- **svg/**: SVG-иконки и графика.

---

### Папка `resources/`

Содержит исходные файлы проекта.

- **js/**: Исходные JavaScript-файлы.

  - Основные скрипты: `chat-websocket.js`, `cookie-consent.js`, `main.js`.
  - **api/**: API-скрипты (например, `Comments.js`, в разработке).
  - **components/**: Скрипты для компонентов (например, `alpine-maps.js`, `GoogleMapsTracker.js`).
  - **pages/**: Скрипты для отдельных страниц (например, `home.js`, `login.js`).
  - **utils/**: Утилиты JavaScript (например, `DOM.js`, `event.js`).

- **views/**: Blade-шаблоны.
  - **auth/**: Шаблоны для аутентификации (например, `login.blade.php`, `register.blade.php`).
  - **blog/**: Шаблоны для блога (например, `index.blade.php`, `show.blade.php`).
  - **components/**: Шаблоны компонентов (например, `cookie-consent.blade.php`, `header.blade.php`).
  - **emails/**: Шаблоны для email-уведомлений (например, `order_placed.blade.php`, `promo-winner.blade.php`).
  - **layouts/**: Основные макеты (например, `app.blade.php`).
  - **pages/**: Шаблоны для страниц (например, `about.blade.php`, `home.blade.php`).
  - **partials/**: Частичные шаблоны (например, `flash-messages.blade.php`).
