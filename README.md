

# Обзор проекта crypto-transaction

**crypto-transaction** — это автоматизированная система учёта p2p торговых операций с криптовалютой.

## Основное назначение

Проект предназначен для автоматизации учёта и управления p2p криптовалютными транзакциями, а также для формирования отчётов и управления пользователями. Основной язык разработки — PHP, проект построен на фреймворке Laravel.

## Ключевые возможности

- Ведение записей p2p криптовалютных сделок.
- Автоматизация расчётов, в том числе с учётом комиссий и курсов обмена.
- Управление пользователями (создание через artisan-команду).
- Генерация подробных отчётов.
- Веб-интерфейс с использованием TailwindCSS и AlpineJS.
- Документация API, сгенерированная с помощью Scribe, включая примеры запросов на bash и javascript.
- Экспорт коллекции Postman и спецификации OpenAPI для тестирования API.

## Быстрый старт

1. Запустите MySQL:  
   `sudo service mysql start`
2. Запустите сервер Laravel:  
   `php artisan serve`
3. Создайте пользователя:  
   `php artisan users:create`
4. Для автодополнения IDE:
   ```bash
   composer require --dev barryvdh/laravel-ide-helper
   php artisan ide-helper:models
   ```
5. Для генерации PDF-отчётов:  
   `composer require barryvdh/laravel-dompdf`
6. Для защиты от спама (NoCaptcha):
   ```bash
   composer require anhskohbo/no-captcha
   ```
   Добавьте в `.env`:
   ```
   NOCAPTCHA_SITEKEY=your-site-key
   NOCAPTCHA_SECRET=your-secret-key
   ```

## Документация API

Подробная документация и примеры запросов доступны по адресу `/docs` после запуска приложения. Также доступны коллекция Postman и спецификация OpenAPI.

---

**Ссылка на репозиторий:** [tokensave/crypto-transaction](https://github.com/tokensave/crypto-transaction)
