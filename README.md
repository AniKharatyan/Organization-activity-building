# Laravel REST API Project

## Описание
Этот проект реализует REST API для работы с организациями, зданиями и видами деятельности. Взаимодействие осуществляется через HTTP-запросы, а ответы возвращаются в формате JSON.

---

## Установка и настройка

### Шаг 1: Клонируйте репозиторий
```
git clone https://github.com/AniKharatyan/Organization-activity-building.git
cd path/to/your/repo/project
```
### Шаг 2: Установите зависимости
```
composer install
```

### Шаг 3: Создайте файл .env
```
cp .env.example .env
```

### Шаг 4: Запустите Docker-контейнеры
```
docker-compose up -d
```

### Шаг 5: Сгенерируйте ключ приложения
```
docker-compose exec <app-container> php artisan key:generate
```

### Шаг 6: Выполните миграции и заполните базу данных
```
docker-compose exec <app-container> php artisan migrate --seed
```

### Шаг 7: Сгенерируйте Swagger-документацию
```
docker-compose exec <app-container> php artisan l5-swagger:generate
```
