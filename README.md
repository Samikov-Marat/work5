## PHP 7.2
## Mysql 5.6

# Файлы

- `index.php` Точка входа. Запуск приложения.
- `app/Route.php` Маршрут. Хранит данные маршрута и контроллера
- `app/Router.php` Маршрутизатор. Хранит список маршрутов.
- `routes.php` Заполнение списка маршрутов. Создание маршрутов и регистрация их в маршрутизаторе.
- `app/CurrentUser.php` Для работы с авторизованным пользователем. 
- `app/Render.php` Для вывода данных в html-php-шаблон
- `app/Request.php` Для получения данных из запроса.

- `controllers/ControllerInterface.php` Интерфейс контроллера. Объявляет одну функцию - обрабочик запроса.
- `controllers/IndexPage.php` Контроллер главной страницы
- `controllers/Register.php` Контроллер регистрации нового пользователя
- `controllers/Auth.php`  Контроллер авторизации
- `controllers/Logout.php`  Контроллер "деавторизации" (выхода пользователя)
- `controllers/Save.php`  Контроллер сохранения изменений профился

- `models/Driver.php` Подключение к базе данных и обработка запроса
- `models/Repository.php` ПОдготовка запросов к базе данных

- `views/index.php` Шаблон главной страницы. Форма регистрации и авторизации. Или изменения профиля для авторизованного пользователя. 

# Алгоритм
Запрос начинает обрабатываться в `index.php`.

Составляется список маршрутов из условий (метод и путь uri) и обработчика (контроллера).

Загрузка настроек подключения к базе данных и само подключение к базе данных.

Проверяется, если авторизованный пользователь в сессиии. Если есть - загружаются его данные из БД.

Запускается поиск маршрута в маршрутизаторе. Найденный маршрут запускает обработчик (контроллер).

Контроллер выполняет обработку запроса. Далее делает вывод данных с помощью шаблона или просто редирект.

